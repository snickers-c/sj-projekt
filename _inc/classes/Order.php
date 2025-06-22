<?php
class Order
{


  private $db;


  public function __construct(Database $database)
  {
    $this->db = $database->getConnection();
  }


  public function findOrder($id)
  {
    $stmt = $this->db->prepare("SELECT paid FROM user_has_date WHERE id_order = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch();
  }

  public function createOrder($userId, $dateId)
  {
    $paid = 0;

    $this->db->beginTransaction();

    try {
      $stmt = $this->db->prepare("INSERT INTO user_has_date (id_user, id_date, paid) VALUES (:userId, :dateId, :paid)");
      $stmt->bindParam(":userId", $userId, PDO::PARAM_INT);
      $stmt->bindParam(":dateId", $dateId, PDO::PARAM_INT);
      $stmt->bindParam(":paid", $paid, PDO::PARAM_INT);

      if ($stmt->execute()) {
        $this->increaseSlot($dateId);
      }

      return $this->db->commit();
    } catch (Exception $e) {
      $this->db->rollBack();
      return false;
    }

    return false;
  }

  public function readOrder()
  {
    $stmt = $this->db->prepare("SELECT ud.id_order, d.id_date, u.first_name, u.last_name, u.email, c.title, d.date, ud.registered_at, ud.paid 
      FROM user u 
      JOIN user_has_date ud ON u.id_user = ud.id_user
      JOIN date d ON ud.id_date = d.id_date
      JOIN course c ON d.course = c.id_course");
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function updateOrder($id, $paid)
  {
    $stmt = $this->db->prepare("UPDATE user_has_date SET paid = :paid WHERE id_order = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->bindParam(":paid", $paid, PDO::PARAM_INT);

    return $stmt->execute();
  }

  public function deleteOrder($id)
  {
    $ids = explode('-', $id);

    $this->db->beginTransaction();

    try {
      $stmt = $this->db->prepare("DELETE FROM user_has_date WHERE id_order = :id");
      $stmt->bindParam(":id", $ids[0], PDO::PARAM_INT);

      if ($stmt->execute()) {
        $this->decreaseSlot($ids[1]);
      }

      return $this->db->commit();
    } catch (Exception $e) {
      $this->db->rollBack();
      return false;
    }

    return false;
  }

  public function increaseSlot($id)
  {
    $stmt = $this->db->prepare("UPDATE date SET slots = slots+1 WHERE id_date = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);

    return $stmt->execute();
  }

  public function decreaseSlot($id)
  {
    $stmt = $this->db->prepare("UPDATE date SET slots = slots-1 WHERE id_date = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);

    return $stmt->execute();
  }

  public function findOrderEvent($id)
  {
    $stmt = $this->db->prepare("SELECT paid FROM user_has_event WHERE id_order_event = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch();
  }

  public function createOrderEvent($userId, $eventId)
  {
    $paid = 0;

    $this->db->beginTransaction();

    try {
      $stmt = $this->db->prepare("INSERT INTO user_has_event (id_user, id_event, paid) VALUES (:userId, :eventId, :paid)");
      $stmt->bindParam(":userId", $userId, PDO::PARAM_INT);
      $stmt->bindParam(":eventId", $eventId, PDO::PARAM_INT);
      $stmt->bindParam(":paid", $paid, PDO::PARAM_INT);

      if ($stmt->execute()) {
        $this->increaseCount($eventId);
      }

      return $this->db->commit();
    } catch (Exception $e) {
      $this->db->rollBack();
      return false;
    }

    return false;
  }

  public function readOrderEvent()
  {
    $stmt = $this->db->prepare("SELECT ue.id_order_event, ue.id_event, u.first_name, u.last_name, u.email, e.title, e.date, ue.registered_at, ue.paid 
      FROM user u 
      JOIN user_has_event ue ON u.id_user = ue.id_user
      JOIN event e ON ue.id_event = e.id_event");
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function updateOrderEvent($id, $paid)
  {
    $stmt = $this->db->prepare("UPDATE user_has_event SET paid = :paid WHERE id_order_event = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->bindParam(":paid", $paid, PDO::PARAM_INT);

    return $stmt->execute();
  }

  public function deleteOrderEvent($id)
  {
    $ids = explode('-', $id);

    $this->db->beginTransaction();

    try {
      $stmt = $this->db->prepare("DELETE FROM user_has_event WHERE id_order_event = :id");
      $stmt->bindParam(":id", $ids[0], PDO::PARAM_INT);

      if ($stmt->execute()) {
        $this->decreaseCount($ids[1]);
      }

      return $this->db->commit();
    } catch (Exception $e) {
      $this->db->rollBack();
      return false;
    }

    return false;
  }

  public function isUserRegisteredEvent($eventId, $userId)
  {
    $stmt = $this->db->prepare("SELECT * FROM user_has_event WHERE id_event = :eventId AND id_user = :userId");
    $stmt->bindParam("eventId", $eventId, PDO::PARAM_INT);
    $stmt->bindParam("userId", $userId, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetch();

    if ($result) {
      return true;
    }

    return false;
  }

  public function increaseCount($id)
  {
    $stmt = $this->db->prepare("UPDATE event SET users_count = users_count+1 WHERE id_event = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);

    return $stmt->execute();
  }

  public function decreaseCount($id)
  {
    $stmt = $this->db->prepare("UPDATE event SET users_count = users_count-1 WHERE id_event = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);

    return $stmt->execute();
  }
}

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

    $stmt = $this->db->prepare("INSERT INTO user_has_date (id_user, id_date, paid) VALUES (:userId, :dateId, :paid)");
    $stmt->bindParam(":userId", $userId, PDO::PARAM_INT);
    $stmt->bindParam(":dateId", $dateId, PDO::PARAM_INT);
    $stmt->bindParam(":paid", $paid, PDO::PARAM_INT);

    if ($stmt->execute()) {
      return $this->increaseSlot($dateId);
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

    $stmt = $this->db->prepare("DELETE FROM user_has_date WHERE id_order = :id");
    $stmt->bindParam(":id", $ids[0], PDO::PARAM_INT);

    if ($stmt->execute()) {
      return $this->decreaseSlot($ids[1]);
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
}

<?php
class Event
{


  private $db;

  public function __construct(Database $database)
  {
    $this->db = $database->getConnection();
  }

  public function findEvent($id)
  {
    $stmt = $this->db->prepare("SELECT * FROM event WHERE id_event = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch();
  }

  public function createEvent($creator, $title, $category, $date, $duration, $price, $image, $active)
  {
    $stmt = $this->db->prepare("INSERT INTO event(creator, title, category, date, duration, price, image, active)
     VALUES (:creator, :title, :category, :date, :duration, :price, :image, :active)");
    $stmt->bindParam(':creator', $creator, PDO::PARAM_INT);
    $stmt->bindParam(':title', $title, PDO::PARAM_STR);
    $stmt->bindParam(':category', $category, PDO::PARAM_STR);
    $stmt->bindParam(':date', $date, PDO::PARAM_STR);
    $stmt->bindParam(':duration', $duration, PDO::PARAM_INT);
    $stmt->bindParam(':price', $price, PDO::PARAM_INT);
    $stmt->bindParam(':image', $image, PDO::PARAM_STR);
    $stmt->bindParam(':active', $active, PDO::PARAM_INT);

    return $stmt->execute();
  }

  public function readEvent()
  {
    $stmt = $this->db->prepare("SELECT * FROM event");
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function updateEvent($id, $title, $category, $date, $duration, $price, $image, $active)
  {
    $stmt = $this->db->prepare("UPDATE event 
      SET title = :title, category = :category, date = :date, duration = :duration, price = :price, image = :image, active = :active
      WHERE id_event = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->bindParam(':title', $title, PDO::PARAM_STR);
    $stmt->bindParam(':category', $category, PDO::PARAM_STR);
    $stmt->bindParam(':date', $date, PDO::PARAM_STR);
    $stmt->bindParam(':duration', $duration, PDO::PARAM_INT);
    $stmt->bindParam(':price', $price, PDO::PARAM_INT);
    $stmt->bindParam(':image', $image, PDO::PARAM_STR);
    $stmt->bindParam(':active', $active, PDO::PARAM_INT);

    return $stmt->execute();
  }

  public function deleteEvent($id)
  {
    $stmt = $this->db->prepare("DELETE FROM event WHERE id_service = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);

    return $stmt->execute();
  }
}

<?php
class Service
{


  private $db;
  private $defaultLink = "#";

  public function __construct(Database $database)
  {
    $this->db = $database->getConnection();
  }

  public function findService($id)
  {
    $stmt = $this->db->prepare("SELECT * FROM service WHERE id_service = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch();
  }

  public function createService($creator, $title, $desc, $button_link, $image, $active)
  {
    if (empty($button_link)) {
      $button_link = $this->defaultLink;
    }

    $stmt = $this->db->prepare("INSERT INTO service(creator, title, description, button_link, image, active)
     VALUES (:creator, :title, :desc, :button_link, :image, :active)");
    $stmt->bindParam(':creator', $creator, PDO::PARAM_INT);
    $stmt->bindParam(':title', $title, PDO::PARAM_STR);
    $stmt->bindParam(':desc', $desc, PDO::PARAM_STR);
    $stmt->bindParam(':button_link', $button_link, PDO::PARAM_STR);
    $stmt->bindParam(':image', $image, PDO::PARAM_STR);
    $stmt->bindParam(':active', $active, PDO::PARAM_INT);

    return $stmt->execute();
  }

  public function readService()
  {
    $stmt = $this->db->prepare("SELECT * FROM service");
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function updateService($id, $title, $desc, $button_link, $image, $active)
  {
    if (empty($button_link)) {
      $button_link = $this->defaultLink;
    }

    $stmt = $this->db->prepare("UPDATE service 
      SET title = :title, description = :desc, button_link = :button_link, image = :image, active = :active
      WHERE id_service = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->bindParam(':title', $title, PDO::PARAM_STR);
    $stmt->bindParam(':desc', $desc, PDO::PARAM_STR);
    $stmt->bindParam(':button_link', $button_link, PDO::PARAM_STR);
    $stmt->bindParam(':image', $image, PDO::PARAM_STR);
    $stmt->bindParam(':active', $active, PDO::PARAM_INT);

    return $stmt->execute();
  }

  public function deleteService($id)
  {
    $stmt = $this->db->prepare("DELETE FROM service WHERE id_service = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);

    return $stmt->execute();
  }
}

<?php
class Qna
{


  private $db;


  public function __construct(Database $database)
  {
    $this->db = $database->getConnection();
  }


  public function findQna($id)
  {
    $stmt = $this->db->prepare("SELECT * FROM about_us WHERE id_about_us = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch();
  }

  public function createQna($creator, $title, $desc, $active)
  {
    $stmt = $this->db->prepare("INSERT INTO about_us (creator, title, description, active) VALUES (:creator, :title, :desc, :active)");
    $stmt->bindParam(":creator", $creator, PDO::PARAM_INT);
    $stmt->bindParam(":title", $title, PDO::PARAM_STR);
    $stmt->bindParam(":desc", $desc, PDO::PARAM_STR);
    $stmt->bindParam(":active", $active, PDO::PARAM_INT);

    return $stmt->execute();
  }

  public function readQna()
  {
    $stmt = $this->db->prepare("SELECT * FROM about_us");
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function updateQna($id, $title, $desc, $active)
  {
    $stmt = $this->db->prepare("UPDATE about_us SET title = :title, description = :desc, active = :active WHERE id_about_us = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->bindParam(":title", $title, PDO::PARAM_STR);
    $stmt->bindParam(":desc", $desc, PDO::PARAM_STR);
    $stmt->bindParam(":active", $active, PDO::PARAM_INT);

    return $stmt->execute();
  }

  public function deleteQna($id)
  {
    $stmt = $this->db->prepare("DELETE FROM about_us WHERE id_about_us = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);

    return $stmt->execute();
  }
}
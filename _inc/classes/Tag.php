<?php
class Tag
{


  private $db;

  public function __construct(Database $database)
  {
    $this->db = $database->getConnection();
  }

  public function findTag($id)
  {
    $stmt = $this->db->prepare("SELECT * FROM tag WHERE id_tag = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch();
  }

  public function createTag($name)
  {
    $stmt = $this->db->prepare("INSERT INTO tag(name) VALUES (:name)");
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);

    return $stmt->execute();
  }

  public function readTag()
  {
    $stmt = $this->db->prepare("SELECT * FROM tag");
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function updateTag($id, $name)
  {
    $stmt = $this->db->prepare("UPDATE tag SET name = :name WHERE id_tag = :id");
    $stmt->bindParam(":name", $name, PDO::PARAM_STR);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);

    return $stmt->execute();
  }

  public function deleteTag($id)
  {
    $stmt = $this->db->prepare("DELETE FROM tag WHERE id_tag = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);

    return $stmt->execute();
  }
}

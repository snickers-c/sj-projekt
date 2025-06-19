<?php
class Banner
{


  private $db;
  private $defaultLink = "#";

  public function __construct(Database $database)
  {
    $this->db = $database->getConnection();
  }

  public function findBanner($id)
  {
    $stmt = $this->db->prepare("SELECT * FROM banner WHERE id_banner = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch();
  }

  public function createBanner($creator, $tag, $title, $desc, $image, $buttonLink, $active)
  {
    if (empty($buttonLink)) {
      $buttonLink = $this->defaultLink;
    }

    $stmt = $this->db->prepare("INSERT INTO banner (creator, tag, title, description, image, button_link, active) VALUES (:creator, :tag, :title, :desc, :image, :buttonLink, :active)");
    $stmt->bindParam(":creator", $creator, PDO::PARAM_INT);
    $stmt->bindParam(":tag", $tag, PDO::PARAM_STR);
    $stmt->bindParam(":title", $title, PDO::PARAM_STR);
    $stmt->bindParam(":desc", $desc, PDO::PARAM_STR);
    $stmt->bindParam(":image", $image, PDO::PARAM_STR);
    $stmt->bindParam(":buttonLink", $buttonLink, PDO::PARAM_STR);
    $stmt->bindParam(":active", $active, PDO::PARAM_INT);

    return $stmt->execute();
  }

  public function readBanner()
  {
    $stmt = $this->db->prepare("SELECT * FROM banner");
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function updateBanner($id, $tag, $title, $desc, $image, $buttonLink, $active)
  {
    if (empty($buttonLink)) {
      $buttonLink = $this->defaultLink;
    }

    $stmt = $this->db->prepare("UPDATE banner SET tag = :tag, title = :title, description = :desc, image = :image, button_link = :buttonLink, active = :active WHERE id_banner = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->bindParam(":tag", $tag, PDO::PARAM_STR);
    $stmt->bindParam(":title", $title, PDO::PARAM_STR);
    $stmt->bindParam(":desc", $desc, PDO::PARAM_STR);
    $stmt->bindParam(":image", $image, PDO::PARAM_STR);
    $stmt->bindParam(":buttonLink", $buttonLink, PDO::PARAM_STR);
    $stmt->bindParam(":active", $active, PDO::PARAM_INT);

    return $stmt->execute();
  }

  public function deleteBanner($id)
  {
    $stmt = $this->db->prepare("DELETE FROM banner WHERE id_banner = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);

    return $stmt->execute();
  }
}
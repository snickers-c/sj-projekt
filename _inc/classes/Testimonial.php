<?php
class Testimonial
{


  private $db;
  private $defaultImage = "assets/images/default-avatar.png";

  public function __construct(Database $database)
  {
    try {
      $this->db = $database->getConnection();
    } catch (PDOException $e) {
      echo "získavanie pripojenia zlyhalo " . $e->getMessage();
      exit;
    }
  }

  public function findTestimonial($id)
  {
    $stmt = $this->db->prepare("SELECT * FROM testimonial WHERE id_testimonial = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function createTestimonial($firstName, $lastName, $occupation, $text, $image)
  {
    if (empty($image)) {
      $image = $this->defaultImage;
    }

    $stmt = $this->db->prepare("INSERT INTO testimonial(first_name, last_name, occupation, text, image)
     VALUES (:firstName, :lastName, :occupation, :text, :image);");
    $stmt->bindParam(':firstName', $firstName, PDO::PARAM_STR);
    $stmt->bindParam(':lastName', $lastName, PDO::PARAM_STR);
    $stmt->bindParam(':occupation', $occupation, PDO::PARAM_STR);
    $stmt->bindParam(':text', $text, PDO::PARAM_STR);
    $stmt->bindParam(':image', $image, PDO::PARAM_STR);

    return $stmt->execute();
  }

  public function readTestimonial()
  {
    $stmt = $this->db->prepare("SELECT * FROM testimonial;");
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function updateTestimonial($id, $firstName, $lastName, $occupation, $text, $image)
  {
    if (empty($image)) {
      $image = $this->defaultImage;
    }

    $stmt = $this->db->prepare("UPDATE testimonial 
      SET first_name = :firstName, last_name = :lastName, occupation = :occupation, text = :text, image = :image
      WHERE id_testimonial = :id");
    $stmt->bindParam(":firstName", $firstName, PDO::PARAM_STR);
    $stmt->bindParam(":lastName", $lastName, PDO::PARAM_STR);
    $stmt->bindParam(":occupation", $occupation, PDO::PARAM_STR);
    $stmt->bindParam(":text", $text, PDO::PARAM_STR);
    $stmt->bindParam(":image", $image, PDO::PARAM_STR);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);

    return $stmt->execute();
  }

  public function deleteTestimonial($id)
  {
    $stmt = $this->db->prepare("DELETE FROM testimonial WHERE id_testimonial = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);

    return $stmt->execute();
  }
}

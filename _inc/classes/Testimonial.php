<?php
class Testimonial
{


  private $db;
  private $defaultImage = "assets/images/default-avatar.png";

  public function __construct(Database $database)
  {
    $this->db = $database->getConnection();
  }

  public function findTestimonial($id)
  {
    $stmt = $this->db->prepare("SELECT * FROM testimonial WHERE id_testimonial = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch();
  }

  public function createTestimonial($creator, $firstName, $lastName, $occupation, $desc, $image, $active)
  {
    if (empty($image)) {
      $image = $this->defaultImage;
    }

    $stmt = $this->db->prepare("INSERT INTO testimonial(creator, first_name, last_name, occupation, description, image, active)
     VALUES (:creator, :firstName, :lastName, :occupation, :desc, :image, :active)");
    $stmt->bindParam(':creator', $creator, PDO::PARAM_INT);
    $stmt->bindParam(':firstName', $firstName, PDO::PARAM_STR);
    $stmt->bindParam(':lastName', $lastName, PDO::PARAM_STR);
    $stmt->bindParam(':occupation', $occupation, PDO::PARAM_STR);
    $stmt->bindParam(':desc', $desc, PDO::PARAM_STR);
    $stmt->bindParam(':image', $image, PDO::PARAM_STR);
    $stmt->bindParam(':active', $active, PDO::PARAM_INT);

    return $stmt->execute();
  }

  public function readTestimonial()
  {
    $stmt = $this->db->prepare("SELECT * FROM testimonial");
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function updateTestimonial($id, $firstName, $lastName, $occupation, $desc, $image, $active)
  {
    if (empty($image)) {
      $image = $this->defaultImage;
    }

    $stmt = $this->db->prepare("UPDATE testimonial 
      SET first_name = :firstName, last_name = :lastName, occupation = :occupation, description = :desc, image = :image, active = :active
      WHERE id_testimonial = :id");
    $stmt->bindParam(":firstName", $firstName, PDO::PARAM_STR);
    $stmt->bindParam(":lastName", $lastName, PDO::PARAM_STR);
    $stmt->bindParam(":occupation", $occupation, PDO::PARAM_STR);
    $stmt->bindParam(":desc", $desc, PDO::PARAM_STR);
    $stmt->bindParam(":image", $image, PDO::PARAM_STR);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->bindParam(":active", $active, PDO::PARAM_INT);

    return $stmt->execute();
  }

  public function deleteTestimonial($id)
  {
    $stmt = $this->db->prepare("DELETE FROM testimonial WHERE id_testimonial = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);

    return $stmt->execute();
  }
}

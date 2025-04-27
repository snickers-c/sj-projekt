<?php
class Testimonial
{


  private $db;


  public function __construct(Database $database)
  {
    try {
      $this->db = $database->getConnection();
    } catch (PDOException $e) {
      echo "získavanie pripojenia zlyhalo " . $e->getMessage();
      exit;
    }
  }

  public function createTestimonial($firstName, $lastName, $occupation, $text, $image)
  {
    if (empty($image)) {
      $image = "assets/images/default-avatar.png";
    }

    $stmt = $this->db->prepare("INSERT INTO testimonial(first_name, last_name, occupation, text, image)
     VALUES (:firstName, :lastName, :occupation, :text, :image);");
    $stmt->bindParam(':firstName', $firstName, PDO::PARAM_STR);
    $stmt->bindParam(':lastName', $lastName, PDO::PARAM_STR);
    $stmt->bindParam(':occupation', $occupation, PDO::PARAM_STR);
    $stmt->bindParam(':text', $text, PDO::PARAM_STR);
    $stmt->bindParam(':image', $image, PDO::PARAM_STR);

    $stmt->execute();
  }

  public function readTestimonial()
  {
    $stmt = $this->db->prepare("SELECT * FROM testimonial;");
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function updateTestimonial() {}

  public function deleteTestimonial() {}
}

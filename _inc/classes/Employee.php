<?php
class Employee
{


  private $db;
  private $defaultImage = "assets/images/default-avatar.png";
  private $defaultLink = "#";

  public function __construct(Database $database)
  {
    $this->db = $database->getConnection();
  }

  public function findEmployee($id)
  {
    $stmt = $this->db->prepare("SELECT * FROM employee WHERE id_employee = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch();
  }

  public function createEmployee($firstName, $lastName, $occupation, $image, $facebook, $twitter, $linkedIn)
  {
    if (empty($image)) {
      $image = $this->defaultImage;
    }
    if (empty($facebook)) {
      $facebook = $this->defaultLink;
    }
    if (empty($twitter)) {
      $twitter = $this->defaultLink;
    }
    if (empty($linkedIn)) {
      $linkedIn = $this->defaultLink;
    }

    $stmt = $this->db->prepare("INSERT INTO employee(first_name, last_name, occupation, image, facebook, twitter, linkedin)
     VALUES (:firstName, :lastName, :occupation, :image, :facebook, :twitter, :linkedIn)");
    $stmt->bindParam(':firstName', $firstName, PDO::PARAM_STR);
    $stmt->bindParam(':lastName', $lastName, PDO::PARAM_STR);
    $stmt->bindParam(':occupation', $occupation, PDO::PARAM_STR);
    $stmt->bindParam(':image', $image, PDO::PARAM_STR);
    $stmt->bindParam(':facebook', $facebook, PDO::PARAM_STR);
    $stmt->bindParam(':twitter', $twitter, PDO::PARAM_STR);
    $stmt->bindParam(':linkedIn', $linkedIn, PDO::PARAM_STR);

    return $stmt->execute();
  }

  public function readEmployee()
  {
    $stmt = $this->db->prepare("SELECT * FROM employee");
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function updateEmployee($id, $firstName, $lastName, $occupation, $image, $facebook, $twitter, $linkedIn)
  {
    if (empty($image)) {
      $image = $this->defaultImage;
    }
    if (empty($facebook)) {
      $facebook = $this->defaultLink;
    }
    if (empty($twitter)) {
      $twitter = $this->defaultLink;
    }
    if (empty($linkedIn)) {
      $linkedIn = $this->defaultLink;
    }

    $stmt = $this->db->prepare("UPDATE employee 
      SET first_name = :firstName, last_name = :lastName, occupation = :occupation, image = :image, facebook = :facebook, twitter = :twitter, linkedin = :linkedIn
      WHERE id_employee = :id");
    $stmt->bindParam(':firstName', $firstName, PDO::PARAM_STR);
    $stmt->bindParam(':lastName', $lastName, PDO::PARAM_STR);
    $stmt->bindParam(':occupation', $occupation, PDO::PARAM_STR);
    $stmt->bindParam(':image', $image, PDO::PARAM_STR);
    $stmt->bindParam(':facebook', $facebook, PDO::PARAM_STR);
    $stmt->bindParam(':twitter', $twitter, PDO::PARAM_STR);
    $stmt->bindParam(':linkedIn', $linkedIn, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    return $stmt->execute();
  }

  public function deleteEmployee($id)
  {
    $stmt = $this->db->prepare("DELETE FROM employee WHERE id_employee = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);

    return $stmt->execute();
  }
}

<?php
class Course
{


  private $db;

  public function __construct(Database $database)
  {
    $this->db = $database->getConnection();
  }

  public function findCourse($id)
  {
    $stmt = $this->db->prepare("SELECT * FROM course WHERE id_course = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch();
  }

  public function createCourse($creator, $employee, $title, $price, $image, $desc, $active, $tags)
  {
    $this->db->beginTransaction();

    try {
      $stmt = $this->db->prepare("INSERT INTO course(creator, employee, title, price, image, description, active)
      VALUES (:creator, :employee, :title, :price, :image, :desc, :active)");
      $stmt->bindParam(':creator', $creator, PDO::PARAM_INT);
      $stmt->bindParam(':employee', $employee, PDO::PARAM_INT);
      $stmt->bindParam(':title', $title, PDO::PARAM_STR);
      $stmt->bindParam(':price', $price, PDO::PARAM_INT);
      $stmt->bindParam(':image', $image, PDO::PARAM_STR);
      $stmt->bindParam(':desc', $desc, PDO::PARAM_STR);
      $stmt->bindParam(':active', $active, PDO::PARAM_INT);

      if ($stmt->execute()) {
        $idCourse = $this->db->lastInsertId();
        $this->insertTagHasCourse($idCourse, $tags);
        return $this->db->commit();
      }
    } catch (Exception $e) {
      $this->db->rollBack();
      return false;
    }

    return false;
  }

  public function readCourse()
  {
    $stmt = $this->db->prepare("SELECT c.*, e.first_name, e.last_name, GROUP_CONCAT(t.name SEPARATOR ' ') as tags FROM course c 
    JOIN employee e ON c.employee = e.id_employee
    JOIN tag_has_course tc ON c.id_course = tc.id_course
	  JOIN tag t ON t.id_tag = tc.id_tag
	  GROUP BY id_course");
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function updateCourse($id, $employee, $title, $price, $image, $desc, $active, $tags)
  {
    $this->db->beginTransaction();

    try {
      $stmt = $this->db->prepare("UPDATE course 
        SET employee = :employee, title = :title, price = :price, image = :image, description = :desc, active = :active
        WHERE id_course = :id");
      $stmt->bindParam(":id", $id, PDO::PARAM_INT);
      $stmt->bindParam(':employee', $employee, PDO::PARAM_INT);
      $stmt->bindParam(':title', $title, PDO::PARAM_STR);
      $stmt->bindParam(':price', $price, PDO::PARAM_INT);
      $stmt->bindParam(':image', $image, PDO::PARAM_STR);
      $stmt->bindParam(':desc', $desc, PDO::PARAM_STR);
      $stmt->bindParam(':active', $active, PDO::PARAM_INT);

      if ($stmt->execute()) {
        $idCourse = $id;
        $stmt = $this->db->prepare("DELETE FROM tag_has_course WHERE id_course = :idCourse");
        $stmt->bindParam(':idCourse', $idCourse, PDO::PARAM_INT);

        if ($stmt->execute()) {
          $this->insertTagHasCourse($idCourse, $tags);
          return $this->db->commit();
        }
      }
    } catch (Exception $e) {
      $this->db->rollBack();
      return false;
    }

    return false;
  }

  public function deleteCourse($id)
  {
    $stmt = $this->db->prepare("DELETE FROM course WHERE id_course = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);

    return $stmt->execute();
  }

  public function insertTagHasCourse($idCourse, $tags)
  {
    $stmt = $this->db->prepare("INSERT INTO tag_has_course(id_course, id_tag) VALUES (:idCourse, :idTag)");

    foreach ($tags as $idTag) {
      $stmt->bindParam(':idCourse', $idCourse, PDO::PARAM_INT);
      $stmt->bindParam(':idTag', $idTag, PDO::PARAM_INT);
      $stmt->execute();
    }
  }

  public function readCourseTags($id)
  {
    $stmt = $this->db->prepare("SELECT t.name FROM tag t JOIN tag_has_course tg ON t.id_tag = tg.id_tag WHERE tg.id_course = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getCourseIds()
  {
    $stmt = $this->db->prepare("SELECT id_course FROM course WHERE active = 1");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
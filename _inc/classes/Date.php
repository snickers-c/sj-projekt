<?php
class Date
{


  private $db;

  public function __construct(Database $database)
  {
    $this->db = $database->getConnection();
  }

  public function findDate($id)
  {
    $stmt = $this->db->prepare("SELECT * FROM date WHERE id_date = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch();
  }

  public function createDate($course, $date, $capacity)
  {
    $slots = 0;

    $stmt = $this->db->prepare("INSERT INTO date(course, date, capacity, slots)
     VALUES (:course, :date, :capacity, :slots)");
    $stmt->bindParam(':course', $course, PDO::PARAM_INT);
    $stmt->bindParam(':date', $date, PDO::PARAM_STR);
    $stmt->bindParam(':capacity', $capacity, PDO::PARAM_INT);
    $stmt->bindParam(':slots', $slots, PDO::PARAM_INT);

    return $stmt->execute();
  }

  public function readDate()
  {
    $stmt = $this->db->prepare("SELECT * FROM date d JOIN course c ON d.course = c.id_course");
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function updateDate($id, $course, $date, $capacity)
  {
    $stmt = $this->db->prepare("UPDATE date 
      SET course = :course, date = :date, capacity = :capacity WHERE id_date = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->bindParam(":course", $course, PDO::PARAM_INT);
    $stmt->bindParam(':date', $date, PDO::PARAM_STR);
    $stmt->bindParam(':capacity', $capacity, PDO::PARAM_INT);

    return $stmt->execute();
  }

  public function deleteDate($id)
  {
    $stmt = $this->db->prepare("DELETE FROM date WHERE id_date = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);

    return $stmt->execute();
  }

  public function readCourseDates($idCourse)
  {
    $stmt = $this->db->prepare("SELECT * FROM date WHERE course = :id");
    $stmt->bindParam(":id", $idCourse, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}

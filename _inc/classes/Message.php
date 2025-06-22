<?php
class Message
{


  private $db;

  public function __construct(Database $database)
  {
    $this->db = $database->getConnection();
  }

  public function createMessage($firstName, $lastName, $email, $message)
  {

    $stmt = $this->db->prepare("INSERT INTO message (first_name, last_name, email, message)
     VALUES (:firstName, :lastName, :email, :message)");
    $stmt->bindParam(':firstName', $firstName, PDO::PARAM_STR);
    $stmt->bindParam(':lastName', $lastName, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':message', $message, PDO::PARAM_STR);

    return $stmt->execute();
  }

  public function readMessage()
  {
    $stmt = $this->db->prepare("SELECT * FROM message");
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function deleteMessage($id)
  {
    $stmt = $this->db->prepare("DELETE FROM message WHERE id_message = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);

    return $stmt->execute();
  }
}

<?php
class User
{


  private $db;


  public function __construct(Database $database)
  {
    $this->db = $database->getConnection();
  }

  public function findUser($id)
  {
    $stmt = $this->db->prepare("SELECT id_user, first_name, last_name, role, email, created_at FROM user WHERE id_user = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch();
  }

  public function createUser($firstName, $lastName, $role, $email, $password)
  {
    $stmt = $this->db->prepare("SELECT id_user FROM user WHERE email = :email");
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->fetch()) {
      return false;
    }

    $hash = password_hash($password, PASSWORD_BCRYPT);

    $stmt = $this->db->prepare("INSERT INTO user (first_name, last_name, role, email, passwd) VALUES (:firstName, :lastName, :role, :email, :password)");
    $stmt->bindParam(':firstName', $firstName, PDO::PARAM_STR);
    $stmt->bindParam(':lastName', $lastName, PDO::PARAM_STR);
    $stmt->bindParam(':role', $role, PDO::PARAM_INT);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':password', $hash, PDO::PARAM_STR);

    return $stmt->execute();
  }

  public function readUser()
  {
    $stmt = $this->db->prepare("SELECT id_user, first_name, last_name, role, email, created_at FROM user");
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function updateUser($id, $firstName, $lastName, $role, $email)
  {
    $stmt = $this->db->prepare("SELECT id_user FROM user WHERE email = :email AND id_user != :id");
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->fetch(PDO::FETCH_ASSOC)) {
      return false;
    }

    $stmt = $this->db->prepare("UPDATE user SET first_name = :firstName, last_name = :lastName, role = :role, email = :email WHERE id_user = :id");
    $stmt->bindParam(':firstName', $firstName, PDO::PARAM_STR);
    $stmt->bindParam(':lastName', $lastName, PDO::PARAM_STR);
    $stmt->bindParam(':role', $role, PDO::PARAM_INT);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    return $stmt->execute();
  }

  public function deleteUser($id)
  {
    $stmt = $this->db->prepare("DELETE FROM user WHERE id_user = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
  }
}

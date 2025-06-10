<?php
class Authenticate
{


  private $db;


  public function __construct(Database $database)
  {
    $this->db = $database->getConnection();
  }

  public function login($email, $password)
  {
    $stmt = $this->db->prepare("SELECT * FROM user WHERE email = :email");
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->execute();

    $user = $stmt->fetch();

    if (!$user) {
      echo "User not found.";
      return false;
    }

    if (password_verify($password, $user['passwd'])) {
      $_SESSION['firstName'] = $user['first_name'];
      $_SESSION['lastName'] = $user['last_name'];
      $_SESSION['role'] = $user['role'];
      $_SESSION['email'] = $user['email'];
      $_SESSION['userID'] = $user['id_user'];
      return true;
    } else {
      echo "Authentication failed.";
    }
    return false;
  }

  public function logOut()
  {
    $_SESSION = array();

    if (ini_get("session.use_cookies")) {
      $params = session_get_cookie_params();

      setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }

    session_destroy();
  }

  public function isLoggedIn()
  {
    return isset($_SESSION['userID']);
  }

  public function getUserRole()
  {
    return $_SESSION['role'];
  }

  public function requireLogin()
  {
    if (!$this->isLoggedIn()) {
      header("Location: login.php");
      exit;
    }
  }
}

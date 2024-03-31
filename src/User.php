<?php
class User
{
    private $table = "users";

    private $conn;
    /**
     * Class constructor.
     */
    public function __construct($conn)
    {
        $this->conn = $conn;
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
 

    }
    public function login($email, $password)
    {
        $statement = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE email = ?");
        $statement->execute([$email]);
        $user = $statement->fetch();
        if (!$user) {
            return false;
        }
        if (password_verify($password, $user['password'])) {
            $session_id = bin2hex(random_bytes(32));
            $_SESSION[$session_id] = $user;
            // Lưu thông tin đăng nhập vào cookie với thời gian sống 30 ngày
            $cookie_name = "session_id";
            setcookie($cookie_name, $session_id, time() + (86400 * 30), "/");
            return true; 
        } else {
            return false; 
        }
    }

    public function checkCookie()
    {
        if (isset($_COOKIE['session_id'])) {
            $session_id = $_COOKIE['session_id'];
            if (isset($_SESSION[$session_id])) {
                header("Location: welcome.php");
                return;
            }
        }
        return;
    }

    public function logout()
    {
        // Kiểm tra xem có session_id trong cookie không
        if (isset($_COOKIE['session_id'])) {
            $session_id = $_COOKIE['session_id'];
            unset($_SESSION[$session_id]);
            setcookie("session_id", "", time() - (86400 * 30), "/");
            header("Location: login.php");
            exit;
        }
      
    }
}

<?php
require_once('DAO.php');
require_once('user.php');
class Controller
{

    private $user;
    private $dao;
    public function __construct()
    {
        $this->dao = new DAO();
        $this->user = new User($this->dao->getConnection());
        $this->user->checkCookie();
    }
    
    public function handleLogin()
    {
        $email =  $_POST['email'];
        $password = $_POST['password'];
        if ($this->user->login($email, $password)) {
            header("Location: welcome.php");
            exit;
        } else {
            $error_message = "Email hoặc mật khẩu không đúng.";
            header("Location: login.php?error=" . urlencode($error_message));
            exit;
        }
    }

    public function handleLogout()
    {
        $this->user->logout();
    }
}

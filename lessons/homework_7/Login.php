<?php
require_once 'DB.php';


class Login
{
    private $login;
    private $db;

    public function __construct()
    {
        $this->db = new DB();
        $this->login = $_POST["login"];

    }

    public function validate()
    {
        return !empty($this->login);
    }

    public function checkLength($min, $max)
    {
        return (mb_strlen($this->login) >= $min) && (mb_strlen($this->login) <= $max);
    }

    public function checkSpace()
    {
        return mb_strpos(trim($this->login), " ") === false;
    }
    public function checkLogin() {
        return ( preg_match( "/^[\da-zA-Z_]+$/", $this->login ) ) ? true : false;
    }
    public function getUsername()
    {
        return $this->login;
    }

    public function checkLoginExists()
    {
        return $stmt = $this->db->getRow('SELECT * FROM users WHERE login = ?', [$this->login]);

    }

}
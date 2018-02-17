<?php

class Password
{
    private $password;
    private $password_confirm;

    public function __construct()
    {
        $this->password = $_POST["password"];
        $this->password_confirm = $_POST["password_confirm"];

    }
    public function validate()
    {
        return !empty($this->password) && !empty($this->password_confirm);
    }

    public
    function checkLength(
        $min,
        $max
    ) {
        return (mb_strlen($this->password) >= $min) && (mb_strlen($this->password) <= $max);
    }

    public function checkPassword() {
        return ( preg_match( "/^[\da-zA-Z_]+$/", $this->password ) ) ? true : false;
    }

    public
    function checkSpace()
    {
        return mb_strpos(trim($this->password), " ") === false;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public
    function passwordMatch()
    {
        return $this->password == $this->password_confirm;
    }

}
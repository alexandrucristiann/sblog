<?php

class User {

    private $uniqueUser, $username, $email, $rights, $registerDate, $valid;

    public function __construct($uniqueUser)
    {
        $this->uniqueUser = $uniqueUser;
        global $sql;
        $query = $sql->query("SELECT `username`, `email`, `rights`, `register_date`, `valid` FROM `users` WHERE `unique_user`='" . $this->uniqueUser . "'");
        $data = $query->fetch_assoc();
        $this->username = $data['username'];
        $this->email = $data['email'];
        $this->rights = boolval($data['rights']);
        $this->registerDate = $data['register_date'];
        $this->valid = boolval($data['valid']);
    }

    public static function add($username, $password, $email)
    {
        global $sql;
        $checkEmail = $sql->query("SELECT `unique_user` FROM `users` WHERE `email`='" . $email . "'");
        if($checkEmail->num_rows != 0)
            throw new DuplicateEmailException();
        $uniqueUser = rand(1,999).uniqid().rand(1,999);
        $checkUnique= $sql->query("SELECT `unique_user` FROM `users` WHERE `unique_user`='" . $uniqueUser . "'");
        if($checkUnique->num_rows == 0)
        {
            try {
                $sql->query("INSERT INTO `users` (`unique_user`,`username`,`password`,`email`,`rights`,`register_date`,`valid`) VALUES ('" . $uniqueUser . "','" . $username . "','" . md5($password) . "','" . $email . "',0,'" . date("Y-m-d") . "',1)");
                return new User($uniqueUser);
            } catch (InvalidUniqueException $e) {
                throw new CriticalFaultException($e->getMessage());
            }
        }
        else
            throw new CriticalFaultException();
    }

    public static function login($username, $password)
    {
        global $sql;
        $checkLogin = $sql->query("SELECT `unique_user` FROM `users` WHERE `username`='" . $username . "' AND `password`='" . md5($password) . "'");
        if($checkLogin->num_rows != 1)
            throw new InvalidLoginCredentials();
        try {
            return new User($checkLogin->fetch_assoc()['unique_user']);
        } catch (InvalidUniqueException $e) {
            throw new InvalidLoginCredentials();
        }
    }

    public function delete()
    {
        global $sql;
        $sql->query("DELETE FROM `users` WHERE `unique_user`='" . $this->uniqueUser . "'");
    }

}
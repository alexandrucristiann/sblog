<?php

class Comment {

    private $uniqueComment, $uniquePost, $isUser, $uniqueUser, $guestName, $message, $email, $ip, $time;

    public function __construct($uniqueComment)
    {
        $this->uniqueComment = $uniqueComment;
        global $sql;
        $checkUnique = $sql->query("SELECT `unique_post`,`is_user`,`unique_user`,`guest_name`,`message`,`email`,`ip`,`time` FROM `comments` WHERE `unique_comment`='" . $this->uniqueComment .  "'");
        if ($checkUnique->num_rows == 0)
            throw new InvalidUniqueException();
        $data = $checkUnique->fetch_assoc();
        $this->uniquePost = $data['unique_post'];
        $this->isUser = $data['is_user'];
        $this->uniqueUser = $data['unique_user'];
        $this->guestName = $data['guest_name'];
        $this->message = $data['message'];
        $this->email = $data['email'];
        $this->ip = $data['ip'];
        $this->time = $data['time'];
    }

    public static function add($uniquePost,$isUser,$uniqueUser,$guestName,$message,$email)
    {
        $uniqueComment = rand(100,999) . uniqid() . rand(100,999);
        global $sql;
        $checkUnique = $sql->query("SELECT `unique_comment` FROM `comments` WHERE `unique_comment`='" . $uniqueComment . "'");
        if ($checkUnique->num_rows == 0)
        {
            try {
                $sql->query("INSERT INTO `comments` (`unique_comment`,`unique_post`,`is_user`,`unique_user`,`guest_name`,`message`,`email`,`ip`,`time`) VALUES ('" . $uniqueComment . "','" . $uniquePost . "','" . $isUser . "','" . $uniqueUser . "','" . $guestName . "','" . $message. "','" . $email . "','" . $_SERVER['REMOTE_ADDR'] . "','" . date("Y-m-d H:i:s") . "')");
                return new Comment($uniqueComment);
            } catch (InvalidUniqueException $e) {
                throw new CriticalFaultException($e->getMessage());
            }
        }
        else
            throw new CriticalFaultException();
    }

    public function delete()
    {
        global $sql;
        $sql->query("DELETE FROM `comments` WHERE `unique_comment`='" . $this->uniqueComment . "'");
    }

}
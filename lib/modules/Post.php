<?php

class Post {

    private $uniquePost, $uniqueUser, $title, $content, $postTime, $category, $tags, $visibility, $allowComments;

    public function __construct($uniquePost)
    {
        $this->uniquePost = $uniquePost;
        global $sql;
        $checkUnique = $sql->query("SELECT `unique_user`,`title`,`content`,`post_time`, `category`,`tags`,`visibility`,`allow_coomments` FROM `posts` WHERE `unique_post`='" . $this->uniquePost . "'");
        if ($checkUnique->num_rows == 0)
            throw new InvalidUniqueException();
        $data = $checkUnique->fetch_assoc();
        $this->uniqueUser = $data['uniqueUser'];
        $this->title = $data['title'];
        $this->content = $data['content'];
        $this->postTime = $data['postTime'];
        $this->category = $data['category'];
        $this->tags =  $data['tags'];
        $this->visibility = $data['visibility'];
        $this->allowComments = $data['allow_comments'];
    }

    public static function add($uniqueUser, $title, $content, $category, $tags, $visibility, $allowComments)
    {
        $uniquePost = rand(100,999) . uniqid() . rand(100,999);
        global $sql;
        $checkUnique = $sql->query("SELECT `unique_post` FROM `posts` WHERE `unique_post`='" . $uniquePost . "'");
        if ($checkUnique->num_rows == 0)
        {
            try {
                $sql->query("INSERT INTO `posts` (`unique_post`,`unique_user`,`title`,`content`,`post_time`,`category`,`tags`,`visibility`,`allow_comments`) VALUES ('" . $uniquePost . "','" . $uniqueUser . "','" . $title . "','" . $content . "','" . date("Y-m-d H:i:s") . "','" . $category . "','" . $tags . "','" . $visibility . "','" . $allowComments . "')");
                return new Post($uniquePost);
            } catch (InvalidUniqueException $e) {
                throw new CriticalFaultException($e->getMessage());
            }
        }
        else
            throw new CriticalFaultException();
    }

}
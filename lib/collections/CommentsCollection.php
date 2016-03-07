<?php
/**
 * Created by PhpStorm.
 * User: Cristi
 * Date: 3/7/2016
 * Time: 4:31 PM
 */

class CommentsCollection {

    private $collection;

    public function __construct()
    {
        $this->collection = array();
    }

    public function getCollection()
    {
        return $this->collection;
    }

    public function loadCollectionByPost($uniquePost)
    {
        $this->collection = array();
        global $sql;
        $query = $sql->query("SELECT `unique_comment` FROM `comments` WHERE `unique_post`='" . $uniquePost . "' ORDER BY `time` DESC");
        while ($uniqueComment = $query->fetch_assoc())
            array_push($this->collection, new Comment($uniqueComment));
    }

}
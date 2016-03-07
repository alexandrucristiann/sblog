<?php
/**
 * Created by PhpStorm.
 * User: Cristi
 * Date: 3/7/2016
 * Time: 4:17 PM
 */

class PostsCollection {

    private $collection;

    public function __construct()
    {
        $this->collection = array();
    }

    public function getCollection()
    {
        return $this->collection;
    }

    public function loadCollectionOrderByDateAsc()
    {
        $this->collection = array();
        global $sql;
        $query = $sql->query("SELECT `unique_post` FROM `posts` ORDER BY `post_time` ASC");
        while($uniquePost = $query->fetch_assoc()['unique_post'])
            array_push($this->collection, new Post($uniquePost));
    }

    public function loadCollectionOrderByDateDesc()
    {
        $this->collection = array();
        global $sql;
        $query = $sql->query("SELECT `unique_post` FROM `posts` ORDER BY `post_time` DESC");
        while($uniquePost = $query->fetch_assoc()['unique_post'])
            array_push($this->collection, new Post($uniquePost));
    }

}
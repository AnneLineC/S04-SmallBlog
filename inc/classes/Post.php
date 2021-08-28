<?php

class Post {
    private $title;
    private $date;
    private $content;
    private $category;
    private $author;

    public function __construct($title = '', $date = '', $content = '', $category = '', $author = '')
    {
        $this->title = $title;
        $this->date = $date;
        $this->content = $content;
        $this->category = $category;
        $this->author = $author;
    }

    public function getDateFormated() {
        return date('d/m/Y', strtotime($this->date));
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getAuthor()
    {
        return $this->author;
    }

}
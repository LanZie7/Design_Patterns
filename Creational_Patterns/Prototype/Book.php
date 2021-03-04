<?php

class Book
{
    public $title;
    protected $pageSize;

    public function __construct($title, $pageSize)
    {
        $this->title = $title;
        $this->pageSize = $pageSize;
    }

    public function getInfo()
    {
        echo "Кол-во страниц: $this->pageSize, название: $this->title" . PHP_EOL;
    }

    public function cloneBook(int $pageSize = 0) {
        $instance = clone ($this);

        if($pageSize > 0) {
            $instance->pageSize = $pageSize;
        }

        return $instance;
    }

}

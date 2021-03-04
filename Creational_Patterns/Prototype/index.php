<?php

require 'Book.php';

$book1 = new Book("PHP1", 300);
$book2 = clone $book1;
$book3 = clone $book1;
$book3->title = "PHP3";

$book4 = $book1->cloneBook(777);
$book5 = $book1->cloneBook();

$book1->getInfo();
$book2->getInfo();
$book3->getInfo();
$book4->getInfo();
$book5->getInfo();

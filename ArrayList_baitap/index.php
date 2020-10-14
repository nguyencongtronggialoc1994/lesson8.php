<?php
include 'ArrayList.php';
$arraylist  = new ArrayList();
$arraylist->Add(1);
$arraylist->Add(2);
$arraylist->Add(3);
$arraylist->Add(4);
$arraylist->remove(0);
$arraylist->addAtPos(10,2);
var_dump($arraylist);

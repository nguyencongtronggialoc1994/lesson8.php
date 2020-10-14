<?php
include 'Node.php';
include 'LinkList.php';
$linkList = new LinkList();
$linkList->addFirstNode(4);
$linkList->addFirstNode(5);
$linkList->addLastNode(6);
$linkList->addlastNode(7);
echo $linkList->getCount();
//print_r($linkList->lastNode);
<?php


class LinkList
{
    public $firstNode;
    public $lastNode;
    public $count;

    public function __construct()
    {
        $this->firstNode = NULL;
        $this->lastNode = NULL;
        $this->count = 0;
    }

    public function addFirstNode($data)
    {
        $node = new Node($data);
        if ($this->firstNode) {
            $node->next = $this->firstNode;
            $this->firstNode = $node;
        } else {
            $this->firstNode = $node;
            $this->lastNode = $node;
        }
        $this->count++;

    }

    public function addLastNode($data)
    {
        if ($this->firstNode) {
            $node = new Node($data);
            $this->lastNode->next = $node;
            $node->next = NULL;
            $this->lastNode = $node;
        } else
            $this->addFirstNode($data);
        return $this->count++;
    }
}
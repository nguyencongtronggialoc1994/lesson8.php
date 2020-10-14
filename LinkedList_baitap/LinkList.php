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

    public function getCount()
    {
        return $this->count;
    }

    public function deleteFirstNode()
    {
        $temp = $this->firstNode;
        $this->firstNode = $this->firstNode->next;
        if ($this->firstNode != NULL)
            $this->count--;

        return $temp;
    }

    public function deleteLastNode()
    {
        if ($this->firstNode != NULL) {
            if ($this->firstNode->next == NULL) {
                $this->firstNode = NULL;
                $this->count--;
            } else {
                $previousNode = $this->firstNode;
                $currentNode = $this->firstNode->next;

                while ($currentNode->next != NULL) {
                    $previousNode = $currentNode;
                    $currentNode = $currentNode->next;
                }

                $previousNode->next = NULL;
                $this->count--;
            }
        }
    }

    public function deleteNode($key)
    {
        $current = $this->firstNode;
        $previous = $this->firstNode;
        while ($current->data != $key) {
            if ($current->next == NULL)
                return NULL;
            else {
                $previous = $current;
                $current = $current->next;
            }
        }
        if ($current == $this->firstNode) {
            if ($this->count == 1) {
                $this->lastNode = $this->firstNode;
            }
            $this->firstNode = $this->firstNode->next;
        } else {
            if ($this->lastNode == $current) {
                $this->lastNode = $previous;
            }
            $previous->next = $current->next;
        }
        $this->count--;
    }

    public function find($key)
    {
        $current = $this->firstNode;
        while ($current->data != $key) {
            if ($current->next == NULL)
                return null;
            else
                $current = $current->next;
        }
        return $current;
    }

    public function readNode($nodePos)
    {
        if ($nodePos <= $this->count) {
            $current = $this->firstNode;
            $pos = 1;
            while ($pos != $nodePos) {
                if ($current->next == NULL)
                    return null;
                else
                    $current = $current->next;

                $pos++;
            }
            return $current->data;
        } else
            return NULL;
    }

    public function totalNodes()
    {
        return $this->count;
    }

    public function readList()
    {
        $listData = array();
        $current = $this->firstNode;

        while ($current != NULL) {
            array_push($listData, $current->readNode());
            $current = $current->next;
        }
        return $listData;
    }

    public function reverseList()
    {
        if ($this->firstNode != NULL) {
            if ($this->firstNode->next != NULL) {
                $current = $this->firstNode;
                $new = NULL;

                while ($current != NULL) {
                    $temp = $current->next;
                    $current->next = $new;
                    $new = $current;
                    $current = $temp;
                }
                $this->firstNode = $new;
            }
        }
    }


}
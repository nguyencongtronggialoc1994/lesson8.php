<?php


class ArrayList
{
    public $arraylist;


    public function ArrayList($arr = "")
    {
        if (is_array($arr) == true)
            $this->arraylist = $arr;
        else $this->arraylist = array();
    }

    public function Add($obj)
    {
        array_push($this->arraylist, $obj);
    }

    public function get($index)
    {
        if (is_integer($index) && $index < $this->size($this->arraylist)) {
            return $this->arraylist[$index];
        } else
            die("error in arrayList.get");
    }
}
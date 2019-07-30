<?php

class BTree{
    public $data;

    public function __construct($data)
    {
        $this->data=$data;
    }

    public function left($node){
        return 2*$node+1;
    }
    public function right($node){
        return 2*$node+2;
    }
    public function preOrder($root=0){
        if(!isset($this->data[$root])){
            return;
        }
        echo "<br>",$this->data[$root];
        $this->preOrder($this->left($root));
        $this->preOrder($this->right($root));
    }
}

$bt=new BTree(range(1,10));

$bt->preOrder();

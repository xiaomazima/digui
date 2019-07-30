<?php

//二叉树的基本操作
class BinaryTree{
    //存数据
    public $arr;
    public $root;
    //相当于初始化
    public function __construct()
    {
        $this->arr=[];
        $this->root=null;
    }
    //添加
    //$v 节点的内容
    //$i 表示是谁的孩子 $i=0表示根节点
    //$left 左孩子
    public function add($v,$i=0,$left=true){
        if($i==0){
            $this->arr[1]=$v;
            $this->root=1;
        }else{
            $index=$left ? 2*$i: 2*$i+1;
            $this->arr[$index]=$v;
        }
    }
    //输出根节点
    public function root(){
        return $this->arr[$this->root];
    }
    public function left($node){
        return 2*$node;
    }
    public function right($node){
        return 2*$node+1;
    }
    //前序遍历
    //先出i节点，然后遍历左孩子，然后右孩子
    public function preOrder($root,&$seq){
        if(empty($root)){
            $root=$this->root;
        }
        //结束条件
        if(!isset($this->arr[$root])){
            return;
        }
        //根
        $seq[]=$this->arr[$root];
        //递归遍历左
        $this->preOrder($this->left($root),$seq);
        $this->preOrder($this->right($root),$seq);

    }
    //前序遍历
    public function inOrder(){

    }
    //前序遍历
    public function postOrder(){

    }

}

$bTree=new BinaryTree();
$bTree->add(10);
$bTree->add(20,1);
$bTree->add(30,1,false);
$bTree->add(40,2);

$bTree->preOrder("",$seq);
var_dump($seq);


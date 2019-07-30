<?php

class Tree {

    public $value;
    public $left;
    public $right;

    public function __construct($value){
        $this->value = $value;
        $this->left = null;
        $this->right = null;
    }

    public function setLeft($left){
        $this->left = $left;
    }

    public function setRight($right){
        $this->right = $right;
    }

}

//算出树的广度优先遍历  使用队列 先进先出 每一层的左右节点都输出来
function Treewide($root){
    $arr=[];
    array_push($arr,$root);
    while(count($arr) >0){
        $res=array_shift($arr);

        if($res->left){
            array_push($arr,$res->left);
        }

        if($res->right){
            array_push($arr,$res->right);
        }
        echo $res->value."<br/>";
    }

}

//前序和中序求出二叉树
function reConstructBinaryTree($pre, $vin){
    $len=count($pre);
    if($len==0){
        return null;
    }
    $root=$pre[0];
    $tree=new Tree($root);
    for($p=0;$p<$len;$p++){
        if($vin[$p]==$root){
            break;
        }
    }
    $preLeft=array();
    $preRight=array();
    $vinLeft=array();
    $vinRight=array();
    for($i=0;$i<$len;$i++){
        if($i<$p){
            $preLeft[]=$pre[$i+1];
            $vinLeft[]=$vin[$i];
        }else if($i>$p){
            $preRight[]=$pre[$i];
            $vinRight[]=$vin[$i];
        }
    }
    $tree->left=reConstructBinaryTree($preLeft,$vinLeft);
    $tree->right=reConstructBinaryTree($preRight,$vinRight);
    return $tree;
}

$pre=array(1,2,4,7,3,5,6,8);
$vin=array(4,7,2,1,5,3,8,6);

//$node=reConstructBinaryTree($pre,$vin);

//var_dump($node);



$tree=new Tree(10);

$a=new Tree(20);
$b=new Tree(30);
$c=new Tree(40);
$d=new Tree(50);

$a->setLeft($c);
$c->setLeft($d);

$tree->setLeft($a);
$tree->setRight($b);

//var_dump($tree);
echo Treewide($tree);
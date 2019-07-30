<?php

class TreeNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
};
function reConstructBinaryTree($pre, $vin){
    $len=count($pre);
    if($len==0){
        return null;
    }
    $root=$pre[0];
    $node=new TreeNode($root);
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
    $node->left=reConstructBinaryTree($preLeft,$vinLeft);
    $node->right=reConstructBinaryTree($preRight,$vinRight);
    return $node;
}

$pre=array(1,2,4,7,3,5,6,8);
$vin=array(4,7,2,1,5,3,8,6);
$node=reConstructBinaryTree($pre,$vin);;
var_dump($node);
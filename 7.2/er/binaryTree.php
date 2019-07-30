<?php
// 每个树的结构
class Tree
{
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



 function preOrder($root){
 		if($root == null) {
 			return;
 		}
 		echo "<br>",$root->value;
 		preOrder($root->left);
 		preOrder($root->right);
 }

function inOrder($root){
    if($root == null) {
        return;
    }
    inOrder($root->left);
    echo "<br>",$root->value;
    inOrder($root->right);
}

//function preOrder($root){
//    // 不使用递归,使用栈来实现前序遍历
//    $stack = [];
//    array_push($stack,$root);
//
//    while(count($stack)>0){
//        $node = array_pop($stack);
//        echo "<br>",$node->value;
//        if($node->right){
//            array_push($stack,$node->right);
//        }
//        if($node->left){
//
//            array_push($stack,$node->left);
//        }
//    }
//}
//
//
//
//Function prOrder($tree){
//    If(!$tree) return;
//    $stack = [];
//    Array_push($stack,$tree);
//    While(count($stack)>0){
//        $subtree = array_pop($stack);
//        echo '<br/>', $subtree->value;
//        If($subtree->right){
//            Array_push($stack,$subtree->right);
//        }
//        If($subtree->left){
//            Array_push($stack,$subtree->left);
//        }
//    }
//}







//$tree = new Tree(10);

//$a = new Tree(20);
//$b = new Tree(30);
//$c = new Tree(40);
//$d = new Tree(50);
//$e = new Tree(60);
//$f = new Tree(70);
//
//$b->setLeft($c);
//$b->setRight($d);
//
//
//$a->setLeft($b);
//$a->setRight($f);
//
////$tree->setLeft($a);
////$tree->setRight($e);
//
//
//// var_dump($tree);
//prOrder($tree);
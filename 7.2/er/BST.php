<?php
// 二叉搜索树

// 将二叉树的结果改成包含一个指向父亲节点的指针
class Tree {

    public $value;
    //public $parent;
    public $left;
    public $right;

    public function __construct($value,$left=null,$right=null){
        $this->value = $value;
        $this->left = $left;
        $this->right = $right;
    }

}

// 把树的高度

// 树的深度求出来

// 每一个节点的度求出

// 使用递归树的前序、中序、后序

// 使用栈来实现前序、中序、后续

// 使用递归实现按深度的输出

// 使用队列实现按深度输出
class BST {

    private $root;

    public function __construct(){
        $this->root = null;
    }

    public function addChild($v){

        $tree = new Tree($v);
        if(!$this->root){
            $this->root = $tree;
        }else{
            $p = $this->root;
            $pp = $this->root;
            while($p){
                $pp = $p;
                if($v <= $p->value){
                    $p = $p->left;
                }else{
                    $p = $p->right;
                }
            }
            if($v <= $pp->value){
                $pp->left = $tree;
            }else{
                $pp->right = $tree;
            }
        }
    }


    public function find($v){

        if(!$this->root) return;
        $res = null;
        $p = $this->root;
        $pp = $this->root;
        while($p){
            if($v < $p->value){
                $pp = $p;
                $p = $p->left;
            }elseif($v > $p->value){
                $pp = $p;
                $p = $p->right;
            }else{
                $res = $p;
                break;
            }
        }
        return [$res,$pp];
    }

    protected function getChildNum($p){
        if($p->left == null && $p->right == null){
            return 0;
        }elseif( ($p->left==null && $p->right!=null) || ($p->left!=null && $p->right==null)){
            return 1;
        }
        return 2;
    }


    public function del($v){

        list($p,$pp) = $this->find($v) ;
        if($p){
            $num = $this->getChildNum($p);
            // 找左孩子 然后再找左孩子的右孩子直到叶子节点
            if($num == 0){
                $p->value <= $pp->value ? $pp->left=null : $pp->right=null;
            }elseif($num == 1){

                $tree = $p->left ? $p->left : $p->right;
                $p->value <= $pp->value ? $pp->left = $tree : $pp->right = $tree;

            }else{
                $pp = $p;
                $parent = $p;
                $p = $p->left;
                while($p->right){
                    $parent = $p;
                    $p = $p->right;
                }

                $pp->value = $p->value;
                if($pp->left == $p){
                    $pp->left =  $p->left;
                }
                if($parent !== $pp) {
                    $parent->right = null;
                }

            }
        }
    }

}


$bst = new BST();

// $arr = range(1,10);
// shuffle($arr);
$arr = [5,7,6,2,3,4,10,8,9,1];
// var_dump($arr);
foreach($arr as $v){
    $bst->addChild($v);
}


$bst->del(10);
var_dump($bst);



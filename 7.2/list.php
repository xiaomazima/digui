<?php
class Node
{
    private $data;  //数据

    private $next;  //下一个数据节点

    public function __construct($data,$next=null)
    {
        $this->data=$data;
        $this->next=$next;
    }

    //调用类外无法调用的属性
    public function __get($name){
        //检查对象或类是否具有该属性
        if(property_exists($this,$name)){
            return $this->$name;
        }
    }

    //给类外无法访问的属性设置值
    public function __set($name,$value){
        if(property_exists($this,$name)){
            $this->$name=$value;
        }
    }

}

class NodeList
{
    private $head;
    private $last;

    public function __construct($val = ""){
        $this->head=new Node($val);
        $this->last=$this->head;
    }

    //添加节点
    public function addNode($val){
        //创建节点
        $node=new Node($val);
        $this->last->next=$node;  //当你添加一个节点的时候 添加到末尾
        $this->last=$node;        //末尾的节点是你刚刚添加的节点
    }

    //删除节点
    public function delNode($val){
        //查找
        list($cur,$ptr)=$this->searchNode($val);
        if(!$ptr){
            return null;
        }
        $cur->next=$ptr->next;   //删除节点的时候  上一个节点的下一个节点指向当前删除节点的下一个节点
    }

    //查找节点
    public function searchNode($val){
        $ptr=$this->head;
        while($ptr){
            if($ptr->data == $val){
                break;
            }
            $cur=$ptr;   //cur是上一个节点
            $ptr=$ptr->next;// ptr是自己这个查找的节点
        }
        return [$cur,$ptr];
    }

    public function display(){
        $head=$this->head;
        while($head){
            echo $head->data,"---->";
            $head=$head->next;
        }
        echo "null";
    }
}
$obj=new NodeList(3);
// echo '<pre>';

$obj->addNode(4);
$obj->addNode(5);
$obj->addNode(6);
$obj->addNode(7);
// $obj->delNode(7);
var_dump($obj);
// print_r($obj->searchNode(567));
//$obj->display();

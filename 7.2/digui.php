<?php

$address = array(
    array('id'=>1  , 'address'=>'安徽' , 'pid' => 0),
    array('id'=>2  , 'address'=>'江苏' , 'pid' => 0),
    array('id'=>3  , 'address'=>'合肥' , 'pid' => 1),
    array('id'=>4  , 'address'=>'庐阳区' , 'pid' => 3),
    array('id'=>5  , 'address'=>'大杨镇' , 'pid' => 4),
    array('id'=>6  , 'address'=>'南京' , 'pid' => 2),
    array('id'=>7  , 'address'=>'玄武区' , 'pid' => 6),
    array('id'=>8  , 'address'=>'梅园新村街道', 'pid' => 7),
    array('id'=>9  , 'address'=>'上海' , 'pid' => 0),
    array('id'=>10 , 'address'=>'黄浦区' , 'pid' => 9),
    array('id'=>11 , 'address'=>'外滩' , 'pid' => 10),
    array('id'=>12 , 'address'=>'安庆' , 'pid' => 1),
);

//第二种方式： 利用循环实现无限极递归
$tree = [];
foreach($address as $k){
    //将每一个分类id作为数组下标key,并创建children单元
    $tree[$k['id']] = $k;
    $tree[$k['id']]['children'] = array();
}


//第二步，利用引用，将每个分类添加到父类children数组中，这样一次遍历即可形成树形结构。
foreach ($tree as $k=>$v) {
    //判断如果其中每一条的数据中的pid不等于0的时候， 那就证明他有父类
    if ($v['pid'] != 0) {
        //根据pid=id  找到他的父类  并且把地址存放在父类字段的children

        $tree[$v['pid']]['children'][] = &$tree[$k];
    }
}
foreach($tree as $k=>$v){
    if($v['pid'] !==0){
        unset($tree[$k]);
    }
}
print_r($tree);


//function demo($arr,$pid=0){
//    $info=[];
//    foreach($arr as $k=>$v){
//        if($v['pid'] == $pid){
//            $son=demo($arr,$v['id']);
//            $v['son']=$son;
//            $info[]=$v;
//        }
//    }
//    return $info;
//}
//echo "<pre>";
//print_r(demo($address));
//function generateTree2($rows, $id='id', $pid='pid'){
//    $items = array();
//    foreach ($rows as $row) $items[$row[$id]] = $row;
//    foreach ($items as $item) $items[$item[$pid]]['son'][$item[$id]] = &$items[$item[$id]];
//    return isset($items[0]['son']) ? $items[0]['son'] : array();
//}
//
//echo "<pre>";
//print_r(generateTree2($address));

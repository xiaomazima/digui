<?php
// 基数排序

//  每一位:0-9
//  234  345 12 10 4

function getIndexN($data,$j){
    $k = 1;
    while($data){
        if($k==$j) break;
        $data = floor($data/10);
    $k++;
}
return $data%10;
}

function radixsort($arr){

    $len = count($arr);
    // 比较每一位上的数字 从数字的第一位开始，即从个位开始
    for($j=1;;$j++){
        // 用一个标记来判断什么时候结束
        $flag = false;
        // 用来存储每一次的结果
        $result=[];
        // 求得相应位的数字
        for($i=0;$i<$len;$i++){
            // 求得对应为上的数字
            $temp = getIndexN($arr[$i],$j);
            // 将这个数添加到对应的仓库
            $result[$temp][] = $arr[$i];
            // 记录
            if($temp) $flag = true;
        }
        if(!$flag) break;
        // 进行合并
        $arr = [];
        for($i=0;$i<10;$i++){
            if(!isset($result[$i])) continue;
            foreach($result[$i] as $v){
                $arr[] = $v;
            }
        }
    }
    return $arr;
}

$arr = [234,345,12,10,4];
$arr = radixsort($arr);
var_dump($arr);
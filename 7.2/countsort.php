<?php

// 计数排序

function countSort($arr){

    $min = min($arr);
    $max = max($arr);
    // 申请多少个额外的空间
    $len = $max-$min+1;
    $res = array_fill(0, $len, 0);
    $result = [];
    foreach($arr as $v){
        // 1. 做一个映射，得到应该放到数组下标为几的元素中
        $index = $v-$min;
        // 值为个数
        $res[$index] ++;


    }
    for($i=0;$i<$len;$i++){
        if(!$res[$i]) continue;
        $num = $min+$i;
        for($j=0;$j<$res[$i];$j++){
            $result[] = $num;
        }
    }
    return $result;
}

$arr=[100,-1,2,3,1];
var_dump(countSort($arr));
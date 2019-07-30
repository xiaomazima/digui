<?php

// 插值查找
function interBinarySearch(&$arr,$value,$low,$high){
    //$count = 0;
    while($low <  $high){
        //var_dump(++$count);
        if($arr[$low] == $value ) return $low;
        if($arr[$high] == $value) return $high;
        // 计算插值位置，跟要搜索的值最最接近的位置
        $mid =
            $low + intval(($value-$arr[$low])/($arr[$high]-$arr[$low]) * ($high - $low));

        if(!isset($arr[$mid])) return -1;

        if($arr[$mid] < $value) {

            $low = $mid + 1;

        }elseif($arr[$mid] > $value){

            $high = $mid-1;

        }else {
            return $mid;
        }
    }

    return ($arr[$low] == $value) ? $low : -1;
}

// $arr  = [1,5,10,15,20,25,30];
$arr = [1,5,9,10,20,30,50,70,99,999,1000];
$res = interBinarySearch($arr,99,0,count($arr)-1);
var_dump($res);
<?php

// 二分查找-折半查找，排好序的数组，每次查一半

// [1,2,3,4,5,6,7,8,9]  $value = 10

// $mid = (low + high)
// 判断 $mid == $value
//      $mid < $value  $value落在$mid右边
//      $mid > $value  $value落在$mid左边

//  (1）与中间元素比较，其中mid=low+1/2*(low+high)

// （2）等于中间元素，则查找成功

// （3）大于中间元素，在它的右半区查找，重复（1）；小于中间元素，在它的左半区查找，重复（1），直到找到给定值。
// 前提是$arr是排好序的，
function binarySearch($arr,$value){
    $len = count($arr);
    $low = 0;
    $high = $len-1;
    while($low <= $high){

        $mid = $low + floor(($high-$low)/2);

        if($arr[$mid] < $value){

            $low = $mid+1;

        }elseif($arr[$mid] > $value){

            $high = $mid - 1;

        }else{

            return $mid;
        }
    }

    return -1;
}

//$arr=[2,4,6,9];
//var_dump(binarySearch($arr,4));


//  50  1
//  25  2
//  12  3
//  6   4
//  3   5
//  1   6

// N个数 最多可以查多少次：logN
// 最好情况： O(1)
// 最坏情况： logN + 1
// 平均情况： logN

//二分查找 二
function binary2(&$arr,$value,$low,$high){
    if($low>$high) return -1;
    $mid=$low+floor(($high-$low)/2);
    if($value<$arr[$mid]){
        return binary2($arr,$value,$low,$mid-1);
    }elseif($value>$arr[$mid]){
        return binary2($arr,$value,$mid+1,$high);
    }else{
        return $mid;
    }
}

$arr = range(1,100);
var_dump(binary2($arr,56,0,99));




// 插值查找
//function interBinarySearch(&$arr,$value,$low,$high){
//    //$count = 0;
//    while($low <  $high){
//        //var_dump(++$count);
//        if($arr[$low] == $value ) return $low;
//        if($arr[$high] == $value) return $high;
//        // 计算插值位置，跟要搜索的值最最接近的位置
//        $mid =
//            $low + intval(($value-$arr[$low])/($arr[$high]-$arr[$low]) * ($high - $low));
//
//        if(!isset($arr[$mid])) return -1;
//
//        if($arr[$mid] < $value) {
//
//            $low = $mid + 1;
//
//        }elseif($arr[$mid] > $value){
//
//            $high = $mid-1;
//
//        }else {
//            return $mid;
//        }
//    }
//
//    return ($arr[$low] == $value) ? $low : -1;
//}
//
//// $arr  = [1,5,10,15,20,25,30];
//$arr = [1,5,9,10,20,30,50,70,99,999,1000];
//$res = interBinarySearch($arr,99,0,count($arr)-1);
//var_dump($res);
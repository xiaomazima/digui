<?php
/*
* 归并排序
* 解决的问题： 将若干个排好序的数列合并形成一个排好序的数列
*/
function mergeSort(array ...$arr){
    $len = count($arr);
    if($len < 2) return $arr[0];
    $iCount = 0;
    $t = [];
    while($iCount < $len){
        $sortArr = mSort($t,$arr[$iCount]);
        $iCount += 1;
        $t = $sortArr;
    }
    return $sortArr;
}

function mSort($arr1,$arr2){
    //var_dump($arr);
    $len1 = count($arr1);
    $len2 = count($arr2);
    $i=0;
    $j=0;
    $sortArr = [];
    while($i<$len1 && $j<$len2){
        if($arr1[$i] < $arr2[$j]){
            array_push($sortArr,$arr1[$i]);
            $i++;
        }else{
            array_push($sortArr,$arr2[$j]);
            $j++;
        }
    }
    while($i<$len1){
        array_push($sortArr,$arr1[$i]);
        $i++;
    }
    while($j<$len2){
        array_push($sortArr,$arr2[$j]);
        $j++;
    }
    return $sortArr;
}

$sortArr = mergeSort([1,3,5,9,10],[2,4,12],[0,4,6,8,20]);
var_dump($sortArr);
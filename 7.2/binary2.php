<?php

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
var_dump(binary2($arr,5,0,99));
<?php

// function sum($n,$res=0){
//     if($n==1){
//      return $res+1;
//     }
//     $res+=$n;
//     return sum($n-1,$res);
// }
//
//print_r(sum(9)) ;

//function fan($n){
//    if($n==1){
//        return 1;
//    }
//
//    return fan($n-1)*10+$n;
//}
//
//var_dump(fan(8));

//function fan($str,$start,$end){
//    if($start>=$end) return true;
//
//    if($str[$start]==$str[$end]){
//        return fan($str,$start+1,$end-1);
//    }
//    return false;
//}
//
//$str='abcdefdcba';
//var_dump(fan($str,0,8));
$a='abcdef';
echo $a{1};
<?php
// 希尔排序
// 核心思想：插入排序对排序度高的数据排序特别有效
// 设置一个增长因子 factory = len/2  一次对增长因子/2

function shellSort($arr){
    $len = count($arr);
    $factory = $len >> 1; // 初始化增长因子
    for($factory = $len >> 1; $factory > 0 ; $factory = $factory >> 1){
        for($i=$factory;$i<$len;$i++){

            for($j=$i-$factory; $j>=0 && $arr[$j] > $arr[$j+$factory]; $j-=$factory){
                $temp = $arr[$j];
                $arr[$j] = $arr[$j+$factory];
                $arr[$j+$factory] = $temp;
            }
        }
    }
    var_dump($arr);
}


//$arr = [5,7,8,3,1,2,4,6];
//shellSort($arr);

//插入排序  默认第一个是排好序的 从第二个开始找 在前面排好序的数组中的位置

//function fan($arr){
//    $len=count($arr);
//    for($i=1;$i<$len;$i++){
//        $value=$arr[$i];
//        for($j=$i-1;$j>=0;$j--){
//            //判断什么时候到达位置
//            if($arr[$j]<$value){
//                break;
//            }
//        }
//        if(($j+1)!=$i){
//            for($index=$i;$index>($j+1);$index--){
//                $arr[$index]=$arr[$index-1];
//            }
//            $arr[$j+1]=$value;
//        }
//    }
//
//    return $arr;
//}
function fan($arr){
    $len=count($arr);
    for($j=1;$j<$len;$j++){
        for($i=0;$i<$j;$i++){
            if($arr[$i]>$arr[$j]){
                $arr[$i]=$arr[$i] ^ $arr[$j];
                $arr[$j]=$arr[$i] ^ $arr[$j];
                $arr[$i]= $arr[$i] ^ $arr[$j];
            }
        }
    }
    var_dump($arr);
}
//$arr = [89,2,56,1,89];
//
//fan($arr);

//选择排序 每次挑出最小的放到指定的位置
function selectSort($arr)
{
    $len=count($arr);
    for($i=0;$i<$len;$i++){
        //存放的是最小的值
        $min=$arr[$i];
        //最小下标
        $index=$i;
        for($j=$i+1;$j<$len;$j++){
            if($arr[$j] < $min){
                $min=$arr[$j];
                $index=$j;
            }
        }
        //有种情况 当最小值和$i指向一个 说明这个下标对应的就是最小的 如果在异或的话就变成了0 所以得判断这种情况
        if($index != $i){
            $arr[$i]=$arr[$index] ^ $arr[$i];
            $arr[$index]=$arr[$i] ^ $arr[$index];
            $arr[$i]=$arr[$i] ^ $arr[$index];
        }
    }
    var_dump($arr);
}

$arr=[5,7,3,2,4,9];
selectSort($arr);
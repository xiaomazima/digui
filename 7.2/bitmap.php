<?php
//将二进制中的每一位的位置当成数字的值，如果有该值，则在对应的位置上标一 一个字节八个位
//
//$arr=[2,3,4,5,8,31,33];
//
//function bitmap($arr)
//{
//    // 一个整型分配的存储位数
//    $cell = PHP_INT_SIZE * 8;
//    // 创建一个50个长度的数组，每个元素的初始值为0 array_fill用给定的值填充数组
//    $storeArr = array_fill(0, 2, 0);
//    // 存储排序好的数组
//    $sortArr = [];
//    // 循环每个待排序的元素
//    foreach ($arr as $v) {
//        // 计算待排序的元素应该放到$storeArr中的哪个下标元素中
//        $chunkIndex = floor($v / $cell);
//        // 计算应该放到对应下标元素中的哪个位置
//        $posIndex = $v % $cell;
//        // 将对应下标元素的对应位置标上1，表明该位置存在位置对应的数字
//        $pos = 1 << $posIndex;
//        $storeArr[$chunkIndex] = $storeArr[$chunkIndex] | $pos;
//    }
//        foreach($storeArr as $v){
//            echo decbin($v),'<br>';
//        }
//
//}
//    bitmap($arr);
    $arr = [2,3,4,89,8,31,33];
    // PHP_INT_SIZE = 4
    function bitmap($arr){
        // 一个整型分配的存储位数
        $cell = PHP_INT_SIZE * 8;
        // 创建一个50个长度的数组，每个元素的初始值为0
        $storeArr = array_fill(0,50, 0);
        // 存储排序好的数组
        $sortArr = [];
        // 循环每个待排序的元素
        foreach($arr as $v){
            // 计算待排序的元素应该放到$storeArr中的哪个下标元素中
            $chunkIndex = floor($v/$cell);
            // 计算应该放到对应下标元素中的哪个位置
            $posIndex = $v%$cell;
            // 将对应下标元素的对应位置标上1，表明该位置存在位置对应的数字
            $pos = 1 << $posIndex;
            $storeArr[$chunkIndex] = $storeArr[$chunkIndex] | $pos;
        }
        // 循环遍历$storeArr中所有元素的每一位，将位置值为1的位置对应的数字存储到$sortArr中
        foreach($storeArr as $key=>$v){
            // 得到每个元素的起始值
            $base = $key*$cell;
            // 遍历元素位置
            for($i=0;$i<$cell;$i++){
                $t = 1 << $i;
                if(($v & $t)!=0){
                    // 存储位置对应的数值
                    $sortArr[]  = ($base + $i);
                }
            }
        }
        return [$storeArr,$sortArr];
    }
    list($storeArr,$sortedArr) = bitmap($arr);
    var_dump($sortedArr);

     //查找该数组中有没有50的值
    $search = 5;
    $cellIndex = floor($search / (PHP_INT_SIZE*8));
    $posIndex = $search % (PHP_INT_SIZE*8);

    $t = 1 << $posIndex;

    if(($storeArr[$cellIndex] & $t) == 0){
        echo "{$search}不在数组中";
    }else{
        echo "{$search}在数组中";
    }

<?php

// 1 堆排序  先构造最大堆和最小堆  然后把跟和最后一个元素进行交换
function createMaxHeap(&$arr,$end){
    for($i=intdiv($end,2); $i>=0; $i--){

        $c = 2*$i+1;
        if($c > $end){
            continue;
        }

        if($c+1 <= $end && $arr[$c+1] < $arr[$c]){
            $c = $c + 1;
        }

        // $c 指向孩子节点中的最大值
        if($arr[$i] > $arr[$c]){
            $arr[$i] = $arr[$i] ^ $arr[$c];
            $arr[$c] = $arr[$i] ^ $arr[$c];
            $arr[$i] = $arr[$i] ^ $arr[$c];
        }


    }

}

function heapSort(&$arr){
    $len=count($arr);
    for($i=1;$i<$len;$i++){
        createMaxHeap($arr,$len-$i);
        //交换第0个元素和最后一个元素的值
        swap($arr[0],$arr[$len-$i]);
    }

}

function swap(&$a,&$b){
    $t=$a;
    $a=$b;
    $b=$t;
}

//$arr=[4,3,5,2,1,6,7];
//
//heapSort($arr);
//
//var_dump($arr);

//2 计数排序 先求出最大值和最小值 然后给定空间 创建最大值和最小值的数组
// 然后循环要排序的数组 如果数字存在就在指定位置+1
function fan($arr){
    $min=min($arr);
    $max=max($arr);
    $len=$max-$min+1;
    $shu=array_fill(0,$len,0);
    $result=[];
    foreach($arr as $v){
        $index=$v-$min;
        $shu[$index]++;
    }

    for($i=0;$i<$len;$i++){
        if(!$shu[$i])  continue;
        $mum=$min+$i;
        for($j=0;$j<$shu[$i];$j++){
            $result[]=$mum;
        }
    }
    return $result;
}

//$arr=[3,-1,4,2,2];
//var_dump(fan($arr)) ;

//$a=count([1,2]);
//var_dump($a);

//3 基数排序 给十个桶 0-9  把个位十位的数字循环放桶里
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

//$arr = [234,345,12,10,4];
//$arr = radixsort($arr);
//var_dump($arr);

//4 插入排序  默认第一个是排好序的 从第二个开始找 在前面排好序的数组中的位置
function fanc($arr){
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
//fanc($arr);

// 5 希尔排序
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

//6 选择排序 每次挑出最小的放到指定的位置
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

//$arr=[5,7,3,2,4,9];
//selectSort($arr);

//7 bitmap 将二进制中的每一位的位置当成数字的值，如果有该值，则在对应的位置上标一 一个字节八个位
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
//list($storeArr,$sortedArr) = bitmap($arr);
//var_dump($sortedArr);

//查找该数组中有没有50的值
//$search = 5;
//$cellIndex = floor($search / (PHP_INT_SIZE*8));
//$posIndex = $search % (PHP_INT_SIZE*8);
//
//$t = 1 << $posIndex;
//
//if(($storeArr[$cellIndex] & $t) == 0){
//    echo "{$search}不在数组中";
//}else{
//    echo "{$search}在数组中";
//}

//8
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

//$sortArr = mergeSort([1,3,5,9,10],[2,4,12],[4,6,8,20]);
//var_dump($sortArr);

//9 冒泡 两两相比 每次挑出一个最大值放到尾部
function fanMao($arr){
        $len=count($arr);
        for($j=1;$j<$len;$j++){
            for($i=0;$i<$len-$j;$i++){
                if($arr[$i]>$arr[$i+1]){
                    $arr[$i]=$arr[$i]^$arr[$i+1];
                    $arr[$i+1]=$arr[$i]^$arr[$i+1];
                    $arr[$i]=$arr[$i]^$arr[$i+1];
                }
            }
        }
//    var_dump($arr);
}

//$arr=[3,2,5,7,1,4];
//fanMao($arr);

// 快速排序 分而治之的方法 取一个中间值
function quickSort($arr){
    if(!is_array($arr)) return false;
    $len= count($arr);
    if($len<=1) return $arr;
    $left = $right = [];
    for($i=1;$i<$len;$i++){
        if($arr[$i] < $arr[0]){
            $left[] = $arr[$i];
        }else{
            $right[] = $arr[$i];
        }
    }
    //递归调用
    $left  = quickSort($left);
    $right = quickSort($right);
    return array_merge($left,array($arr[0]),$right);
}
        $arr=[2,5,7,1,3];
    var_dump(quickSort($arr));
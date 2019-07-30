<?php
////    function getNumber($n){
////        $sum=0;
////        $str='';
////        $bits=PHP_INT_SIZE * 8;
////
////        for($i=0;$i<$bits;$i++){
////            $t=($n>>$i)&1;
//////            $str=$t.$str;
////            if($t==1){
////                $sum++;
////            }
////        }
//////        return $str;
////        return $sum;
////    }
//////echo getNumber(4);
////
////function Number($n){
////    $sum=0;
////    $bits=PHP_INT_SIZE * 8;
////    $camp=$n>>($bits-1)&1;//取最高位上的数
////    for($i=0;$i<$bits;$i++){//循环32次
////        $t=($n>>$i)&1;
////        if($camp && !$t){
////            $sum=$sum+1;
////        }else if(!$camp && $t){
////            $sum=$sum+1;
////        }
////    }
////
////        return $sum;
////}
////echo Number(-10);
////
////function NumberOf1($n){
////    $count = 0;
////    if($n < 0 ){
////        $n = ~$n + 1;
////        $count += 1;
////    }
////    while($n){
////        $n = $n & ($n-1);
////        $count ++;
////    }
////    return $count;
////}
////
////echo NumberOf1(-6);
//
////$a = 3; //0011
////$b = 4; //0100
////$c = $a ^ $b; //A和B异或，结果是C
//////echo $c;
////$b = $b ^ $c; //B和C异或的结果一定是A，将A赋值给B
////echo $b;
//////$a = $b ^ $c; //A（原A，现B）和C异或的结果一定是B，将B赋值给A
//////echo $a,$b; //已经实现$a和$b的值对调
//
////function ip($ip){
////        $data=explode('.',$ip);
//////    var_dump($data);
////    $data=sprintf('%u',($data[0]<<24)+($data[1]<<16)+($data[2]<<8)+($data[3]));
////    return $data;
////}
////
////echo ip('255.255.255.255');
//
//
////function int2iP2($num)
////{
////
////    $data = ip2long($num);
//////    $data = long2ip($data);
////    return $data;
////
////}
////echo int2iP2('234.35.255.255');
////
////echo chr(97);
////echo ord('a');
//
////function pin($name){
//////    $str=base64_encode($name);
////    $sum=0;
////     for($i=0;$i<strlen($name);$i++){
////            $sum+=ord($name[$i]);
////     }
////    $sum=$sum%100;
////    echo   $sum;
////
////}
////
//// pin('喜喜');
//
////第一次 10瓶  10瓶子/2   5瓶子   10瓶盖/4  2瓶子余2瓶盖
////第二次 7瓶    7/2       3余1     9/4     2余1
////第三次 5瓶
////
//
//////ip转换为整数
////function ip2int($ip){
//////我们先把ip分为四段,$ip1,$ip2,$ip3,$ip4
////    list($ip1,$ip2,$ip3,$ip4)=explode(".",$ip);
//////然后第一段乘以256的三次方，第二段乘以256的平方，第三段乘以256
//////这即是我们得到的值
////    return $ip1*pow(256,3)+$ip2*pow(256,2)+$ip3*256+$ip4;
////}
////
////echo ip2int('255.255.255.255');
////
//
//
////    红色：(255,0,0)或0x00FF0000
////
////　　绿色：(0,255,0)或0x0000FF00
////
////　　蓝色：(255,255,255)或0x00FFFFFF
//
//
////function int2ip2($ip)
////{
////    $ip=floatval($ip); // otherwise it is capped at 127.255.255.255
////    $a=($ip>>24)&255;
////    $b=($ip>>16)&255;
////    $c=($ip>>8)&255;
////    $d=$ip&255;
////    return "$a.$b.$c.$d";
////}
////
////echo int2ip2(-2335453533);echo '<br/>';
//
////function ip2int($ip){
////    list($ip1,$ip2,$ip3,$ip4)=explode(".",$ip);
////    //  %u - 不包含正负号的十进制数（大于等于 0）
////    $data=sprintf( '%u',($ip1<<24)|($ip2<<16)|($ip3<<8)|($ip4));
////    return $data;
////}
////
////echo ip2int('139.52.49.93');echo "<br>";
////
////function int2ip($num)
////{
////    $arr = [];
////    $arr[0] = ($num >> 24) & 255;
////    $arr[1] = ($num & 0x00FF0000) >> 16;
////    $arr[2] = ($num & 0x0000FF00) >> 8;
////    $arr[3] = $num & 0x000000FF;
////    return implode('.', $arr);
////}
////
////echo int2ip(2335453533);
//
////
//////$n总人数 $m数的数
////
////function yue($n,$m){
////    //根据范围创造数组
////    $people=range(0,$n-1);
////    $bigit=0;
////    while(count($people)>1){
////        $bigit++;
////        //array_shift 删除数组中的第一个元素，并返回被删除元素的值：
////       $head= array_shift($people);//每一次拿出数组第一个元素
////        if( $bigit%$m !=0){
////            array_push($people,$head);//取余 余数等于0不追加
////        }
////        echo $people[0];
////    }
////}
//// yue(10,5);
////
////////$n 总人数 $m 数到m数字就淘汰 剩下的那个人就是赢家
////// function getnumber($n,$m){
//////
//////     $people=range(0,$n-1);   //根据范围创建数组，包含指定的元素
//////     $bigit=0;
//////     while(count($people)>1){
//////
//////         $bigit++;
//////         $head=array_shift($people);   //每一次拿出数组开头的元素
//////         if($bigit % $m !==0){
//////             array_push($people,$head);   //假如1和3做比较 余数等于3不等于0则追加
//////         }
//////     }
//////     return $people[0];
////// }
////// echo getnumber(10,5);
////    function yeS2($num,$M){ // $num 是总人数 $s 开始的编号 $M 是报数到出队的数字
////    $res=0;
////    for($i=2;$i<=$num;$i++){
////        $res=($res+$M)%$i;
////    }
////        echo $res;
////    }
////yeS2(10,5);
//
//
////
////function add($num1,$num2){
////    //异或i
////   while($num2){
////       $t1=$num1^$num2;
////       $t2=($num1&$num2)<<1;
////       $num1=$t1;
////       $num2=$t2;
////   }
////        return $num1;
////}
////
////echo add(4,5);
//
//
//
////987654321
//
////$i=1;
////$a=$i++;
//////$b=++$i;
////
////echo $a;
////echo $b;
//
////function fan1($n){
////    if($n<=1) return 1;
////
////    return fan1($n-1)*10+$n;
////
//////    return ($n<=1?1:fan($n-1)*10+$n);
////
////}
////
////echo fan1(2);
//
////function fan($arr){
////    if(!$arr ){
////        return;
////    }else{
////        echo  ($arr % 10);
////        fan(floor($arr/10));
////    }
////
////}
////fan(123);
//
//
////  function  foo($sum, $left){
////      $cnt = 0;
////    if($left==1){
////        for($x=0;$x<11;$x++){
////            if($sum + $x ==90)
////                $cnt++;
////        }
////        return $cnt;
////    }
////    for($i=0;$i<11;$i++){
////        $cnt += foo($sum+$i, $left-1);
////    }
////    return $cnt;
////}
////
////Function fan($n,$res=1){
////    If($n==1){
////        Return $res;
////    }
////    $res = $n*$res;
////    Return fan($n-1,$res);
////}
////
////echo fan(6);
//
//
////递归法求1!+2!+3!+4!+5!+6!
////function numFactorial($n){
////    if($n == 1){
////        return 1;
////    }
////    $w = 1;
////    for($i=$n;$i>=1;$i--){
////        $w *=$i;
////
////    }
////    $m = $w;
////    return $m + numFactorial($n-1);
////}
////echo numFactorial(6);
////11
////function num4($n,$m=0){
////    if($n == 0)return $m;
////    // $m +=pow(($n),-1);
////    $m +=pow(-1,$n+1) * (1/$n);
////    return num4($n-1,$m);
////}
////echo num4(3);
////12
////function fan($money,$n=1){
////    if($n >= 5) return $money;
////    $lixi = $money*(4.6/100);
////    echo "第".$n."年"."本金为：".$money."利益为：".$lixi."<br>";
////    return fan($lixi+$money,$n+1);
////}
////fan(50000);
//
////13
////
////function  fan($n,$m=""){
////    $m = $n.",".$m;
////    // echo $m."<br>";
////    if($n == 1){
////        return $m;
////    }
////    return fan($n-1,$m);
////}
////
////echo fan(7);
////
////
////16
////function fan($n,$m=""){
////    if($n == 0)return $m;
////    $l ="";
////    for($i=$n;$i>=1;$i--){
////        $l .=$n;
////    }
////    $m = $l.$m;
////    return fan(($n-1),$m);
////}
////echo fan(8);
//
//
////15
//
////function fan($n)
////{
////    if($n==1){
////        return 1;
////    }else if($n>1){
////        return fan($n-1)+1/$n;
////    }
////}
////
//
////echo fan(3);
//
////14
//
////function fan($n){
////
////    if($n==1){
////        return 1;
////    }else{
////        return fan($n-1)+$n;
////    }
////}
////
////echo fan(3);
////
////function shop($money=100){
////    $gc = 5;
////    $mc = 3;
////    $sc = 1;
////    $gc_max = intval($money/$gc);
////    $mc_max = intval($money/$mc);
////
////    for($i=0;$i<=$gc_max;$i++){
////        for($j=0;$j<=$mc_max;$j++){
////            for($k=0;$k<=$sc_max;$k+=3){
////                if(($i*$gc + $j*$mc + $k/3 == $money)  && ($i+$j+$k == 100)){
////                    echo "公鸡 ",$i," 只，母鸡 ",$j," 只，小鸡 ",$k," 只\n";
////                }
////            }
////        }
////    }
////}
//
////$arr=[1,2,3];
////foreach($arr as &$v){
////    $v = $v*2;
////}
////foreach($arr as $v){
////    echo $v;
////}
//$str= <<<EOD
//    <!doctype html>
//<html lang="en">
//<head>
//    <meta charset="UTF-8">
//    <title>正则测试</title>
//</head>
//<body>
//    <p>weiwruTechdfhjfSales</p>
//</body>
//</html>
//EOD;
//
//$pre='##';
//
//preg_match_all($pre,$str,$arr);
//
//var_dump($arr);
//
//
////class MethodTest
////{
////    public function __call($name, $arguments)
////    {
////        // 注意: $name 的值区分大小写
////        echo "Calling object method '$name' "
////            . implode(', ', $arguments). "\n";
////    }
////
////    /**  PHP 5.3.0之后版本  */
////    public static function __callStatic($name, $arguments)
////    {
////        // 注意: $name 的值区分大小写
////        echo "Calling static method '$name' "
////            . implode(', ', $arguments). "\n";
////    }
////}
////
//////$obj = new MethodTest;
//////$obj->a('in object context');
////
////MethodTest::runTest('in static context');  // PHP 5.3.0之后版本
//
////
////function getExt($url){
////    $arr = parse_url($url);
////    $name = basename($arr['path']);
////    return substr($name,strrpos($name,'.'));
////}
////
////getExt('http://www.sina.com.cn/abc/de/fg.php?id=1');
//
////
////function filter($str){
////    $str = preg_replace_callback("#(草|肉欲|胡景涛)#", function($matches){
////        $str = "";
////        for($i=0,$len=mb_strlen($matches[1]);$i<$len;$i++){
////            $str .= "*";
////        }
////        return $str;
////    }, $str);
////    return $str;
////}
////
////echo filter("我草你妈哈哈背景天胡景涛哪肉涯剪短发欲望");
//
////
////function tran($str){
////    return preg_replace("#(\d)(?=(\d{3})+$)#", "$1,", $str);
//////    return number_format($str);
////}
////echo tran('1234567');
////
////function fan($str){
////                    //#((25[0-5]|2[0-4]\d|[01]?\d\d?)\.){3}(25[0-5]|2[0-4]\d|[01]?\d\d?)#
////     preg_match_all('#((25[0-5]|2[0-4]\d|[01]?\d\d?)\.){3}(25[0-5]|2[0-4]\d|[01]?\d\d?)#',$str,$arr);
////    var_dump($arr);
////}
//
////fan('125.23.45.255');
//
//
////Function fan($url){
////    $arr=Parse_url($url);
////    $filename=basename($arr['path']);
////    $name=substr($filename,strrpos($filename,'.'));
////    echo $name;
////}
////fan('http://www.sina.com.cn/abc/de/fg.php?id=1');
//
//function getRelativePath($a,$b){
//    $path = [];
//    $a = explode('/', $a);
//    $b = explode('/',$b);
//    // 去掉最前面的空
//    if($a[0]=="") array_shift($a);
//    if($b[0]=="") array_shift($b);
//
//    $lena = count($a);
//    $lenb = count($b);
//    $len = ($lena >= $lenb) ? $lenb : $lena;
//    // 找到$a中和$b中相同的部分
//    for($i=0;$i<$len;$i++){
//        if($a[$i] !== $b[$i]) break;
//    }
//    // 将$a中剩余的部分替换成..
//    $k = $i;
//    for(;$i<$lena-1;$i++){
//        array_push($path,'..');
//    }
//    // 将$b中剩余部分接上
//    for(;$k<$lenb;$k++){
//        array_push($path,$b[$k]);
//    }
//    return implode('/', $path);
//}
//
//echo getRelativePath('/a/b/c/d/e.php','/a/b/12/34/c.php');
//$name=$_GET['name'];
//echo $name;

//Function TreeDepth($pRoot){
//    If(!$pRoot){
//        Return 0;
//}
//    $leftTree =TreeDepth($pRoot->left) + 1;
//    $rightTree = TreeDepth($pRoot->right) + 1;
//    Return $leftTree >= $rightTree ? $leftTree : $rightTree;
//}

//function JumpFloor($target) {
//    if ($target <= 0) {
//        return -1;
//    } else if ($target == 1) {
//        return 1;
//    } else if ($target ==2) {
//        return 2;
//    } else {
//        return  JumpFloor($target-1)+JumpFloor($target-2);
//    }
//}
//
//echo JumpFloor(156);

//
//function num($num){
//    $first=1;
//    $secode=2;
//    $total=0;
//
//    for($i=3;$i<=$num;$i++){
//        $total=$first+$secode;
//        $first=$secode;
//        $secode=$total;
//    }
//    echo $total;
//}
//num(50);



//echo date("D M d Y"). ', sunrise time : ' .date_sunset(time(), SUNFUNCS_RET_STRING, 38.4, -9, 90, 1);

//$file='data/url/a.php';
//$a=substr(strrchr($file, '.'),1);
//echo $a;
//echo substr($file, strrpos($file, '.')+1);


//$str='abcdefgkbcdefabbcde';
//
//$a='bcde';
//
//$num=substr_count($str,$a);
//
//var_dump($num) ;

//function IsPopOrder($pushV, $popV)
//{
//    $len1 = count($pushV);
//    $len2 = count($popV);
//    if($len1!=$len2 || !$len1 || !$len2) return false;
//    $stack = new SplStack();
//    $j=$i=0;
//    while($i<$len1 && $j<$len2){
//        $stack->push($pushV[$i]);
//        while(!$stack->isEmpty() && $stack->top() == $popV[$j]){
//                    $stack->pop();
//                        $j++;
//                        }
//                        $i++;
//                        }
//            return $stack->isEmpty();
//}
//$pushV=[1,2,3,4,5,6];
//$popV=[6,5,4,3,2,1];
//
//$str=IsPopOrder($pushV,$popV);
//var_dump($str);

function fileIterator($dir){
    $fileArr=[];
    //判断是不是文件夹是的话返回true 不是返回false
    if(!is_dir($dir)){
        return false;
    }
    if(false === ($dh =opendir($dir))){
        return false;
    }
    while(($file =readdir($dh))!=false){
        if($file=='.' ||$file=='..') continue;
        $filename=$dir . DIRECTORY_SEPARATOR .$file;
        if(is_dir($filename)){
            $files=fileIterator($filename);
            $fileArr[$file]=$files;
        }else{
            $fileArr[$file]=$filename;
        }
    }
    return $fileArr;
}

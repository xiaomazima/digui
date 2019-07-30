<?php

//$basedir = dirname(__FILE__);
//echo $basedir;

//echo "昨天:".date("Y-m-d H:i:s",strtotime("-1 day")), "<br>";
//echo strtotime(now);

//$now=time();
//$y=$now-60*60*24;
//echo $y;

//function study(int $get){
//    return $get;
//}
//
//var_dump(study(123));
//$str = "1,3,5,7,9,10,20";
//$arr = explode(",",$str);
//print_r($arr);

//序列化 反序列化
//$arr=array("table" => 'memberc', "field" => 1,"rule" => -0 ,"cycle" => 24 ,"max" => 1 );
//$str=serialize($arr); //a:5:{s:5:"table";s:7:"memberc";s:5:"field";i:1;s:4:"rule";i:0;s:5:"cycle";i:24;s:3:"max";i:1;}
//
//$arr2=unserialize($str);
//
//var_dump($arr2);
//echo $str;

//class P{
//    public static function show(){
//        echo __CLASS__;
//    }
//    public static function test(){
//        self::show();
//    }
//}
//class T extends P{
//    public static function show() {
//        echo __CLASS__;
//    }
//}
//
//T::test();

//验证是否为反转字符串 是返回true 不是返回false
//abcdedcba
//function fan($str){
//    $res=true;
//    $len=strlen($str);
//    $l=floor($len/2);
//
//    for($i=0;$i<$l;$i++){
//         if($str[$i] !=$str[$len-$i-1]){
//            $res=false;
//             Break;
//         }
//    }
//    return $res;
//}
//
//var_dump(fan('abcdedrba'));

//第二种
//function fan($str,$start,$end){
//    if($start>=$end) return true;
//    if($str[$start]==$str[$end]){
//        return fan($str,$start+1,$end-1);
//
//    }
//    return false;
//}
//
//var_dump(fan('abcdcba',0,6));

// 1-2+3-4+5-6+7
//Function cal($n){
//    return $n&1==1 ? -1*($n-1)/2 + $n : -1*($n/2);
//}
//
// echo cal(7);

//PATHINFO_FILENAME 只返回文件名
//PATHINFO_EXTENSION扩展名
//PATHINFO_DIRNAME 只返回路径不带文件
//PATHINFO_BASENAME 文件名和扩展名
//$path='/wwwroot/include/page.class.html';
//$ext =pathinfo($path, PATHINFO_BASENAME);//pathinfo  返回文件路径的信息pathinfo_extension PATHINFO_DIRNAME PATHINFO_BASENAME
////$ext = substr($path,strrpos($path, '.')+1);
//var_dump($ext);

$str= <<<EOD
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>正则测试</title>
</head>
<body>
   <img id="a"; src="http://www.api.com/1.jpg"
   />
   <img id="a"; src="http://www.api.com/2.jpg"
   title="这是2.jpg"
   />

   <IMG id="a"; src="http://www.api.com/3.jpg"/>

<script type="text/javascript">
    alert("xixixixi");
</script>
<script  src="http://www.api.com/a.js"></script>
</body>
</html>
EOD;
$re='#<script[^>]*>.*></script>#siU';
$str1=preg_replace([$re],"",$str);
//$re='#<img.*src="(.*)".*/>#siU';
var_dump($str1);
//preg_match_all($re,$str,$matches);

//var_dump($matches);


$arr=[1,2,3,4];
//$str11=print_r($arr,true);
$config=include_once'config.php';
$config['author']="小马";
$str11=var_export($config,true);
file_put_contents('./config.php',"<?php\n\r return ".$str11.';');




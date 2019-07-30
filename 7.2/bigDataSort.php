<?php
/* 大文件处理
* 第一步：预处理，得到文件的总大小(总行数),测试内存多少行能够存在,得到每个文件允许的最大大小
* 第二步：分解大文件成若干个小文件
* 第三步: 对每个小文件进行排序,内容较多的可以使用bitmap排序，拍完序后写回文件
* 第四步: 两两进行合并,得到最后一个合并的文件
*/

/*
* 统计文件的行数
* @param string $path
* @return integer  
*/
function  countLines($path){
	// 打开文件
	$fp = fopen($path,"r");//只读方式打开
	// 得到行数
	$total = 0;
	while(!feof($fp)){ //检测文件指针是否到了文件结束位置
		$total++;
		fgets($fp);//从文件指针中读取一行
	}
	return $total;
}


/*
* 将大文件分成若干个小文件
* @param string $path
* @param integer $rows
* @return array 
*/
function generateToChunks($path,$rows=5){
	// 得到总行数
	$total = countLines($path);
	// 得到需要分成的小文件数量
	$fileLength = ceil($total/$rows);
	// 用于保存生成的文件对应的文件路径
	$files = [];
	// 打开原始文件
	$sp = fopen($path,"r");
	// 循环生成$fileLength个小文件
	for($i=1;$i<=$fileLength;$i++){
		// 文件名称
		$filename = $i.".dat";
		$files[] = $filename;
		// 新建文件
		$fp = fopen($filename,"w+");
		$j = 0;
		// 循环写入
		while(!feof($sp) && $j< $rows){
			fputs($fp,fgets($sp));
			$j++;
		}
		// 关闭文件
		fclose($fp);
	}
	fclose($sp);
	// 返回生成的小文件路径
	return $files;
}

/*
* 一个文件内容排序，内容很多时使用bitmap排序
* @param string $file
* @return 
*/
function cSort($file){

	// 把文件内容读入数组
	$arr = file($file);
	// 过滤掉
	$arr = array_map(function($v){
		return trim($v);
	},$arr);
	// 排序
	sort($arr);
	// 写回文件
	$fp = fopen($file,"w");
	foreach($arr as $v){
		fputs($fp, $v.PHP_EOL);
	}
	fclose($fp);
}

/*
* 文件合并排序
* @param array $files
* @return 
*/
function mergeAllData($files){
	
	while(count($files) > 1){

		$fname1 = array_shift($files);
		$fname2 = array_shift($files);

		$filename = str_replace('.dat', "", $fname1).'-'.str_replace('.dat', "", $fname2).".dat";

		$f1 = fopen($fname1,'r');
		$f2 = fopen($fname2,'r');
		$fn = fopen($filename,'w+');

		$line1 = fgets($f1);
		$line2 = fgets($f2);

		while(true){

			$line1 = intval($line1);
			$line2 = intval($line2);
			if($line1 <= $line2){
				
				fputs($fn,$line1."\n");
				$line1 = fgets($f1);
				if(feof($f1)==true || $line1===""){
					fputs($fn,$line2."\n");
					break;
				} 
			}else{
				
				fputs($fn,$line2."\n");
				$line2 = fgets($f2);
				if(feof($f2) == true || "" === $line2 ){
					fputs($fn,$line1."\n");
					break;
				}
			}
		}
		
		while(!feof($f1) ){
			$str = fgets($f1);
			if($str!=="") fputs($fn,$str);
		}
		while(!feof($f2)){
			$str = fgets($f2);
			if($str!=="") fputs($fn,$str);
		}

		fclose($f1);
		fclose($f2);
		fclose($fn);
		array_unshift($files,$filename);
	}
}

/*
* 大文件排序总执行函数
* @param string $path
* @return 
*/
function bigDataSort($path){
	// 得到小文件
	$files = generateToChunks($path);

//	var_dump($files);
	// 每个小文件排序
	for($i=0,$len=count($files);$i<$len;$i++){
		cSort($files[$i]);
	}
	// 文件合并排序
	mergeAllData($files);
}


bigDataSort('./data.dat');
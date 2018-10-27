<?php
/*
base64图片处理
 */
function uploadImgBase($img)
{
	$imgdata=$img;
	$path="./static/video/img/";
 	//转换文件路径编码
   if(!file_exists($path)){  
    mkdir(iconv('utf-8', 'gbk', "$path"),0777,true);  
	}
 	$imgDir =$path;
    $img = str_replace('data:image/jpeg;base64,', '', $imgdata);
    $img = str_replace('data:image/png;base64,', '', $img);
    $img = str_replace(' ', '+', $img);
    $img = base64_decode($img);
    $filename = md5(time().mt_rand(10, 99)).".jpg"; //新图片名称
    $newFilePath =$imgDir.$filename;
    $data['img']=$img;
    $data['path']=$newFilePath;
    return $data;
	
}
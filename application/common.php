<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
function seoData($type)
{
	switch ($type) {
		case 'index':
			
			break;
		case 'ufc':
			
			break;
		case '':
		
		break;
	}
}
function gettoutiao($url)
{
	$arr=file_get_contents($url);
	return json_decode($arr,true);
}
<?php
header("Content-type:text/html;charset=utf-8");
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// [ 应用入口文件 ]
//   $connnect = new \MongoClient(); // 连接
// $db = $connnect->tests->col;
// $array=array('title'=>'99999999999','description'=>'8888888888');
// $db->insert($array);
      
//         $cursor = $db->find();
//          $array = array();
//     while($cursor->hasNext()) {
//         $array[] = $cursor->getNext();
//     }
//     echo "<pre>";
//     print_r($array);
//     die;
// 定义应用目录

define('APP_PATH', __DIR__ . '/../application/');
// 加载框架引导文件
require __DIR__ . '/../thinkphp/start.php';

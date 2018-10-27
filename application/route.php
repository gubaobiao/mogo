<?php
use think\Route;
 Route::get('video/:id','Index/Index/videoDetail');
 Route::get('ufc','Index/Index/cate?c=1');
 Route::get('klj','Index/Index/cate?c=3');
 Route::get('ko','Index/Index/cate?c=2');
 Route::get('search','Index/Index/search');
 Route::get('ufcnews','Index/Index/newlist?c=4');
 Route::get('click','Index/Index/videoClick');//new
 Route::get('gwss','Index/Index/cate?c=5');
 Route::get('news/:id','Index/Index/news');
 Route::get('jhzx','Index/Index/newlist?c=6');
 Route::get('mma','Index/Index/newlist?c=7');
 Route::get('wwe','Index/Index/cate?c=8');
 Route::get('ysry','Index/Index/cate?c=9');
 Route::get('qxsd','Index/Index/cate?c=10');
 Route::get('person/:id','Index/Index/person');


<?php
/**
 * Created by PhpStorm.
 * User: ThinkPad
 * Date: 2018/5/31
 * Time: 9:11
 */

namespace app\Back\controller;


use think\Controller;
use think\Db;
use think\Request;
class Video extends Controller
{
    /*
     * 视频上传
     */
    public  function  uploadVideo()
    {

        $data=Db::table('videocate')->where('is_delete',1)->select();
        $this->assign('videocate',$data);
        return view('uploadLink');
    }
    /*
    	视频提交
     */
    public function addVideo(Request $request)
    {
    	if ($request->isPost()) {
    		$re=$request->only(['upload_img','video_link','type','video_title','video_label','video_brief','content']);
    		$dataimg=uploadImgBase($re['upload_img']);
    		$re['imgpath']= substr($dataimg['path'],1) ;
    		unset($re['upload_img']);
    		$re['addtime']=time();
    		$result=Db::table('video')->insert($re);

    		if ($result) {
    			$newFile = fopen(iconv("UTF-8","gbk",$dataimg['path']),"a+");
				fwrite($newFile,$dataimg['img']);
				
    		}
    	}
    }
}
<?php
namespace app\index\controller;
use think\Db;
class Share{
	/*
		视频 文章详情 分享
	 */
	public function getShar($str)
	{
		switch ($str) {
			case 'index':
					$data['title']="中国综合搏击资讯网";
				break;
			case 'ufc':
					$data['title']="UFC无限制格斗_MMA综合格斗_中国搏击散打";
				break;
			case 'klj':
					$data['title']="昆仑决世界搏击赛事_中国自由搏击散打拳击视频";
				break;
			case 'ufcnews':
					$data['title']="UFC新闻资讯_中国自由搏击散打拳击视频";
				break;
			case 'gwss':
					$data['title']="国外UFC散打搏击视频_中国自由搏击散打拳击视频";
				break;
			case 'jhzx':
					$data['title']="散打搏击资讯_中国自由搏击散打拳击视频";
				break;
			case 'mma':
					$data['title']="mma综合格斗新闻资讯_中国自由搏击散打拳击视频";
				break;
			case 'ysry':
					$data['title']="勇士的荣耀赛事视频_中国自由搏击散打拳击视频";
				break;
			case 'qxsd':
					$data['title']="勇士的荣耀赛事视频_中国自由搏击散打拳击视频";
				break;
			default:
				    $data['title']="UFC无限制格斗_MMA综合格斗_中国搏击散打";
				break;
		}
		$data['img']='http://'.$_SERVER['HTTP_HOST'].'/img.png';
		return $data;
	}
}
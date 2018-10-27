<?php
namespace app\index\controller;
use think\Db;
use think\Controller;
use think\Request;
use Sunra\PhpSimple\HtmlDomParser;
class Sphider extends Controller
{
	protected $time;
	public function _initialize()
	{
		$this->time=strtotime(date('Y-m-d'));
	}
	public function getData()
	{
		set_time_limit(500);
		$url='https://www.toutiao.com/c/user/article/?page_type=1&user_id=6030667952&max_behot_time=0&count=20&as=A1E57BF2F489F69&cp=5B24A9FFE639CE1&_signature=dzr1dxAeLCHdFbX3WUcNAHc69W';
		$data=gettoutiao($url);
		$arr=$data['data'];
		foreach ($arr as $k => $v) {
			//&& $this->time<$v['behot_time']
			if ($v['article_genre']=='article') {
				$url='http://toutiao.com/group/'.$v['group_id'];
				$dom = HtmlDomParser::file_get_html( $url );
				$div=$dom->find('.article-content',0);
				$newarr['content']=$div->innertext();
				$newarr['title']=$v['title'];
				$newarr['addtime']=$v['behot_time'];
				$newarr['imgpath']=$v['image_url'];
				$newarr['author']=$v['source'].'头条号';
				$newarr['clilcks']=$v['go_detail_count'];
				$newarr['sourcetype']=1;
				$newarr['clilck']=rand(300,2000);
				$newarr['type']=6;
				Db::table('article')->insert($newarr);
				unset($newarr);
			}

		}
		
	}
	/*
		MMA头条
		https://www.toutiao.com/c/user/article/?page_type=1&user_id=6100452707&max_behot_time=0&count=20&as=A1D54B32A3C47FA&cp=5B239447BF7A0E1&_signature=YPQ50xAdO9uTuWSe14ENI2D0Oc
	 */
	public function mmanew()
	{
		set_time_limit(500);
		// dump(file_get_contents('http://toutiao.com/group/6515849148636332557/'));
		// die;
		$url='https://www.toutiao.com/c/user/article/?page_type=1&user_id=6100452707&max_behot_time=0&count=20&as=A1C54B8DA13D1F6&cp=5BD1ED613F769E1&_signature=IB9vLBAbe9bcZoVQpg1scSAfbz';
		$data=gettoutiao($url);
		$arr=$data['data'];
     // dump($arr);die;
		foreach ($arr as $k => $v) {
			if ($v['article_genre']=='article') {
				$url='http://toutiao.com/group/'.$v['group_id'];
            //  dump(file_get_contents($url));
				$dom = HtmlDomParser::file_get_html( $url );
				$div=$dom->find('.article-content',0);
            
             
				$newarr['content']=$div->innertext();
				$newarr['title']=$v['title'];
				$newarr['addtime']=$v['behot_time'];
				$newarr['imgpath']=$v['image_url'];
				$newarr['author']=$v['source'].'头条号';
				$newarr['clilcks']=$v['go_detail_count'];
				$newarr['sourcetype']=1;
				$newarr['clilck']=rand(300,2000);
				$newarr['type']=7;
				Db::table('article')->insert($newarr);
				unset($newarr);
               
			}

		}
	}
	/*
		搏击教授头条文章
	 */
	public function bjjsnew()
	{
     //echo 12;die;
		set_time_limit(500);
		// dump(file_get_contents('http://toutiao.com/group/6515849148636332557/'));
		// die;
		$url='https://www.toutiao.com/c/user/article/?page_type=1&user_id=104758998893&max_behot_time=1540374602&count=20&as=A145CBFD22F4826&cp=5BD2F488D2C6FE1&_signature=6Fg9xxAYs5VCd31Ht-do3OhYPd';
		$data=gettoutiao($url);
		$arr=$data['data'];
    
		foreach ($arr as $k => $v) {
			if ($v['article_genre']=='article') {
				$url='http://toutiao.com/group/'.$v['group_id'];
              dump(file_get_contents($url));
				$dom = HtmlDomParser::file_get_html( $url );
				$div=$dom->find('.article-content',0);
              dump($div);die;
              if (is_object($div)){
				$newarr['content']=$div->innertext();
				$newarr['title']=$v['title'];
				$newarr['addtime']=$v['behot_time'];
				$newarr['imgpath']=$v['image_url'];
				$newarr['author']=$v['source'].'头条号';
				$newarr['clilcks']=$v['go_detail_count'];
				$newarr['sourcetype']=1;
				$newarr['clilck']=rand(300,200000);
				$newarr['type']=4;
				Db::table('article')->insert($newarr);
                dump($newarr);
				unset($newarr);
              }
			}

		}
	}
	/*
	UFC
	 */
	public function ufcnew()
	{
		//https://www.toutiao.com/c/user/article/?page_type=1&user_id=6919434396&max_behot_time=0&count=20&as=A1951BA2058D140&cp=5B256D3154405E1&_signature=hP8wVxAV3-gu0HDXVBo-HIT.ME
		set_time_limit(500);
		// dump(file_get_contents('http://toutiao.com/group/6515849148636332557/'));
		// die;
		$url='https://www.toutiao.com/c/user/article/?page_type=1&user_id=104758998893&max_behot_time=0&count=20&as=A1E50B9D4204784&cp=5BD2F44758840E1&_signature=6Fg9xxAYs5VCd31Ht-cju-hYPd';
		$data=gettoutiao($url);
		$arr=$data['data'];
		foreach ($arr as $k => $v) {
			if ($v['article_genre']=='article') {
				$url='http://toutiao.com/group/'.$v['group_id'];
				$dom = HtmlDomParser::file_get_html( $url );
				$div=$dom->find('.article-content',0);
				$newarr['content']=$div->innertext();
				$newarr['title']=$v['title'];
				$newarr['addtime']=$v['behot_time'];
				$newarr['imgpath']=$v['image_url'];
				$newarr['author']=$v['source'].'头条号';
				$newarr['clilcks']=$v['go_detail_count'];
				$newarr['sourcetype']=1;
				$newarr['clilck']=rand(300,200000);
				$newarr['type']=4;
				Db::table('article')->insert($newarr);
				unset($newarr);
			}

		}
	}
	/* ufc视频 刷角网
		pptv http://www.shuaijiao.com/video/ufc/
	 */
	public function sjwufcvideo()
	{
      
		set_time_limit(500);
		$url='http://www.shuaijiao.com/video/ufc/1.html';
		$dom = HtmlDomParser::file_get_html( $url );
		$arr=$dom->find('.lists13',0);
		$img=$arr->find('dd a img');
		$href=$arr->find('dd a');
		$title=$arr->find('dt a');
      
     
		foreach ($img as $k => $v) {
       // if($k<=9){
			$newarr['imgpath']=$img[$k]->src;
       
			$newarr['video_title']=$title[$k]->innertext;
			$url=$href[$k]->href;
			$dom = HtmlDomParser::file_get_html( $url );
			//截取时间
			$time=$dom->find('.time',0);
			$tim=$time->innertext;
			$tim=str_replace("&nbsp;","",$tim);
			$ti=mb_substr($tim,3,mb_strlen($tim)-1,'utf-8');
			$newarr['addtime']=strtotime($ti)+rand(100,200);
			$newarr['click']=rand(500,4000);
			$newarr['content']=$title[$k]->innertext;
			$newarr['is_delete']=1;
			$newarr['type']=1;
			$newarr['video_label']='UFC,UFC视频';
			$newarr['video_brief']=$title[$k]->innertext.',UFC视频';
			//截取视频播放链接
			$a=$dom->find('.open-box',0);
			
			if ($a) {
				$url=$a->onclick;
				$start=strrpos($url,'(');
				$end  =strrpos($url,')');
				$newarr['video_link']=substr($url,$start+2,$end-$start-3);
			}else{
				$a=$dom->find('.left script',0);
				$url=$a->innertext;
				$start=strpos($url,'"');
				$end  =strrpos($url,'"');
				$newarr['video_link']=substr($url,$start+1,$end-$start-1);
				// echo $url;
				// echo $newarr['video_link'];
				// die;
			}
			//echo substr($newarr['video_link'],0,4);die;
			// echo $url; 防止为空或者其他的链接方式
			if (substr($newarr['video_link'],0,4)=='http') {
		//    Db::table('video')->insert($newarr);
			}
			unset($newarr);
        //}
		}
	}
	/* wwe视频 刷角网
		pptv http://www.shuaijiao.com/video/ufc/
	 */
	public function sjwwwevideo()
	{
    
		set_time_limit(500);
		$url='http://www.shuaijiao.com/video/wwe/1.html';
		$dom = HtmlDomParser::file_get_html( $url );
		$arr=$dom->find('.lists13',0);
		$img=$arr->find('dd a img');
		$href=$arr->find('dd a');
		$title=$arr->find('dt a');
		foreach ($img as $k => $v) {
			$newarr['imgpath']=$img[$k]->src;
			$newarr['video_title']=$title[$k]->innertext;
         	 $where['video_title']=$title[$k]->innertext;
          	$result=Db::table('video')->where($where)->find();
         if(!$result['video_title']){
			$url=$href[$k]->href;
			$dom = HtmlDomParser::file_get_html( $url );
			//截取时间
			$time=$dom->find('.time',0);
			$tim=$time->innertext;
			$tim=str_replace("&nbsp;","",$tim);
			$ti=mb_substr($tim,3,mb_strlen($tim)-1,'utf-8');
			$newarr['addtime']=strtotime($ti)+rand(100,200);
			$newarr['click']=rand(500,4000);
			$newarr['content']=$title[$k]->innertext;
			$newarr['is_delete']=1;
			$newarr['type']=8;
			$newarr['video_label']='WWe,WWf视频';
			$newarr['video_brief']=$title[$k]->innertext.',WWe视频';
			//截取视频播放链接
			$a=$dom->find('.shareVideoBox script',0);
			
			if ($a) {
				//document.write('<a href="javascript:viod(0)" onclick="videoPlay(\'https://v.youku.com/v_show/id_XMzY2OTkyODM4MA==.html\')" rel="nofollow"><i></i><span>WWE NXT 接管大赛：芝加哥2比赛视频[英文]</span><span class="type">来源：v.youku.com</span></a>');
				$url=$a->innertext;
				$start=strpos($url,'\\');
				$end  =strrpos($url,'rel');
				$newarr['video_link']=substr($url,$start+2,$end-$start-7);	
			}else{
				//PPTV .SWF
				$a=$dom->find('.video-play script',0);
				$url=$a->innertext;
				$start=strpos($url,'"');
				$end  =strrpos($url,'"');
				$newarr['video_link']=substr($url,$start+1,$end-$start-1);
			}
			if (substr($newarr['video_link'],0,4)=='http') {
				Db::table('video')->insert($newarr);
			}
			unset($newarr);	
         	}
		}
       echo  date('Y-m-d H:i:s');
      
	}
	/* wwe视频 视频集锦
		http://www.shuaijiao.com/video/all/9.html
	 */
	public function sjwgwvideo()
	{
		set_time_limit(500);
		$url='http://www.shuaijiao.com/video/all/1.html';
		$dom = HtmlDomParser::file_get_html( $url );
		$arr=$dom->find('.lists13',0);
		$img=$arr->find('dd a img');
		$href=$arr->find('dd a');
		$title=$arr->find('dt a');
		foreach ($img as $k => $v) {
			$newarr['imgpath']=$img[$k]->src;
			$newarr['video_title']=$title[$k]->innertext;
			$url=$href[$k]->href;
			$dom = HtmlDomParser::file_get_html( $url );
			//截取时间
			$time=$dom->find('.time',0);
			$tim=$time->innertext;
			$tim=str_replace("&nbsp;","",$tim);
			$ti=mb_substr($tim,3,mb_strlen($tim)-1,'utf-8');
			$newarr['addtime']=strtotime($ti)+rand(100,200);
			$newarr['click']=rand(500,4000);
			$newarr['content']=$title[$k]->innertext;
			$newarr['is_delete']=1;
			$newarr['type']=5;
			$newarr['video_label']='UFC,自由搏击视频,拳击';
			$newarr['video_brief']=$title[$k]->innertext.',UFC,自由搏击视频,拳击,泰拳';
			//截取视频播放链接
			$a=$dom->find('.shareVideoBox script',0);
			
			if ($a) {
				//document.write('<a href="javascript:viod(0)" onclick="videoPlay(\'https://v.youku.com/v_show/id_XMzY2OTkyODM4MA==.html\')" rel="nofollow"><i></i><span>WWE NXT 接管大赛：芝加哥2比赛视频[英文]</span><span class="type">来源：v.youku.com</span></a>');
				$url=$a->innertext;
				$start=strpos($url,'\\');
				$end  =strrpos($url,'rel');
				$newarr['video_link']=substr($url,$start+2,$end-$start-7);	
			}else{
				//PPTV .SWF
				$a=$dom->find('.video-play script',0);
				$url=$a->innertext;
				$start=strpos($url,'"');
				$end  =strrpos($url,'"');
				$newarr['video_link']=substr($url,$start+1,$end-$start-1);
			}
			if (substr($newarr['video_link'],0,4)=='http') {
				Db::table('video')->insert($newarr);
			}
			unset($newarr);	
		}
	}
	/*
		爱奇艺昆仑决视频提取
		http://www.iqiyi.com/lib/m_207599414.html?src=search&hoverYear=2018&site=iqiyi
	 */
	public function kljvideo()
	{
		set_time_limit(500);
		$url='http://www.iqiyi.com/lib/m_207599414.html';
		$dom = HtmlDomParser::file_get_html( $url );
		$str=file_get_contents($url);
		$e=strpos($str,'<div data-datarender-elem="load" style="display: none;">');
		$str=substr($str,$e+1);
		$s=strpos($str,'<ul class="piclist-horizontal-16090 clearfix" id="albumpic-showall-wrap" data-datarender-elem="cont"');
		$e=strpos($str,'<div data-datarender-elem="load" style="display: none;">');
		$html=substr($str,$s,$e-$s);
		// dump($html);die;
		$dom = HtmlDomParser::str_get_html($html);
		$arr=$dom->find('.piclist-horizontal-16090',0);
		$img=$arr->find('img');
		$href=$arr->find('.site-piclist_pic_link');
		$time=$arr->find('.mod-listTitle_right');
		foreach ($img as $k => $v) {
			$tim=$time[$k]->innertext;
			$newarr['addtime']=strtotime(str_replace('期','',$tim))+24*3600+rand(12*3600,24*3600);
			$newarr['video_link']=$href[$k]->href;
			$newarr['imgpath']=$v->src;
			$newarr['video_title']=$v->title;
			$newarr['click']=rand(500,4000);
			$newarr['content']=$v->title;
			$newarr['is_delete']=1;
			$newarr['type']=3;
			$newarr['video_label']='昆仑决视频';
			$newarr['video_brief']=$v->title.',散打视频,昆仑决搏击视频';
			if (substr($newarr['video_link'],0,4)=='http') {
				Db::table('video')->insert($newarr);
			}
			unset($newarr);	
		}
	}
	/*
		通过百度视频获取昆仑决
		http://v.baidu.com/show_intro/?callback=jQuery111106254031474879445_1529451499813&frp=&e=1&service=json&dtype=tvshowPlayUrl&id=9285&ip=&_=1529451499821
	 */
	public function getkljvideo()
	{
		
		// $s='http://v.baidu.com/link?url=dm_20Jg0HnMUvGItah1n_HsgNSTNbM6Couw9kM3mo0YfEX70LzLOLf7j030cOeupcplNOKYGvr1aIvaSFY9vDiatstPsqcLmNh24Fr08pEgKBBG2M5PncBXXkwGN8iBBkgPmo3_WqJn-s7W2IFlr_wuU9KZTMpg1-xz3yVPChNWrU';
		// $dom = HtmlDomParser::file_get_html($s);
		// $arr=$dom->find('#link',0);
		// echo $arr->href;die;
		set_time_limit(500);
		// $url='http://v.baidu.com/show_intro/?callback=jQuery111104862168386467567_1529469698116&site=iqiyi.com&year=2017&frp=&e=1&service=json&dtype=tvshowPlayUrl&id=9285&ip=&_=1529469698126';
		$url="http://v.baidu.com/show_intro/?callback=jQuery111104987630338964626_1540511303981&frp=&e=1&service=json&dtype=tvshowPlayUrl&id=9285&ip=&_=1540511303986";
		$data=file_get_contents($url);
     // dump($data);
		$data=str_replace('/**/jQuery111104987630338964626_1540511303981','',$data);
     // echo $data;
		$s=strpos($data,'{');
		$e=strrpos($data,'}');
		$str=substr($data,$s,$e-$s+1);
      $str='{"episodes":[{"single_title":"\u6606\u4ed1\u51b3\u4ff1\u4e50\u90e8\u804c\u4e1a\u8054\u8d5b1025\u5f55\u64ad","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2U3h4qyxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GPgpUu58mSypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20181025","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t1.baidu.com\/it\/u=467802521,1694752876&fm=20","thumbnail_16_9":"http:\/\/t2.baidu.com\/it\/u=1409870202,2197897507&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u65b9\u98de\u8fbe\u52a0\u65f6\u4e00\u51fb\u81f4\u547d \u795d\u5b9d\u901a\u91cd\u819d\u51fb\u6e83\u5bf9\u624b","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2U3h5qyxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GPgo82ucaKypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20181021","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t1.baidu.com\/it\/u=4154227815,905313621&fm=20","thumbnail_16_9":"http:\/\/t1.baidu.com\/it\/u=1170399997,1871754545&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u4ff1\u4e50\u90e8\u804c\u4e1a\u8054\u8d5b13 \u5f55\u64ad","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2U3i4KyxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GPgsgytIGOypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20181017","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t1.baidu.com\/it\/u=41010371,1006999690&fm=20","thumbnail_16_9":"http:\/\/t1.baidu.com\/it\/u=1001734497,1774103688&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u4ff1\u4e50\u90e8\u804c\u4e1a\u8054\u8d5b11 \u5f55\u64ad","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2U3i4qyxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GPgY4uv4GOypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20181015","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t3.baidu.com\/it\/u=3441864163,3998943172&fm=20","thumbnail_16_9":"http:\/\/t2.baidu.com\/it\/u=258977730,4229880337&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u8bf8\u795e\u4e4b\u6218\u56db\u5f3a\u4e89\u593a\u6218 \u5947\u5229\u4e9aTKO\u8bfa\u4e01\u672c","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2U3i46yxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GPgYE96J6aypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20181014","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t1.baidu.com\/it\/u=839446863,2155395798&fm=20","thumbnail_16_9":"http:\/\/t2.baidu.com\/it\/u=1602732931,2590454526&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u57ce\u5e02\u82f1\u96c4200\u6e44\u6f6d\u7ad9 \u5f55\u64ad","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2U3i5KyxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GPgsEo6ZzJypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20181013","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t1.baidu.com\/it\/u=66947011,1100779118&fm=20","thumbnail_16_9":"http:\/\/t1.baidu.com\/it\/u=892665472,1620356660&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u4e16\u754c\u51a0\u519b\u8d5b:\u8bfa\u4e01\u672c\u91cd\u70ae\u8f70\u9000\u8c22\u5c14\u57fa","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2U3j4KyxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GPgZE36JKaypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20181007","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t3.baidu.com\/it\/u=4173840421,305782372&fm=20","thumbnail_16_9":"http:\/\/t1.baidu.com\/it\/u=910847771,1243103050&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u6768\u96e8\u91cd\u62f3\u51fa\u51fb\u8f7b\u677e\u53d6\u80dc \u82cf\u6ce2\u90a6\u8fdb\u519b\u8bf8\u795e\u516b\u5f3a","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2ETg56yxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GPgZNp6JrNypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180930","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t2.baidu.com\/it\/u=4050697054,77380452&fm=20","thumbnail_16_9":"http:\/\/t1.baidu.com\/it\/u=810163137,947437353&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u738b\u806a\u51fb\u8d25\u7f8e\u56fd\u65b0\u661f \"\u6563\u6253\u4e00\u59d0\"\u518d\u593a\u91d1\u8170\u5e26","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2ETh5KyxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GPgI0w-oWKypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180923","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t2.baidu.com\/it\/u=325509284,326185022&fm=20","thumbnail_16_9":"http:\/\/t2.baidu.com\/it\/u=1044479551,1659762240&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u738b\u806a\u51fa\u5f81\u6728\u5170\u4f20\u5947\u9996\u6218\u83b7\u80dc \u5b89\u59ae\u838e\u8f7b\u53d6\u4e2d\u56fd\u5c0f\u5c06","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2ETi4ayxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GMzoBv64iOypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180916","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t2.baidu.com\/it\/u=561905540,1139577164&fm=20","thumbnail_16_9":"http:\/\/t3.baidu.com\/it\/u=1687327618,1989401374&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u8d85\u7ea7\u6218 \"\u5f5d\u65cf\u96c4\u9e70\"\u53cd\u8d25\u4e3a\u80dc","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2ETj7qyxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GPhMAi5pmWypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180909","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t3.baidu.com\/it\/u=3378648222,3146259215&fm=20","thumbnail_16_9":"http:\/\/t1.baidu.com\/it\/u=24878859,3990261975&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u8d85\u7ea7\u6218 \u4e2d\u56fd\"\u94c1\u91d1\u521a\"\u78be\u538b\u6218\u6597\u6c11\u65cf","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2ETj5ayxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GMzs5o5Z_BypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180902","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t1.baidu.com\/it\/u=429533673,997664625&fm=20","thumbnail_16_9":"http:\/\/t1.baidu.com\/it\/u=1054632303,1421271300&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u57ce\u5e02\u82f1\u96c4196\u6b66\u6c49\u7ad9 \u5f55\u64ad","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2ETj5qyxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GMzs9svZbNypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180901","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t2.baidu.com\/it\/u=2495438124,2983498258&fm=20","thumbnail_16_9":"http:\/\/t2.baidu.com\/it\/u=3395727319,3329620056&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u57ce\u5e02\u82f1\u96c4194\u90fd\u5b89\u7ad94 \u5f55\u64ad","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2EXh4ayxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GMzpA_tJ3JypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180826","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t1.baidu.com\/it\/u=3965553535,3616842776&fm=20","thumbnail_16_9":"http:\/\/t1.baidu.com\/it\/u=679937849,104686732&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u4e09\u4e9a\u7ad9\u8d85\u7ea7\u6218 \u4e2d\u56fd\u65b0\u661f\u795d\u5b9d\u901a\u867d\u8d25\u72b9\u8363","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2EXh4ayxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GMzpA6u5PJypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180826","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t2.baidu.com\/it\/u=195405732,630332908&fm=20","thumbnail_16_9":"http:\/\/t3.baidu.com\/it\/u=3609757205,3474092049&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u57ce\u5e02\u82f1\u96c4194\u90fd\u5b89\u7ad93 \u5f55\u64ad","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2EXh4ayxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GMzpFu6oWeypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180826","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t1.baidu.com\/it\/u=2248533584,2892897775&fm=20","thumbnail_16_9":"http:\/\/t1.baidu.com\/it\/u=776134562,1128350290&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u57ce\u5e02\u82f1\u96c4194\u90fd\u5b89\u7ad92 \u5f55\u64ad","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2EXh4qyxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GMzpEru5uSypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180825","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t3.baidu.com\/it\/u=2301781150,2626952425&fm=20","thumbnail_16_9":"http:\/\/t1.baidu.com\/it\/u=3414640790,3344304838&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u57ce\u5e02\u82f1\u96c4194\u90fd\u5b89\u7ad91 \u5f55\u64ad","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2EXh4qyxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GMzpJh-YWWypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180825","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t2.baidu.com\/it\/u=3946772432,25449428&fm=20","thumbnail_16_9":"http:\/\/t2.baidu.com\/it\/u=2222410172,2340340637&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u4e09\u4e9a\u7ad9:\u51af\u5174\u793c\u62d2\u7edd\u88ab\u590d\u4ec7 \u90dd\u5149\u534e\u79c0\u8eab\u6cd5","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2EXi7qyxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GMzYgx_5OKypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180819","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t1.baidu.com\/it\/u=3292952533,3970662044&fm=20","thumbnail_16_9":"http:\/\/t3.baidu.com\/it\/u=2002052901,2283460235&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u57ce\u5e02\u82f1\u96c4193\u6cb3\u53e3\u7ad9 \u5f55\u64ad","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2EXi76yxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GMzYgquJeOypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180818","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t1.baidu.com\/it\/u=4131351618,494895885&fm=20","thumbnail_16_9":"http:\/\/t3.baidu.com\/it\/u=836656224,1333698737&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u57ce\u5e02\u82f1\u96c4192\u6df1\u5733\u7ad9 \u5f55\u64ad","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2EXi76yxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GMzYgq75SSypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180818","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t3.baidu.com\/it\/u=2846134424,3791085768&fm=20","thumbnail_16_9":"http:\/\/t1.baidu.com\/it\/u=1575108521,1885827346&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u57ce\u5e02\u82f1\u96c4191\u63ed\u9633\u7ad9 \u56de\u653e","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2EXi4KyxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GMzskh-8COypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180817","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t2.baidu.com\/it\/u=1814870318,3256651751&fm=20","thumbnail_16_9":"http:\/\/t3.baidu.com\/it\/u=417472970,1330510578&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u57ce\u5e02\u82f1\u96c4190\u6df1\u5733\u7ad9 \u56de\u653e","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2EXi4KyxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GMzspo5JOOypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180817","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t1.baidu.com\/it\/u=2805886969,4104259526&fm=20","thumbnail_16_9":"http:\/\/t1.baidu.com\/it\/u=1470012070,2472553823&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u8bf8\u795e\u4e4b\u6218:\u56fe\u4f0a\u8bfa\u592b\u5355\u573a\u4e94\u6b21\u8bfb\u79d2\u7eaa\u5f55\u524d\u65e0\u53e4\u4eba","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2EXi5ayxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GMzshqtJOWypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180812","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t1.baidu.com\/it\/u=2818815908,4140674047&fm=20","thumbnail_16_9":"http:\/\/t2.baidu.com\/it\/u=1252838075,2193147227&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u57ce\u5e02\u82f1\u96c4188\u6df1\u5733 \u6574\u573a\u56de\u653e","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2EXj4qyxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GMzc1rvMDNypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180805","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t2.baidu.com\/it\/u=3240753286,4001588685&fm=20","thumbnail_16_9":"http:\/\/t1.baidu.com\/it\/u=2113670648,2379903901&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u8bf8\u795e\u4e4b\u6218:\u5218\u6d77\u5357\u9ed1\u9a6c\u672c\u8272\u51fb\u8d25\u7530\u946b","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2EXj4qyxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GMzc5uvICWypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180805","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t1.baidu.com\/it\/u=1499305396,1484473502&fm=20","thumbnail_16_9":"http:\/\/t2.baidu.com\/it\/u=571788283,60931236&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u57ce\u5e02\u82f1\u96c4187\u6df1\u5733 \u6574\u573a\u56de\u653e","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2EXj46yxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GMzc4w5MaaypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180804","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t2.baidu.com\/it\/u=2726836774,4059757956&fm=20","thumbnail_16_9":"http:\/\/t3.baidu.com\/it\/u=1297727334,2055520730&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u57ce\u5e02\u82f1\u96c4186\u6df1\u5733\u7ad9 \u6574\u573a\u56de\u653e","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2EXj5KyxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GMzZAruobNypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180803","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t2.baidu.com\/it\/u=1819877423,3013498460&fm=20","thumbnail_16_9":"http:\/\/t2.baidu.com\/it\/u=620672755,1350553704&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u57ce\u5e02\u82f1\u96c4185\u6df1\u5733\u7ad9 \u6574\u573a\u56de\u653e","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2Erh7qyxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GMzZ4-v5ySypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180729","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t1.baidu.com\/it\/u=2644149878,3995424829&fm=20","thumbnail_16_9":"http:\/\/t3.baidu.com\/it\/u=1223465548,2180992417&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u4e16\u754c\u51a0\u519b\u8d5b:\u51af\u5174\u793c\u664b\u7ea7\u8bf8\u795e\u4e4b\u621816\u5f3a","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2Erh7qyxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GMzZ45tceWypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180729","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t3.baidu.com\/it\/u=3238567204,3838380490&fm=20","thumbnail_16_9":"http:\/\/t3.baidu.com\/it\/u=1739174101,1977104470&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u57ce\u5e02\u82f1\u96c4184\u6df1\u5733\u7ad9 \u6574\u573a\u56de\u653e","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2Erh76yxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GMzZ4ouYaOypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180728","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t2.baidu.com\/it\/u=2541180846,3635844121&fm=20","thumbnail_16_9":"http:\/\/t3.baidu.com\/it\/u=1145856035,2036646030&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u57ce\u5e02\u82f1\u96c4\u5317\u4eac\u7ad9 \u56de\u653e","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2Erh76yxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GMzZ81-5-eypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180728","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t1.baidu.com\/it\/u=3024570622,3830218328&fm=20","thumbnail_16_9":"http:\/\/t1.baidu.com\/it\/u=1804512599,2232568744&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u57ce\u5e02\u82f1\u96c4\u6148\u6eaa\u7ad9 \u5b8c\u6574\u56de\u653e","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2Erh4KyxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GPhsou-MmWypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180727","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t1.baidu.com\/it\/u=625681281,1013664237&fm=20","thumbnail_16_9":"http:\/\/t1.baidu.com\/it\/u=1777489249,1953406643&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u57ce\u5e02\u82f1\u96c4\u6df1\u5733\u7ad9 \u7b2c\u4e00\u65e5\u56de\u653e","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2Erh4KyxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GPhsoq-ZSOypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180727","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t1.baidu.com\/it\/u=1161584064,582861345&fm=20","thumbnail_16_9":"http:\/\/t1.baidu.com\/it\/u=4269531046,3643355096&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u57ce\u5e02\u82f1\u96c4\u6df1\u5733\u7ad9 \u6574\u573a\u56de\u653e","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2Erh5ayxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GPhslh_8fNypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180722","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t2.baidu.com\/it\/u=2487386853,3043231927&fm=20","thumbnail_16_9":"http:\/\/t3.baidu.com\/it\/u=996829985,1186823505&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u8bf8\u795e\u5341\u516d\u5f3a\u4e89\u9738 \u7a46\u745f\u592b\u4e09\u6b21\u8bfb\u79d2\u9707\u64bc\u5168\u573a","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2Erh5ayxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GPhslqu4maypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180722","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t3.baidu.com\/it\/u=1902223462,1393858471&fm=20","thumbnail_16_9":"http:\/\/t1.baidu.com\/it\/u=747472561,173706548&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u57ce\u5e02\u82f1\u96c4179\u5357\u9633\u7ad9 \u6574\u573a\u56de\u653e","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2Erh5qyxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GPhskxtMjJypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180721","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t2.baidu.com\/it\/u=3267976850,4233697556&fm=20","thumbnail_16_9":"http:\/\/t1.baidu.com\/it\/u=4292492391,616799088&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u57ce\u5e02\u82f1\u96c4178\u6df1\u5733\u7ad9 \u6574\u573a\u56de\u653e","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2Erh5qyxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GPhso3-ZWKypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180721","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t3.baidu.com\/it\/u=4257600812,4149812721&fm=20","thumbnail_16_9":"http:\/\/t2.baidu.com\/it\/u=2870434186,2425878246&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u57ce\u5e02\u82f1\u96c4177\u6b66\u6c49\u7ad9 \u6574\u573a\u56de\u653e","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2Erh5qyxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GPhso8-5KeypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180721","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t2.baidu.com\/it\/u=2490221216,3036556658&fm=20","thumbnail_16_9":"http:\/\/t2.baidu.com\/it\/u=1207700695,1496757855&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u57ce\u5e02\u82f1\u96c4\u5927\u5316\u7ad9 \u6574\u573a\u56de\u653e","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2Eri4ayxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GPhpo56pjNypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180716","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t3.baidu.com\/it\/u=3371026334,214605714&fm=20","thumbnail_16_9":"http:\/\/t1.baidu.com\/it\/u=1937468125,2681984060&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u8d85\u7ea7\u6218:\"\u91d1\u7fc5\u5927\u9e4f\"\u906d\u9047\u6454\u8de4\u7537","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2Eri4qyxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GPhpkuv5OOypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180715","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t1.baidu.com\/it\/u=2030383930,3390325469&fm=20","thumbnail_16_9":"http:\/\/t1.baidu.com\/it\/u=744463502,1632225565&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u640f\u51fb\u51a0\u519b\u8d5b:\u53f6\u95ee\u9669\u80dc \u5415\u632f\u9e3f\u593a\u91d1\u8170\u5e26","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2Erj76yxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GPhZBgv8eWypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180708","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t1.baidu.com\/it\/u=1849247230,3259910072&fm=20","thumbnail_16_9":"http:\/\/t1.baidu.com\/it\/u=354237018,1362760095&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u6fb3\u95e8\u7ad9:\u95eb\u897f\u6ce2\u88f8\u7ede\u964d\u670d\u5bf9\u624b \u82cf\u6ce2\u90a6\u70b9\u80dc\u7956\u8036\u592b","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2Erj5qyxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GPhYg2-8aaypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180701","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t3.baidu.com\/it\/u=2761020008,3946098126&fm=20","thumbnail_16_9":"http:\/\/t1.baidu.com\/it\/u=1307393084,2122147135&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u57ce\u5e02\u82f1\u96c4\u5317\u4eac\u7ad9 \u6574\u573a\u56de\u653e","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2Evg56yxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GPhYpt6MeKypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180630","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t2.baidu.com\/it\/u=4289945672,3744840623&fm=20","thumbnail_16_9":"http:\/\/t2.baidu.com\/it\/u=3052996901,2505668639&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u73ed\u739b\u593a\u57fa\u4e00\u56de\u5408\u7ec8\u7ed3\u5bf9\u624b \u7f57\u6770\u51fb\u9000\u6218\u6597\u6c11\u65cf\u65b0\u661f","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2Evh46yxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GPhIwt5JSWypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180624","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t3.baidu.com\/it\/u=2466753227,3106915092&fm=20","thumbnail_16_9":"http:\/\/t3.baidu.com\/it\/u=1007666502,1089027389&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u57ce\u5e02\u82f1\u96c4\u6c82\u5357\u7ad9 \u6574\u573a\u56de\u653e","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2Evh5KyxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GPhI4z9MSOypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180623","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t3.baidu.com\/it\/u=4266100322,3477502635&fm=20","thumbnail_16_9":"http:\/\/t2.baidu.com\/it\/u=2876195752,2269953996&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u57ce\u5e02\u82f1\u96c4\u5ba3\u57ce\u7ad9 \u6574\u573a\u56de\u653e","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2Evh5KyxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GPhI4z-pOaypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180623","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t2.baidu.com\/it\/u=1818940014,3020277049&fm=20","thumbnail_16_9":"http:\/\/t1.baidu.com\/it\/u=294710549,1085393332&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u57ce\u5e02\u82f1\u96c4169\u6b66\u6c49\u7ad9","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2Evi76yxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GPhZs-5MiOypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180618","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t3.baidu.com\/it\/u=1579474461,1928455658&fm=20","thumbnail_16_9":"http:\/\/t1.baidu.com\/it\/u=660884411,457165768&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u7ae0\u4e18\u7ad9:\u9ec4\u51ef\u91cd\u70aeKO\u6218\u6597\u6c11\u65cf \u738b\u6587\u5cf0\u593a\u51a0","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2Evi4KyxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GPhZsrtcaWypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180617","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t3.baidu.com\/it\/u=2885914655,4206921273&fm=20","thumbnail_16_9":"http:\/\/t1.baidu.com\/it\/u=1431123144,2721063105&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u7ae0\u4e18\u7ad9:\u6797\u5f3a\u90a6\u9669\u80dc\u65e5\u672c\u738b\u8005\u664b\u7ea7\u96cf\u91cf\u7ea7\u534a\u51b3\u8d5b","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2Evi56yxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GPhJAt7p7BypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180610","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t1.baidu.com\/it\/u=611543993,994699243&fm=20","thumbnail_16_9":"http:\/\/t3.baidu.com\/it\/u=3773968644,3823198895&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6fb3\u95e8\u7ad9:\u82cf\u6ce2\u90a6\u5b8c\u80dc\u7956\u8036\u592b \u6797\u5f3a\u90a6\u91cd\u521b\u4f26\u9f99","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2Evj5KyxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GPhIk0uZyaypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180603","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t1.baidu.com\/it\/u=2459771840,3268406959&fm=20","thumbnail_16_9":"http:\/\/t1.baidu.com\/it\/u=1034207343,1441481157&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u57ce\u5e02\u82f1\u96c4\u90fd\u5b89\u7ad9(\u4e0b)","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2Evj5KyxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GPhIpg5JSeypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180603","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t3.baidu.com\/it\/u=3554992925,421400562&fm=20","thumbnail_16_9":"http:\/\/t3.baidu.com\/it\/u=2060118474,2738402375&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u57ce\u5e02\u82f1\u96c4\u90fd\u5b89\u7ad9(\u4e0a)","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2Evj5ayxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GPhIki45rJypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180602","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t2.baidu.com\/it\/u=2605323500,3507925712&fm=20","thumbnail_16_9":"http:\/\/t1.baidu.com\/it\/u=1113248252,1549704001&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u4e09\u4e9a\u7ad9:\u88ab\u8bfb\u79d2\u4e24\u6b21\u540e\u60ca\u5929\u9006\u8f6c \u8bf8\u795e\u4e4b\u8def\u51af\u5174\u793c\u95ee\u9f0e","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2Ejh4KyxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GPhJc64pWaypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180527","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t2.baidu.com\/it\/u=1950814586,1415968889&fm=20","thumbnail_16_9":"http:\/\/t1.baidu.com\/it\/u=745936463,200292220&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u57ce\u5e02\u82f1\u96c4167\u5fe0\u53bf\u7ad9 \u6574\u573a\u56de\u653e","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2Ejh4ayxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GP0M477cfJypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180526","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t3.baidu.com\/it\/u=614350681,251521366&fm=20","thumbnail_16_9":"http:\/\/t2.baidu.com\/it\/u=3696387227,2850200885&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u8bf8\u795e\u4e4b\u8def\u4e09\u4e9a\u7ad9:\u5218\u6d77\u5357\u51b2\u52b2\u5341\u8db3\u70b9\u80dc\u7530\u946b","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2Ejh56yxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GP0Mxt-5KeypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180520","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t3.baidu.com\/it\/u=2175847783,2803572145&fm=20","thumbnail_16_9":"http:\/\/t3.baidu.com\/it\/u=798479686,894700459&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u57ce\u5e02\u82f1\u96c4166\u7b80\u9633\u7ad9 \u6574\u573a\u56de\u653e","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2Eji7qyxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GP0MwovYOSypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180519","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t1.baidu.com\/it\/u=4064444470,3598390010&fm=20","thumbnail_16_9":"http:\/\/t2.baidu.com\/it\/u=3070233895,2461164036&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u57ce\u5e02\u82f1\u96c4165\u7ae0\u4e18\u7ad9 \u6574\u573a\u56de\u653e","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2Eji76yxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GP0M5s6p2OypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180518","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t2.baidu.com\/it\/u=3736797112,3795012777&fm=20","thumbnail_16_9":"http:\/\/t2.baidu.com\/it\/u=2425855538,2634782762&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u90d1\u53ec\u7389TKO\u7f57\u7eb3\u591a \u4e00\u5c55\u4e2d\u56fd\u98ce\u91c7","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2Eji5KyxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GP0Joq6ITJypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180513","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t3.baidu.com\/it\/u=3093743764,3576602743&fm=20","thumbnail_16_9":"http:\/\/t3.baidu.com\/it\/u=1751262975,1847138357&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u57ce\u5e02\u82f1\u96c4\u60e0\u5dde\u7ad9 \u6574\u573a\u56de\u653e","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2Eji5ayxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GP0Js9-cKaypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180512","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t3.baidu.com\/it\/u=991976437,379783105&fm=20","thumbnail_16_9":"http:\/\/t3.baidu.com\/it\/u=4071357577,3589814992&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u4e09\u4e9a\u7ad9:\u4fc4\u7f57\u65af\u4e9a\u5386\u5c71\u5927TKO\u4e2d\u56fd\u963f\u65af\u54c8\u63d0","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2Ejj4ayxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GP15covJuaypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180506","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t2.baidu.com\/it\/u=2517432723,3214453327&fm=20","thumbnail_16_9":"http:\/\/t3.baidu.com\/it\/u=1294412317,1631721499&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u57ce\u5e02\u82f1\u96c4\u864e\u95e8\u7ad9 \u6574\u573a\u56de\u653e","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2Ejj4qyxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GP14g7tYmKypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180505","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t1.baidu.com\/it\/u=3345388998,3971618268&fm=20","thumbnail_16_9":"http:\/\/t3.baidu.com\/it\/u=2042586366,2243936345&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u5317\u4eac\u7ad9:\u7af9\u7aff\u523a\u5ba2\u675c\u6258TKO\u5e15\u96f7\u65af\u4e0a\u6f14\u9006\u8f6c","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2Enh7qyxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GP15M1_pSeypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180429","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t1.baidu.com\/it\/u=2910243956,4171338607&fm=20","thumbnail_16_9":"http:\/\/t2.baidu.com\/it\/u=1343720205,2304661075&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u5317\u4eac\u7ad9:\u56fe\u4f0a\u8bfa\u592b\u5f3a\u52bfKO\u65e5\u672c\"\u72c2\u72ac\"\u664b\u7ea7\u8bf8\u795e16\u5f3a","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2Enh5ayxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GP14o855ueypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180422","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t2.baidu.com\/it\/u=78633022,447671964&fm=20","thumbnail_16_9":"http:\/\/t3.baidu.com\/it\/u=3413874385,3404756485&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"2018\u6606\u4ed1\u51b3\u9752\u5c9b\u7ad9 \u7530\u946b\u786c\u62fc\u4e09\u5c40\u61be\u8d1f\u62c9\u68ee","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2Eni4qyxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GP18s04saOypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180415","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t2.baidu.com\/it\/u=2322571842,2742381310&fm=20","thumbnail_16_9":"http:\/\/t2.baidu.com\/it\/u=728640149,815828492&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"2018\u6606\u4ed1\u51b3\u9752\u5c9b\u7ad9 \u66b4\u7389\u4e39\u4e09\u5c40\u6218\u5e73\u845b\u840d","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2Enj76yxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GP18gu-4PNypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180408","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t1.baidu.com\/it\/u=1248669348,1165699794&fm=20","thumbnail_16_9":"http:\/\/t1.baidu.com\/it\/u=39631426,41212622&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u9752\u5c9b\u7ad9:\u5b54\u4ee4\u4e30\u61be\u8d1f\u963f\u7eb3\u6258\u5229\u75db\u5931\u51a0\u519b","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2Enj5qyxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GP154w4cHNypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180401","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t2.baidu.com\/it\/u=2631281058,3692683246&fm=20","thumbnail_16_9":"http:\/\/t3.baidu.com\/it\/u=1394724265,1988105512&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u4e09\u4e9a\u7ad9:\u963f\u5df4\u7d22\u592b\u6781\u901fKO\u4f4d\u5b81\u8f89\u56db\u5c40\u6218\u5e73","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2E7h4qyxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GP15pv58maypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180325","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t2.baidu.com\/it\/u=1686253561,2648317893&fm=20","thumbnail_16_9":"http:\/\/t2.baidu.com\/it\/u=414674949,1334033254&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u57ce\u5e02\u82f1\u96c4\u6b66\u6c49\u7ad9 \u6574\u573a\u56de\u653e","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2E7h4qyxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GP15pq-5iKypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180325","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t3.baidu.com\/it\/u=2411667687,3186746642&fm=20","thumbnail_16_9":"http:\/\/t3.baidu.com\/it\/u=1129373376,1470448946&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u8bf8\u795e\u4e4b\u6218\u5c0f\u7ec4\u8d5b:\u51af\u5174\u793c\u9057\u61be\u8d25\u9635","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2E7i76yxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GP1pY5-pqSypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180318","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t3.baidu.com\/it\/u=3371174413,4150432237&fm=20","thumbnail_16_9":"http:\/\/t1.baidu.com\/it\/u=1978470647,2513359987&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u8bf8\u795e\u4e4b\u6218:\u7ef4\u514b\u591aTKO\u4e2d\u56fd\u53cc\u54cd\u70ae\u80e1\u4e9a\u975e","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2E7i5qyxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GP1pA69JTBypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180311","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t1.baidu.com\/it\/u=1809216232,3118805942&fm=20","thumbnail_16_9":"http:\/\/t2.baidu.com\/it\/u=541398741,1475506993&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u8d35\u9633\u7ad9:\u5f20\u7acb\u9e4f\u83b7\u65b0\u5e74\u9996\u80dc\u5f15\u7206\u5168\u573a","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2E7j46yxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GP1o406YaKypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180304","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t1.baidu.com\/it\/u=1881118743,3178626102&fm=20","thumbnail_16_9":"http:\/\/t1.baidu.com\/it\/u=734336845,1563354587&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3:\u5e74\u5ea6\u795e\u7ea7\u4eba\u7269\u5927\u76d8\u70b9 \u5168\u573a\u56de\u653e","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2E_h4qyxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GP1ogi9oaeypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180225","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t1.baidu.com\/it\/u=1048315677,1769918316&fm=20","thumbnail_16_9":"http:\/\/t1.baidu.com\/it\/u=1928211513,2166934995&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u640f\u51fb\u6625\u665a\u7279\u8f91:\u64ad\u6c42\u4e00\u62f3KO\u521a\u679c\u96c4\u72ee\u827e\u66fc","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2E_i76yxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GP0p5v4IWeypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180218","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t2.baidu.com\/it\/u=1357426894,1885436202&fm=20","thumbnail_16_9":"http:\/\/t1.baidu.com\/it\/u=2467718712,2621008215&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u9075\u4e49\u7ad9 \u5173\u554a\u7fe0\u593a\u91d1\u8170\u5e26\u5f20\u4f1f\u4e3d\u8de8\u754c\u5f81\u6218\u65e0\u7f18\u51a0\u519b","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2E_i5qyxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GP0pE--p-eypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180211","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t3.baidu.com\/it\/u=379479852,1402587770&fm=20","thumbnail_16_9":"http:\/\/t3.baidu.com\/it\/u=1290189578,1754296398&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u57ce\u5e02\u82f1\u96c4\u90fd\u5b89\u7ad9 \u56de\u653e","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2E_j7qyxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GP0pE3uofJypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180209","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t2.baidu.com\/it\/u=3447281167,205653369&fm=20","thumbnail_16_9":"http:\/\/t1.baidu.com\/it\/u=2178617160,2975624181&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u640f\u51fb\u6625\u665a:\u9a6c\u62c9\u727929\u79d2\u91cd\u62f3KO\u82cf\u6ce2\u90a6","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2E_j46yxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GP0ps05JqKypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180204","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t2.baidu.com\/it\/u=3135271324,3616608858&fm=20","thumbnail_16_9":"http:\/\/t3.baidu.com\/it\/u=1257761,3892633239&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u57ce\u5e02\u82f1\u96c4\u5df4\u9a6c\u7ad9 \u7cbe\u5f69\u56de\u653e","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2E_j5KyxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GP0pwy_cGSypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180203","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t3.baidu.com\/it\/u=3348784362,89464397&fm=20","thumbnail_16_9":"http:\/\/t3.baidu.com\/it\/u=2202303176,2780869134&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u9075\u4e49\u7ad9\u6728\u5170\u4f20\u5947 \u683c\u6597\u5973\u738b\u5f20\u4f1f\u4e3d\u8de8\u754c\u9996\u79c0","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2Ezh76yxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GP0opov4nBypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180128","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t1.baidu.com\/it\/u=2634174337,3235816865&fm=20","thumbnail_16_9":"http:\/\/t3.baidu.com\/it\/u=1008443502,1293742349&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u4e09\u4e9a\u7ad9:\u64ad\u6c42\u8fd8\u4fd7\u5f52\u6765KO\u675c\u6258\u9707\u60ca\u5168\u573a","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2Ezh5qyxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GP0pQy5saOypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180121","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t3.baidu.com\/it\/u=1195343929,1147768747&fm=20","thumbnail_16_9":"http:\/\/t2.baidu.com\/it\/u=4260975557,4164081905&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u57ce\u5e02\u82f1\u96c4\u4e1c\u839e\u7ad9 \u5b8c\u6574\u56de\u653e","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2Ezi4KyxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GP0pUhvYjNypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180117","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t3.baidu.com\/it\/u=3039298982,3958696440&fm=20","thumbnail_16_9":"http:\/\/t3.baidu.com\/it\/u=1636842294,2294253572&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u4e09\u4e9a\u7ad9:\u6f58\u5bb6\u8fd01\u79d2KO\u5bf9\u624b \u9707\u60ca\u5168\u573a","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2Ezi46yxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GP0Y4p64ueypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180114","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t2.baidu.com\/it\/u=2307542209,3468104169&fm=20","thumbnail_16_9":"http:\/\/t3.baidu.com\/it\/u=1060420092,1834515125&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"},{"single_title":"\u6606\u4ed1\u51b3\u4e09\u4e9a\u7ad9:\u82cf\u6ce2\u90a6\u9669\u80dc\u8fdb\u8bf8\u795e\u4e4b\u6218\u56db\u5f3a","url":"\/link?url=dm_10tBNoD-LLAMb79CB_p0kxozCpK8OiGC4zdCMJ6_OSOmbS2Ezj4KyxZhJTuslMXca2sqg5Mc6aYCNDl7NXOnUoz3vVwgzn7NMxmvmyCKgZfeMbEIcUsinZHq0qU9GP0Ylp_sOaypT4ZBPtVgc7HZvD1t-bfRknknwpkEfJxqGh","episode":"20180107","is_play":"1","site_order":"1","site_url":"iqiyi.com","thumbnail":"http:\/\/t1.baidu.com\/it\/u=4019056273,1178509616&fm=20","thumbnail_16_9":"http:\/\/t2.baidu.com\/it\/u=654795675,1517540512&fm=20","guest":[],"swfurl":null,"gif_thumbnail":"","is_obj_pay":"0"}],"site_info":{"site":"iqiyi.com","name":"\u7231\u5947\u827a","logo":"http:\/\/vs3.bdstatic.com\/logo\/iqiyi.gif","big_logo":"http:\/\/vs3.bdstatic.com\/logo\/big\/iqiyi.png"},"years":["2018","2017","2016","2015","2014"],"site_info":{"site":"qq.com","name":"\u817e\u8baf","logo":"http:\/\/vs3.bdstatic.com\/logo\/qq.gif","big_logo":"http:\/\/vs3.bdstatic.com\/logo\/big\/qq.png"},"years":["2018"]}';
		$arr=json_decode($str,true);
     // dump();
		$arrs=$arr['episodes'];
     // dump($arrs);
		foreach ($arrs as $k => $v) {
			$newarr['addtime']=strtotime($v['episode'])+rand(16*3600,20*3600);
			$s='http://v.baidu.com'.$v['url'];
			$dom = HtmlDomParser::file_get_html($s);
			$arr=$dom->find('#link',0);
			$newarr['video_link']=$arr->href;
			$newarr['imgpath']=$v['thumbnail'];
			$newarr['video_title']=$v['single_title'];
           $where['video_title']=$v['single_title'];
          	$result=Db::table('video')->where($where)->find();
         if(!$result['video_title']){
			$newarr['click']=rand(500,4000);
			$newarr['content']=$v['single_title'];
			$newarr['is_delete']=1;
			$newarr['type']=3;
			$newarr['video_label']='昆仑决视频';
			$newarr['video_brief']=$v['single_title'].',散打视频,昆仑决搏击视频';
          //	dump($newarr);
			if (substr($newarr['video_link'],0,4)=='http') {
				Db::table('video')->insert($newarr);
			}
			unset($newarr);	
         }
		}
	}
	/*勇士的荣耀
	
	 */
	public function ysryvideo()
	{
		// $s='http://v.baidu.com/link?url=dm_20Jg0HnMUvGItah1n_HsgNSTNbM6Couw9kM3mo0YfEX70LzLOLf7j030cOeupcplNOKYGvr1aIvaSFY9vDiatstPsqcLmNh24Fr08pEgKBBG2M5PncBXXkwGN8iBBkgPmo3_WqJn-s7W2IFlr_wuU9KZTMpg1-xz3yVPChNWrU';
		// $dom = HtmlDomParser::file_get_html($s);
		// $arr=$dom->find('#link',0);
		// echo $arr->href;die;
		set_time_limit(500);
		$url='http://v.baidu.com/show_intro/?callback=jQuery111105156744636733437_1529542432135&site=iqiyi.com&year=2016&frp=&e=1&service=json&dtype=tvshowPlayUrl&id=14841&ip=&_=1529542432152';
		$data=file_get_contents($url);
		//$data=str_replace('/**/jQuery111104862168386467567_1529469698116','',$data);
		$s=strpos($data,'{');
		$e=strrpos($data,'}');
		$str=substr($data,$s,$e-$s+1);
		$arr=json_decode($str,true);
		$arrs=$arr['episodes'];
		foreach ($arrs as $k => $v) {
			$newarr['addtime']=strtotime($v['episode'])+rand(16*3600,20*3600);
			$s='http://v.baidu.com'.$v['url'];
			$dom = HtmlDomParser::file_get_html($s);
			$arr=$dom->find('#link',0);
			$newarr['video_link']=$arr->href;
			$newarr['imgpath']=$v['thumbnail'];
			$newarr['video_title']=$v['single_title'];
			$newarr['click']=rand(500,4000);
			$newarr['content']=$v['single_title'];
			$newarr['is_delete']=1;
			$newarr['type']=9;
			$newarr['img']=$v['thumbnail_16_9'];
			$newarr['video_label']='勇士的荣耀视频';
			$newarr['video_brief']=$v['single_title'].',散打视频,勇士的荣耀搏击视频';
			if (substr($newarr['video_link'],0,4)=='http') {
				Db::table('video')->insert($newarr);
			}
			unset($newarr);	
		}
	}
	/*
		ufc拳手排行榜
	 */
	public function getPerson()
	{
		 // Db::table('person')->where('age','gt','0')->delete();die;
		set_time_limit(500);
		$url='http://www.ufc.cn/';
		$dom = HtmlDomParser::file_get_html($url);
		$arr=$dom->find('.xsph-con',0);
		$img=$arr->find('li a');
		$href=$arr->find('li span');
		foreach ($img as $k => $v) {
			$url=$v->href;
			$newarr['username']=$href[$k]->innertext;
			$detail=HtmlDomParser::file_get_html($url);
			$tim=$detail->find('.con-xsxx',0);
			$li=$tim->find('li span');
			$newarr['country']=mb_substr($li[0],(strrpos($li[0],'：'))+3);
			// 
			// echo $newarr['country'];die;
			$newarr['age']=mb_substr($li[1],(strrpos($li[1],'：'))+3);
			$newarr['height']=mb_substr($li[2],(strrpos($li[2],'：'))+3);
			$newarr['weight']=mb_substr($li[3],(strrpos($li[3],'：'))+3);
			$newarr['record']=mb_substr($li[4],(strrpos($li[4],'：'))+3);
			$newarr['advantage']=mb_substr($li[5],(strrpos($li[5],'：'))+3);
			$img=$detail->find('.con-xstx img',0);
			$newarr['type']=1;
			$newarr['addtime']=time();
			$newarr['orders']=$k+1;
			$newarr['imgpath']=$img->src;
			Db::table('person')->insert($newarr);
		}
		// $this->test();
	}
	/*
		ufc中国选手
	 */
	public function test()
	{
		$url='http://ufc.cn/fighters/chinesefighters/';
		$dom = HtmlDomParser::file_get_html($url);
		$imgs=$dom->find('.search-pic li');
		$im=$dom->find('.search-pic a');
		foreach ($imgs as $k => $v) {
			$url=$im[$k]->href;
			 // echo $url;die;
			 // echo $k;echo "--";echo $username;
			$detail=HtmlDomParser::file_get_html($url);
			$tim=$detail->find('.con-xsxx',0);
			$li=$tim->find('li span');
			$username=$tim->find('h3',0);
			 // echo $k;echo "--";echo $username;
			$newarr['username']=$username->innertext;
			$newarr['country']=mb_substr($li[0],(strrpos($li[0],'：'))+3);
			$newarr['age']=mb_substr($li[1],(strrpos($li[1],'：'))+3);
			$newarr['height']=mb_substr($li[2],(strrpos($li[2],'：'))+3);
			$newarr['weight']=mb_substr($li[3],(strrpos($li[3],'：'))+3);
			$newarr['record']=mb_substr($li[4],(strrpos($li[4],'：'))+3);
			$newarr['advantage']=mb_substr($li[5],(strrpos($li[5],'：'))+3);
			$img=$detail->find('.con-xstx img',0);
			$newarr['type']=2;
			$newarr['addtime']=time();
			$newarr['imgpath']=$img->src;
			 Db::table('person')->insert($newarr);
			unset($newarr);
		}
	}
  public function setc()
	{
		
		$re=Db::table('article')->where('clilck',2826)->select();
   // dump($re);die;
		foreach ($re as $k => $v) {
          $data['clilck']=rand(300,20000);
			Db::table('article')->where('id',$v['id'])->update($data);
		}
	}
}
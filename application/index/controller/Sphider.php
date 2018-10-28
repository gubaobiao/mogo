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
	/*
		摔角王新闻资讯
	 */
	public function sjwnew()
	{
		set_time_limit(500);
		// dump(file_get_contents('http://toutiao.com/group/6515849148636332557/'));
		// die;
		$url='http://www.shuaijiao.com/news/news/1.html';
		$dom = HtmlDomParser::file_get_html( $url );
		$arr=$dom->find('.lists6',0);
		$img=$arr->find('.page0 dd a img');
		$href=$arr->find('.page0 dd a');
		$title=$arr->find('dt a');
     // dump($arr);die;
		foreach ($img as $k => $v) {
			
			echo $href[$k]->href;
			$doms = HtmlDomParser::file_get_html($href[$k]->href);
			$time=$doms->find('.r',0);
			echo $time->innertext();
			echo "<br>";
			
			// $newarr['content']=$div->innertext();
		 // 	$newarr['title']=$href[$k]->title;
			// $newarr['addtime']=$v['behot_time'];
			// $newarr['imgpath']=$v->src;
			// $newarr['author']='网络搜集';
			// $newarr['clilcks']=$v['go_detail_count'];
			// $newarr['sourcetype']=1;
			// $newarr['clilck']=rand(300,2000);
			// $newarr['type']=7;
			//Db::table('article')->insert($newarr);
		}
	}
	/* wwe视频 刷角网
		pptv http://www.shuaijiao.com/video/ufc/
	 */
	public function sjwwwevideo()
	{
    	
		set_time_limit(500);
		$arrayurl=['http://www.shuaijiao.com/video/wwe/1.html','http://www.shuaijiao.com/video/tna/1.html','http://www.shuaijiao.com/video/roh/1.html','http://www.shuaijiao.com/video/ppv/1.html','http://www.shuaijiao.com/video/lucha/1.html','http://www.shuaijiao.com/video/single/1.html','http://www.shuaijiao.com/video/ufc/1.html'];
		foreach ($arrayurl as $key => $value) {
			$url= $value;
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
			if ($url=='http://www.shuaijiao.com/video/ufc/1.html') {
				$newarr['type']=1;
				$newarr['video_label']='UFC,UFC视频';
				$newarr['video_brief']=$title[$k]->innertext.',UFC视频';
			}else{
				$newarr['type']=8;
				$newarr['video_label']='WWe,WWf视频';
				$newarr['video_brief']=$title[$k]->innertext.',WWe视频';
			}
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
      
      }
       echo  date('Y-m-d H:i:s')."抓取成功!";
	}
	public function sjwwwevideos()
	{
    
		set_time_limit(500);
		$url='http://www.shuaijiao.com/video/tna/1.html';
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
			$newarr['video_label']='tna视频,WWe,WWf视频';
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
		//	dump($newarr);
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
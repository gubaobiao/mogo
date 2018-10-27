<?php
namespace app\index\controller;
use think\Db;
use think\Controller;
use think\Request;
class Index extends Controller
{
    // 初始化
    protected function _initialize()
    {
 
        //获取分类
        $cate=Db::name('videocate')->where('is_delete',1)->select();
        $this->assign('cate',$cate);
    }
    public function index()
    {
       
        //ufc视频集锦
        $re= Db::name('video')->where('type',1)->order('addtime')->limit(1,16)->select();
       // dump($re);
        $ko=Db::name('video')->where('type',8)->order('addtime')->limit(2,16)->select();
        //国内赛事集锦
        $gnvideo=Db::name('video')->where('type',5)->order('addtime')->limit(12)->select();
        //搏击快报
        $article=Db::table('article')->field('id,title,imgpath,addtime')->order('addtime')->limit(20)->select();
       // dump($article);
       $person=Db::table('person')->field('username,orders')->order('orders')->where('type',1)->select();;
       krsort($person);
       //ufc中国选手
       $persons=Db::table('person')->field('username')->where('type',2)->select();
       //UFC资讯
       $UFCnews=Db::table('article')->field('id,title,imgpath,addtime')->order('addtime')->where('type',4)->limit(20)->select();
       $shar=controller('Share'); 
       $shardata=$shar->getShar('index');
       $url='http://'.$_SERVER['HTTP_HOST'];
       $this->assign(['ufcvideo'=>$re,'kovideo'=>$ko,'person'=>$person,'persons'=>$persons,'gnvideo'=>$gnvideo,'ufcnews'=>$UFCnews,'article'=>$article,'seoTitle'=>$shardata['title'],'seoImg'=>$shardata['img'],'seoUrl'=>$url,'active'=>0]);
        return $this->fetch('Index/index');

    }
    //video视频详情
    public function videoDetail(Request $request)
    {
    	//1代表ufc视频 2代表昆仑决视频
      // http://player.pptv.com/v/vVJb2BvcF1W4Np4.swfhttp://v.pptv.com/show/W9vbWMkT2BZ5918.html
        http://v.pptv.com/show/W9vbWMkT2BZ5918.html
        // Db::name('video')->where('id','5b2840ea2255581d1c000dd9')->delete();die;
      //  dump($cursor);die;
    	if ($request->isGet()) {
    		$re=Db::table('video')->find(input('id'));
    		// dump($re);  
            $catename=Db::table('videocate')->where('type',(int)$re['type'])->field('catename,rewriteurl')->find();
            // dump($catename);
        if (strstr($re['video_link'],'pptv.com')) {
            $s=strrpos($re['video_link'],'/');
            $e=strrpos($re['video_link'],'.');
            $id=substr($re['video_link'],$s+1,$e-$s-1);
            $re['video_link']='http://v.pptv.com/show/'.$id.'.html';
           
        }
            $url='http://'.$_SERVER['HTTP_HOST'].'/video/'.$re['id'].'.html';
            // dump($re);
    		$this->assign(['videoData'=>$re,'catename'=>$catename,'seoTitle'=>$re['video_title'],'seoImg'=>$re['imgpath'],'seoUrl'=>$url,'active'=>99]);
    		return $this->fetch('Index/video');
    	}
    	
    }
    //分类
    public function cate()
    {
        $c=(int)input('c');
          //最强ko视频集锦
        $ko=Db::name('video')->order('addtime')->where('type',$c)->paginate(20);
        $title=Db::table('videocate')->where('type',$c)->field('catename,rewriteurl')->find();
        $shar=controller('Share');
        $shardata=$shar->getShar($title['rewriteurl']);
        $url='http://'.$_SERVER['HTTP_HOST'].$title['rewriteurl'].'.html';
        $this->assign(['kovideo'=>$ko,'title'=>$title['catename'],'sdata'=>'','seoTitle'=>$shardata['title'],'seoImg'=>$shardata['img'],'seoUrl'=>$url,'active'=>$c]);
        return $this->fetch('Index/cate');
    }
    /*
      搜索视频
     */
    public function search(Request $request)
    {
           
        if ($request->isGet()) {
            $str=input('searchword');

            $re=Db::table('video')->field('id,addtime,video_link,video_title,imgpath')->where('video_title','like',$str)->paginate(20,false,['var_page' => 'p']);
             $str=htmlspecialchars($str);
                $rer=json_encode($re);
                $rer=json_decode($rer,true);
            if (!$rer['data']) {
                $sdata='暂无与您搜索匹配的内容!请换个关键词进行搜索!';
                $title='暂无与'." '$str' ".'相关内容';
            }else{
                $sdata='';
                $title='与'." '$str' ".'相关内容';
            }
            $seoTitle=$str.'_UFC无限制格斗_MMA综合格斗_中国搏击散打';
             $url='http://'.$_SERVER['HTTP_HOST'].'/search?searchword='.$str;
            if ((int)$request->param('p')) {
             $url='http://'.$_SERVER['HTTP_HOST'].'/search?searchword='.$str.'&p='.(int)$request->param('p');
            }
           
            $img='http://'.$_SERVER['HTTP_HOST'].'/img.png';
            $this->assign(['kovideo'=>$re,'title'=>$title,'sdata'=>$sdata,'seoTitle'=>$seoTitle,'seoImg'=>$img,'seoUrl'=>$url,'active'=>99]);
            
            return $this->fetch('Index/cate');
           
        }
    }
    /*
    新闻new
     */
    public function newcate(Request $request)
    {
        if ($request->isGet()) {
            dump($request->param('n'));
        }
    }
    /*
        点击量
     */
    public function videoClick(Request $request)
    {
        if ($request->isGet()) {
            if ($request->param('type')==1) {
                    $click=Db::table('video')->field('click')->where('id',$request->param('id'))->find();
                    $data['click']=$click['click']+1;
                    Db::table('video')->where('id',$request->param('id'))->update($data);
            }else{

            }
        }
    }
    /*
        文章
     */
    public function news(Request $request)
    {
        if ($request->isGet()) {
            $detail=Db::table('article')->find($request->param('id'));
           // dump($detail);
            $catename=Db::table('videocate')->where('type',(int)$detail['type'])->field('catename,rewriteurl')->find();
             $url='http://'.$_SERVER['HTTP_HOST'].'/news/'.$detail['id'].'.html';
             $this->assign(['adata'=>$detail,'catename'=>$catename,'seoTitle'=>$detail['title'],'seoImg'=>$detail['imgpath'],'seoUrl'=>$url,'active'=>99]);
            return $this->fetch('Index/article');
        }
    }
    /*
        列表
     */
    public function newlist(Request $request)
    {
        if ($request->isGet()) {
            $list=Db::table('article')->order('addtime')->where('type', (int)$request->param('c'))->paginate(20,false,['var_page' => 'p']);
             $catename=Db::table('videocate')->where('type',(int)$request->param('c'))->field('catename,rewriteurl')->find();
             $videow['is_delete']=1;
             $videow['type']=5;
             $video=Db::table('video')->order('addtime')->field('id,video_title,addtime,imgpath')->where($videow)->limit(10)->select();
             $articlet=Db::table('article')->order('clilcks')->limit(10)->select();
              $videow['type']=8;
             $videow=Db::table('video')->order('click')->field('id,video_title,addtime,imgpath')->where($videow)->limit(10)->select();
           
            $shar=controller('Share');
            $shardata=$shar->getShar($catename['rewriteurl']);
            $url='http://'.$_SERVER['HTTP_HOST'].'/'.$catename['rewriteurl'].'.html';
            $this->assign(['list'=>$list,'catename'=>$catename,'videodata'=>$video,'articlet'=>$articlet,'videow'=>$videow,'seoTitle'=>$shardata['title'],'seoImg'=>$shardata['img'],'seoUrl'=>$url,'active'=>(int)$request->param('c')]);
            return $this->fetch('Index/articles');
        }
    }
    /*
        拳手档案
     */
    public  function person(Request $request)
    {
        
        $detail=Db::table('person')->where('id',$request->param('id'))->find();
        $url='http://'.$_SERVER['HTTP_HOST'].'/person/'.$detail['id'].'.html';
        $this->assign(['detail'=>$detail,'seoTitle'=>'UFC-'.$detail['username'],'seoImg'=>$detail['imgpath'],'seoUrl'=>$url,'active'=>99]);
        return $this->fetch('Index/person');
    }
    
}

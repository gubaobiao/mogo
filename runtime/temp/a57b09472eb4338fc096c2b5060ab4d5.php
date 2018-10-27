<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:68:"/www/wwwroot/mogo/public/../application/index/view/Index/person.html";i:1540508086;s:56:"/www/wwwroot/mogo/application/index/view/Common/nav.html";i:1538153359;s:59:"/www/wwwroot/mogo/application/index/view/Common/footer.html";i:1530063832;}*/ ?>
<!DOCTYPE html>
<!-- saved from url=(0017)http://www.vs.cm/ -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf8">

    <title>UFC_<?php echo $detail['username']; ?></title>
    <meta name="description" content="UFC拳手排行,搏击视频资讯综合网,在线视频,无广告无需VIP,UFC视频全集,拳击,昆仑决赛事视频,MMA综合视频,拳击视频资讯,散打自由搏击泰拳">
    <meta name="keywords" content="UFC视频,泰拳视频,散打泰拳视频,MMA视频,散打比赛视频,自由搏击视频">
    <link rel="stylesheet" type="text/css" href="/static/Index/css/home.css">
    <link rel="stylesheet" type="text/css" href="/static/Index/css/header.css">
    <link rel="stylesheet" type="text/css" href="/static/Index/css/footer.css">
    <link rel="stylesheet" type="text/css" href="/static/Index/css/index.css">
    <link rel="stylesheet" type="text/css" href="/static/Index/css/player.css">
    <link rel="stylesheet" href="/static/Index/css/zzsc1.css">
    <script src="/static/Index/js/hm.js"></script>
    </script><script type="text/javascript" src="/static/Index/js/rich_ex.js"></script>
    <script type="text/javascript" async="" src="/static/Index/js/pr.js"></script>
    <script src="/static/Index/js/k.asp.js">
    </script><script src="/static/Index/js/jgai.js" type="text/javascript"></script>
    <script src="/static/Index/js/hd.js" type="text/javascript"></script>
    <style type="text/css">
        a{
            text-decoration: none;
            color: black;

        }
        a:hover{color:red;}
        body{
             background: white;
        }
		#video{
			
			width: 1004px;
			height: 560px;
			/*background: blue;*/
			margin:auto;
            /*margin-top: 30px;*/
            margin-bottom: 80px;
		}
        #title{
            width: 1004px;
            height: 80px;
            margin:auto;
            background: white;
        }
        .videonav{
            width: auto;
            height: 40px;
            line-height: 40px;
            padding-left: 10px;
        }
        .videodes{
            color: red;
            text-align:right;
            margin-top: 10px;
            margin-right: 10px;
        }
        .videonavl{
            float: left;
        }
        .videonavr{
             float: right;
             margin-right: 10px;
        }
        #clear{
            clear: both;
        }
    </style>
   </head>
<body>
<div id="content">

         <script>
(function(){
    var bp = document.createElement('script');
    var curProtocol = window.location.protocol.split(':')[0];
    if (curProtocol === 'https') {
        bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
    }
    else {
        bp.src = 'http://push.zhanzhang.baidu.com/push.js';
    }
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(bp, s);
})();
</script>  
<div id="header">
        <div class="top-level-ads">
            <div class="logo">
                <!-- <img src="/static/Index/img/logo.gif" alt="VS网" border="0"> -->
            </div>
            <div class="a_top">
                <a href="http://www.vs.cm/ufc/" target="_blank">
                    <!-- <img src="/static/Index/img/ufcyg145.gif" alt="UFC预告" height="82" border="0"></a> -->
            </div>
        </div>
        <div class="banner">
            <div class="leftbanner"></div>

            <div class="middlebanner">
                <a href="http://www.vs.cm/">

                    <img id="header-logo" src="/static/Index/img/logo.png" alt="UFC">

                </a>

                <div class="search-box">
                    <form action="/search" method="get">
                        <input type="text" name="searchword" id="query" placeholder="请输入关键字                 &#8629;" value="" onfocus="if(this.value == &#39;Search UFC&#39;){this.value=&#39;&#39;;$(this).removeClass(&#39;prompt&#39;);}" autocomplete="off">
                    </form>

                </div>
            </div>

            <div class="rightbanner"></div>
            <br style="clear: both;">
        </div>
        

 <div class="main_menu">
            <ul class="area">
            <li><a href="<?php echo \think\Config::get('host'); ?>" target="_self" title="首页" 
            id="<?php if($active == 0): ?>activeheader<?php endif; ?>">首页</a></li>
            <?php if(is_array($cate) || $cate instanceof \think\Collection || $cate instanceof \think\Paginator): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li><a href="/<?php echo $vo['rewriteurl']; ?>.html" target="_self" title="<?php echo $vo['catename']; ?>"
                id="<?php if($active == $vo['type']): ?>activeheader<?php endif; ?>"><?php echo $vo['catename']; ?></a></li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
                <!-- <li><a href="http://www.vs.cm/Bellator/" target="_self" title="Bellator">Bellator</a></li>
                <li><a href="http://www.vs.cm/one/" target="_self" title="ONE">ONE</a></li>
                <li><a href="http://www.vs.cm/china/" target="_self" title="国内赛事">国内赛事</a></li>
                <li><a href="http://www.vs.cm/lfa/" target="_self" title="LFA">LFA</a></li>
                <li><a href="http://www.vs.cm/TUF/" target="_self" title="TUF选拔赛">TUF选拔赛</a></li>
                <li><a href="http://www.vs.cm/RUFF/" target="_self" title="RUFF">RUFF</a></li>
                <li><a href="http://www.vs.cm/boxing/" target="_self" title="拳击">拳击</a></li>
                <li><a href="http://www.vs.cm/mmazxss/" target="_self" title="MMA单场">MMA单场</a></li>
                <li><a href="http://www.vs.cm/mmajj/" target="_self" title="MMA集锦">MMA集锦</a></li> -->

            </ul>
            <!--1级end-->
</div>
  <!--  <div class="main_menu">
            <ul class="area">
                <li><a href="http://www.vs.cm/bamma/" target="_self" title="BAMMA">BAMMA</a></li>
                <li><a href="http://www.vs.cm/rfa/" target="_self" title="RFA">RFA</a></li>
                <li><a href="http://www.vs.cm/ifc/" target="_self" title="Invicta女子赛">Invicta女子赛</a></li>
                <li><a href="http://www.vs.cm/wsof/" target="_self" title="WSOF">WSOF</a></li>
                <li><a href="http://www.vs.cm/ksw/" target="_self" title="KSW">KSW</a></li>
                <li><a href="http://www.vs.cm/glory/" target="_self" title="Glory">Glory</a></li>
                <li><a href="http://www.vs.cm/legacyfc/" target="_self" title="Legacy">Legacy</a></li>
                <li><a href="http://www.vs.cm/road/" target="_self" title="RoadFC">RoadFC</a></li>
                <li><a href="http://www.vs.cm/m1/" target="_self" title="M-1">M-1</a></li>
                <li><a href="http://www.vs.cm/Rizin/" target="_self" title="Rizin">Rizin</a></li>
                <li><a href="http://www.vs.cm/Strikeforce/" target="_self" title="SFC">SFC</a></li>
                <li><a href="http://www.vs.cm/cage/" target="_self" title="CAGE">CAGE</a></li>
                <li><a href="http://www.vs.cm/tfc/" target="_self" title="TFC">TFC</a></li>
                <li><a href="http://www.vs.cm/K-1/" target="_self" title="k-1">k-1</a></li>
                <li><a href="http://www.vs.cm/mmazz/" target="_self" title="MMA杂志">MMA杂志</a></li>

            </ul>
           
        </div>
            -->
       
    </div>

       
	<div class="ufc-xsxq">
    <h3 class="xsxq-tit">选手信息</h3>
    <div class="xsxq-con">
    <div class="con-xstx"><img src="<?php echo $detail['imgpath']; ?>"></div>
    <div class="con-xsxx">
        <h3 class="xsxx-name"><?php echo $detail['username']; ?></h3>
        <ul>
            <li><span>国家：<?php echo $detail['country']; ?></span></li>
            <li><span>年龄：<?php echo $detail['age']; ?></span></li>
                        <li><span>身高：<?php echo $detail['height']; ?></span></li>
                                    <li><span>体重：<?php echo $detail['weight']; ?></span></li>
                        <li><span>战绩：<?php echo $detail['record']; ?></span></li>
            <li><span>优势：<?php echo $detail['advantage']; ?></span></li>
        </ul>
    </div>
    </div>



    <dl class="xsxq-mark" style="display:none;">
        <dd><a href="javascript:;">新闻</a></dd>
        <dd><a href="javascript:;" class="mkon">图片</a></dd>
        <dd><a href="javascript:;">视频</a></dd>
    </dl>
</div>

      
        <div id="footer">
                    <div class="footer-inner-home">

                        <div class="section4">
                            <div id="ufc-affiliates" class="sites floatl">
                              <!--   <a href="http://www.vs.cm/mma/" id="btn-ufc" class="floatl">
                                    <img src="/static/Index/img/mmadblogo.gif" alt="MMA"></a>
                                <a href="http://www.vs.cm/ufc/" id="btn-tuf" class="floatl">
                                    <img src="/static/Index/img/ufcdblogo.gif" alt="UFC"></a>
                                <a href="http://www.vs.cm/Bellator/" id="btn-pride" class="floatl">
                                    <img src="/static/Index/img/bellatordblogo.gif" alt="bellator"></a> -->
                            </div>
                            <div class="copyright floatl">
                <span style="color: #B6B6B6">关于我们：本站汇集UFC,散打,WWe摔跤,拳击,泰拳等综合搏击视频资讯!本站无需VIP,视频播放无广告！站长qq：1693509008&nbsp;&nbsp;<!-- 蜀ICP备10201341号-11  友情链接:<a href="http://www.qjhm.net/" target="_blank"><span style="color: #B6B6B6">拳击航母</span></a> <a href="http://www.shuaijiao.com/" target="_blank"><span style="color: #B6B6B6">wwe摔角网</span></a> <a href="http://www.100shuai.com/" target="_blank"><span style="color: #B6B6B6">wwe</span></a> <a href="http://www.vs.cm/" target="_blank"><span style="color: #B6B6B6">ufc</span></a>
 -->
               </span>
                  </div>
                </div>
                </div>
</div>
<script>
window._bd_share_config={
    "common":{
            bdText : '<?php echo $seoTitle; ?>', 
            bdDesc : '<?php echo $seoTitle; ?>',    
            bdUrl : '<?php echo $seoUrl; ?>',     
            bdPic : '<?php echo $seoImg; ?>',     
    },
    "slide":{"type":"slide","bdImg":"0","bdPos":"right","bdTop":"250"},
    "image":{"viewList":["qzone","tsina","tqq","weixin","renren","tieba","copy","youdao","bdysc"],
    "viewText":"分享到：","viewSize":"16"},
    "selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","weixin","renren","tieba","copy","youdao","bdysc"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
</script>
    <!-- <script>
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "//hm.baidu.com/hm.js?34e1317f0014e85a9bbb65e636d6e48a";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script> -->

    <!-- <script>
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?23d5da3923987c7d7f21afb3ae1bb3ad";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script> -->


</div>
<script type="text/javascript">
function click(id,type){
    $.ajax({
        type: 'get',
        url: "<?php echo \think\Config::get('host'); ?>/click",
        data: {
            id:id,
            type:type
        },
        dataType: 'json',
        success: function(data){
            //console.log('Ajaxhits成功');
        },
        error:function(data){
            //console.log('Ajaxhits异常！');
        }
    });
}
var id=$('#videoid').val();
window.onload=click(id,1);
</script>
</body></html>
<?php
namespace app\Back\controller;


use think\Controller;

class Index extends Controller
{
   /*
    * 首页
    */
    public function index()
    {
          //判断要不要直接打开内嵌的页面
        $tabUrl = trim(input('tab'));
        $tabName = trim(input('tab_name'));
        $script = '';
        if(!empty($tabUrl)) {
            $script = '<script>tabs("' . U($tabUrl) . '","' . U($tabUrl) . '", "' . $tabName . '")</script>';
        }

      return view();
    }
    /*
     * 主页面main
     */
    public function home()
    {
    	return view();
    }
}

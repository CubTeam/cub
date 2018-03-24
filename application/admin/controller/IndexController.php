<?php
namespace app\admin\controller;
use app\admin\controller\Common;

class IndexController extends Common
{
    public function index()
    {
        //主体框架
        return view();
    }

    public function main()
    {
        //iframe页面
        return view();
    }
    //导航数据接口（测试）
    function json(){
        $arr = array(
            'contentManagement'=>[[
                "title"=>"文章列表",
                "icon"=>"icon-text",
                "href"=>"page/news/newsList.html",
                "spread"=>false
                                ],[
                "title"=>"文表",
                "icon"=>"icon-text",
                "href"=>"page/news/newsList.html",
                "spread"=>false
                                ]],
            'pic'=>2,
            'size'=>3
            );
    return json($arr);
    }
}

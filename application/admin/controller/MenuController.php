<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use app\admin\model\MenuModel;

class MenuController extends Common
{
    public function index()
    {
        $a=new MenuModel;
        $aa=$a->list();
        return json($aa);
    }

    //导航数据接口（测试）
    public function nav(){
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

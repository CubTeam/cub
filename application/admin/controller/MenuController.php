<?php
//auth:三石兄
//time:2018.3.28
//title:后台菜单
namespace app\admin\controller;
use app\admin\controller\Common;
use app\admin\model\MenuModel;

class MenuController extends Common
{
    public function index()
    {
       return view();
    }

    //菜单列表数据
    public function select()
    {
      $result = new MenuModel;
      $data = $result->select();
      $count = count($data);
      return json(['code' =>0,'msg' = >'','count' => $count,$data[{}]])
    }
    //添加菜单
    public function add()
    {
      echo 'asd';
    }

    //后台菜单数据接口
    public function nav()
    {
        //调用menu模型
       $result=new MenuModel;
       $data=$result->list();
       return json($data);
    }

}

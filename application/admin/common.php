<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
class Common extends Controller


{
    public function initialize(){

     if(!session('admin_id') || !session('admin_name')){
        $this->error('您尚未登录系统',url('login/index'));
     }


    }


}

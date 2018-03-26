<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\AdminModel;

//登陆模块
class LoginController extends Controller
{
    public function index()
    {
        if(request()->isPost()){
            //验证验证码
            $check=$this->check(input('code'));
            if($check==500){
                //验证码错误
                return 500;
            }
            $data=input('param.');
            $admin=new AdminModel();
            $num=$admin->login($data);
            //验证账号
            switch ($num) {
                case '404':
                //账号不存在
                    return 404;
                    break;
                case '505':
                //密码错误
                    return 505;
                    break;
                case '200':
                //登陆成功
                    return 200;
                    break;
            }

        }
        return view();
    }


    // 验证码检测
    function check($code='')
    {
        if (!captcha_check($code)) {
           return 500;
        } else {
           return 200;
        }
    }

}

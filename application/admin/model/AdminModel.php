<?php
namespace app\admin\model;
use think\Model;
class AdminModel extends Model
{

   public function addadmin($data){
    if(empty($data) || !is_array($data)){
        return false;
    }
    if($data['password']){
        $data['password']=md5($data['password']);
    }
    $adminData=array();
    $adminData['name']=$data['name'];
    $adminData['password']=$data['password'];
    if($this->save($adminData)){
        $groupAccess['uid']=$this->id;
        $groupAccess['group_id']=$data['group_id'];
        db('auth_group_access')->insert($groupAccess);
        return true;
    }else{
        return false;
    }

   }

   public function getadmin(){
    return $this::paginate(5,false,[
        'type'=>'boot',
        'var_page' => 'page',
        ]);
   }

   public function saveadmin($data,$admins){
        if(!$data['name']){
            return 2;//管理员用户名为空
        }
        if(!$data['password']){
            $data['password']=$admins['password'];
        }else{
            $data['password']=md5($data['password']);
        }
        db('auth_group_access')->where(array('uid'=>$data['id']))->update(['group_id'=>$data['group_id']]);
        return $this::update(['name'=>$data['name'],'password'=>$data['password']],['id'=>$data['id']]);

    }

    public function deladmin($id){
        if($this::destroy($id)){
            return 1;
        }else{
            return 2;
        }
    }

    public function login($data){
        $admin=new AdminModel;
        $result=$admin->getByName($data['name']); //查询name字段中有没有这个值存在
        if(!$result){
             return 404; //用户不存在的情况
        }
        if($result['password']==md5($data['password'])){
                session('admin_id', $result['id']);
                session('admin_name', $result['name']);
                return 200; //登录密码正确的情况
        }else{
                return 505; //登录密码错误
        }


    }






}

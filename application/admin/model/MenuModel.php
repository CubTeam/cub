<?php
//auth:三石兄
//time:2018.3.28
//title:后台菜单数据处理
//note: 这里的代码都是根据自己想法写的，感觉写的有点复杂了，先这样写着，等写菜单管理模块的时候借鉴别人的代码后再考虑优化或者重写
namespace app\admin\model;
use think\Model;
class MenuModel extends Model
{

public function list(){
        $result = MenuModel::all(); //获取所有菜单数据
        $class = MenuModel::field('father')->group('father')->select(); //获取顶级菜单
        $array=array();
        $array_is=array();
        //循环获取顶级菜单下的一级菜单
        foreach ($class as $value) {
          foreach($result as $val){
            if($val['father']!=$value['father']){
              continue;
            }
            if($val['parent_id']!=0){
              $array_is[]=$this->son($val);
              continue;
            }
            $arr[]=$this->is($val);
          }
          $array[$value['father']]=$arr;
          unset($arr);
        }
        //获取一级菜单下面的子菜单
        $result=$this->merge($array,$array_is);
        return $result;
      }

public function son($val){
  //处理子菜单的数组格式
        $arr=array(
                'title' => $val['name'],
                'icon' => $val['icon'],
                'href' => '/' . $val['app'] . '/' . $val['controller'] . '/' . $val['action'].'.html',
                'spread' => false,    //是否展开显示
                'cid' => $val['parent_id'],   //菜单id,用来辨识父子级
              );
       return $arr;
      }

public function is($val){
  //处理顶级菜单的数组格式
       $arr=array(
                'title' => $val['name'],
                'icon' => $val['icon'],
                'href' => '/' . $val['app'] . '/' . $val['controller'] . '/' . $val['action'].'.html',
                'spread' => false,
                'cid' => $val['id'],
              );
       return $arr;
  }

//合并子级菜单到顶级菜单中
public function merge($arr,$val){
        foreach($val as $val){   //被合并的子级菜单
          foreach ($arr as $key => $value) {  //顶级菜单
            foreach ($value as $k => $v) {  //一级菜单
              if($v['cid']!=$val['cid']){
                continue;
              }
              $arr[$key][$k]['children'][]=$val;
            }
          }
        }
        return $arr;
  }

}

<?php
namespace app\admin\model;
use think\Model;
class MenuModel extends Model
{

public function list(){
        $result = MenuModel::all();
        $class = MenuModel::field('father')->group('father')->select();
        $array=array();
        foreach ($class as $value) {
          foreach($result as $val){
            if($val['father']==$value['father']){
              $arr[]=array(
                'title' => $val['name'],
                'icon' => $val['icon'],
                'href' => '/' . $val['app'] . '/' . $val['controller'] . '/' . $val['action'].'.html',
                'spread' => 'false',
              );
            }
          }
          $array[$value['father']]=$arr;
          unset($arr);
        }
        dump($array);
        die;
        }
        return $array;
    }


}

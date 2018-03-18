<?php
/**
 * Created by helloJiu.
 * Idea: 认真编码 快乐生活
 * Date: 2018/3/18
 * Time: 9:50
 */

namespace app\api\controller;


use app\api\model\Menu;
use app\lib\exception\MissException;

class MenuController extends BaseController
{
    public function getMenus()
    {
        $menus = Menu::with('img')->select();
        if(empty($menus)){
            throw new MissException([
                'msg' => '还没有任何类目',
                'errorCode' => 50000
            ]);
        }
        return $menus;
    }
}
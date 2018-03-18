<?php
/**
 * Created by helloJiu.
 * Idea: 认真编码 快乐生活
 * Date: 2018/3/18
 * Time: 12:01
 */

namespace app\api\controller;


use app\api\model\Msg;
use think\Request;

class MsgController extends BaseController
{
    public function getList(Request $request){
        $input = $request->param();
        return Msg::getList();
    }

    public function add(Request $request){
        return [
            'status' => 1,
            'code' => 'haha',
            'money' => 1.2,
        ];
    }

    public function saveImg(){
        return $_FILES;
    }
}
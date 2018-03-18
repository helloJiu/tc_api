<?php
/**
 * Created by helloJiu.
 * Idea: 认真编码 快乐生活
 * Date: 2018/3/18
 * Time: 9:55
 */

namespace app\api\model;


class Msg extends BaseModel
{
    protected $autoWriteTimestamp = true;

    protected $table = 'msg';

    public function user(){
        return $this->hasOne('User', 'id', 'user_id');
    }

    public function menu(){
        return $this->hasOne('Menu', 'menu_id', 'menu_id');
    }

    public function imgs(){
        return $this->belongsToMany('Image', 'msg_img', 'img_id', 'msg_id');
    }

    public static function getList(){
        $page_size = request()->param('pagesize');
        $data = static::with('user,menu,imgs')->paginate($page_size);
        foreach ($data as $item){
            if(!empty($item->imgs)){
                $item->imgs = $item->imgs->column('url');
            }
        }
        return $data;
    }


}
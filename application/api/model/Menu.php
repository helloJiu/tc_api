<?php
/**
 * Created by helloJiu.
 * Idea: 认真编码 快乐生活
 * Date: 2018/3/18
 * Time: 9:50
 */

namespace app\api\model;


class Menu extends BaseModel
{
    protected $autoWriteTimestamp = true;

    protected $table = 'menu';

    public function msg()
    {
        return $this->hasMany('Msg', 'msg_id', 'msg_id');
    }

    public function img()
    {
        return $this->belongsTo('Image', 'img_id', 'img_id');
    }

    public static function getCategories($ids)
    {
        $categories = self::with('products')
            ->with('products.img')
            ->select($ids);
        return $categories;
    }

    public static function getCategory($id)
    {
        $category = self::with('products')
            ->with('products.img')
            ->find($id);
        return $category;
    }
}
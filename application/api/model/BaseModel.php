<?php
/**
 * Created by 七月.
 * Author: 七月
 * 微信公号：小楼昨夜又秋风
 * 知乎ID: 七月在夏天
 * Date: 2017/2/19
 * Time: 2:42
 */

namespace app\api\model;


use think\Model;
use traits\model\SoftDelete;

class BaseModel extends Model
{

    public function getCreateAtAttr($value, $data)
    {
        return date('Y-m-d H:i:s', $value);
    }

    public function getUpdateAtAttr($value, $data)
    {
        return date('Y-m-d H:i:s', $value);
    }

    protected function  prefixImgUrl($value, $data){
        $finalUrl = $value;
        if($data['from'] == 1){
            $finalUrl = config('setting.img_prefix').$value;
        }
        return $finalUrl;
    }

}
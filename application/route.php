<?php
/**
 * 路由注册
 *
 * 以下代码为了尽量简单，没有使用路由分组
 * 实际上，使用路由分组可以简化定义
 * 并在一定程度上提高路由匹配的效率
 */

// 写完代码后对着路由表看，能否不看注释就知道这个接口的意义
use think\Route;

//Sample
Route::get('api/sample/:key', 'api/Sample/getSample');
Route::post('api/sample/test3', 'api/Sample/test3');

//Miss 404
//Miss 路由开启后，默认的普通模式也将无法访问
//Route::miss('api/v1.Miss/miss');

//Banner
Route::get('api/banner/:id', 'api/Banner/getBanner');

//Theme
// 如果要使用分组路由，建议使用闭包的方式，数组的方式不允许有同名的key
//Route::group('api/theme',[
//    '' => ['api/Theme/getThemes'],
//    ':t_id/product/:p_id' => ['api/Theme/addThemeProduct'],
//    ':t_id/product/:p_id' => ['api/Theme/addThemeProduct']
//]);

Route::group('api/theme',function(){
    Route::get('', 'api/Theme/getSimpleList');
    Route::get('/:id', 'api/Theme/getComplexOne');
    Route::post(':t_id/product/:p_id', 'api/Theme/addThemeProduct');
    Route::delete(':t_id/product/:p_id', 'api/Theme/deleteThemeProduct');
});

//Route::get('api/theme', 'api/Theme/getThemes');
//Route::post('api/theme/:t_id/product/:p_id', 'api/Theme/addThemeProduct');
//Route::delete('api/theme/:t_id/product/:p_id', 'api/Theme/deleteThemeProduct');

//Product
Route::post('api/product', 'api/Product/createOne');
Route::delete('api/product/:id', 'api/Product/deleteOne');
Route::get('api/product/by_category/paginate', 'api/Product/getByMenuController');
Route::get('api/product/by_category', 'api/Product/getAllInCategory');
Route::get('api/product/:id', 'api/Product/getOne',[],['id'=>'\d+']);
Route::get('api/product/recent', 'api/Product/getRecent');

//Category
Route::get('api/menu', 'api/MenuController/getMenus');
Route::get('api/msg', 'api/MsgController/getList');
Route::post('api/send-msg', 'api/MsgController/add');
Route::post('api/msg/img-save', 'api/MsgController/saveImg');

// 正则匹配区别id和all，注意d后面的+号，没有+号将只能匹配个位数
//Route::get('api/category/:id', 'api/MenuController/getMenuController',[], ['id'=>'\d+']);
//Route::get('api/category/:id/products', 'api/MenuController/getMenuController',[], ['id'=>'\d+']);
Route::get('api/category/all', 'api/MenuController/getAllCategories');

//Token
Route::post('api/token/user', 'api/Token/getToken');

Route::post('api/token/app', 'api/Token/getAppToken');
Route::post('api/token/verify', 'api/Token/verifyToken');

//Address
Route::post('api/address', 'api/Address/createOrUpdateAddress');
Route::get('api/address', 'api/Address/getUserAddress');

//Order
Route::post('api/order', 'api/Order/placeOrder');
Route::get('api/order/:id', 'api/Order/getDetail',[], ['id'=>'\d+']);
Route::put('api/order/delivery', 'api/Order/delivery');

//不想把所有查询都写在一起，所以增加by_user，很好的REST与RESTFul的区别
Route::get('api/order/by_user', 'api/Order/getSummaryByUser');
Route::get('api/order/paginate', 'api/Order/getSummary');

//Pay
Route::post('api/pay/pre_order', 'api/Pay/getPreOrder');
Route::post('api/pay/notify', 'api/Pay/receiveNotify');
Route::post('api/pay/re_notify', 'api/Pay/redirectNotify');
Route::post('api/pay/concurrency', 'api/Pay/notifyConcurrency');

//Message
Route::post('api/message/delivery', 'api/Message/sendDeliveryMsg');



//return [
//        'banner/[:location]' => 'api/Banner/getBanner'
//];

//Route::miss(function () {
//    return [
//        'msg' => 'your required resource are not found',
//        'error_code' => 10001
//    ];
//});




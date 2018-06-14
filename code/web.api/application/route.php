<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    '__pattern__' => [
        'name' => '\w+',
    ],

    // 接口
    '[api/tutu/v1]'       => [
        '/apiTest'              => ['tutu/index/apiTest'],               // 接口测试，没有特殊用途
        '/apiGetPassword'       => ['tutu/index/apiGetPassword'],        // 获取指定加密后的密文密码
        
        // 资源相关接口
        '/apiResourcesCreateInfo'       => ['tutu/Resources/apiCreateInfo'],        // 创建
        '/apiResourcesUpdateInfo'       => ['tutu/Resources/apiUpdateInfo'],        // 更新
        '/apiResourcesGetInfoById'      => ['tutu/Resources/apiGetInfoById'],       // 获取信息
        '/apiResourcesDeleteInfoById'   => ['tutu/Resources/apiDeleteInfoById'],    // 删除
        '/apiResourcesFetchInfoList'    => ['tutu/Resources/apiFetchInfoList'],     // 获取列表信息

        
        // 其他相关接口
        '/apiWxDecodeData'          => ['tutu/Weixin/apiWxDecodeData'],                      // 微信小程序数据解密
        '/apiGetWxUserInfo'         => ['tutu/Weixin/apiGetWxUserInfo'],                     // 微信公众号用户信息
    ],

    // 后台接口
    '[api/tutu/v1/admin]' => [
        '/apiLogin'                 => 'admin/Login/apiLogin',                                      // 微课后台登陆接口
        '/getQiniuUploadfileToken'  => 'admin/ResourcesUtils/getQiniuUploadfileToken',              // 微课后台获取七牛上传令牌接口
    ]
];

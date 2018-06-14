<?php
namespace app\tutu\controller;

class Index
{
    public function index(){
        return 'tutu-index';
    }

    /**
     * 接口测试没有实际意义
     *
     * @return void
     */
    public function apiTest(){
        $data = [
            ['nickname'=>1,'user'=>2],
            ['nickname'=>1,'user'=>2],
            ['nickname'=>1,'user'=>2],
            ['nickname'=>1,'user'=>2],
            ['nickname'=>1,'user'=>2],
            ['nickname'=>1,'user'=>2],
        ];
        return $this->returnJson(true, 10000, '成功', $data);
    }
    
    /**
     * 获取加密后的密码
     *
     * @return void
     */
    public function apiGetPassword(){
        $pwd  = $this->request->param('pwd', '');
        $salt = SystemUtils::generateSalt();
        $data = [
            'newpwd' => SystemUtils::generatePasswrod($pwd, $salt),
            'salt'   => $salt,
        ];
        return $this->returnJson(true, 1000, '成功', $data);
    }
}

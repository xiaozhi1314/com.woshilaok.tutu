<?php
namespace app\common\utils;

class MessageCode {

    /* MC:message code */
    const MC_GENERAL_SUCCESS                = 10000;
    const MC_GENERAL_ERROR                  = 10001;
    const MC_GENERAL_EXCEPTION              = 10002;
    const MC_GENERAL_THIRDPARTY             = 10003;
    const MC_GENERAL_FUNCTION_EXISTS        = 10004;

    const MC_GENERAL                        = 20000;    // 通用错误
    const MC_GENERAL_ACCOUNT_EMPTY          = self::MC_GENERAL + 1;
    const MC_GENERAL_ACCOUNT_TYPE_ERROR     = self::MC_GENERAL + 2;
    const MC_GENERAL_VERIFYCODE_EMPTY       = self::MC_GENERAL + 3;
    const MC_GENERAL_VERIFYCODE_USED        = self::MC_GENERAL + 4;
    const MC_GENERAL_VERIFYCODE_EXPIRED     = self::MC_GENERAL + 5;
    const MC_GENERAL_VERIFYCODE_NOT_EXISTS  = self::MC_GENERAL + 6;
    const MC_GENERAL_UUID_EMPTY             = self::MC_GENERAL + 7;
    const MC_GENERAL_THIRDUSER_NOT_BINDING  = self::MC_GENERAL + 8;
    const MC_GENERAL_THIRDUSER_IS_BINDING   = self::MC_GENERAL + 9;
    const MC_GENERAL_UPLOADFILE_EMPTY       = self::MC_GENERAL + 10;
    const MC_GENERAL_USERID_EMPTY           = self::MC_GENERAL + 11;
    const MC_GENERAL_ACCOUNT_EXISTS         = self::MC_GENERAL + 12;
    const MC_GENERAL_TOKEN_EMPTY            = self::MC_GENERAL + 13;
    const MC_GENERAL_TOKEN_INVALID          = self::MC_GENERAL + 14;
    const MC_GENERAL_NAME_EMPTY             = self::MC_GENERAL + 15; // 名称为空
    const MC_GENERAL_NAME_EXISTS            = self::MC_GENERAL + 16; // 名称已存在
    const MC_GENERAL_ACCOUNT_NOT_EXISTS     = self::MC_GENERAL + 17;
    const MC_GENERAL_PASSWORD_NOT_CORRECT   = self::MC_GENERAL + 18;
    const MC_GENERAL_PASSWORD_EMPTY         = self::MC_GENERAL + 19;
    const MC_GENERAL_ID_EMPTY               = self::MC_GENERAL + 20;
    const MC_GENERAL_EXISTS                 = self::MC_GENERAL + 21;
    const MC_GENERAL_SEARCH_EMPTY           = self::MC_GENERAL + 22;
    const MC_GENERAL_REQUIRED_FIELD_MISSING = self::MC_GENERAL + 23;
    const MC_GENERAL_APPROVERING            = self::MC_GENERAL + 24; // 审批状态：审批中
    const MC_GENERAL_APPROVER_ERROR         = self::MC_GENERAL + 25; // 审批状态：审批失败
    const MC_GENERAL_APPROVER_SUCCESS       = self::MC_GENERAL + 26; // 审批状态：审批成功
    const MC_GENERAL_APPROVER_STATUS_INVALID= self::MC_GENERAL + 27; // 审批状态：审核状态无效
    const MC_GENERAL_PERMISSIONS_INVALID    = self::MC_GENERAL + 28; // 权限无效
    const MC_GENERAL_PERMISSIONS_NOT_ENOUGH = self::MC_GENERAL + 29; // 权限不足
    const MC_GENERAL_DATA_NOT_EXIST         = self::MC_GENERAL + 30; // 数据不存在
    const MC_GENERAL_NOT_LOGIN              = self::MC_GENERAL + 31; // 未登录
    const MC_GENERAL_EMAIL_EMPTY            = self::MC_GENERAL + 32; // 邮箱为空
    const MC_GENERAL_EMAIL_EXISTS           = self::MC_GENERAL + 33; // 邮箱已存在
    const MC_GENERAL_MOBILE_EMPTY           = self::MC_GENERAL + 34; // 手机为空
    const MC_GENERAL_MOBILE_EXISTS          = self::MC_GENERAL + 35; // 手机已存在
    const MC_GENERAL_INVITE_CODE_EMPTY      = self::MC_GENERAL + 36; // 邀请码为空
    const MC_GENERAL_INVITE_CODE_INVALID    = self::MC_GENERAL + 37; // 邀请码无效
    const MC_GENERAL_INVITE_CODE_USED       = self::MC_GENERAL + 38; // 邀请码已使用
    
    const MC_POST                           = 21000;    // 帖子相关错误
    const MC_POST_ID_EMPTY                  = self::MC_POST + 1;
    const MC_POST_PRAISE_EXISTS             = self::MC_POST + 2;
    const MC_POST_COLLECTION_EXISTS         = self::MC_POST + 3;
    const MC_POST_CONTENT_EMPTY             = self::MC_POST + 4;
    const MC_POST_NOT_PERMISSIONS_PUBLISH   = self::MC_POST + 5;

    const MC_PAY                            = 24000;
    const MC_PAY_GOODS_ID_EMPTY             = self::MC_PAY + 1;
    const MC_PAY_GOODS_TYPE_EMPTY           = self::MC_PAY + 2;
    const MC_PAY_GOODS_TYPE_INVALID         = self::MC_PAY + 3;
    const MC_PAY_GOODS_NAME_EMPTY           = self::MC_PAY + 4;
    const MC_PAY_GOODS_INVALID              = self::MC_PAY + 5;
    const MC_PAY_PLATFORM_INVALID           = self::MC_PAY + 6;
    const MC_PAY_ORDER_INVALID              = self::MC_PAY + 7;

    

    const MSG = [
        self::MC_GENERAL_SUCCESS               => '成功',
        self::MC_GENERAL_ERROR                 => '失败',
        self::MC_GENERAL_EXCEPTION             => '系统异常',
        self::MC_GENERAL_THIRDPARTY            => '第三方错误',
        self::MC_GENERAL_FUNCTION_EXISTS       => '此功能不存在',
        self::MC_GENERAL_ACCOUNT_EMPTY         => '账号为空',
        self::MC_GENERAL_ACCOUNT_TYPE_ERROR    => '账号类型错误',
        self::MC_GENERAL_VERIFYCODE_EMPTY      => '验证码为空',
        self::MC_GENERAL_VERIFYCODE_USED       => '验证码已使用',
        self::MC_GENERAL_VERIFYCODE_EXPIRED    => '验证码已过期',
        self::MC_GENERAL_VERIFYCODE_NOT_EXISTS => '验证码不存在',
        self::MC_GENERAL_UUID_EMPTY            => '第三方登录ID为空',
        self::MC_GENERAL_THIRDUSER_NOT_BINDING => '第三方账号未绑定',
        self::MC_GENERAL_THIRDUSER_IS_BINDING  => '第三方账号已绑定',
        self::MC_GENERAL_UPLOADFILE_EMPTY      => '上传文件为空',
        self::MC_GENERAL_USERID_EMPTY          => '用户ID为空',
        self::MC_GENERAL_ACCOUNT_EXISTS        => '账号已存在',
        self::MC_GENERAL_ACCOUNT_NOT_EXISTS    => '账号不存在',
        self::MC_GENERAL_TOKEN_EMPTY           => 'token为空',
        self::MC_GENERAL_TOKEN_INVALID         => 'token无效',
        self::MC_GENERAL_NAME_EMPTY            => '名称为空',
        self::MC_GENERAL_NAME_EXISTS           => '名称已存在',
        self::MC_GENERAL_PASSWORD_NOT_CORRECT  => '密码不正确',
        self::MC_GENERAL_PASSWORD_EMPTY        => '密码为空',
        self::MC_GENERAL_ID_EMPTY              => 'ID为空',
        self::MC_GENERAL_EXISTS                => '已存在',
        self::MC_GENERAL_SEARCH_EMPTY          => '搜索条件为空',
        self::MC_GENERAL_REQUIRED_FIELD_MISSING=> '必填字段缺失',
        
        self::MC_GENERAL_APPROVERING            => '请勿提交重复内容',   // 审批状态：审批中
        self::MC_GENERAL_APPROVER_ERROR         => '审批失败',          // 审批状态：审批失败
        self::MC_GENERAL_APPROVER_SUCCESS       => '审批成功',          // 审批状态：审批成功
        self::MC_GENERAL_APPROVER_STATUS_INVALID=> '审核状态无效',      // 审批状态：状态无效
        self::MC_GENERAL_PERMISSIONS_INVALID    => '权限无效',
        self::MC_GENERAL_PERMISSIONS_NOT_ENOUGH => '权限不足',
        self::MC_GENERAL_DATA_NOT_EXIST         => '数据不存在',
        self::MC_GENERAL_NOT_LOGIN              => '未登录',
        
        self::MC_GENERAL_EMAIL_EMPTY            => '邮箱为空',
        self::MC_GENERAL_EMAIL_EXISTS           => '邮箱已存在',
        self::MC_GENERAL_MOBILE_EMPTY           => '手机为空',
        self::MC_GENERAL_MOBILE_EXISTS          => '手机已存在',
        self::MC_GENERAL_INVITE_CODE_EMPTY      => '邀请码为空',    // 邀请码为空
        self::MC_GENERAL_INVITE_CODE_INVALID    => '邀请码无效',    // 邀请码无效
        self::MC_GENERAL_INVITE_CODE_USED       => '邀请码已使用',  // 邀请码已使用

        self::MC_POST_ID_EMPTY                 => '帖子ID为空',
        self::MC_POST_PRAISE_EXISTS            => '帖子已点赞',
        self::MC_POST_COLLECTION_EXISTS        => '帖子已收藏',
        self::MC_POST_CONTENT_EMPTY            => '帖子内容为空',
        self::MC_POST_NOT_PERMISSIONS_PUBLISH  => '没有发帖权限',
        
        self::MC_PAY_GOODS_ID_EMPTY            => '商品ID为空',
        self::MC_PAY_GOODS_TYPE_EMPTY          => '商品类型为空',
        self::MC_PAY_GOODS_TYPE_INVALID        => '商品类型无效',
        self::MC_PAY_GOODS_NAME_EMPTY          => '商品名为空',
        self::MC_PAY_GOODS_INVALID             => '商品无效',
        self::MC_PAY_PLATFORM_INVALID          => '支付平台无效，请联系客户',
        self::MC_PAY_ORDER_INVALID             => '订单创建失败',
         
    ];


    /**
     * 获取提示信息
     *
     * @param integer $code
     * @return void
     */
    public static function getMessageByCode($code){
        return self::MSG[$code] ?? '未知错误码';
    }
}
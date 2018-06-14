<?php
namespace app\common\model;

use think\Db;
use think\Config;
use app\common\utils\SystemUtils;

class UserModel extends BaseModel
{
    const tableName = 'tt_user';
    const field = 'id,nickname,mobile,email,password,salt,amount,portrait,gender,address,signature,createtime,updatetime,status';
    const order = 'id desc';

    /**
     * 判断账号是否存在
     *
     * @param integer $type
     * @param string  $account
     * @return boolean true存在 false不存在
     */
    public static function isExistsById($id){
        try{
            $where = [
                'id'    => $id
            ];
            return !empty(Db::name(static::tableName)->field(static::field)->order(static::order)->where($where)->find());
        }catch(Exception $e){
            return true;
        }
    }

    /**
     * 判断账号是否存在
     *
     * @param integer $type
     * @param string  $account
     * @return boolean true存在 false不存在
     */
    public static function isExistsByTypeAndAccount($type, $account){
        try{
            $where = [];
            switch($type){
                case self::DT_MEMBER_ACCOUNT_MOBILE:
                    $where['mobile'] = $account;
                    break;
                case self::DT_MEMBER_ACCOUNT_EMAIL:
                    $where['email']  = $account;
                    break;
                case self::DT_MEMBER_ACCOUNT_NONE:
                default;
                    return true;
                    break;
            }
            return !empty(Db::name(static::tableName)->field(static::field)->order(static::order)->where($where)->find());
        }catch(Exception $e){
            return true;
        }
    }

    /**
     * 判断手机号是否存在
     *
     * @param string $mobile
     * @return boolean true存在 false不存在
     */
    public static function isExistsByMobile($mobile){
        try{
            $where = [
                'mobile'  => $mobile
            ];
            return !empty(Db::name(static::tableName)->field(static::field)->order(static::order)->where($where)->find());
        }catch(Exception $e){
            return true;
        }
    }

    /**
     * 判断邮箱是否存在
     *
     * @param string $email
     * @return boolean true存在 false不存在
     */
    public static function isExistsByEmail($email){
        try{
            $where = [
                'email'  => $email
            ];
            return !empty(Db::name(static::tableName)->field(static::field)->order(static::order)->where($where)->find());
        }catch(Exception $e){
            return true;
        }
    }
}
<?php
namespace app\common\model;

use think\Db;
use think\Config;
use app\common\utils\SystemUtils;

class TokenModel extends BaseModel
{
    const tableName = 'token';
    const field = 'userid,token,platform,deviceid,expiretime,createtime,updatetime';
    const order = 'id desc';

    /**
     * 获取信息
     *
     * @param string  $token
     * @return array
     */
    public static function getDataByToken($token){
        try{
            $where = [
                'token'   => $token,
                'status'  => self::DT_STATUS_ENABLE
            ];
            return Db::name(static::tableName)->field(static::field)->order(static::order)->where($where)->find();
        }catch(Exception $e){
            return [];
        }
    }
    
    
    /**
     * 获取信息
     *
     * @param string  $userId
     * @return array
     */
    public static function getDataByUserid($userId){
        try{
            $where = [
                'userid'   => $userId,
                'status'  => self::DT_STATUS_ENABLE
            ];
            return Db::name(static::tableName)->field(static::field)->order(static::order)->where($where)->find();
        }catch(Exception $e){
            return [];
        }
    }
}
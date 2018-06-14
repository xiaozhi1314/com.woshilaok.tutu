<?php
namespace app\common\model;

use think\Db;
use think\Config;
use app\common\utils\SystemUtils;

class ThirdUserModel extends BaseModel
{
    const tableName = 'tt_third_user';
    const field = 'id,userid,unionid,uuid,platform,createtime,updatetime';
    const order = 'id desc';

    /**
     * 获取数据
     *
     * @param integer $userId
     * @return array
     */
    public static function getDataByUserid($userId){
        try{
            $where = [
                'userid' => $userId,
                'status' => self::DT_STATUS_ENABLE
            ];
            return Db::name(static::tableName)->field(static::field)->where($where)->order(static::order)->find();
        }catch(Exception $e){
            return [];
        }
    }

    /**
     * 获取信息
     *
     * @param string  $unionid
     * @param string  $platform
     * @return array
     */
    public static function getDataByUnionidAndPlatform($unionid, $platform){
        try{
            $where = [
                'unionid'    => $unionid,
                'platform'   => $platform,
                'status'     => self::DT_STATUS_ENABLE
            ];
            return Db::name(static::tableName)->field(static::field)->order(static::order)->where($where)->find();
        }catch(Exception $e){
            return [];
        }
    }


    /**
     * 获取信息
     *
     * @param string  $uuid
     * @param string  $platform
     * @return array
     */
    public static function getDataByUuidAndPlatform($uuid, $platform){
        try{
            $where = [
                'uuid'       => $uuid,
                'platform'   => $platform,
                'status'     => self::DT_STATUS_ENABLE
            ];
            return Db::name(static::tableName)->field(static::field)->order(static::order)->where($where)->find();
        }catch(Exception $e){
            return [];
        }
    }
    
}
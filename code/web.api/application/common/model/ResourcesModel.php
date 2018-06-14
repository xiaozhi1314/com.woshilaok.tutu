<?php
namespace app\common\model;

use think\Db;
use think\Config;
use app\common\utils\SystemUtils;

class ResourcesModel extends BaseModel
{
    const tableName = 'resources';
    const field = '';
    const order = 'id desc';

    /**
     * 判断MD5是否存在
     *
     * @param string $md5
     * @return boolean true存在 false不存在
     */
    public static function isExistsByMd5($md5){
        try{
            $where = [
                'md5'    => $md5
            ];
            return !empty(Db::name(static::tableName)->field(static::field)->order(static::order)->where($where)->find());
        }catch(Exception $e){
            return true;
        }
    }

    /**
     * 判断SHA1是否存在
     *
     * @param string $sha1
     * @return boolean true存在 false不存在
     */
    public static function isExistsBySha1($sha1){
        try{
            $where = [
                'sha1'    => $sha1
            ];
            return !empty(Db::name(static::tableName)->field(static::field)->order(static::order)->where($where)->find());
        }catch(Exception $e){
            return true;
        }
    }

    /**
     * 获取信息列表
     *
     * @param string  $search   搜索条件
     * @param integer $page     页码
     * @param integer $pageSize 页大小
     * @return array
     */
    public static function fetchInfoListBySearch($search, $page=self::DT_PAGE, $pageSize=self::DT_PAGE_SIZE){
        try{
            $where = [
                'sha1|md5|uri' => ['like', '%'.$search.'%'],
                'status'        => self::DT_STATUS_ENABLE
            ];
            $order = 'createtime desc, id desc';
            return Db::name(static::tableName)->field(static::field)->order($order)->where($where)->page($page, $pageSize)->select();
        }catch(Exception $e){
            return [];
        }
    }

    /**
     * 获取信息列表总数
     *
     * @param string  $search   搜索条件
     * @return array
     */
    public static function getInfoListCountBySearch($search){
        try{
            $where = [
                'sha1|md5|uri' => ['like', '%'.$search.'%'],
                'status'        => self::DT_STATUS_ENABLE
            ];
            $order = 'createtime desc, id desc';
            return Db::name(static::tableName)->field(static::field)->order($order)->where($where)->count();
        }catch(Exception $e){
            return 0;
        }
    }
}
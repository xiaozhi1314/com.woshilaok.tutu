<?php
namespace app\common\model;

use think\Db;
use think\Model;

class BaseModel extends Model
{
    const tableName = '';
    const field     = '';
    const order     = '';

    // DTN: data table name
    const DTN_PREFIX                  = 'tt_';                 // 表前缀
    const DTN_RESOURCES               = 'resources';           // 资源表

    // DT: data table
    const DT_STATUS_ENABLE            = 1; // 启用
    const DT_STATUS_DISABLE           = 2; // 禁用
    const DT_STATUS_DELETE            = 3; // 删除

    const DT_PAGE                     = 1;
    const DT_PAGE_SIZE                = 10;
    const DT_PAGE_MAX_SIZE            = 1000;
    const DT_DEFAULT_RANK             = 1; // 默认排序序列
    const DT_USED_NOUSE               = 1; // 未使用
    const DT_USED_USED                = 2; // 已使用 
    
    const DT_POST_CATEGORY_ALL              = 0; // 所有帖子
    const DT_POST_CATEGORY_NONE             = 0; // 帖子未知
    const DT_POST_CATEGORY_ARTICLE          = 1; // 帖子文章
    const DT_POST_CATEGORY_VIDEO            = 2; // 帖子视频
    const DT_POST_CATEGORY_VIDEOCOLLECTION  = 3; // 帖子视频集
    const DT_POST_COLLECTION                = 1; // 收藏
    const DT_POST_DONT_COLLECTION           = 2; // 取消收藏
    const DT_POST_PUBLISH                   = 1; // 帖子发布
    const DT_POST_DELETE                    = 2; // 帖子删除
    const DT_POST_CATEGORY_LIKE             = 1; // 赞（喜欢）
    const DT_POST_CATEGORY_DISLIKE          = 2; // 踩（不喜欢）

    const DT_FANS_FOCUSON                   = 1; // 关注
    const DT_FANS_DONT_FOCUSON              = 2; // 取消关注
    
    const DT_FREE                           = 1; // 免费
    const DT_CHARGE                         = 2; // 收费

    const DT_APPROVERSTATUS_ALL             = 0; // 审批状态：所有
    const DT_APPROVERSTATUS_APPROVERING     = 1; // 审批状态：审批中
    const DT_APPROVERSTATUS_ERROR           = 2; // 审批状态：审批失败
    const DT_APPROVERSTATUS_SUCCESS         = 3; // 审批状态：审批成功
    const DT_APPROVERSTATUS_RESULT          = '免审批自动加入';  // 审批结果

    const DT_CERTIFICATION_NONE             = 0; // 认证类别：0：普通用户
    const DT_CERTIFICATION_PERSONAL         = 1; // 认证类别：1：个人圈主
    const DT_CERTIFICATION_PERSONALMEDIA    = 2; // 认证类别：2：个人媒体
    const DT_CERTIFICATION_MEDIA            = 3; // 认证类别：3：群媒体
    const DT_CERTIFICATION_INSTITUTIONS     = 4; // 认证类别：4：机构圈主

    const DT_GOODS_TYPE_NONE                = 0; // 商品类型：其他
    const DT_GOODS_TYPE_POST                = 1; // 商品类型：帖子
    const DT_GOODS_TYPE_QUESTION            = 2; // 商品类型：问题
    const DT_GOODS_TYPE_CLUB                = 3; // 商品类型：圈子
    const DT_GOODS_TYPE_TOPUP               = 4; // 商品类型：充值
    const DT_TRADING_INCOME                 = 1; // 交易类型：收入
    const DT_TRADING_PAYOUT                 = 2; // 交易类型：支出
    const DT_TRADING_TOPUP                  = 3; // 交易类型：充值
    const DT_TRADING_WITHDRAW               = 4; // 交易类型：提现
    const DT_PAYTYPE_ACCOUNT                = 1; // 支付方式：账户
    const DT_PAYTYPE_WEIXIN                 = 2; // 支付方式：微信
    const DT_PAYTYPE_ALIAPY                 = 3; // 支付方式：支付宝
    const DT_WITHDRAWAL_MODEL_BANK          = 1; // 提现方式：银行卡
    const DT_WITHDRAWAL_MODEL_WEIXIN        = 2; // 提现方式：微信
    const DT_TRADINGSTATUS_WAITING          = 1; // 交易状态：等待
    const DT_TRADINGSTATUS_COMPLETE         = 2; // 交易状态：完成
    const DT_TRADINGSTATUS_CLOSE            = 3; // 交易状态：关闭
    const DT_TRADINGSTATUS_DELETE           = 4; // 交易状态：删除

    const DT_STATISTICAL_NONE               = 0; // 统计类型：无
    const DT_STATISTICAL_YEARS              = 1; // 统计类型：年
    const DT_STATISTICAL_QUARTER            = 2; // 统计类型：季度
    const DT_STATISTICAL_MONTH              = 3; // 统计类型：月
    const DT_STATISTICAL_WEAKS              = 4; // 统计类型：周
    const DT_STATISTICAL_DAY                = 5; // 统计类型：天
    const DT_STATISTICAL_HOURS              = 6; // 统计类型：小时

    const DT_DEVICETYPE_ANDROID             = 1; // 设备类型：安卓
    const DT_DEVICETYPE_IOS                 = 2; // 设备类型：IOS

    const DT_LOG_INPUT                      = 1; // 传入数据
    const DT_LOG_OUTPUT                     = 2; // 返回数据

    /**
     * 新增数据
     *
     * @param array $data
     * @return integer 0：失败 >0： 成功（新增数据ID）
     */
    public static function addData($data){
        try{
            return Db::name(static::tableName)->insertGetId($data);
        }catch(Exception $e){
            return 0;
        }
    }

    /**
     * 新增多条数据
     *
     * @param array $data
     * @return boolean false：失败 true：成功
     */
    public static function addAllData($data){
        try{
            return Db::name(static::tableName)->insertAll($data) ? true : false;
        }catch(Exception $e){
            return false;
        }
    }

    /**
     * 删除数据
     *
     * @param integer $id
     * @return void
     */
    public static function deleteDataById($id){
        try{
            if(!empty($id)){
                return Db::name(static::tableName)->where(['id' => $id])->delete() ? true : false;
            }else{
                return false;
            }
        }catch(Exception $e){
            return false;
        }
    }

    /**
     * 更新信息(可以批量更新多个id逗号分隔或者数组)
     *
     * @param string/array $id
     * @param array  $data
     * @return boolean true:成功 false:失败
     */
    public static function updateDataById($id, $data){
        try{
            if(!empty($id)){
                if(is_array($id)){
                    $id = implode(',', $id);
                    return Db::name(static::tableName)->where(['id' => ['in', $id]])->update($data) ? true : false;
                }
                return Db::name(static::tableName)->where(['id' => $id])->update($data) ? true : false;
            }
            return false;
        }catch(Exception $e){
            return false;
        }
    }

    /**
     * 获取单条数据
     *
     * @param integer $id
     * @return array
     */
    public static function getDataById($id){
        try{
            $where = [
                'id' => $id,
                'status' => self::DT_STATUS_ENABLE
            ];
            return Db::name(static::tableName)->field(static::field)->where($where)->order(static::order)->find();
        }catch(Exception $e){
            return [];
        }
    }

    /**
     * 获取数据列表
     *
     * @param integer/array $ids
     * @return array
     */
    public static function getDataListByIds($ids){
        try{
            if(!empty($ids)){
                if(is_array($ids)){
                    $ids = implode(',', $ids);
                }
            }else{
                return [];
            }
            $where = [
                'id' => ['in', $ids],
                'status' => self::DT_STATUS_ENABLE
            ];
            return Db::name(static::tableName)->field(static::field)->where($where)->order(static::order)->select();
        }catch(Exception $e){
            return [];
        }
    }

    /**
     * 通过类型获取时间戳
     *
     * @param integer $type
     * @return void
     */
    public static function getTimestampByType($type){
        switch($type){
            case self::DT_STATISTICAL_TYPE_WEAKS:
                $timestamp = time();  
                return [  
                    'startTime' => strtotime(date('Y-m-d', strtotime("this week Monday", $timestamp))),  
                    'endTime'   => strtotime(date('Y-m-d', strtotime("this week Sunday", $timestamp))) + 24 * 3600 - 1  
                ]; 
                break;
            case self::DT_STATISTICAL_TYPE_DAY:
                return [  
                    'startTime' => mktime(0, 0, 0, date('m'), 1, date('Y')),  
                    'endTime'   => mktime(23, 59, 59, date('m'), date('t'), date('Y'))  
                ];
                break;
            case self::DT_STATISTICAL_TYPE_HOURS:
                return [  
                    'startTime' => mktime(0, 0, 0, date('m'), date('d'), date('Y')),  
                    'endTime'   => mktime(23, 59, 59, date('m'), date('d'), date('Y'))  
                ]; 
                break;
            case self::DT_STATISTICAL_TYPE_YEARS:
            case self::DT_STATISTICAL_TYPE_QUARTER:
            case self::DT_STATISTICAL_TYPE_MONTH:
            case self::DT_STATISTICAL_TYPE_NONE:
            default:
            return [];
            break;
        }
        return [];
    }
}
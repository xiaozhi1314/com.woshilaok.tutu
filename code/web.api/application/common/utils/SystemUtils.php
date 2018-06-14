<?php
namespace app\common\utils;

class SystemUtils {

    /**
     * 获取毫秒时间戳
     *
     * @return integer
     */
    public static function getMillisecond() { 
        list($s1, $s2) = explode(' ', microtime()); 
        return (float)sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000); 
    }

    /**
     * 获取指定时间的秒数
     * @param integer $time 指定时间
     *
     * @return void
     */
    public static function getSecondsByTime($time=0){
        return ( (60 * 60 * 24) * intval($time) );
    }

    /**
     * 获取时间戳
     *
     * @return integer
     */
    public static function getTimestamp() { 
        return intval(self::getMillisecond() / 1000);
    }

    /**
     * 格式化时间戳
     *
     * @param integer $timestamp
     * @param string $format
     * @return void
     */
    public static function formatTimestamp($timestamp=null, $format='Y-m-d H:i:s'){
        return date($format, $timestamp ?? self::getTimestamp());
    }

    /**
     * 生成Token
     *
     * @return string
     */
    public static function generateToken(){
        return md5(self::getMillisecond());
    }

    /**
     * 生成掩码
     *
     * @return string
     */
    public static function generateSalt(){
        return md5(self::getMillisecond());
    }

    /**
     * 获得唯一id
     *
     * @return integer
     */
    public static function getUniqid(){
        return sprintf('%02d%06d', mt_rand(0, 99), mt_rand(0, 999999));
    }

    /**
     * 获得订单id
     *
     * @return string
     */
    public static function getOrderId(){
        return md5(sprintf('%02d%06d', mt_rand(0, 99), mt_rand(0, 999999)));
    }
    
    /**
     * 生成密码
     *
     * @param string $password
     * @param string $salt
     * @return void
     */
    public static function generatePasswrod($password, $salt){
        return md5($password.$salt);
    }
    
    /**
     * 密码比较
     *
     * @param string $password 密码
     * @param string $encryPassword 加密后密码
     * @param string $salt 掩码
     * @return void
     */
    public static function comparePassword($password, $encryPassword, $salt){
        if(self::generatePasswrod($password, $salt) === $encryPassword){
            return true;
        }
        return false;
    }

    /**
     * 生成微信支付签名
     *
     * @param string $appid
     * @param string $nonceStr
     * @param string $package
     * @param string $timeStamp
     * @param string $key
     * @param string $signType (MD5和HMAC-SHA256)
     * @return void
     */
    public static function generateWeixinPaySign($appid, $nonceStr, $package, $timeStamp, $key, $signType='MD5'){
        $encodeData = "appId={$appid}&nonceStr={$nonceStr}&package={$package}&signType={$signType}&timeStamp={$timeStamp}&key={$key}";
        switch($signType){
            case 'MD5':
                return md5($encodeData);
                break;
            case 'HMAC-SHA256':
                return hash_hmac('sha256', $encodeData, $key);
                break;
            default:
                return md5($encodeData);
                break;
        }
        return md5($encodeData);
    }
}
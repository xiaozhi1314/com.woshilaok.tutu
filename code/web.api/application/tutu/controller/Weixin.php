<?php
namespace app\tutu\controller;

use think\Log;
use think\Config;
use think\Loader;
use app\common\controller\Base;
use app\common\utils\SystemUtils;
use app\common\utils\MessageCode;
use weixin\WxBizDataCrypt;

/**
 * 微信类
 */
class Weixin extends Base
{
    /**
     * 获取微信用户信息
     *
     * @return void
     */
    public function apiGetWxUserInfo(){
        $success = false;
        $code    = MessageCode::MC_GENERAL_ERROR;
        $name    = $this->request->param('name', '');   // 微信服务号的名字：zhidiao为默认  weike
        $jsCode  = $this->request->param('code', '');   // 微信服务号code码

        $wxUserInfo = [];
        $platformInfo = [];
        $wxServiceNoListInfo = Config::get('third_party_wx_mp');
        foreach($wxServiceNoListInfo as $wxServiceNoListKey => $wxServiceNoListItem){
            if($wxServiceNoListItem['type'] == $name){
                $platformInfo = $wxServiceNoListItem;
            }
        }
        if(!empty($platformInfo)){
            $wxAccessTokenInfo = $this->getWxAccessToken($platformInfo['appid'], $platformInfo['secret'], $jsCode);
            if(!empty($wxAccessTokenInfo)){
                $wxUserInfo = $this->getWxUserInfo($wxAccessTokenInfo['accesstoken'], $wxAccessTokenInfo['openid']);
                $success = true;
                $code    = MessageCode::MC_GENERAL_SUCCESS;
            }
        }
        $message = MessageCode::getMessageByCode($code);
        return $this->returnJson($success, $code, $message, $wxUserInfo); 
    }


    /**
     * 微信小程序数据解码
     *
     * @return void
     */
    public function apiWxDecodeData(){
        $success = false;
        $code    = MessageCode::MC_GENERAL_ERROR;
        $name    = $this->request->param('name', '');   // 微信小程序的名字：zhdiao为默认  weike
        $jsCode  = $this->request->param('code', '');   // 微信小程序code码

        $wxSmallroutine = [];
        $wxThirdPartyData = [];
        $wxMpList = Config::get('third_party_wx_mp');
        foreach($wxMpList as $wxMpKey => $wxMpItem){
            if($wxMpItem['type'] == $name){
                $wxSmallroutine = $wxMpItem;
            }
        }
        $wxThirdPartyData = $this->getWxCode($wxSmallroutine['appid'], $wxSmallroutine['secret'], $jsCode);
        if (!empty($wxThirdPartyData)) {
            $success = true;
            $code    = MessageCode::MC_GENERAL_SUCCESS;
            unset($wxThirdPartyData['session_key']);
        } else {
            $code = MessageCode::MC_GENERAL_THIRDPARTY;
        }
        
        $message = MessageCode::getMessageByCode($code);
        return $this->returnJson($success, $code, $message, $wxThirdPartyData);
    }

    /**
     * 微信小程序用户信息
     *
     * @param string $appid  微信appid
     * @param string $secret 微信secret
     * @param string $code   微信code码
     * @return void
     */
    protected function getWxCode($appid, $secret, $code){
        $url = 'https://api.weixin.qq.com/sns/jscode2session?appid=APPID&secret=SECRET&js_code=JSCODE&grant_type=authorization_code';
        $url = str_replace('APPID', $appid, $url);
        $url = str_replace('SECRET', $secret, $url);
        $url = str_replace('JSCODE', $code, $url);
        $reuslt = json_decode(self::requestNetwork($url), true);

        if(empty($reuslt['errcode'])){
            return $reuslt;
        }
        Log::record($reuslt, 'DEBUG');
        return [];
    }


    /**
     * 获取微信access_token
     *
     * @param string $appid  apid
     * @param string $secret secret
     * @param string $code   访问code
     * @return array
     */
    protected function getWxAccessToken($appid, $secret, $code){
        $url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid=APPID&secret=SECRET&code=CODE&grant_type=authorization_code';  //获取access_token
        $url = str_replace('APPID', $appid, $url);
        $url = str_replace('SECRET', $secret, $url);
        $url = str_replace('CODE', $code, $url);
        $reuslt = json_decode(self::requestNetwork($url), true);

        if(empty($reuslt['errcode'])){
            return [
                'accesstoken'  => $reuslt['access_token'],
                'expiresin'    => $reuslt['expires_in'],
                'refreshtoken' => $reuslt['refresh_token'],
                'openid'       => $reuslt['openid'],
                'scope'        => $reuslt['scope'],
                'unionid'      => $reuslt['unionid'],
            ];
        }
        Log::record($reuslt, 'DEBUG');
        return [];
    }

    
    /**
     * 获取微信用户信息
     *
     * @param string $accessToken 访问令牌
     * @param string $openId      用户openid
     * @return array
     */
    protected function getWxUserInfo($accessToken, $openId){
        $url = 'https://api.weixin.qq.com/sns/userinfo?access_token=ACCESS_TOKEN&openid=OPENID&lang=zh_CN';  //获取用户信息
        $url = str_replace('ACCESS_TOKEN', $accessToken, $url);
        $url = str_replace('OPENID', $openId, $url);
        $reuslt = json_decode(self::requestNetwork($url), true);

        if(empty($reuslt['errcode'])){
            return [
                'openid'        => $reuslt['openid'],
                'nickname'      => $reuslt['nickname'],
                'sex'           => $reuslt['sex'],
                'province'      => $reuslt['province'],
                'city'          => $reuslt['city'],
                'country'       => $reuslt['country'],
                'headimgurl'    => $reuslt['headimgurl'],
                'privilege'     => $reuslt['privilege'],
                'unionid'       => $reuslt['unionid'],
            ];
        }
        Log::record($reuslt, 'DEBUG');
        return [];
    }
}
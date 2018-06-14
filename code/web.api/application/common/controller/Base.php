<?php
namespace app\common\controller;

use think\Config;
use think\Response;
use think\Controller;
use app\common\model\BaseModel;
use app\common\model\LogModel;
use app\common\model\TokenModel;
use app\common\utils\SystemUtils;
use app\common\utils\MessageCode;

class Base extends Controller
{
    const CURL_TIMEOUT          = 10;   // curl超时时间pay\alipay\Logger
    const CURL_CONNECTTIMEOUT   = 10;   // curl连接超时时间

    protected $userId = 0;

    /**
     * 类初始化
     *
     * @return void
     */
    protected function _initialize(){
        if($this->authenticationSkipModule() === false){
            if($this->authenticationSkipAction() === false){
                $this->authentication();
            }
        }
    }

    /**
     * 模块是否跳过验证
     *
     * @return boolean true：不需要验证， false：需要验证
     */
    protected function authenticationSkipModule(){
        $module = $this->request->module();
        $authenticationSkipModuleInfo = Config::get('authentication_skip_module') ?? [];
        if(in_array($module, $authenticationSkipModuleInfo)){
            return true;
        }
        return false;
    }

    /**
     * 方法是否跳过验证
     *
     * @return boolean true：不需要验证， false：需要验证
     */
    protected function authenticationSkipAction(){
        $action = $this->request->action();
        $authenticationSkipActionInfo = Config::get('authentication_skip_action') ?? [];
        if(in_array($action, $authenticationSkipActionInfo)){
            return true;
        }
        return false;
    }

    /**
     * 接口身份认证
     *
     * @return void
     */
    protected function authentication(){
        $success = false;
        $code    = null;
        $token = $this->request->param('token', null);
        if(empty($token)){
            $code = MessageCode::MC_GENERAL_TOKEN_EMPTY;
        }else{
            $tokenInfo = TokenModel::getDataByToken($token);
            if(empty($tokenInfo)){
                $code = MessageCode::MC_GENERAL_TOKEN_INVALID;
            }else{
                $this->userId = $tokenInfo['userid'] ?? 0;
            }
        }
        if(!empty($code)){
            $message = MessageCode::getMessageByCode($code);
            $this->returnJson($success, $code, $message)->send();
            exit;
        }
    }

    /**
     * 创建token
     *
     * @param string $userId 
     * @param string $platform ios,android,web
     * @param string $deviceId 
     * @return string/null
     */
    protected static function createToken($userId, $platform=null, $deviceId=null){
        $token = SystemUtils::generateToken();
        $data = [
            'token'    => $token,
            'userid'   => $userId,
            'platform' => $platform,
            'deviceid' => $deviceId,
            'createtime' => SystemUtils::getTimestamp(),
        ];
        if(TokenModel::addData($data)){
            return $token;
        }
        return null;
    }

    /**
     * 返回JSON/JSONP数据
     *
     * @param boolean $success
     * @param integer $code
     * @param string  $msssage
     * @param array $data
     * @param array $header
     * @return void
     */
    public function returnJson($success, $code, $message, $data=[], $header=[]){
        $returnData = [
            'success'   => $success,
            'code'      => $code,
            'message'   => $message,
        ];
        $callback = $this->request->param('callback', null);
        $type = empty($callback) ? 'json' : 'jsonp';
        if(!empty($data)){
            $returnData['result'] = $data;
        }
        // 将返回数据写入日志表
        $url = explode('?', $this->request->url());
        $data = [
            'ip'  => $this->request->ip(),
            'url' => $url[0],
            'category' => BaseModel::DT_LOG_OUTPUT,
            'indata'   => self::toJson($this->request->param()),
            'outdata'  => self::toJson($returnData),
            'createtime' => SystemUtils::formatTimestamp()
        ];
        LogModel::addData($data);
        header("Access-Control-Allow-Origin: *");   // 允许任意域名发起的跨域请求  
        return Response::create($returnData, $type, 200, $header);
    }

    /**
     * 调用不存在的接口或方法报错误
     *
     * @return json/jsonp
     */
    public function _empty(){
        return $this->returnJson(false, MessageCode::MC_GENERAL_FUNCTION_EXISTS, 
                    MessageCode::getMessageByCode(MessageCode::MC_GENERAL_FUNCTION_EXISTS));
    }

    /**
     * 转JSON
     *
     * @param array/object $data
     * @return string
     */
    protected static function toJson($data){
        return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
    }

    /**
     * 网络请求
     *
     * @param string $url
     * @param array $data
     * @param array $header
     * @return void
     */
    public static function requestNetwork($url, $data=[], $header=[]){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22' );
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_TIMEOUT, self::CURL_TIMEOUT);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, self::CURL_CONNECTTIMEOUT);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if(!empty($headers)){
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }
        if( !empty($data) ){
            curl_setopt($ch, CURLOPT_POST , true);
            curl_setopt($ch, CURLOPT_POSTFIELDS , $data);
        }
        if(strpos($url, 'https') >= 0){
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); // https请求 不验证证书和hosts
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        }
        $response = curl_exec( $ch );
        if ($response === FALSE) {
            return false;
        }
        curl_close( $ch );
        return $response;
    }
}

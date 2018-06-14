<?php
namespace app\tutu\controller;

use app\common\controller\Base;
use app\common\model\BaseModel;
use app\common\model\ResourcesModel;
use app\common\utils\SystemUtils;
use app\common\utils\MessageCode;

/**
 * 资源管理类
 */
class Resources extends Base{

    /**
     * 创建资源信息接口
     *
     * @return void
     */
    public function apiCreateInfo(){
        $data = [];
        $data['type']           = $this->request->param('type', 1);     // 资源类型
        $data['sha1']           = $this->request->param('sha1', '');    // 哈希值
        $data['md5']            = $this->request->param('md5', '');     // md5值
        $data['domain']         = $this->request->param('domain', '');  // 域名
        $data['uri']            = $this->request->param('uri', '');     // 资源地址
        $data['createtime']     = SystemUtils::getTimestamp();
        $success = false;
        $code    = MessageCode::MC_GENERAL_EXCEPTION;
         
        if(empty($data['sha1']) || empty($data['md5']) || empty($data['uri'])){
            $code = MessageCode::MC_GENERAL_REQUIRED_FIELD_MISSING;
        }else{
            if(ResourcesModel::isExistsByMd5( $data['md5']) ){
                $code = MessageCode::MC_GENERAL_EXISTS;
            }else{
                if(ResourcesModel::addData($data) > 0){
                    $success = true;
                    $code    = MessageCode::MC_GENERAL_SUCCESS;
                }
            }
        }
        $message = MessageCode::getMessageByCode($code);
        return $this->returnJson($success, $code, $message);
    }

    /**
     * 删除资源信息接口
     *
     * @return void
     */
    public function apiDeleteInfoById(){
        $success  = false;
        $code     = MessageCode::MC_GENERAL_EXCEPTION;
        $id       = $this->request->param('id', 0);
        if(empty($id) || empty($this->userId)){
            $code = MessageCode::MC_GENERAL_ID_EMPTY;
        }else{
            if(ResourcesModel::deleteDataById($id)){ 
                $success = true;
                $code    = MessageCode::MC_GENERAL_SUCCESS;
            }
        }
        $message = MessageCode::getMessageByCode($code);
        return $this->returnJson($success, $code, $message);
    }

    /**
     * 修改资源信息接口
     *
     * @return void
     */
    public function apiUpdateInfo(){
        $data = [];
        $id   = $this->request->param('id', 0);
        $data['type']           = $this->request->param('type', 1);     // 资源类型
        $data['sha1']           = $this->request->param('sha1', '');    // 哈希值
        $data['md5']            = $this->request->param('md5', '');     // md5值
        $data['domain']         = $this->request->param('domain', '');  // 域名
        $data['uri']            = $this->request->param('uri', '');     // 资源地址
        $data['updatetime']     = SystemUtils::getTimestamp();
        $success = false;
        $code    = MessageCode::MC_GENERAL_EXCEPTION;
        
        if(empty($id) || empty($this->userId)){
            $code = MessageCode::MC_GENERAL_ID_EMPTY;
        }else{
            if(empty($data['sha1']) || empty($data['md5']) || empty($data['uri'])){
                $code = MessageCode::MC_GENERAL_REQUIRED_FIELD_MISSING;
            }else{
                // 处理课程名称是否已存在
                $isExists = false;
                $info = ResourcesModel::getDataById($id);
                if(!empty($info) && $info['md5'] !== $data['md5']){
                    if(ResourcesModel::isExistsByMd5( $data['md5']) ){
                        $isExists = true;
                        $code = MessageCode::MC_GENERAL_EXISTS;
                    }
                }
                if(!$isExists && ResourcesModel::updateDataById($id, $data) > 0){
                    $success = true;
                    $code    = MessageCode::MC_GENERAL_SUCCESS;
                }
            }
        }
        $message = MessageCode::getMessageByCode($code);
        return $this->returnJson($success, $code, $message);
    }

    /**
     * 获取资源信息
     *
     * @return void
     */
    public function apiGetInfoById(){
        $success  = false;
        $code     = MessageCode::MC_GENERAL_EXCEPTION;
        $id       = $this->request->param('id', 0);
        $info     = [];
        if(empty($id) || empty($this->userId)){
            $code = MessageCode::MC_GENERAL_ID_EMPTY;
        }else{
            $info = ResourcesModel::getDataById($id);
            $success = true;
            $code    = MessageCode::MC_GENERAL_SUCCESS;
        }
        $message = MessageCode::getMessageByCode($code);
        return $this->returnJson($success, $code, $message, $info);
    }

    /**
     * 获取资源信息列表
     *
     * @return void
     */
    public function apiFetchInfoList(){
        $success = true;
        $code    = MessageCode::MC_GENERAL_SUCCESS;
        $search  = $this->request->param('search', '');     // 搜索条件
        $page    = $this->request->param('page', BaseModel::DT_PAGE);
        $pageSize= $this->request->param('pagesize', BaseModel::DT_PAGE_SIZE);
        
        $infoList = ResourcesModel::fetchInfoListBySearch($search, $page, $pageSize);
        $data = [];
        if(!empty($infoList)){
            $data['list']  = $infoList;
            $data['total'] = ResourcesModel::getInfoListCountBySearch($search);
        }
        $message = MessageCode::getMessageByCode($code);
        return $this->returnJson($success, $code, $message, $data);
    }
}
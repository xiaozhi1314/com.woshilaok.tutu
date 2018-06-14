<?php
namespace app\common\model;

use think\Db;
use think\Config;
use app\common\utils\SystemUtils;

class LogModel extends BaseModel
{
    const tableName = 'log';
    const field = '';
    const order = 'id desc';
}
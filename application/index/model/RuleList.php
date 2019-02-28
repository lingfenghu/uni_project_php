<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 19-1-10
 * Time: 上午7:55
 */

namespace app\index\model;


use think\Db;
use think\Model;

class RuleList extends Model
{
    public function  getById(){
        $rulelist = Db::table('RuleList');
        $result = $rulelist->where('ruleID',1)->find();
        return $result;
    }
    public function revise($param){
        $rulelist = Db::table('RuleList');
        $result = $rulelist->update($param);
        return $result;
    }
}
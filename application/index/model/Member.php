<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 19-1-12
 * Time: 上午5:28
 */

namespace app\index\model;


use think\Db;
use think\Model;

class Member extends Model
{
    public function getByMemberID($param){
        $member = Db::table('Member');
        $result = $member->where('memberID',$param)->find();
        return $result;
    }
}
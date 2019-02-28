<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 19-1-9
 * Time: 下午11:14
 */

namespace app\index\model;


use think\Model;
use think\Db;
class Account extends Model
{
    public function add($param){
        $account = Db::table('Account');
        $account->insert(['account'=>$param['account'],'password'=>$param['password'],'right'=>0]);
    }
    public function getById($id){
        $account = Db::table('Account');
        $result = $account->where('account',$id)->find();
        return $result;
    }
    public function updateAccount($account,$password){
        Db::table('Account')->where('account',$account)->setField('password',$password);
    }
}
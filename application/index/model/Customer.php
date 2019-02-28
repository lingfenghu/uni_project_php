<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 19-1-10
 * Time: 上午6:22
 */

namespace app\index\model;


use think\Db;
use think\Model;

class Customer extends Model
{
    public function getByAccount($param){
        $customer = Db::table("Customer");
        $result = $customer->where('account',$param)->find();
        return $result;
    }
    public function add($param){
        $customer = Db::table("Customer");
        $customer->insert(['account'=>$param['account'],'password'=>$param['password'],'userName'=>$param['userName'],
            'birthdate'=>$param['birthdate'],'userIDCard'=>$param['userIDCard'],'userTel'=>$param['userTel'],
            'email'=>$param['email'],'userSex'=>$param['userSex']]);
    }
    public function updatePoint($account,$point){
        Db::table('Customer')->where('account',$account)->setField('point',$point);
    }
    public function revise($param){
        $customer = Db::table("Customer");
        $customer->update($param);
    }
}
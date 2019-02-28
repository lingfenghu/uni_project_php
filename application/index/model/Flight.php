<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 19-1-11
 * Time: 下午5:44
 */

namespace app\index\model;


use think\Db;
use think\Model;

class Flight extends Model
{
    public function getByID($param){
        $flight = Db::table('Flight');
        $result = $flight->where('flightID',$param)->find();
        return $result;
    }
    public function getAll(){
        $flight = Db::table('Flight');
        $list = $flight->paginate(10);
        return $list;
    }
    public function getByCities($param1,$param2){
        $flight = Db::table('Flight');
        $result = $flight->where(['departCity'=>$param1,'arriveCity'=>$param2])->select();
        return $result;
    }
    public function add($param){
        $flight = Db::table('Flight');
        $result = $flight->insert($param);
        return $result;
    }
    public function revise($param){
        $flight = Db::table('Flight');
        $result = $flight->update($param);
        return $result;
    }
}
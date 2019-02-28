<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 19-1-11
 * Time: 下午10:21
 */

namespace app\index\model;


use think\Db;
use think\Model;

class ExFlightProduct extends Model
{
    public function getAll(){
        $product = Db::table('ExFlightProduct');
        $list = $product->paginate(10);
        return $list;
    }
    public function getByIDDate($param1,$param2){
        $product = Db::table('ExFlightProduct');
        $result = $product->where(['flightID'=>$param1,'exFlightDate'=>$param2])->select();
        return $result;
    }
    public function getByIDDateProductID($param1,$param2,$param3){
        $product = Db::table('ExFlightProduct');
        $result = $product->where(['flightID'=>$param1,'exFlightDate'=>$param2,'flightProductID'=>$param3])->find();
        return $result;
    }
    public function revise($param){
        $product = Db::table('ExFlightProduct');
        $result = $product->update($param);
        return $result;
    }
}
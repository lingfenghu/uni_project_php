<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 19-1-12
 * Time: 上午3:18
 */

namespace app\index\model;


use think\Db;
use think\Model;

class Statement extends Model
{

    public function getByFlightIDYearMonth($param1,$param2,$param3){
        $statement = Db::table('Statement');
        $result = $statement->where(['flightID'=>$param1,'year'=>$param2,'month'=>$param3])->find();
        return $result;
    }
}
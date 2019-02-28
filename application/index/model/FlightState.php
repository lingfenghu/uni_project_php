<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 19-1-11
 * Time: 下午9:06
 */

namespace app\index\model;


use think\Db;
use think\Model;

class FlightState extends Model
{
    public function getByStateID($param){
//        $param = 1;
        $flightstate = Db::table('FlightState');
        $result = $flightstate->where('flightStateID',$param)->find();
        return $result;
    }
}
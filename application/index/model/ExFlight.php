<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 19-1-11
 * Time: 下午8:39
 */

namespace app\index\model;


use think\Db;
use think\Model;

class ExFlight extends Model
{
    public function getAll(){
        $dynflight = Db::table('ExFlight');
        $list = $dynflight->paginate(10);
        return $list;
    }
    public function getByIDDate($param1,$param2){
        $dynflight = Db::table('ExFlight');
        $result = $dynflight->where(['flightID'=>$param1,'exFlightDate'=>$param2])->find();
        return $result;
    }
    public function revise($param){
        $dynflight = Db::table('ExFlight');
        $result = $dynflight->update($param);
        return $result;
    }
    public function index_getAllExFlightAndExFlightProductByCityAndDate($departCity,$arriveCity,$exFlightDate){
        $subsql=Db::table('Flight')->where('departCity',$departCity)->where('arriveCity',$arriveCity)
            ->field('flightID')->buildSql();
        $subsql2=Db::table('ExFlight')->where('ExFlight.exFlightDate',$exFlightDate)->buildSql();
        return Db::table('ExFlightProduct')->where('ExFlightProduct.exFlightDate',$exFlightDate)->join
        ([$subsql=>'s'],'ExFlightProduct.flightID=s.flightID')->join([$subsql2=>'s2'],'ExFlightProduct.flightID=s2.flightID')
            ->select();
    }
    public function index_getAllExFlightByCityAndDate($departCity,$arriveCity,$exFlightDate){
        $subsql=Db::table('Flight')->where('departCity',$departCity)->where('arriveCity',$arriveCity)
            ->field('flightID')->buildSql();
        return Db::table('ExFlight')->where('ExFlight.exFlightDate',$exFlightDate)->join
        ([$subsql=>'s'],'ExFlight.flightID=s.flightID')->select();
    }
    public function index_getExFlightByFlightIDAndDate($flightID,$exFlightDate){
        return Db::table('ExFlight')->where('exFlightDate',$exFlightDate)->where('ExFlight.flightID',$flightID)
            ->join('Flight','Flight.flightID=ExFlight.flightID')->find();
    }
    public function user_getAllExFlightAndExFlightProductByCityAndDate($departCity,$arriveCity,$exFlightDate){
        $subsql=Db::table('Flight')->where('departCity',$departCity)->where('arriveCity',$arriveCity)->buildSql();
        $subsql2=Db::table('ExFlight')->where('ExFlight.exFlightDate',$exFlightDate)->buildSql();
        $subsql3=Db::table('FFP')->field('flightID,rewardPoint,flightProductID')->buildSql();
        return Db::table('ExFlightProduct')->where('ExFlightProduct.exFlightDate',$exFlightDate)->join
        ([$subsql=>'s'],'ExFlightProduct.flightID=s.flightID')->join([$subsql2=>'s2'],'ExFlightProduct.flightID=s2.flightID')
            ->join([$subsql3=>'s3'],'s3.flightID=s.flightID and s3.flightProductID=ExFlightProduct.flightProductID')
            ->select();
    }
    public function updateTicketNum($leftTicketNum,$flightID,$flightProductID,$exFlightDate){
        Db::table('ExFlightProduct')->where('flightID',$flightID)
            ->where('flightProductID',$flightProductID)->where('exFlightDate',$exFlightDate)
            ->update(['leftTicketNum'=>$leftTicketNum]);
    }
}
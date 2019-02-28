<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 19-1-12
 * Time: 下午10:43
 */

namespace app\index\controller;

use app\index\model\ExFlight;
use think\Controller;

class Queryresult extends Controller
{
    public function queryresult1(){
        $departCity=$_POST['departCity'];
        $arriveCity=$_POST['arriveCity'];
        $exFlightDate=$_POST['exFlightDate'];
        $allExFlightAndProduct = (new ExFlight())->index_getAllExFlightAndExFlightProductByCityAndDate($departCity,$arriveCity,$exFlightDate);
        $this->assign('allExFlightAndProduct',$allExFlightAndProduct);
        $this->assign('departCity',$departCity);
        $this->assign('arriveCity',$arriveCity);
        $this->assign('exFlightDate',$exFlightDate);
//        dump($allExFlightAndProduct);
        return $this->fetch('index/queryresult1');
    }
    public function queryresult2(){
        $departCity=$_POST['departCity'];
        $arriveCity=$_POST['arriveCity'];
        $exFlightDate=$_POST['exFlightDate'];
        $allExFlight = (new ExFlight())->index_getAllExFlightByCityAndDate($departCity,$arriveCity,$exFlightDate);
        $this->assign('allExFlight',$allExFlight);
        $this->assign('departCity',$departCity);
        $this->assign('arriveCity',$arriveCity);
        $this->assign('exFlightDate',$exFlightDate);
        return $this->fetch('index/queryresult2');
    }
    public function queryresult3(){
        $flightID=$_POST['flightID'];
        $exFlightDate=$_POST['exFlightDate'];
        $exFlight_flight = (new ExFlight())->index_getExFlightByFlightIDAndDate($flightID,$exFlightDate);
        $this->assign('exFlight_flight',$exFlight_flight);
        return $this->fetch('index/queryresult3');
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 19-1-12
 * Time: 上午6:49
 */

namespace app\index\model;


use think\Db;
use think\Model;

class Ticket extends Model
{
    public function getByAccountOrderID($param1,$param2){
        $ticket = Db::table('Ticket');
        $result = $ticket->where(['account'=>$param1,'orderID'=>$param2])->select();
        return $result;
    }
    public function add($account,$orderID,$ticketID,$flightID,$exFlightDate,$flightProductID,
                        $passengerName,$passengerTel,$passengerIDCard,$insurance,$payment,$ticketPrice,$passengerSex){
        Db::table('Ticket')->insert(['account'=>$account,'orderID'=>$orderID,'ticketID'=>$ticketID,
            'flightID'=>$flightID,'exFlightDate'=>$exFlightDate,'flightProductID'=>$flightProductID,
            'passengerName'=>$passengerName,'passengerTel'=>$passengerTel,'passengerIDCard'=>$passengerIDCard,
            'insurance'=>$insurance,'payment'=>$payment,'ticketPrice'=>$ticketPrice,'passengerSex'=>$passengerSex]);
    }

}
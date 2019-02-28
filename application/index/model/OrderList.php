<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 19-1-12
 * Time: 上午6:35
 */

namespace app\index\model;


use think\Db;
use think\Model;

class OrderList extends Model
{
//    public function getAll(){
//        $orderlist = Db::table('OrderList');
//        $list = $orderlist->paginate('5');
//        return $list;
//    }
    public function getByAccount($param){
        $orderlist = Db::table('OrderList');
        $result = $orderlist->where('account',$param)->select();
        return $result;
    }
    public function add($account,$orderID,$orderTime){
        Db::table('OrderList')->insert(['account'=>$account,'orderID'=>$orderID,'orderTime'=>$orderTime]);
    }
    public function  getLastID($account)
    {
        return Db::table('OrderList')->where('account',$account)->max('orderID');
    }
    public function getOrderListByAccount($account){
        $substr = Db::table('Ticket')->where('Ticket.account',$account)->buildSql();
        return Db::table('OrderList')->where('OrderList.account',$account)->join([$substr=>'s'],'s.orderID=
        OrderList.orderID')->select();
    }
}
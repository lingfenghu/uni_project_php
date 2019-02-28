<?php
namespace app\index\controller;

use think\Controller;
use think\Db;

class Index extends Controller
{
    public function index()
    {
//        return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="https://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="https://e.topthink.com/Public/static/client.js"></script><think id="ad_bd568ce7058a1091"></think>';
        return $this->fetch();
    }
    public function login()
    {
        return $this->fetch();
    }
    public function register()
    {
        return $this->fetch();
    }
    public function queryresult1(){
        return $this->fetch();
    }
    public function queryresult2(){
        return $this->fetch();
    }
    public function queryresult3(){
        return $this->fetch();
    }
    /*user*/
    public function user_queryresult1(){
        return $this->fetch();
    }
    public function user_queryresult2(){
        return $this->fetch();
    }
    public function user_queryresult3(){
        return $this->fetch();
    }
    public function user_rules(){
        return $this->fetch();
    }
    public function user_index(){
        if(session('account')==null){
            $this->error('no login','index/login');
        }
        return $this->fetch();
    }
    public function user_account(){
        return $this->fetch();
    }
    public function user_order(){
        return $this->fetch();
    }
    public function user_reserve(){
        return $this->fetch();
    }
    /*manager*/
    public function manager_index(){
        if(session('account')==null){
            $this->error('no login','index/login');
        }
        return $this->fetch();
    }
    public function manager_addflight(){
        return $this->fetch();
    }
    public function manager_dynflight(){
        return $this->fetch();
    }
    public function manager_dynflightupdate(){
        return $this->fetch();
    }
    public function manager_flight_product(){
        return $this->fetch();
    }
    public function manager_flightupdate(){
        return $this->fetch();
    }
    public function manager_flight_productupdate(){
        return $this->fetch();
    }
    public function manager_monthreport(){
        if(session('account')==null){
            $this->error('no login','index/login');
        }
        return $this->fetch();
    }
    public function manager_flight_monthreport(){
        return $this->fetch();
    }
    public function manager_rules(){
        return $this->fetch();
    }

    public function db(){
//        $result =Db::query('select * from Account');
//        $result = Db::execute('insert Account(account,password,`right`)values("user01","123456",0)');
//        $result = Db::table('Account')->insert(['account'=>'admin','password'=>'123456','right'=>1]);
//        $result = Db::table('Account')->select();
        $db = Db::table('Account');
//        $result = $db->where('account','user01')->update(['right'=>1]);
        $result = $db->insert(['account'=>'admin','password'=>'123456','right'=>0]);
        dump($result);
//        $list = Db::table('Account')->field('account','right')->limit(2)->select();
//        dump($list);
    }
}
?>
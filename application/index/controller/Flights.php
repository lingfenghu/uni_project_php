<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 19-1-11
 * Time: 下午5:43
 */

namespace app\index\controller;

use app\index\model\Flight;
use think\Controller;


class Flights extends Controller
{
    public function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub
        if(session('account')==null){
            $this->error('no login','index/login');
        }
    }
    public function put(){
        $flight = new Flight();
        $result  = $flight->getAll();
        $page = $result->render();
//        dump($result);
        $this->assign('data',$result);
        $this->assign('page',$page);
        return $this->fetch('index/manager_index');
    }
    public function add(){
        $data = $_POST;
//        dump($data);
        $flight = new Flight();
        $result = $flight->getByID($data['flightID']);
        dump($result);
        if(!$result){
            $flight->add($data);
            $this->success('add success','index/flights/put');
        }else{
            $this->error('this fligt exist','index/index/manager_addflight');
        }

    }
    public function find(){
        $flight = new Flight();
        $key = $this->request->param('flightID');
        $result = $flight->getByID($key);
        if($result){
            $this->assign('data',$result);
//                $this->success('find!!!','index/index/manager_flightupdate');
            return $this->fetch('index/manager_flightupdate');
        }else{
            $this->error('this flight not exist','index/flights/put');
        }
    }

    public function update(){
        $data = $_POST;
//        dump($data);
        $flight = new Flight();
        $flight->revise($data);
        $this->success('update success','index/flights/put');
    }
}
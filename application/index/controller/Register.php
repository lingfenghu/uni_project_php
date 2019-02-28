<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 19-1-9
 * Time: 上午3:45
 */

namespace app\index\controller;


use think\Controller;
use app\index\model\Customer;
use app\index\model\Account;
class Register extends Controller
{
    public function add(){
        $data = $_POST;
        $customer = new Customer();
        $account = new Account();
        $result = $account->getById($data['tel']);
//        dump($data);
        if($result){
            $this->error('This tel had registered');
        }else{
            if(hash_equals('male',$data['sex'])){
                $sex=1;
            }else{
                $sex=0;
            }
            $param1 = array("account"=>$data['tel'],"password"=>$data['password']);
            $param2 = array("account"=>$data['tel'],"password"=>$data['password'],"userName"=>$data['userName'],
                "birthdate"=>$data['birthdate'],"userIDCard"=>$data['userIDCard'],"userTel"=>$data['tel'],
                "email"=>$data['email'],"userSex"=>$sex);
            $account->add($param1);
            $customer->add($param2);
            $this->success("register success","index/index/login");
        }
    }
}
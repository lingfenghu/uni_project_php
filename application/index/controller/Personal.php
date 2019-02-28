<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 19-1-12
 * Time: 上午4:40
 */

namespace app\index\controller;


use think\Controller;
use app\index\model\Member;
use app\index\model\Customer;
use app\index\model\Account;
class Personal extends Controller
{
    public function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub
        if(session('account')==null){
            $this->error('no login','index/login');
        }
    }
    public function put(){
        $account = session('account');
//        dump($account);
        $customer = new Customer();
        $result = $customer->getByAccount($account);
//        dump($result);
        $result['memberName'] = $this->type($result['memberID']);
//        dump($result);
        $this->assign('data',$result);
        return $this->fetch('index/user_account');
    }
    public function type($memberID){
        $member = new Member();
        $result = $member->getByMemberID($memberID);
        return $result['memberName'];
    }
    public function update(){
        $key = $this->request->param('userTel');
        $key1 = $this->request->param('userSex');
        $key2 = $this->request->param('email');
        $key3 = $this->request->param('password');
//        dump($key);
//        dump($key1);
//        dump($key2);
//        dump($key3);
        $customer = new Customer();
        $result = $customer->getByAccount($key);
//        dump($result);
        $result['userSex']=$key1;
        $result['email']=$key2;
        $result['password']=$key3;
//        dump($result);
        $customer->revise($result);
        $account = new Account();
        $account->updateAccount($key,$key3);
//        dump($result);
        $this->success('update success','personal/put');
    }
}
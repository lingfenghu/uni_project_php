<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 19-1-9
 * Time: 上午3:45
 */

namespace app\index\controller;
use app\index\model\Account;
use think\Controller;

class Login extends Controller
{
    public function check(){
        $data = $_POST;
        $account = new Account();
        $result = $account->getById($data['account']);
//        dump($result);
        if($result){
            if($result['password'] === $data['password']){
                session('account',$data['account']);
                if($result['right']){
                    $this->success('login sucess','index/flights/put');
                }else{
                    $this->success('login sucess','index/index/user_index');
                }
            }else{
                $this->error('password error');
            }
        }else{
            $this->error('account not exist');
        }
    }
    public function logout(){
        session(null);
        $this->success('logout sucess','index/index/login');
    }
}
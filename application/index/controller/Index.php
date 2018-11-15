<?php
namespace app\index\controller;
use think\Controller;
use think\facade\Url;
session_start();
class Index extends \think\Controller
{
    public function index()
    {	
		Url::root($_SERVER['SCRIPT_NAME']);
        return $this->fetch();
		 
	}
	public function login()
	{
		
		
		$people = input('people');
		
		if($people =='管理者'){
			$user=model('Admin');	
			$data = [
			 'adminname' => input('loginName'),
			 'adminpassword' => input('Possword'),
			];
		
			$userinfo=$user->where($data)->find();
			
			
			if($userinfo){
			
				$this->success('登录成功',url('/index/Admin_mag/index'));
			}
			else{
				$this->error('登录失败');
				
				}
			
				
			}
		elseif($people =='老师'){
			$user=model('Teacher');	
			$data = [
			 'tnumber' => input('loginName'),
			 'tpassword' => input('Possword'),
			];
			
			$userinfo=$user->where($data)->find();
			if($userinfo){
				session('tnumber', $userinfo['tnumber']);
				$this->success('登录成功',url('/index/Teacher/index'));
			}
			else{
				$this->error('登录失败');
				
				}
				
			}
			
			else{
				$user=model('Student');	
				$data = [
			 'snumber' => input('loginName'),
			 'spassword' => input('Possword'),
			];
			$userinfo=$user->where($data)->find();
			$_SESSION['snumber']=$userinfo['snumber'];
			if($userinfo){
				
				$this->success('登录成功',url('/index/Student/index'));
			}
			else{
				$this->error('登录失败');
				
				}
			
				}
				
		
		}
		
 
}

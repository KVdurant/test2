<?php
namespace app\index\controller;
use think\Controller;
use think\facade\Url;
class student extends \think\Controller{
	
	public function index(){
		return $this->fetch();				
		
	}//显示学生界面参加考试功能和查看结果
	
	public function check(){
		$user=model('Student');//成绩表
		$userinfo=$user->where($_SESSION['snumber'])->select();
		$this->assign('list',$list);
		return $this->fetch();				
	}//查看自己成绩
	
	public function join_test(){
		//先是把题的查询结果传送到LISt,通过list来在html页面上展示题，进行答题
		
	}//考试功能
	
	
}

?>
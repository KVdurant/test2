<?php
namespace app\index\controller;
use think\Controller;
use think\facade\Url;
class Teacher extends \think\Controller{
	public function index(){
		return $this->fetch();				
		
	}//显示老师界面
	public function tixing(){
		return $this->fetch();				
		
	}//显示老师界面
	
	public function shiti(){
		return $this->fetch();				
		
	}//显示试题管理
	
	public function true1(){
		return $this->fetch();				
		
	}//显示试题管理
	public function desgin(){
		return $this->fetch();				
		
	}//显示老师界面
	
	
	public function addtest(){
		$test=model("Choice");
		$data = [
		'choice_info' => input("info"),
		'choice_1' => input("answ1"),
		'choice_2' => input("answ2"),
		'choice_3' => input("answ3"),
		'choice_4' => input("answ4"),
		'choice_answ' => input("ransw"),
		'tnumber' => session('tnumber'),
		];
		
		$test2=$test->insert($data);
		if($test2){
			$this->success('添加选择题成功',url('/index/Teacher/choice'));
			
			}
			else{
				$this->error('添加选择题失败',url('/index/Teacher/choice'));
				}
		
		
	}//试题管理
	public function addtrue(){
		$test=model("");
		$data = [
		'true_info' => input("info"),
		'true_answ' => input("answ1"),
		'tnumber' => session('tnumber'),
		];
		
		$test2=$test->insert($data);
		if($test2){
			$this->success('添加判断题成功',url('/index/Teacher/true1'));
			
			}
			else{
				$this->error('添加判断题失败',url('/index/Teacher/true1'));
				}
		
		
		}
		public function adddesign(){
		$test=model("Design");
		$data = [
		'design_ques' => input("info"),
		'design_info' => input("answ1"),
		'tnumber' => session('tnumber'),
		];
		
		$test2=$test->insert($data);
		if($test2){
			$this->success('添加材料题成功',url('/index/Teacher/desgin'));
			
			}
			else{
				$this->error('添加判断题失败',url('/index/Teacher/desgin'));
				}
		
		
		}
	
	
	
	
	
	
	public function testpaper_check_choice(){
		
		return $this->fetch();	
	}//批改试卷	
	
	public function grade_sum(){
		
		
		return $this->fetch();	
	}//成绩统计  也就是进行平均分，总分计算                                                                                                                                 
	public function choice(){
		
		
		return $this->fetch();	
	}//成绩统计  也就是进行平均分，总分计算
	
}


?>
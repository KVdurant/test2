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
	
	
	public function test(){
		
		$user=model('Student');//成绩表
		$data['snumber']=session('snumber');
		$list=$user->where($data)->find();	
		$this->assign('list',$list);
		return $this->fetch();				
		
	}//显示学生界面参加考试功能和查看结果
	
	public function agreement(){
		
		$data1=input('kaoshi');
		$this->assign('list',$data1);
		return $this->fetch();
		}
	
	public function jointest(){
		
		
			$data1['tclass']=input('tclass');//试卷名称
	        
			$data1['examid']=1;
			$choices=model("Choices");
			$true2=model("True2");
			$designs=model("Designs");
			$student=model("Studentdata");
			$student1=model("Student");
			$snumber=session('snumber');
		
			$info=$student1->where('snumber',$snumber)->find();
			
			$data=[
					'snumber' => $info['snumber'],
					'sname'   => $info['sname'],
					'sclass'  =>  $info['sclass'],
					'tclass'  => $data1['tclass'],
					'examid'  =>$data1['examid']
			
			];
			$student->insert($data);
			
			
			$list1=$choices->where($data1)->select();
		//	echo "<pre>";print_r($list1);die;
			$list2=$true2->where($data1)->select();
			$list3=$designs->where($data1)->select();
			
			
			$this->assign('list1',$list1);
			$this->assign('list2',$list2);
			$this->assign('list3',$list3);
			$this->assign('snumber',$snumber);	
			return $this->fetch();
		
		
	}//考试功能
	
	public function checkgrade(){
		
		$info=model('Grade');
		$data['snumber']=session('snumber');
		$list=$info->where($data)->select();
		$this->assign('list',$list);
		return $this->fetch();	 
	}//显示学生界面参加考试功能和查看结
	
	
	
		
	
	
	
	
	
	
	
	
}

?>
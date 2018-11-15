<?php
namespace app\index\controller;
use think\Controller;
use think\facade\Url;
class AdminMag extends \think\Controller{
	public function index()
    {	
        return $this->fetch();
		 
	}//管理者主界
	public function calss()
    {	
        return $this->fetch();
		 
	}//课堂
	public function student()
    {	
        return $this->fetch();
		 
	}//学生
	public function teacher()
    {	
        return $this->fetch();
		 
	}//教师
	
	
	
	

	 public function add_teacher(){
		$user=model('Teacher');
		$data = [       //接受传递的参数  
		  		'tname' => input('name'),
                'tnumber' => input('number'),  
                'tpassword' => input('password'), 
				'tclass' => input('tclass')
           			 ];  
		
		 if($user->insert($data)){
			 
			$this->success('用户注册成功',url('/index/index/index'));
			 
			      }				 
			 else{
				 $this->error('注册失败',url('/index/index/index'));
				 }	 
		 
	}//老师用户增加
	
	 public function add_student(){
		 $user=model('Student');
		$data = [       //接受传递的参数  
		  		'sname' => input('name'),
                'snumber' => input('number'),  
                'spassword' => input('password'),
				'scloud' => input('scloud'),
				'sclass' =>input('sclass') 
           			 ];  		
		 if($user->insert($data)){
			 
			$this->success('用户注册成功',url('/index/index/index'));
			 
			      }				 
			 else{
				 $this->error('注册失败',url('/index/index/index'));
				 }	 
		 	 
		 }//学生用户增加
		 
		 public function edit_teacher(){
			 $user=model('Teacher');
			 $data1['tid']=intval(input('id'));
			 
			 $data = [       //接受传递的参数  
		  		'tname' => input('name'),
                'tnumber' => input('number'),  
                'tpassword' => input('password'), 
           			 ];  
		
		 if($user->where($data1)>-update($data)){
			 
			$this->success('老师信息编辑成功',url('/index/index/index'));
			 
			      }				 
			 else{
				 $this->error('老师信息编辑失败',url('/index/index/index'));
				 }	  
			 
			 }//老师信息编辑
			 
		 public function edit_student(){
			 $user=model('Student');
			 $data1['sid']=intval(input('id'));
			 
			 $data = [       //接受传递的参数  
		  		'snumber' => input('snumber'),
                'sname' => input('sname'),  
                'spassword' => input('spassword'),
				'scloud' => input('scloud'),
				'sclass' => input('sclass') 
           			 ];  
		
		 if($user->where($data1)>-update($data)){
			 
			$this->success('学生信息编辑成功',url('/index/index/index'));
			 
			      }				 
			 else{
				 $this->error('学生信息编辑失败',url('/index/index/index'));
				 }	  
			 
			 }//学生信息编辑
			 
			  public function del_student(){
				  $user=model('Student');
				 $data1['sid']=intval(input('id'));
				 if($user->where($data1)>-delete()){
			 
			$this->success('删除成功',url('/index/index/index'));
			 
			      }				 
			 else{
				 $this->error('删除失败',url('/index/index/index'));
				 }	  
				  
				  
				  }//学生删除函数
				  
				public function del_teacher(){
				  $user=model('Teacher');
				 $data1['tid']=intval(input('id'));
				 if($user->where($data1)>-delete()){
			 
			$this->success('删除成功',url('/index/index/index'));
			 
			      }				 
			 else{
				 $this->error('删除失败',url('/index/index/index'));
				 }	  
				  	  
				  }//老师删除函数
			 
			 
	




	
}

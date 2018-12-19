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
	
	 public function addstudent(){
		 return $this->fetch();
		 }
	 public function addteacher(){
		 return $this->fetch();
		 }
		 
	public function addclass1(){
		 return $this->fetch();
		 }
	public function updatec(){
		$user=model('Teacher');
		$list=$user->select();
		$this->assign('list',$list);
		 return $this->fetch();
		 }
		 
		 
		 
		 
		 
	 public function  updatestudent(){
		$user=model('Student');
		$list=$user->select();
		$this->assign('list',$list);
		return $this->fetch();
		 }
	 public function  updates(){	
		$data1=input('id');
		$this->assign('data',$data1);
		return $this->fetch();
		 }
	 public function  updatet(){
		$user=model('Teacher');
		$list=$user->select();
		$this->assign('list',$list);
		return $this->fetch();
		 }
		 
	 public function updatet1(){	
		$data1=input('id');
		$this->assign('data',$data1);
		return $this->fetch();
		 }
	 public function addclass(){
		 $user=model('Teacher');
		$data = [       //接受传递的参数  
                'tnumber' => input('tnumber'),  
				'tname' => input('tname'),
                'tclass' => input('tclass'), 
           			 ]; 
			if($user->insert($data)){
			 
			$this->success('课堂添加成功',url('/index/Admin_mag/calss'));
			 
			      }				 
			 else{
				 $this->error('课堂添加失败',url('/index/Admin_mag/calss'));
				 }	 		 
					  
		 
		 }
		 


	 public function add_teacher(){
		$user=model('Teacher');
		$data = [       //接受传递的参数  
		  		'tname' => input('tname'),
                'tnumber' => input('tnumber'),  
                'tpassword' => input('tpassword'), 
				'tclass' => input('tclass')
           			 ];  
		
		 if($user->insert($data)){
			 
			$this->success('教师添加成功',url('/index/Admin_mag/teacher'));
			 
			      }				 
			 else{
				 $this->error('教师添加失败',url('/index/Admin_mag/teacher'));
				 }	 
		 
	}//老师用户增加
	
	 public function add_student(){
		 $user=model('Student');
		$data = [       //接受传递的参数  
		  		'sname' => input('sname'),
                'snumber' => input('snumber'),  
                'spassword' => input('spassword'),
				'scloud' => input('scloud'),
				'sclass' =>input('sclass') 
           			 ];  		
		 if($user->insert($data)){
			 
			$this->success('学生添加成功',url('/index/Admin_mag/student'));
			 
			      }				 
			 else{
				 $this->error('注册失败',url('/index/Admin_mag/student'));
				 }	 
		 	 
		 }//学生用户增加
		 
		 public function edit_teacher(){
			 $user=model('Teacher');
			 $data1['tid']=intval(input('id'));
			 
			 $data = [       //接受传递的参数  
		  		'tname' => input('tname'),
                'tnumber' => input('tnumber'),  
                'tpassword' => input('tpassword'), 
				'tclass' => input('tclass'), 
           			 ];  
		
		 if($user->where($data1)->update($data)){
			 
			$this->success('老师信息编辑成功',url('/index/Admin_mag/teacher'));
			 
			      }				 
			 else{
				 $this->error('老师信息编辑失败',url('/index/Admin_mag/teacher'));
				 }	  
			 
			 }//老师信息编辑
			 
		 public function edit_student(){
			 $user=model('Student');
			 $data1['sid']=intval(input('id'));
			 $data = [       //接受传递的参数  
		  		
                'sname' => input('sname'), 
				'snumber' => input('snumber'),
				'scloud' => input('scloud'),
                'spassword' => input('spassword'),	
				'sclass' => input('sclass') 
           			 ]; 
			if($user->where($data1)->update($data)){
			 
			$this->success('学生信息编辑成功',url('/index/Admin_mag/updatestudent'));
			 
			      }				 
			 else{
				 $this->error('学生信息编辑失败',url('/index/Admin_mag/updatestudent'));
				 }	   
		
		 
			 
			 }//学生信息编辑
			 
			  public function del_student(){
				  $user=model('Student');
				 $data1['sid']=intval(input('id'));
				 if($user->where($data1)->delete()){
			 
			$this->success('删除成功',url('/index/Admin_mag/updatestudent'));
			 
			      }				 
			 else{
				 $this->error('删除失败',url('/index/Admin_mag/updatestudent'));
				 }	  
				  
				  
				  }//学生删除函数
				  
				public function del_teacher(){
				  $user=model('Teacher');
				 $data1['tid']=intval(input('id'));
				 if($user->where($data1)->delete()){
			 
			$this->success('删除成功',url('/index/Admin_mag/updatet'));
			 
			      }				 
			 else{
				 $this->error('删除失败',url('/index/Admin_mag/updatet'));
				 }	  
				  	  
				  }//老师删除函数
				  public function del_class(){
				  $user=model('Teacher');
				 $data1['tid']=intval(input('id'));
				 if($user->where($data1)->delete()){
			 
			$this->success('删除成功',url('/index/Admin_mag/updatec'));
			 
			      }				 
			 else{
				 $this->error('删除失败',url('/index/Admin_mag/updatec'));
				 }	  
				  	  
				  }//老师删除函数
				   public function  updatec1(){	
						$data1=input('id');
						$this->assign('data',$data1);
						return $this->fetch();
		 }
		   public function  updatec2(){	
		   		$user=model('Teacher');
			 $data1['tid']=intval(input('id'));
			 $data = [       //接受传递的参数  
				'tclass' => input('tclass') 
           			 ]; 
			if($user->where($data1)->update($data)){
			 
			$this->success('课堂信息编辑成功',url('/index/Admin_mag/updatec'));
			 
			      }				 
			 else{
				 $this->error('课堂信息编辑失败',url('/index/Admin_mag/updatec'));
				 }	   
						
		 }
			 
			 
	




	
}

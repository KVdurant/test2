<?php
namespace app\index\controller;
use think\Controller;
use think\facade\Url;
class class_mag extends \think\Controller{
	
	public function  index(){
		$user=model('Teacher');
		$list=$user->select();//查询所有课堂数据
		$this->assign('list',$list);
		return $this->fetch();			
	}//查询所有课堂数据
	
	
	public function add_class(){
		$user=model('Teacher');
		$data = [       //接受传递的参数  
		  		'tname' => input('name'),
                'tnumber' => input('number'),  
                'tpassword' => input('password'), 
				'tclass' => input('tclass')
           			 ];  
		
		 if($user->insert($data)){
			 
			$this->success('课堂添加成功',url('/index/class_mag/index'));
			 
			      }				 
			 else{
				 $this->error('课堂添加失败',url('/index/class_mag/index'));
				 }	
		return $this->fetch();		  
	}//课堂增加
	
	public function  delete_class(){
		//<a href="{:url('/index/Gouwuche/delete',array('id' => $v.gid))}">移除</a>
		$data['id']=intval(input('id'));//获取课堂信息的id,通过id删除
		$user->where($data)->delete();
		$list=$user->select();
		$this->assign('list',$list);
		$this->success('成功删除课堂',url(  '/index/class_mag/index'));
		return $this->fetch();	
		}//课堂删除		
}
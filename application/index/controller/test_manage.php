<?php 
namespace app\index\controller;
use think\Controller;
use think\facade\Url;
class test_manage extends \think\Controller{
	public function index(){
		
		
		}//显示试题管理界面
		
	public function create_test(){
		
		$test1=model("test_choice");
		$list=$test1->select();
		$this->assign('list',$list);
		
		return $this->fetch();
		
		
		}//创建试卷

	public function editor_test(){
		
		return $this->fetch();
		}//编辑试卷
	
	public  function delete_test(){
		
		return $this->fetch();
		}//删除试卷
		
		
	public function yulan_test(){
		
		return $this->fetch();
		}//预览试卷

}


?>
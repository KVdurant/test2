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
	public function shijuan(){
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
	public function bianji(){
		
		
		
		return $this->fetch();				
		
	}//显示老师界面
	public function danxuan(){
		$choice=model("Choice");
		$true1=model("True1");
		$design=model("Design");
		$list1=$choice->select();
	//	echo "<pre>";print_r($list1);die;
		$list2=$true1->select();
		$list3=$design->select();
		$this->assign('list1',$list1);
		$this->assign('list2',$list2);
		$this->assign('list3',$list3);	
		
		
		
		return $this->fetch();				
		
	}//显示老师界面
	public function panduan(){
	
		$true1=model("True1");
		
	
	//	echo "<pre>";print_r($list1);die;
		$list1=$true1->select();
		
		$this->assign('list1',$list1);
		
		
		
		return $this->fetch();				
		
	}//显示老师界面
	
	public function cailiao(){
		$design=model("Design");
	
		$list1=$design->select();
		$this->assign('list1',$list1);
	
		return $this->fetch();				
		
	}//显示老师界面
	
	
	
	
	
	
	public function shanchu(){
		$choice=model("Choice");
		$true1=model("True1");
		$design=model("Design");
		$data1['choice_id']=intval(input('id'));
		$choice->where($data1)->delete();
		$this->success('删除选择题成功',url('/index/Teacher/danxuan'));
		
		}
		public function shanchu1(){
		
		$true1=model("True1");
		
		$data1['true_id']=intval(input('id'));
		$choice->where($data1)->delete();
		$this->success('删除判断题成功',url('/index/Teacher/panduan'));
		
		}
		public function shanchu2(){
		$choice=model("Choice");
		$true1=model("True1");
		$design=model("Design");
		$data1['design_id']=intval(input('id'));
		$choice->where($data1)->delete();
		$this->success('删除材料成功',url('/index/Teacher/cailiao'));
		
		}
		
		
		public function bianjidanxuan(){
			
			return $this->fetch();		
			}
			
		public function bianjipan(){
			return $this->fetch();
		}
		public function bianjicai(){
			return $this->fetch();
		}
			
			
			
			
			
	
	
	public function pigai(){
		$data=model('Studentdata');
		$list=$data->select();
		$this->assign('list',$list);
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
		'tclass' => input("answ5"),
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
		$test=model("True1");
		$data = [
		'true_info' => input("info"),
		'true_answ' => input("answ1"),
		'tnumber' => session('tnumber'),
		'tclass' => input("answ2"),
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
		'tclass' => input("answ2"),
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
	
	public function exams1(){
		
		
		return $this->fetch();	
	}//成绩统计  也就是进行平均分，总分计
	
	public function exams(){
		
		$choice=model("Choice");
		$true1=model("True1");
		$design=model("Design");
		
		$choices=model("Choices");
		$true2=model("True2");
		$designs=model("Designs");
	
		$shijuanshu=model("Shijuanhao");
		$tihao=intval(input("tihao"));
		$data;
		$c=1;
		$d=1;
		$e=1;
		
		$info=$choice->column('choice_id'); 
		$first=$info[0];
		$end=end($info);
		
		while($c<=8){
			$randnub=rand($first,$end);//可能会重复题
			$data12=[
			'choice_id1'=>$randnub,
			'examid'=>$shijuanshu,
			];
			$info1=$choice->where('choice_id',$randnub)->find();
			$info2=$choices->where($data12)->find();
			if($info2){
				continue;
				}
			else{
				if($c==1){
					$data = [
					'choice_info' => $info1['choice_info'],
					'choice_1' => $info1['choice_1'],
					'choice_2' => $info1['choice_2'],
					'choice_3' => $info1['choice_3'],
					'choice_4' => $info1['choice_4'],
					'tnumber' =>session('tnumber'), 
					'tclass' => $info1['tclass'],
					'tname'=>session('tname'),
					'examid' => $tihao,
					'choice_id1'=>$info1['choice_id'],
								];
								
					$dataa=[
					'shijuanname'=>$info1['tclass'],
					'shijuanhao'=>$tihao,
					'tname'=> session('tname'),
					
					];
				$shijuanshu->insert($dataa);
				$info1=$choices->insert($data);			
				$c++;
				
				}
				else{
					$data = [
					'choice_info' => $info1['choice_info'],
					'choice_1' => $info1['choice_1'],
					'choice_2' => $info1['choice_2'],
					'choice_3' => $info1['choice_3'],
					'choice_4' => $info1['choice_4'],
					'tnumber' =>session('tnumber'), 
					'tclass' => $info1['tclass'],
					'tname'=>session('tname'),
					'examid' => $tihao,
					'choice_id1'=>$info1['choice_id'],
								];
				$info1=$choices->insert($data);			
				$c++;
				
					}
				
				
				}
			}
				
		$info=$true1->column('true_id'); 
		$first=$info[0];
		$end=end($info);	
		while($d<=5){
			$randnub=rand($first,$end);
			$data13=[
			'true_id1'=>$randnub,
			'examid'=>$shijuanshu,
			];
			$info1=$true1->where('true_id',$randnub)->find();
			$info2=$true2->where($data13)->find();
			if($info2){		
				continue;		
				}
			else{
					$data = [
					'true_info' => $info1['true_info'],
					'tnumber' =>session('tnumber'), 
 				    'tclass' => $info1['tclass'],
					'examid' => $tihao,
					'tname'=>session('tname'),
					'true_id1'=>$info1['true_id'],
								];
				$info1=$true2->insert($data);			
				$d++;
			}
				} 
		$info=$design->column('design_id'); 
		$first=$info[0];
		$end=end($info);	
		while($e<=2){
			$randnub=rand($first,$end);
			$data14=[
			'design_id1'=>$randnub,
			'examid'=>$shijuanshu,
			];
			$info1=$design->where('design_id',$randnub)->find();
			$info2=$designs->where($data14)->find();
			if($info2){		
				continue;		
				}
			else{
					$data = [
					'design_ques' => $info1['design_ques'],
					'tnumber' =>session('tnumber'), 
 				    'tclass' => $info1['tclass'],
					'examid' => $tihao,
					'tname'=>session('tname'),
					'design_id1'=>$info1['design_id'],
								];
				$info1=$designs->insert($data);			
				$e++;
			}
				} 
		$this->success('添加试卷成功',url('/index/Teacher/shijuan'));

	}//添加试卷功能
	
	
	public function shijuan_list(){
	
		$exam=model("Shijuanhao");
		$list=$exam->select();
		$this->assign('list',$list);
		return $this->fetch();
	}//显示试卷信息
	
	public function a(){
		
		$choices=model("Choices");
		$true2=model("True2");
		$designs=model("Designs");
		
		$data=[
		'tclass'=>input('tclass'),
		'tname'=>input('tname'),
		'examid'=>intval(input('examid')),
		];
		
		$list1=$choices->where($data)->select();
	//	echo "<pre>";print_r($list1);die;
		$list2=$true2->where($data)->select();
		$list3=$designs->where($data)->select();
		$this->assign('list1',$list1);
		$this->assign('list2',$list2);
		$this->assign('list3',$list3);	
		return $this->fetch();	  

	}
	
	
	public function jieguo(){
		$snumber=intval(input('snumber'));
		//先自动进行判断
		
		$data=$_POST['name'];
		$choice=model('Choice');
		$choices=model('Choices');
		$sum=0;
		
		$data1=$choices->column('choice_id1');
		for($i=0;$i<8;$i++){
			$id=$data1[$i];
			$info=$choice->where('choice_id',$id)->find();
			if($info['choice_answ']==$data[$i]){
				$sum=$sum+5;
				}
			else{
				if($sum<=0){
					continue;
					}
				else{
					$sum=$sum-5;
					}
				}
			
			}//计算选择题得分
	
		$datatrue=$_POST['name1'];
		$true1=model('True1');	
		$true2=model('True2');
		$tclass;
		$data1=$true2->column('true_id1');
		for($i=0;$i<5;$i++){
			$id=$data1[$i];
			
			$info=$true1->where('true_id',$id)->find();
			$tclass=$info['tclass'];
			if($info['true_answ']==$data[$i]){
				$sum=$sum+5;
				}
			else{
				if($sum<=0){
					continue;
					}
				else{
					$sum=$sum-5;
					}
				}
			
			}//计算选择题得分
			
		$grade=model('Grade');
		$student=model('Student');
		$stuinfo=$student->where('snumber',$snumber)->find();
	
		$gradeinfo=[
			'snumber'=>$stuinfo['snumber'],
			'sname'=>$stuinfo['sname'],
			'sclass'=>$stuinfo['sclass'],
			'tclass'=>$tclass,
			'grade'=>$sum,
		];
		
		
		$grade->insert($gradeinfo);
		
		$datades=$_POST['name2'];
		$studata=model('Studentdata');
		$info6=model('Info');
		$infostudent=$studata->where('snumber',$snumber)->find();
		for($i=0;$i<2;$i++){
			$info5=[
		'snumber'=>$infostudent['snumber'],
		'tclass'=>$infostudent['tclass'],
		'examid'=>$infostudent['examid'],
		'info'=>$datades[$i],
		];
		$info6->insert($info5);
			}
		$this->success('交卷成功',url('/index/Student/index'));

		}
	
	public function gai(){
		
		$info6=model('Info');
		$snumber=intval(input('snumber'));
		$data=[
		  'snumber'=>intval(input('snumber')),
		  'tclass'=>input('tclass'),
		];
	
		$list=$info6->where($data)->select();
		
		$this->assign('list',$list);
		$this->assign('list1',$snumber);
		
		return $this->fetch();	 

		}
	public function grade(){
		$snumber=intval(input('snumber'));
		$name=$_POST['name'];
		$sum=0;
		for($i=0;$i<2;$i++){
			$sum+=intval($name[$i]);
		}
		$grade=model('Grade');
		$info=$grade->where('snumber',$snumber)->find();
		$sum1=intval($info['grade']);
		$sum2=$sum1+$sum;
	
		$grade->where('snumber',$snumber)->update(['grade'=>$sum2]);
		$this->success('批改成功',url('/index/Teacher/pigai'));
		}
	
	public function tongji(){
		$info=model('Grade');
		$list=$info->select();
		$this->assign('list',$list);
		return $this->fetch();	 

		
		
		}
		
		
		
		

}


?>
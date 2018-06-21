<?php
namespace App\Controller;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
class ModelController extends AppController{
	
	public function initialize() {
    	$this->viewBuilder()->layout('Model');  
    }

   	public function ac(){
        
	}
    public function acc(){
        
    }
    public function accc(){
        
    }
    public function adc(){
        
    }
    public function ade(){
        
    }
    public function apc(){
        
    }
    public function apcc(){
        
    }
    public function cr(){
        
    }
    public function crd(){
        
    }
    public function logout(){
        
    }
    public function mbd(){
        
    }
    public function mpd(){
        
    }
    public function mpe(){
        
    }
    public function mbpd(){
        
    }
    public function smb(){
        
    }
    public function smbd(){
        
    }

	public function signupm(){

	}

	public function index(){
		$this->Recruitments = TableRegistry::get('Recruitments');
        $this->Recruitment_menus = TableRegistry::get('Recruitment_menus');
        $this->Prices = TableRegistry::get('Prices');
        $this->Prefecture = TableRegistry::get('Prefecture');
        $this->Times = TableRegistry::get('Times');
        $data = $this->Recruitments->find('all');
//　ーーーーーーーーーーーーーーーーーーーーーーーメニュー配列ーーーーーーーーーーーーーーーーーーー
        $cnt = 1;
        foreach($data as $obj){
        	$menu = $this->Recruitment_menus->find('all');
        	foreach($menu as $obj2){
        		$array[$obj2->recruitment_id.$cnt] = $obj2->menu_id;
        		$cnt++;
        	}
        	$cnt = 1;
        }

//　ーーーーーーーーーーーーーーーーーーーーーーー検索ーーーーーーーーーーーーーーーーーーーーーーーー
        $kensaku = $this->Recruitments->find('all');
        
        if($this->request->is('get')){
        	$menuflg=0;
        	$priceflg=0;
        	if(isset($_GET['menu_id'])){
        		$menu_id=$_GET["menu_id"];
				// print_r($menu_id);
				$menu=$this->Recruitment_menus->find();
				
				foreach ($menu as $key) {
					// print_r($key['recruitment_id']);
					// print_r($key['menu_id']);
				}

				for($i=0;$i<count($menu_id);$i++){

					if($i==0){
						$menu=$menu->where(['menu_id = '=>$menu_id[$i]]);
					}else{
						$menu=$menu->orWhere(['menu_id = '=>$menu_id[$i]]);
					}
				}

				$menu = $menu->select('recruitment_id')->distinct('recruitment_id');
				$count = $menu->find('all')->count('*');
				$menuflg = 1;
				//デバッグ
        		foreach ($menu as $key) {
        			// print_r($key['recruitment_id']);
        		}
        	}

        	$this->Recruitments = TableRegistry::get('Recruitments');
        	$data = $this->Recruitments->find('all')->join([
    			'table'=>'User_profiles',
        		'alias'=>'u',
	        	'type'=>'LEFT',
	        	'conditions'=>'u.user_id=Recruitments.recruitment_user_id'
        	])->join([
	        	'table'=>'Prices',
	        	'alias'=>'pr',
	        	'type'=>'LEFT',
	        	'conditions'=>'pr.price_id=recruitment_price_id'
        	])->join([
	        	'table'=>'Prefecture',
	        	'alias'=>'p',
	        	'type'=>'LEFT',
	        	'conditions'=>'u.prefecture_id=p.prefecture_id'
        	])->join([
	        	'table'=>'Times',
	        	'alias'=>'tf',
	        	'type'=>'LEFT',
	        	'conditions'=>'Recruitments.recruitment_first_time_id=tf.time_id'
	        ])->join([
	        	'table'=>'Times',
	        	'alias'=>'tl',
	        	'type'=>'LEFT',
	        	'conditions'=>'Recruitments.recruitment_last_time_id=tl.time_id'
	        ])->select([
	        	'recruitment_id'=>'Recruitments.recruitment_id',
	            'price_id'=>'Recruitments.recruitment_price_id',
	            'user_name'=>'u.user_name',
	            'prefecture_id'=>'u.prefecture_id',
	            'prefecture_name' => 'p.prefecture_name',
	            'city_name'=>'u.city_name',
	            'recruitment_first_time'=>'tf.time',
	        	'recruitment_last_time'=>'tl.time',
	        	'price_first'=>'pr.price_first',
	        	'price_last'=>'pr.price_last',
	        ]);


//メニュー検索
        	if($menuflg==1){
				if(!$count==0){
					$cnt=1;
	        		foreach ($menu as $key){
	        			if($cnt == 1){
							$data=$data->where(['recruitment_id = '=>$key['recruitment_id']]);
						}else{
							$data=$data->orWhere(['recruitment_id = '=>$key['recruitment_id']]);
						}
	        			$cnt++;
	        		}

				}else{
					$data=$data->where(['recruitment_id = '=>-1]);
	        	}
	        }

//エリア検索（県名）
	        if(isset($_GET['prefecture'])){
	        	$pref=$_GET['prefecture'];
	        	
	        	if(!($pref==-1)){
	        		$data=$data->andWhere(['u.prefecture_id = '=>$pref]);
	        		$prefflg=1;
	        	}
	        }

//価格検索	
        	if(isset($_GET['price'])){
        		$price = $_GET["price"];
        		
        		if(!($price==-1)){
	        		$data=$data->andWhere(['recruitment_price_id = '=>$price+1]);
	        		$priceflg=1;
        		}		
        	}

//時刻検索

        	if(isset($_GET['zikoku'])){
        		if(!($_GET['zikoku']==-1)){
        			$zikoku = $_GET['zikoku'];
	        		echo $zikoku;
	        		$data=$data->andWhere(['recruitment_first_time_id <='=>$zikoku]);
	        		$data=$data->andWhere(['recruitment_last_time_id >='=>$zikoku]);
        		}

        	}



//　ーーーーーーーーーーーーーーーーーーーーーーー全検索ーーーーーーーーーーーーーーーーーーー

        }else if($this->request->is('get')){
        	$this->Recruitments = TableRegistry::get('Recruitments');
        	$data = $this->Recruitments->find('all')->join([
        	'table'=>'User_profiles',
        	'alias'=>'u',
        	'type'=>'LEFT',
        	'conditions'=>'u.user_id=Recruitments.recruitment_user_id'
        ])->join([
        	'table'=>'Prices',
        	'alias'=>'pr',
        	'type'=>'LEFT',
        	'conditions'=>'pr.price_id=recruitment_price_id'
        ])->join([
        	'table'=>'Prefecture',
        	'alias'=>'p',
        	'type'=>'LEFT',
        	'conditions'=>'p.prefecture_id=u.prefecture_id'
        ])->join([
        	'table'=>'Times',
        	'alias'=>'tf',
        	'type'=>'LEFT',
        	'conditions'=>'Recruitments.recruitment_first_time_id=tf.time_id'
        ])->join([
        	'table'=>'Times',
        	'alias'=>'tl',
        	'type'=>'LEFT',
        	'conditions'=>'Recruitments.recruitment_last_time_id=tl.time_id'
        ])->select([
        	'recruitment_id'=>'Recruitments.recruitment_id',
            'user_name'=>'u.user_name',
            'prefecture_name' => 'p.prefecture_name',
            'city_name'=>'u.city_name',
            'recruitment_first_time'=>'tf.time',
        	'recruitment_last_time'=>'tl.time',
        	'price_first'=>'pr.price_first',
        	'price_last'=>'pr.price_last',
        ]);
        }

        
//　ーーーーーーーーーーーーーーーーーーーーーーーメニュー結合ーーーーーーーーーーーーーーーーーーー
        $this->Menus = TableRegistry::get('Menus');

        $array2 = array();
        $cnt2=0;
        foreach($data as $obj3){
        	$array_ketugou=[];
        	for ($i=1; $i < 10; $i++) { 

        		if(isset($array[$obj3->recruitment_id*10+$i])){

        			$a=$array[$obj3->recruitment_id*10+$i];
        			$d = $this->Menus->get($a);
        			
        			$array_ketugou[]=$d['menu_name'];
        			$d=implode(" ",$array_ketugou);


        		}
        	}
//　ーーーーーーーーーーーーーーーーーーーーーーー渡す内容ーーーーーーーーーーーーーーーーーーー
        	$array2[$obj3->recruitment_id.$cnt2] = array(
        		'recruitment_id'=>$obj3['recruitment_id'],
        		'user_name'=>$obj3['user_name'],
        		'prefecture_name'=>$obj3['prefecture_name'],
        		'city_name'=>$obj3['city_name'],
        		'recruitment_first_time'=>$obj3['recruitment_first_time'],
        		'recruitment_last_time'=>$obj3['recruitment_last_time'],
        		'price_first'=>$obj3['price_first'],
        		'price_last'=>$obj3['price_last'],
        		'menu_name'=>$d
        	);
        	
        	$cnt2++;
        }
        $menuname=$this->Menus->find();
        $pri=$this->Prices->find();
        $pre=$this->Prefecture->find();
        $tim=$this->Times->find();
        $this->set('result', $array2);
        $this->set('youso',$menuname);
        $this->set('price',$pri);
        $this->set('pref',$pre);
        $this->set('time',$tim);


	}



}
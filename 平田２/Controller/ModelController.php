<?php
namespace App\Controller;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
class ModelController extends AppController{
	
	public function initialize() {
    	$this->viewBuilder()->layout('Model');
        $this->Recruitments = TableRegistry::get('Recruitments');
        $this->Recruitment_menus = TableRegistry::get('Recruitment_menus');
        $this->Recruitment_models = TableRegistry::get('Recruitment_models');
        $this->Menus = TableRegistry::get('Menus');
        $this->User_menus = TableRegistry::get('User_menus');
        $this->User_models = TableRegistry::get('User_models');
        $this->User_profiles = TableRegistry::get('User_profiles');
        $this->Prices = TableRegistry::get('Prices');
        $this->Prefecture = TableRegistry::get('Prefecture');
        $this->Times = TableRegistry::get('Times');
        $this->Users = TableRegistry::get('Users');
        $this->Professions = TableRegistry::get('Professions');
        
        session_start();
    }

   	public function ac(){
        $id=$this->Users->find('all')->where(['mailaddress = '=>$_SESSION['mailaddress']])->select(['user_id'=>'Users.user_id']);

        foreach ($id as $ids) {
            $user_id=$ids['user_id'];
        }

        $entity=$this->Recruitment_models->newEntity();
        $entity->recruitment_id=$this->request->data['id'];
        $entity->user_id=$user_id;
        $entity->modelflg=0;
        $result=$this->Recruitment_models->save($entity);
	}
    public function acc(){
        $this->set('result',$this->request->data['id'] );
    }
    public function accc(){
        $id=$this->Users->find('all')->where(['mailaddress = '=>$_SESSION['mailaddress']])->select(['user_id'=>'Users.user_id']);

        foreach ($id as $ids) {
            $user_id=$ids['user_id'];
        }

        $this->Recruitment_models->deleteAll(['user_id'=>$user_id,'recruitment_id'=>$this->request->data['id']]);
    }
    // public function adc(){
        
    // }
    // public function ade(){
        
    // }
    // public function apc(){
        
    // }
    // public function apcc(){
        
    // }
    // public function cr(){
        
    // }
    // public function crd(){
        
    // }
    // public function logout(){
        
    // }
    public function mbd(){


$data = $this->Recruitments->find('all')->where(["Recruitments.recruitment_id = " => $this->request->data['data']])->join([
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
            'table'=>'Users',
            'alias'=>'us',
            'type'=>'LEFT',
            'conditions'=>'u.user_id=us.user_id'
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
            'recruitment_title'=>'Recruitments.recruitment_title',
            'recruitment_comment'=>'Recruitments.recruitment_comment',
            'user_name'=>'u.user_name',
            'prefecture_name' => 'p.prefecture_name',
            'city_name'=>'u.city_name',
            'recruitment_date'=>'Recruitments.recruitment_date',
            'recruitment_first_time'=>'tf.time',
            'recruitment_last_time'=>'tl.time',
            'price_first'=>'pr.price_first',
            'price_last'=>'pr.price_last',
            'user_profession'=>'u.user_profession',
            'user_age'=>'u.user_age',
            'user_sex'=>'u.user_sex',

        ]);
//　ーーーーーーーーーーーーーーーーーーーーーーーメニュー配列ーーーーーーーーーーーーーーーーーーー
        
            $menu = $this->Recruitment_menus->find('all');
            foreach($menu as $obj2){
                $array[$obj2->recruitment_id.$obj2->menu_id] = $obj2->menu_id;   
            }
        
        print_r($array);

//　ーーーーーーーーーーーーーーーーーーーーーーーメニュー結合ーーーーーーーーーーーーーーーーーーー

        $array2 = array();
        foreach($data as $obj3){
            $array_ketugou=[];
            $me = $this->Menus->find('all');
            foreach($me as $obj4) {

                if(isset($array[$obj3->recruitment_id.$obj4->menu_id])){

                    $a=$array[$obj3->recruitment_id.$obj4->menu_id];
                    $d = $this->Menus->get($a);
                    
                    $array_ketugou[]=$d['menu_name'];
                    $d=implode(" ",$array_ketugou);
                }
            }



            $images = $this->User_profiles->find('all')->join([
            'table'=>'Users',
            'alias'=>'us',
            'type'=>'LEFT',
            'conditions'=>'User_profiles.user_id=us.user_id'
        ])->select([
            'image'=>'User_profiles.image',
        ])->andWhere(['us.mailaddress = '=>$_SESSION['mailaddress']]);
//　ーーーーーーーーーーーーーーーーーーーーーーー渡す内容ーーーーーーーーーーーーーーーーーーー
            $array2[$obj3->recruitment_id] = array(
                'recruitment_id'=>$obj3['recruitment_id'],
                'image'=>$images,
                'recruitment_title'=>$obj3['recruitment_title'],
                'recruitment_comment'=>$obj3['recruitment_comment'],
                'user_name'=>$obj3['user_name'],
                'prefecture_name'=>$obj3['prefecture_name'],
                'city_name'=>$obj3['city_name'],
                'recruitment_date'=>$obj3['recruitment_date'],
                'recruitment_first_time'=>$obj3['recruitment_first_time'],
                'recruitment_last_time'=>$obj3['recruitment_last_time'],
                'price_first'=>$obj3['price_first'],
                'price_last'=>$obj3['price_last'],
                'user_sex'=>$obj3['user_sex'],
                'user_profession'=>$obj3['user_profession'],
                'user_age'=>$obj3['user_age'],
                'menu_name'=>$d
            );
            
        }
        


        $this->set('result', $array2);

    }
    public function mpd(){
        if($this->request->is('post')){
            $entity=$this->User_profiles->get($this->request->data['id']);
            $entity->user_name=$this->request->data['user_name'];
            $entity->user_sex=$this->request->data['user_sex'];
            $entity->user_profession=$this->request->data['user_profession'];
            $entity->city_name=$this->request->data['city_name'];
            $entity->user_comment=$this->request->data['user_comment'];
            $entity->prefecture_id=$this->request->data['prefecture_id'];
            $this->User_profiles->save($entity);


            $entity=$this->User_models->get($this->request->data['id']);
            $entity->user_first_time_id=$this->request->data['user_first_time_id'];
            $entity->user_last_time_id=$this->request->data['user_last_time_id'];
            $entity->user_price_id=$this->request->data['price_id']+1;
            $this->User_models->save($entity);

            $this->User_menus->deleteAll(['user_id'=>$this->request->data['id']]);

            foreach ($this->request->data['check'] as $key => $value) {
                if($value==1){
                    $data[] = [

                        'user_id' => $this->request->data['id'],
                        'menu_id' => $key+1
                    ];
                }
            }
            // print_r($data);
            $entities = $this->User_menus->newEntities($data);

            // Entitiesの分だけ保存処理
            foreach ($entities as $entity) {
                // Save entity
                $this->User_menus->save($entity);
            }
        }

        $hyoji=$this->Users->find('all')->where(['mailaddress = '=>$_SESSION['mailaddress']])->join([
            'table'=>'User_profiles',
            'alias'=>'us',
            'type'=>'LEFT',
            'conditions'=>'us.user_id=Users.user_id'
        ])->join([
            'table'=>'Prefecture',
            'alias'=>'p',
            'type'=>'LEFT',
            'conditions'=>'us.prefecture_id=p.prefecture_id'
        ])->join([
            'table'=>'User_models',
            'alias'=>'um',
            'type'=>'LEFT',
            'conditions'=>'um.user_id=Users.user_id'
        ])->join([
            'table'=>'Prices',
            'alias'=>'pr',
            'type'=>'LEFT',
            'conditions'=>'pr.price_id=um.user_price_id'
        ])->join([
            'table'=>'Times',
            'alias'=>'tf',
            'type'=>'LEFT',
            'conditions'=>'um.user_first_time_id=tf.time_id'
        ])->join([
            'table'=>'Times',
            'alias'=>'tl',
            'type'=>'LEFT',
            'conditions'=>'um.user_last_time_id=tl.time_id'
        ])->select([
            'user_id'=>'us.user_id',
            'user_name'=>'us.user_name',
            'user_sex'=>'us.user_sex',
            'user_profession'=>'us.user_profession',
            'prefecture_name'=>'p.prefecture_name',
            'city_name'=>'us.city_name',
            'user_comment'=>'us.user_comment',
            'price_first'=>'pr.price_first',
            'price_last'=>'pr.price_last',
            'first_time'=>'tf.time',
            'last_time'=>'tl.time',
        ]);

        $id=$this->Users->find('all')->where(['mailaddress = '=>$_SESSION['mailaddress']])->select(['user_id'=>'Users.user_id']);
        foreach ($id as $ids) {
            $user_id=$ids['user_id'];
        }

        $menu_name=$this->User_menus->find('all')->where(['user_id = '=>$user_id])->join([
            'table'=>'Menus',
            'alias'=>'m',
            'type'=>'LEFT',
            'conditions'=>'m.menu_id=User_menus.menu_id'
        ])->select(['menu_name'=>'m.menu_name']);
        
        $array_ketugou=[];
        foreach ($menu_name as $key) {

            $array_ketugou[]=$key['menu_name'];
            $d=implode(" ",$array_ketugou);
        }
        foreach ($hyoji as $obj3) {
            $array2[] = array(
                'user_id'=>$obj3['user_id'],
                'user_name'=>$obj3['user_name'],
                'user_sex'=>$obj3['user_sex'],
                'user_profession'=>$obj3['user_profession'],
                'prefecture_name'=>$obj3['prefecture_name'],
                'city_name'=>$obj3['city_name'],
                'user_comment'=>$obj3['user_comment'],
                'price_first'=>$obj3['price_first'],
                'price_last'=>$obj3['price_last'],
                'first_time'=>$obj3['first_time'],
                'last_time'=>$obj3['last_time'],
                'menu_name'=>$d
            );
        }
            
        
        $this->set('result', $array2);
    }
    public function mpe(){
        $hyoji=$this->Users->find('all')->where(['mailaddress = '=>$_SESSION['mailaddress']])->join([
            'table'=>'User_profiles',
            'alias'=>'us',
            'type'=>'LEFT',
            'conditions'=>'us.user_id=Users.user_id'
        ])->join([
            'table'=>'Prefecture',
            'alias'=>'p',
            'type'=>'LEFT',
            'conditions'=>'us.prefecture_id=p.prefecture_id'
        ])->join([
            'table'=>'User_models',
            'alias'=>'um',
            'type'=>'LEFT',
            'conditions'=>'um.user_id=Users.user_id'
        ])->join([
            'table'=>'Prices',
            'alias'=>'pr',
            'type'=>'LEFT',
            'conditions'=>'pr.price_id=user_price_id'
        ])->select([
            'user_id'=>'Users.user_id',
            'prefecture_id'=>'p.prefecture_id',
            'user_name'=>'us.user_name',
            'user_sex'=>'us.user_sex',
            'user_age'=>'us.user_age',
            'user_profession'=>'us.user_profession',
            'prefecture_name'=>'p.prefecture_name',
            'city_name'=>'us.city_name',
            'user_comment'=>'us.user_comment',
            'price_id'=>'um.user_price_id',
            'user_first_time_id'=>'um.user_first_time_id',
            'user_last_time_id'=>'um.user_last_time_id',
            'price_first'=>'pr.price_first',
            'price_last'=>'pr.price_last',
        ]);



        $price = $this->Prices->find();

            
        $menuid=$this->User_menus->find('all')->where(["user_id = " => $this->request->data['id']])->select(['menu_id'=>'User_menus.menu_id']);
        $menuname=$this->Menus->find();
        $this->set('result2',$menuid);
        $this->set('youso',$menuname);
        $this->set('kakaku',$price);

        $tim=$this->Times->find();
        $this->set('time',$tim);


        $pre=$this->Prefecture->find();
        $this->set('pre', $pre);
        $sex = ['男','女'];
        $this->set('sex',$sex);    
        $this->set('result', $hyoji);
    }
    public function mbpd(){
        
    }
    public function smb(){
        //自分のidを取得
        $id=$this->Users->find('all')->where(['mailaddress = '=>$_SESSION['mailaddress']])->select(['user_id'=>'Users.user_id']);
        foreach ($id as $ids) {
            $user_id=$ids['user_id'];
        }

        $hyoji=$this->Recruitment_models->find('all')->where(['Recruitment_models.user_id = '=>$user_id])->join([
            'table'=>'Recruitments',
            'alias'=>'r',
            'type'=>'LEFT',
            'conditions'=>'r.recruitment_id=Recruitment_models.recruitment_id'
        ])->join([
            'table'=>'User_profiles',
            'alias'=>'u',
            'type'=>'LEFT',
            'conditions'=>'u.user_id=r.recruitment_user_id'
        ])->join([
            'table'=>'Prices',
            'alias'=>'p',
            'type'=>'LEFT',
            'conditions'=>'p.price_id=r.recruitment_price_id'
        ])->join([
            'table'=>'Times',
            'alias'=>'tf',
            'type'=>'LEFT',
            'conditions'=>'tf.time_id=r.recruitment_first_time_id'
        ])->join([
            'table'=>'Times',
            'alias'=>'tl',
            'type'=>'LEFT',
            'conditions'=>'tl.time_id=r.recruitment_last_time_id'
        ])->join([
            'table'=>'Prefecture',
            'alias'=>'pr',
            'type'=>'LEFT',
            'conditions'=>'pr.prefecture_id=u.prefecture_id'
        ])->select([
            'recruitment_id'=>'r.recruitment_id',
            'user_name'=>'u.user_name',
            'price_first'=>'p.price_first',
            'price_last'=>'p.price_last',
            'first_time'=>'tf.time',
            'last_time'=>'tl.time',
            'prefecture_name'=>'pr.prefecture_name',
            'city_name'=>'u.city_name',
            'recruitment_date'=>'r.recruitment_date',
        ]);

//メニューうんたら

            $menu=$this->Recruitment_models->find('all')->join([
                'table'=>'Recruitment_menus',
                'alias'=>'r',
                'type'=>'LEFT',
                'conditions'=>'r.recruitment_id=Recruitment_models.recruitment_id'
            ])->select(['recruitment_id'=>'Recruitment_models.recruitment_id','menu_id'=>'r.menu_id'])->where([
                'Recruitment_models.user_id = '=>$user_id
            ]);

            foreach ($menu as $key) {
                $array[$key->recruitment_id.$key->menu_id] = $key->menu_id;  
            }




            $array2 = array();
            foreach($hyoji as $obj3){
                $array_ketugou=[];
                $me = $this->Menus->find('all');
                foreach($me as $obj4) {

                    if(isset($array[$obj3->recruitment_id.$obj4->menu_id])){

                        $a=$array[$obj3->recruitment_id.$obj4->menu_id];
                        $d = $this->Menus->get($a);
                        
                        $array_ketugou[]=$d['menu_name'];
                        $d=implode(" ",$array_ketugou);
                    }
                }

    //　ーーーーーーーーーーーーーーーーーーーーーーー渡す内容ーーーーーーーーーーーーーーーーーーー
                $array2[$obj3->recruitment_id] = array(
                    'recruitment_id'=>$obj3['recruitment_id'],
                    'user_name'=>$obj3['user_name'],
                    'price_first'=>$obj3['price_first'],
                    'price_last'=>$obj3['price_last'],
                    'first_time'=>$obj3['first_time'],
                    'last_time'=>$obj3['last_time'],
                    'prefecture_name'=>$obj3['prefecture_name'],
                    'city_name'=>$obj3['city_name'],
                    'recruitment_date'=>$obj3['recruitment_date'],
                    'menu_name'=>$d
                );
                
            }



            



$this->set('result', $array2);
    }
    public function smbd(){
        $data = $this->Recruitments->find('all');
//　ーーーーーーーーーーーーーーーーーーーーーーーメニュー配列ーーーーーーーーーーーーーーーーーーー
        
        foreach($data as $obj){
            $menu = $this->Recruitment_menus->find('all');
            foreach($menu as $obj2){
                $array[$obj2->recruitment_id.$obj2->menu_id] = $obj2->menu_id;   
            }
        }
        print_r($array);

$data = $this->Recruitments->find('all')->where(["Recruitments.recruitment_id = " => $this->request->data['id']])->join([
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
            'table'=>'Users',
            'alias'=>'us',
            'type'=>'LEFT',
            'conditions'=>'u.user_id=us.user_id'
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
            'recruitment_title'=>'Recruitments.recruitment_title',
            'recruitment_comment'=>'Recruitments.recruitment_comment',
            'user_name'=>'u.user_name',
            'prefecture_name' => 'p.prefecture_name',
            'city_name'=>'u.city_name',
            'recruitment_date'=>'Recruitments.recruitment_date',
            'recruitment_first_time'=>'tf.time',
            'recruitment_last_time'=>'tl.time',
            'price_first'=>'pr.price_first',
            'price_last'=>'pr.price_last',
            'user_profession'=>'u.user_profession',
            'user_age'=>'u.user_age',
            'user_sex'=>'u.user_sex',

        ]);


//　ーーーーーーーーーーーーーーーーーーーーーーーメニュー結合ーーーーーーーーーーーーーーーーーーー

        $array2 = array();
        foreach($data as $obj3){
            $array_ketugou=[];
            $me = $this->Menus->find('all');
            foreach($me as $obj4) {

                if(isset($array[$obj3->recruitment_id.$obj4->menu_id])){

                    $a=$array[$obj3->recruitment_id.$obj4->menu_id];
                    $d = $this->Menus->get($a);
                    
                    $array_ketugou[]=$d['menu_name'];
                    $d=implode(" ",$array_ketugou);
                }
            }

            $images = $this->User_profiles->find('all')->join([
            'table'=>'Users',
            'alias'=>'us',
            'type'=>'LEFT',
            'conditions'=>'User_profiles.user_id=us.user_id'
        ])->select([
            'image'=>'User_profiles.image',
        ])->andWhere(['us.mailaddress = '=>$_SESSION['mailaddress']]);
//　ーーーーーーーーーーーーーーーーーーーーーーー渡す内容ーーーーーーーーーーーーーーーーーーー
            $array2[$obj3->recruitment_id] = array(
                'recruitment_id'=>$obj3['recruitment_id'],
                'image'=>$images,
                'recruitment_title'=>$obj3['recruitment_title'],
                'recruitment_comment'=>$obj3['recruitment_comment'],
                'user_name'=>$obj3['user_name'],
                'prefecture_name'=>$obj3['prefecture_name'],
                'city_name'=>$obj3['city_name'],
                'recruitment_date'=>$obj3['recruitment_date'],
                'recruitment_first_time'=>$obj3['recruitment_first_time'],
                'recruitment_last_time'=>$obj3['recruitment_last_time'],
                'price_first'=>$obj3['price_first'],
                'price_last'=>$obj3['price_last'],
                'user_sex'=>$obj3['user_sex'],
                'user_profession'=>$obj3['user_profession'],
                'user_age'=>$obj3['user_age'],
                'menu_name'=>$d
            );
            
        }
        


        $this->set('result', $array2);
    }

	public function signupm(){
        $menuname=$this->Menus->find();
        $pro=$this->Professions->find();
        $pre=$this->Prefecture->find();
        $pri=$this->Prices->find();
        $tim=$this->Times->find();
        $this->set('youso',$menuname);
        $this->set('prof',$pro);
        $this->set('pref',$pre);
        $this->set('time',$tim);
        $this->set('price',$pri);
	}

	public function index(){



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
                'recruitment_date'=>'Recruitments.recruitment_date',
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
            'recruitment_date'=>'Recruitments.recruitment_date',
        	'recruitment_last_time'=>'tl.time',
        	'price_first'=>'pr.price_first',
        	'price_last'=>'pr.price_last',
        ]);
        }

//　ーーーーーーーーーーーーーーーーーーーーーーーメニュー配列ーーーーーーーーーーーーーーーーーーー

            $menu = $this->Recruitment_menus->find('all');
            foreach($menu as $obj2){
                $array[$obj2->recruitment_id.$obj2->menu_id] = $obj2->menu_id;
            }
        
//　ーーーーーーーーーーーーーーーーーーーーーーーメニュー結合ーーーーーーーーーーーーーーーーーーー
        $this->Menus = TableRegistry::get('Menus');

        $array2 = array();
        $cnt2=0;
        foreach($data as $obj3){
        	$array_ketugou=[];
            $me = $this->Menus->find('all');
            foreach ($me as $obj) {
                if(isset($array[$obj3->recruitment_id.$obj->menu_id])){

                    $a=$array[$obj3->recruitment_id.$obj->menu_id];
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
                'recruitment_date'=>$obj3['recruitment_date'],
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
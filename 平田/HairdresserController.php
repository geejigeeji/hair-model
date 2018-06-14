<?php
namespace App\Controller;
use Cake\ORM\TableRegistry;
class HairdresserController extends AppController{

		public function index(){
		
		
		$this->Recruitments = TableRegistry::get('Recruitments');
        $this->Recruitment_menus = TableRegistry::get('Recruitment_menus');
        $this->User_menus = TableRegistry::get('User_menus');
        $this->User_profiles = TableRegistry::get('User_profiles');
        $this->Prices = TableRegistry::get('Prices');
        $this->Prefecture = TableRegistry::get('Prefecture');
        $this->Times = TableRegistry::get('Times');

        $data = $this->Recruitments->find('all');
//　ーーーーーーーーーーーーーーーーーーーーーーーメニュー配列ーーーーーーーーーーーーーーーーーーー
        $cnt = 1;
        foreach($data as $obj){
        	$menu = $this->User_menus->find('all');
        	foreach($menu as $obj2){
        		$array[$obj2->user_id.$cnt] = $obj2->menu_id;
        		$cnt++;
        	}
        	$cnt = 1;
        }
//　ーーーーーーーーーーーーーーーーーーーーーーー検索ーーーーーーーーーーーーーーーーーーーーーーーー
        $kensaku = $this->Recruitments->find('all');
        
        if($this->request->is('post')){
        	        	$menuflg=0;
        	$priceflg=0;
        	if(isset($_POST['menu_id'])){
        		$menu_id=$_POST["menu_id"];
				// print_r($menu_id);
				$menu=$this->User_menus->find();
				
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

				$menu = $menu->select('user_id')->distinct('user_id');
				$count = $menu->find('all')->count('*');
				$menuflg = 1;
				//デバッグ
        		foreach ($menu as $key) {
        			// print_r($key['recruitment_id']);
        		}
        	}

        	$this->Recruitments = TableRegistry::get('Recruitments');
        	$data = $this->User_profiles->find('all')->join([
        	'table'=>'User_models',
        	'alias'=>'u',
        	'type'=>'LEFT',
        	'conditions'=>'u.user_id=User_profiles.user_id'
        ])->join([
        	'table'=>'Prices',
        	'alias'=>'pr',
        	'type'=>'LEFT',
        	'conditions'=>'pr.price_id=u.user_price_id'
        ])->join([
        	'table'=>'Users',
        	'alias'=>'us',
        	'type'=>'LEFT',
        	'conditions'=>'us.user_id=User_profiles.user_id'
        ])->join([
        	'table'=>'Prefecture',
        	'alias'=>'p',
        	'type'=>'LEFT',
        	'conditions'=>'User_profiles.prefecture_id=p.prefecture_id'
        ])->join([
        	'table'=>'Times',
        	'alias'=>'tf',
        	'type'=>'LEFT',
        	'conditions'=>'u.user_first_time_id=tf.time_id'
        ])->join([
        	'table'=>'Times',
        	'alias'=>'tl',
        	'type'=>'LEFT',
        	'conditions'=>'u.user_last_time_id=tl.time_id'
        ])->select([
        	'user_id'=>'User_profiles.user_id',
            'user_name'=>'User_profiles.user_name',
            'prefecture_name' => 'p.prefecture_name',
            'city_name'=>'User_profiles.city_name',
            'user_first_time'=>'tf.time',
        	'user_last_time'=>'tl.time',
        	'price_first'=>'pr.price_first',
        	'price_last'=>'pr.price_last',
        ])->where(['us.modelflg = '=>0]);


//メニュー検索
        	if($menuflg==1){
				if(!($count==0)){
					$cnt=1;
	        		foreach ($menu as $key){
	        			if($cnt == 1){
							$data=$data->where(['User_profiles.user_id = '=>$key['user_id']]);
						}else{
							$data=$data->orWhere(['User_profiles.user_id = '=>$key['user_id']]);
						}
	        			$cnt++;
	        		}

				}else{
					$data=$data->where(['User_profiles.user_id = '=>-1]);
	        	}
	        }

//エリア検索（県名）
	        if(isset($_POST['prefecture'])){
	        	$pref=$_POST['prefecture'];
	        	
	        	if(!($pref==-1)){
	        		$data=$data->andWhere(['User_profiles.prefecture_id = '=>$pref]);
	        		$prefflg=1;
	        	}
	        }

//価格検索	
        	if(isset($_POST['price'])){
        		$price = $_POST["price"];
        		
        		if(!($price==-1)){
	        		$data=$data->andWhere(['user_price_id = '=>$price+1]);
	        		$priceflg=1;
        		}		
        	}

//時刻検索

        	if(isset($_POST['zikoku'])){
        		if(!($_POST['zikoku']==-1)){
        			$zikoku = $_POST['zikoku'];
	        		$data=$data->andWhere(['user_first_time_id <='=>$zikoku]);
	        		$data=$data->andWhere(['user_last_time_id >='=>$zikoku]);
        		}

        	}



//　ーーーーーーーーーーーーーーーーーーーーーーー全検索ーーーーーーーーーーーーーーーーーーー

        }else if($this->request->is('get')){
        	$this->Recruitments = TableRegistry::get('Recruitments');
        	$this->User_profiles = TableRegistry::get('User_profiles');
        	$data = $this->User_profiles->find('all')->join([
        	'table'=>'User_models',
        	'alias'=>'u',
        	'type'=>'LEFT',
        	'conditions'=>'u.user_id=User_profiles.user_id'
        ])->join([
        	'table'=>'Prices',
        	'alias'=>'pr',
        	'type'=>'LEFT',
        	'conditions'=>'pr.price_id=u.user_price_id'
        ])->join([
        	'table'=>'Users',
        	'alias'=>'us',
        	'type'=>'LEFT',
        	'conditions'=>'us.user_id=User_profiles.user_id'
        ])->join([
        	'table'=>'Prefecture',
        	'alias'=>'p',
        	'type'=>'LEFT',
        	'conditions'=>'User_profiles.prefecture_id=p.prefecture_id'
        ])->join([
        	'table'=>'Times',
        	'alias'=>'tf',
        	'type'=>'LEFT',
        	'conditions'=>'u.user_first_time_id=tf.time_id'
        ])->join([
        	'table'=>'Times',
        	'alias'=>'tl',
        	'type'=>'LEFT',
        	'conditions'=>'u.user_last_time_id=tl.time_id'
        ])->select([
        	'user_id'=>'User_profiles.user_id',
            'user_name'=>'User_profiles.user_name',
            'prefecture_name' => 'p.prefecture_name',
            'city_name'=>'User_profiles.city_name',
            'user_first_time'=>'tf.time',
        	'user_last_time'=>'tl.time',
        	'price_first'=>'pr.price_first',
        	'price_last'=>'pr.price_last',
        ])->where(['us.modelflg = '=>0]);
        }

        
//　ーーーーーーーーーーーーーーーーーーーーーーーメニュー結合ーーーーーーーーーーーーーーーーーーー
        $this->Menus = TableRegistry::get('Menus');
        $array2 = array();
        $cnt2=0;
        foreach($data as $obj3){

        	$array_ketugou=[];
        	for ($i=1; $i < 10; $i++) { 

        		if(isset($array[$obj3->user_id*10+$i])){

        			$a=$array[$obj3->user_id*10+$i];
        			$d = $this->Menus->get($a);
        			
        			$array_ketugou[]=$d['menu_name'];
        			$d=implode(" ",$array_ketugou);


        		}
        	}
//　ーーーーーーーーーーーーーーーーーーーーーーー渡す内容ーーーーーーーーーーーーーーーーーーー
        	$array2[$obj3->recruitment_id.$cnt2] = array(
        		'user_id'=>$obj3['user_id'],
        		'user_name'=>$obj3['user_name'],
        		'prefecture_name'=>$obj3['prefecture_name'],
        		'city_name'=>$obj3['city_name'],
        		'user_first_time'=>$obj3['user_first_time'],
        		'user_last_time'=>$obj3['user_last_time'],
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
        $this->set('time',$tim);
        $this->set('result', $array2);
        $this->set('youso',$menuname);
        $this->set('price',$pri);
        $this->set('pref',$pre);

	}




	public function mbph(){

		$this->Recruitments = TableRegistry::get('Recruitments');
        $this->Recruitment_menus = TableRegistry::get('Recruitment_menus');

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
        
        if($this->request->is('post')){
        	if(isset($_POST['menu_id'])){
        		$menu_id=$_POST["menu_id"];
				

				foreach ($data as $objmenu) {
					$menu2 = $this->Recruitment_menus->find('all',array('conditions' => array('recruitment_id' => $objmenu->recruitment_id)));
					// echo $objmenu->recruitment_id;
					$cnt = 1;
					foreach ($menu_id as $key) {
						$menu.$cnt = $key;
						$cnt++;
						echo $objmenu->menu_id;
					}
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
            'user_name'=>'u.user_name',
            'prefecture_name' => 'p.prefecture_name',
            'city_name'=>'u.city_name',
            'recruitment_first_time'=>'tf.time',
        	'recruitment_last_time'=>'tl.time',
        	'price_first'=>'pr.price_first',
        	'price_last'=>'pr.price_last',
        ])->where(['us.modelflg = '=>1]);
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
        		'recruitment_title'=>$obj3['recruitment_title'],
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

        $this->set('result', $array2);

	}

	public function del(){
	$this->Recruitments = TableRegistry::get('Recruitments');
	$this->Recruitment_menus = TableRegistry::get('Recruitment_menus');
		if($this->request->is('post')){

			$entity = $this->Recruitments->get($this->request->data['data']);
			$entity2 = $this->Recruitment_menus->find()->where(["recruitment_id = " => $this->request->data['data']]);
        	$this->Recruitments->delete($entity);
        	foreach ($entity2 as $key) {
        		$this->Recruitment_menus->delete($key);
        	}
			
		}

		return $this->redirect(['action' => 'index']);
	
	}
	public function edit(){
		$this->Recruitments = TableRegistry::get('Recruitments');
		$this->Recruitment_menus = TableRegistry::get('Recruitment_menus');
		$this->Menus = TableRegistry::get('Menus');
		$this->Prices = TableRegistry::get('Prices');
		$this->Times = TableRegistry::get('Times');
		$kousin = $this->Recruitments->find('all')->where(["recruitment_id = " => $this->request->data['data']])->join([
        	'table'=>'Prices',
        	'alias'=>'pr',
        	'type'=>'LEFT',
        	'conditions'=>'pr.price_id=recruitment_price_id'
        ])->select([
        	'recruitment_id'=>'Recruitments.recruitment_id',
        	'recruitment_date'=>'Recruitments.recruitment_date',
        	'recruitment_first_time'=>'Recruitments.recruitment_first_time_id',
        	'recruitment_last_time'=>'Recruitments.recruitment_last_time_id',
			'recruitment_people'=>'Recruitments.recruitment_people',
			'recruitment_title'=>'Recruitments.recruitment_title',
			'recruitment_comment'=>'Recruitments.recruitment_comment',
			'recruitment_price_id'=>'Recruitments.recruitment_price_id',
        	'price_first'=>'pr.price_first',
        	'price_last'=>'pr.price_last',
        ]);

        $price = $this->Prices->find();

			
        $menuid=$this->Recruitment_menus->find('all')->where(["recruitment_id = " => $this->request->data['data']])->select(['menu_id'=>'Recruitment_menus.menu_id']);


        $menuname=$this->Menus->find();



		$this->set('result', $kousin);
		$this->set('result2',$menuid);
		$this->set('youso',$menuname);
		$this->set('kakaku',$price);

		$tim=$this->Times->find();
		$this->set('time',$tim);
		$sizes = ['1','2','3','4','5'];
		$this->set('sizes',$sizes);

	}

	public function editpage(){
		$this->Recruitments = TableRegistry::get('Recruitments');
		$this->Recruitment_menus = TableRegistry::get('Recruitment_menus');
		$this->Times = TableRegistry::get('Times');
		if($this->request->is('put')){
			// var_dump($this->request->data);

			$entity=$this->Recruitments->get($this->request->data['id']);
			$entity->recruitment_first_time_id=$this->request->data['recruitment_first_time_id'];
			$entity->recruitment_last_time_id=$this->request->data['recruitment_last_time_id'];
			$entity->recruitment_people=$this->request->data['recruitment_people']+1;
			$entity->recruitment_date=$this->request->data['recruitment_date'];
			$entity->recruitment_title=$this->request->data['recruitment_title'];
			$entity->recruitment_comment=$this->request->data['recruitment_comment'];
			$entity->recruitment_price_id=$this->request->data['recruitment_price_id']+1;
			$this->Recruitments->save($entity);

			$this->Recruitment_menus->deleteAll(['recruitment_id'=>$this->request->data['id']]);

			foreach ($this->request->data['check'] as $key => $value) {
				if($value==1){
					$data[] = [

	        			'recruitment_id' => $this->request->data['id'],
	        			'menu_id' => $key+1
	    			];
				}
			}
			// print_r($data);
			$entities = $this->Recruitment_menus->newEntities($data);

			// Entitiesの分だけ保存処理
			foreach ($entities as $entity) {
			    // Save entity
			    $this->Recruitment_menus->save($entity);
			}
		}


		return $this->redirect(['action' => 'mbph']);
		
		
	}


	public function henkou(){
		
		$this->Recruitments = TableRegistry::get('Recruitments');
		$entity=$this->Recruitments->get($this->request->data['id']);
		$entity->recruitment_state=1;
		$this->Recruitments->save($entity);
		return $this->redirect(['action' => 'mbph']);
	}



}
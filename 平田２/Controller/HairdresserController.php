<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
class HairdresserController extends AppController{
     public function initialize() {
        $this->viewBuilder()->layout('Hairdresser');
        $this->Recruitments = TableRegistry::get('Recruitments');
        $this->Recruitment_menus = TableRegistry::get('Recruitment_menus');
        $this->Recruitment_models = TableRegistry::get('Recruitment_models');
        $this->Menus = TableRegistry::get('Menus');
        $this->User_models = TableRegistry::get('User_models');
        $this->User_menus = TableRegistry::get('User_menus');
        $this->User_profiles = TableRegistry::get('User_profiles');
        $this->Prices = TableRegistry::get('Prices');
        $this->Prefecture = TableRegistry::get('Prefecture');
        $this->Times = TableRegistry::get('Times');
        $this->Users = TableRegistry::get('Users');
        $this->Professions = TableRegistry::get('Professions');
        
        session_start();
    }
	public function ad(){
        $count=$this->Recruitment_models->find()->where(['recruitment_id' => $this->request->data['recruitment_id']])->andWhere(['selectflg'=>1])->count();
        $zyougen=$this->Recruitments->find()->where(['recruitment_id' => $this->request->data['recruitment_id']])->select(['recruitment_people'=>'Recruitments.recruitment_people']);
        foreach ($zyougen as $key) {
            $max=$key['recruitment_people'];
        }
        if(($count+1)>=$max){
            $this->set('seni','ade');
        }else{
            $this->set('seni','adc');
        }
        $this->set('result',$this->request->data['id'] );
        $this->set('result2',$this->request->data['recruitment_id'] );
	}
    public function adc(){
            $this->set('result2',$this->request->data['recruitment_id'] );
            $entity=$this->Recruitment_models->get(['recruitment_id' => $this->request->data['recruitment_id'],'user_id' => $this->request->data['id']]);
            $entity->selectflg=1;
            $this->Recruitment_models->save($entity);
        
    }
    public function ade(){
        $this->set('result2',$this->request->data['recruitment_id'] );
        $entity=$this->Recruitment_models->get(['recruitment_id' => $this->request->data['recruitment_id'],'user_id' => $this->request->data['id']]);
        $entity->selectflg=1;
        $this->Recruitment_models->save($entity);
        $entity=$this->Recruitments->get($this->request->data['recruitment_id']);
        $entity->recruitment_state=1;
        $this->Recruitments->save($entity);
    }
    public function al(){
         //自分のidを取得
        $id=$this->Users->find('all')->where(['mailaddress = '=>$_SESSION['mailaddress']])->select(['user_id'=>'Users.user_id']);
        foreach ($id as $ids) {
            $user_id=$ids['user_id'];
        }

        $data = $this->Recruitment_models->find('all')->where(["Recruitment_models.recruitment_id = " => $this->request->data['recruitment_id']])->join([
            'table'=>'Recruitments',
            'alias'=>'r',
            'type'=>'LEFT',
            'conditions'=>'r.recruitment_id=Recruitment_models.recruitment_id'
        ])->join([
            'table'=>'User_profiles',
            'alias'=>'usp',
            'type'=>'LEFT',
            'conditions'=>'Recruitment_models.user_id=usp.user_id'
        ])->join([
            'table'=>'User_models',
            'alias'=>'u',
            'type'=>'LEFT',
            'conditions'=>'u.user_id=Recruitment_models.user_id'
        ])->join([
            'table'=>'Prices',
            'alias'=>'pr',
            'type'=>'LEFT',
            'conditions'=>'pr.price_id=u.user_price_id'
        ])->join([
            'table'=>'Users',
            'alias'=>'us',
            'type'=>'LEFT',
            'conditions'=>'us.user_id=usp.user_id'
        ])->join([
            'table'=>'Prefecture',
            'alias'=>'p',
            'type'=>'LEFT',
            'conditions'=>'usp.prefecture_id=p.prefecture_id'
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
            'recruitment_id'=>'r.recruitment_id',
            'user_id'=>'usp.user_id',
            'user_name'=>'usp.user_name',
            'user_sex'=>'usp.user_sex',
            'user_profession'=>'usp.user_profession',
            'prefecture_name' => 'p.prefecture_name',
            'city_name'=>'usp.city_name',
            'user_first_time'=>'tf.time',
            'user_last_time'=>'tl.time',
            'price_first'=>'pr.price_first',
            'price_last'=>'pr.price_last',
            'user_comment'=>'usp.user_comment',
        ])->where(['us.modelflg = '=>0])->where(['Recruitment_models.selectflg = '=>0]);
        

        

            $menu = $this->User_menus->find('all');
            foreach($menu as $obj2){
                $array[$obj2->user_id.$obj2->menu_id] = $obj2->menu_id;
            }
            

//　ーーーーーーーーーーーーーーーーーーーーーーーメニュー結合ーーーーーーーーーーーーーーーーーーー
        $array2 = array();
        foreach($data as $obj3){
            
            $array_ketugou=[];
            $me = $this->Menus->find('all');
            foreach($me as $obj4) {
                if(isset($array[$obj3->user_id.$obj4->menu_id])){

                    $a=$array[$obj3->user_id.$obj4->menu_id];
                    $d = $this->Menus->get($a);
                    
                    $array_ketugou[]=$d['menu_name'];
                    $d=implode(" ",$array_ketugou);
                }
            }
//　ーーーーーーーーーーーーーーーーーーーーーーー渡す内容ーーーーーーーーーーーーーーーーーーー
            $array2[$obj3->user_id] = array(
                'recruitment_id'=>$obj3['recruitment_id'],
                'user_id'=>$obj3['user_id'],
                'user_name'=>$obj3['user_name'],
                'prefecture_name'=>$obj3['prefecture_name'],
                'city_name'=>$obj3['city_name'],
                'user_first_time'=>$obj3['user_first_time'],
                'user_last_time'=>$obj3['user_last_time'],
                'price_first'=>$obj3['price_first'],
                'user_sex'=>$obj3['user_sex'],
                'user_profession'=>$obj3['user_profession'],
                'price_last'=>$obj3['price_last'],
                'user_comment'=>$obj3['user_comment'],
                'menu_name'=>$d
            );
            
        }

        $this->set('result',$array2);
    }
    public function ald(){
        $data = $this->User_profiles->find('all')->where(["User_profiles.user_id = " => $this->request->data['id']])->join([
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
            'user_sex'=>'User_profiles.user_sex',
            'user_profession'=>'User_profiles.user_profession',
            'prefecture_name' => 'p.prefecture_name',
            'city_name'=>'User_profiles.city_name',
            'user_first_time'=>'tf.time',
            'user_last_time'=>'tl.time',
            'price_first'=>'pr.price_first',
            'price_last'=>'pr.price_last',
            'user_comment'=>'User_profiles.user_comment',
        ])->where(['us.modelflg = '=>0]);
        

        

            $menu = $this->User_menus->find('all');
            foreach($menu as $obj2){
                $array[$obj2->user_id.$obj2->menu_id] = $obj2->menu_id;
            }
            

//　ーーーーーーーーーーーーーーーーーーーーーーーメニュー結合ーーーーーーーーーーーーーーーーーーー
        $array2 = array();
        foreach($data as $obj3){
            
            $array_ketugou=[];
            $me = $this->Menus->find('all');
            foreach($me as $obj4) {
                if(isset($array[$obj3->user_id.$obj4->menu_id])){

                    $a=$array[$obj3->user_id.$obj4->menu_id];
                    $d = $this->Menus->get($a);
                    
                    $array_ketugou[]=$d['menu_name'];
                    $d=implode(" ",$array_ketugou);
                }
            }
//　ーーーーーーーーーーーーーーーーーーーーーーー渡す内容ーーーーーーーーーーーーーーーーーーー
            $array2[$obj3->user_id] = array(
                'user_id'=>$obj3['user_id'],
                'user_name'=>$obj3['user_name'],
                'prefecture_name'=>$obj3['prefecture_name'],
                'city_name'=>$obj3['city_name'],
                'user_first_time'=>$obj3['user_first_time'],
                'user_last_time'=>$obj3['user_last_time'],
                'price_first'=>$obj3['price_first'],
                'user_sex'=>$obj3['user_sex'],
                'user_profession'=>$obj3['user_profession'],
                'price_last'=>$obj3['price_last'],
                'user_comment'=>$obj3['user_comment'],
                'menu_name'=>$d
            );
            
        }

        $this->set('result',$array2);
    }
    // public function apc(){
        
    // }
    // public function apcc(){
        
    // }
    // public function cr(){
        
    // }
    // public function crd(){
        
    // }
    public function signuph(){
        $pro=$this->Professions->find();
        $pre=$this->Prefecture->find();
        $this->set('prof',$pro);
        $this->set('pref',$pre);
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
            if(isset($_GET['prefecture'])){
                $pref=$_GET['prefecture'];
                
                if(!($pref==-1)){
                    $data=$data->andWhere(['User_profiles.prefecture_id = '=>$pref]);
                    $prefflg=1;
                }
            }

//価格検索  
            if(isset($_GET['price'])){
                $price = $_GET["price"];
                
                if(!($price==-1)){
                    $data=$data->andWhere(['user_price_id = '=>$price+1]);
                    $priceflg=1;
                }       
            }

//時刻検索

            if(isset($_GET['zikoku'])){
                if(!($_GET['zikoku']==-1)){
                    $zikoku = $_GET['zikoku'];
                    $data=$data->andWhere(['user_first_time_id <='=>$zikoku]);
                    $data=$data->andWhere(['user_last_time_id >='=>$zikoku]);
                }

            }



//　ーーーーーーーーーーーーーーーーーーーーーーー全検索ーーーーーーーーーーーーーーーーーーー

        }else if($this->request->is('get')){
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

        

            $menu = $this->User_menus->find('all');
            foreach($menu as $obj2){
                $array[$obj2->user_id.$obj2->menu_id] = $obj2->menu_id;
            }
            

//　ーーーーーーーーーーーーーーーーーーーーーーーメニュー結合ーーーーーーーーーーーーーーーーーーー
        $array2 = array();
        foreach($data as $obj3){
            
            $array_ketugou=[];
            $me = $this->Menus->find('all');
            foreach($me as $obj4) {
                if(isset($array[$obj3->user_id.$obj4->menu_id])){

                    $a=$array[$obj3->user_id.$obj4->menu_id];
                    $d = $this->Menus->get($a);
                    
                    $array_ketugou[]=$d['menu_name'];
                    $d=implode(" ",$array_ketugou);
                }
            }
//　ーーーーーーーーーーーーーーーーーーーーーーー渡す内容ーーーーーーーーーーーーーーーーーーー
            $array2[$obj3->user_id.$obj4->menu_id] = array(
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
    // public function logout(){
        
    // }

    public function mbd(){
            
        $data = $this->User_profiles->find('all')->where(["User_profiles.user_id = " => $this->request->data['data']])->join([
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
            'user_sex'=>'User_profiles.user_sex',
            'user_profession'=>'User_profiles.user_profession',
            'prefecture_name' => 'p.prefecture_name',
            'city_name'=>'User_profiles.city_name',
            'user_first_time'=>'tf.time',
            'user_last_time'=>'tl.time',
            'price_first'=>'pr.price_first',
            'price_last'=>'pr.price_last',
            'user_comment'=>'User_profiles.user_comment',
        ])->where(['us.modelflg = '=>0]);
        

        

            $menu = $this->User_menus->find('all');
            foreach($menu as $obj2){
                $array[$obj2->user_id.$obj2->menu_id] = $obj2->menu_id;
            }
            

//　ーーーーーーーーーーーーーーーーーーーーーーーメニュー結合ーーーーーーーーーーーーーーーーーーー
        $array2 = array();
        foreach($data as $obj3){
            
            $array_ketugou=[];
            $me = $this->Menus->find('all');
            foreach($me as $obj4) {
                if(isset($array[$obj3->user_id.$obj4->menu_id])){

                    $a=$array[$obj3->user_id.$obj4->menu_id];
                    $d = $this->Menus->get($a);
                    
                    $array_ketugou[]=$d['menu_name'];
                    $d=implode(" ",$array_ketugou);
                }
            }
//　ーーーーーーーーーーーーーーーーーーーーーーー渡す内容ーーーーーーーーーーーーーーーーーーー
            $array2[$obj3->user_id] = array(
                'user_id'=>$obj3['user_id'],
                'user_name'=>$obj3['user_name'],
                'prefecture_name'=>$obj3['prefecture_name'],
                'city_name'=>$obj3['city_name'],
                'user_first_time'=>$obj3['user_first_time'],
                'user_last_time'=>$obj3['user_last_time'],
                'price_first'=>$obj3['price_first'],
                'user_sex'=>$obj3['user_sex'],
                'user_profession'=>$obj3['user_profession'],
                'price_last'=>$obj3['price_last'],
                'user_comment'=>$obj3['user_comment'],
                'menu_name'=>$d
            );
            
        }

        $this->set('result',$array2);
    }
    
    public function mbp(){
    $pri=$this->Prices->find();
    $tim=$this->Times->find();
    $menuname=$this->Menus->find();
    $this->set('time',$tim);
    $this->set('price',$pri);
    $this->set('youso',$menuname);
        
    }
    public function mbpc(){

        
        $user=$this->Users->find('all')->where(['mailaddress = '=>$_SESSION['mailaddress']]);
        foreach ($user as $u) {
            $user_id=$u->user_id;
        }
        $entity=$this->Recruitments->newEntity();
        $entity->recruitment_user_id=$user_id;
        $entity->recruitment_date=$this->request->data['date'];
        $entity->recruitment_first_time_id=$this->request->data['fasttime'];
        $entity->recruitment_last_time_id=$this->request->data['lasttime'];
        $entity->recruitment_people=$this->request->data['recruitment_people'];
        $entity->recruitment_title=$this->request->data['title'];
        $entity->recruitment_comment=$this->request->data['comment'];
        $entity->recruitment_price_id=$this->request->data['price'];
        $result=$this->Recruitments->save($entity);

//メニュー
        //recruitment_id取得
        echo $entity->recruitment_id;

        foreach ($this->request->data['check'] as $key) {
            
                $data[] = [
                    'recruitment_id' => $result->recruitment_id,
                    'menu_id' => $key+1
                ];
        }
            
            $entities = $this->Recruitment_menus->newEntities($data);

            // Entitiesの分だけ保存処理
            foreach ($entities as $entity) {
                // Save entity
                $this->Recruitment_menus->save($entity);
            }

//メニュー以外
        
    }
    public function mbpcr(){

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

    public function mbpcrc(){

        if($this->request->is('post')){
             print_r($this->request->data);

            $entity=$this->Recruitments->get($this->request->data['id']);
            $entity->recruitment_first_time_id=$this->request->data['recruitment_first_time_id'];
            $entity->recruitment_last_time_id=$this->request->data['recruitment_last_time_id'];
            $entity->recruitment_people=$this->request->data['recruitment_people']+1;
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

    }

    public function mbpd(){
        $recruitment_id =  $this->request->data['data'];
        $this->set('recruitment_id',$recruitment_id);
    }

    public function mbpdc(){
        if($this->request->is('post')){

            $entity = $this->Recruitments->get($this->request->data['data']);
            $entity2 = $this->Recruitment_menus->find()->where(["recruitment_id = " => $this->request->data['data']]);
            $this->Recruitments->delete($entity);
            foreach ($entity2 as $key) {
                $this->Recruitment_menus->delete($key);
            }
        }        
    }

    public function mbph(){


//　ーーーーーーーーーーーーーーーーーーーーーーー検索ーーーーーーーーーーーーーーーーーーーーーーーー
        $kensaku = $this->Recruitments->find('all');
        
        if($this->request->is('post')){
            if(isset($_GET['menu_id'])){
                $menu_id=$_GET["menu_id"];
                

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
            'recruitment_date'=>'Recruitments.recruitment_date',
            'recruitment_first_time'=>'tf.time',
            'recruitment_last_time'=>'tl.time',
            'price_first'=>'pr.price_first',
            'price_last'=>'pr.price_last',
        ])->where(['us.modelflg = '=>1])->andWhere(['us.mailaddress = '=>$_SESSION['mailaddress']]);
        }

//　ーーーーーーーーーーーーーーーーーーーーーーーメニュー配列ーーーーーーーーーーーーーーーーーーー

            $menu = $this->Recruitment_menus->find('all');
            foreach($menu as $obj2){
                $array[$obj2->recruitment_id.$obj2->menu_id] = $obj2->menu_id;
            }
        
//　ーーーーーーーーーーーーーーーーーーーーーーーメニュー結合ーーーーーーーーーーーーーーーーーーー

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
            
        }
        


        $this->set('result', $array2);

    }

    public function mbphd(){

        $hyoji = $this->Recruitments->find('all')->where(["recruitment_id = " => $this->request->data['data']])->join([
            'table'=>'Prices',
            'alias'=>'pr',
            'type'=>'LEFT',
            'conditions'=>'pr.price_id=recruitment_price_id'
        ])->join([
            'table'=>'User_profiles',
            'alias'=>'us',
            'type'=>'LEFT',
            'conditions'=>'us.user_id=recruitment_user_id'
        ])->join([
            'table'=>'Times',
            'alias'=>'tf',
            'type'=>'LEFT',
            'conditions'=>'tf.time_id=recruitment_first_time_id'
        ])->join([
            'table'=>'Times',
            'alias'=>'tl',
            'type'=>'LEFT',
            'conditions'=>'tl.time_id=recruitment_last_time_id'
        ])->join([
            'table'=>'Prefecture',
            'alias'=>'p',
            'type'=>'LEFT',
            'conditions'=>'us.prefecture_id=p.prefecture_id'
        ])->select([
            'recruitment_id'=>'Recruitments.recruitment_id',
            'recruitment_date'=>'Recruitments.recruitment_date',
            'first_time'=>'tf.time',
            'last_time'=>'tl.time',
            'recruitment_title'=>'Recruitments.recruitment_title',
            'recruitment_comment'=>'Recruitments.recruitment_comment',
            'price_first'=>'pr.price_first',
            'price_last'=>'pr.price_last',
            'user_name'=>'us.user_name',
            'user_profession'=>'us.user_profession',
            'user_sex'=>'us.user_sex',
            'user_age'=>'us.user_age',
            'prefecture_name'=>'p.prefecture_name',
            'city_name'=>'us.city_name',
        ]);

        
//　ーーーーーーーーーーーーーーーーーーーーーーーメニュー配列ーーーーーーーーーーーーーーーーーーー

            $menu = $this->Recruitment_menus->find('all');
            foreach($menu as $obj2){
                $array[$obj2->recruitment_id.$obj2->menu_id] = $obj2->menu_id;
            }
        
//　ーーーーーーーーーーーーーーーーーーーーーーーメニュー結合ーーーーーーーーーーーーーーーーーーー

        $array2 = array();
        $cnt2=0;
        foreach($hyoji as $obj3){
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
            $array2[$obj3->recruitment_id] = array(
            'recruitment_id'=>$obj3['recruitment_id'],
            'recruitment_date'=>$obj3['recruitment_date'],
            'first_time'=>$obj3['first_time'],
            'last_time'=>$obj3['last_time'],
            'recruitment_title'=>$obj3['recruitment_title'],
            'recruitment_comment'=>$obj3['recruitment_comment'],
            'price_first'=>$obj3['price_first'],
            'price_last'=>$obj3['price_last'],
            'user_name'=>$obj3['user_name'],
            'user_profession'=>$obj3['user_profession'],
            'user_sex'=>$obj3['user_sex'],
            'user_age'=>$obj3['user_age'],
            'prefecture_name'=>$obj3['prefecture_name'],
            'city_name'=>$obj3['city_name'],
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
        ])->select([
            'user_name'=>'us.user_name',
            'user_sex'=>'us.user_sex',
            'user_profession'=>'us.user_profession',
            'prefecture_name'=>'p.prefecture_name',
            'city_name'=>'us.city_name',
        ]);

        $this->set('result', $hyoji);
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
        ])->select([
            'user_id'=>'Users.user_id',
            'prefecture_id'=>'p.prefecture_id',
            'user_name'=>'us.user_name',
            'user_sex'=>'us.user_sex',
            'user_profession'=>'us.user_profession',
            'prefecture_name'=>'p.prefecture_name',
            'city_name'=>'us.city_name',
            'user_comment'=>'us.user_comment',
        ]);

        $pre=$this->Prefecture->find();
        $this->set('pre', $pre);
        $sex = ['男','女'];
        $this->set('sex',$sex);    
        $this->set('result', $hyoji);
    }
}
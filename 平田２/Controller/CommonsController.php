<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\ORM\TableRegistry;

class CommonsController extends AppController{
     public function initialize() {
        $this->viewBuilder()->layout('Commons'); 
        $this->User_models = TableRegistry::get('User_models');
        $this->User_menus = TableRegistry::get('User_menus');
        $this->User_profiles = TableRegistry::get('User_profiles');
        $this->Users = TableRegistry::get('Users'); 
    }
	public function index(){

        $this->set('img','img/coollogo_com-13563663.png');
	}
    public function sc(){
        $this->set('img','../img/coollogo_com-13563663.png');
        session_start();
        if(!(empty($_SESSION['mailaddress']))){
            return $this->redirect(['controller' => 'Commons','action' => 'login']);
        }

        $entity=$this->Users->newEntity();
        $entity->mailaddress=$this->request->data['mailaddress'];
        $entity->password=$this->request->data['password'];
        $entity->modelflg=$this->request->data['modelflg'];
        $this->Users->save($entity);

        $user_id=$entity->user_id;

        $entity=$this->User_profiles->newEntity();
        $entity->user_id=$user_id;
        $entity->image=file_get_contents($this->request->data['image']['tmp_name']);
        $entity->user_name=$this->request->data['user_name'];
        $entity->prefecture_id=$this->request->data['prefecture_id'];
        $entity->city_name=$this->request->data['city_name'];
        $entity->user_age=$this->request->data['user_age'];
        $entity->user_sex=$this->request->data['user_sex'];
        $entity->user_profession=$this->request->data['user_profession'];
        $entity->user_comment=$this->request->data['user_comment'];
        $this->User_profiles->save($entity);


        //モデルだったら
        if($this->request->data['modelflg']==0){
            $entity=$this->User_models->newEntity();
            $entity->user_id=$user_id;
            $entity->user_price_id=$this->request->data['user_price_id'];
            $entity->user_first_time_id=$this->request->data['user_first_time_id'];
            $entity->user_last_time_id=$this->request->data['user_last_time_id'];
            $this->User_models->save($entity);

            foreach ($this->request->data['check'] as $key) {
                $data[] = [
                    'user_id' => $user_id,
                    'menu_id' => $key+1
                ];
            }
            
            $entities = $this->User_menus->newEntities($data);

            // Entitiesの分だけ保存処理
            foreach ($entities as $entity) {
                // Save entity
                $this->User_menus->save($entity);
            }
        }

    }
    public function login(){
        $this->set('img','../img/coollogo_com-13563663.png');
        $this->users = TableRegistry::get('users');
        if($this->request->is('post')){
            echo $this->request->data['mailaddress'];
            echo $this->request->data['password'];
            $data = $this->users->find()
                ->where(['mailaddress' => $this->request->data['mailaddress']])
                ->andwhere(['password' => $this->request->data['password']])
                ->count();
                
                
            if($data == 1){
                $data = $this->users->find()->where(['mailaddress' => $this->request->data['mailaddress']])
                    ->andwhere(['password' => $this->request->data['password']])
                    ->all();
                foreach($data as $obj){
                    session_start();
                    $_SESSION['mailaddress'] = $obj->mailaddress;
                    $_SESSION['password']   = $obj->password;

                    if($obj->modelflg == 0){
                        return $this->redirect(['controller' => 'Model','action' => 'index/']);
                    }else{
                        return $this->redirect(['controller' => 'Hairdresser','action' => 'index/']);
                    }
                }
            }else{
                $this->set('comment','メアド又はパスワードが間違っています。');
            }
        }
    }
    public function pw(){
        $this->set('img','../img/coollogo_com-13563663.png');
    }
    public function pwrr(){
        $this->set('img','../img/coollogo_com-13563663.png');
        session_start();
        if(!(empty($_SESSION['mailaddress']))){
            return $this->redirect(['controller' => 'Commons','action' => 'login']);
        }
        $this->users = TableRegistry::get('users');
        $data = $this->users->find('all',array('conditions' => array('mailaddress' => $this->request->data['mailaddress'],'password' => $this->request->data['password'])));
        foreach($data as $obj){
            $user_id = $obj->user_id;
        }
    }
    public function pwrrc(){
        $this->set('img','../img/coollogo_com-13563663.png');
        session_start();
        if(!(empty($_SESSION['mailaddress']))){
            return $this->redirect(['controller' => 'Commons','action' => 'login']);
        }
    }
    public function pwfc(){
        $this->set('img','../img/coollogo_com-13563663.png');
        session_start();
        if(!(empty($_SESSION['mailaddress']))){
            return $this->redirect(['controller' => 'Commons','action' => 'login']);
        }
    }
    public function cr(){
        $this->set('img','../img/coollogo_com-13563663.png');
        session_start();
        if(empty($_SESSION['mailaddress'])){
            return $this->redirect(['controller' => 'Commons','action' => 'login']);
        }
        $this->users = TableRegistry::get('users');
        $this->chats = TableRegistry::get('chats');
        $data = $this->users->find()
            ->where(['mailaddress' => $_SESSION['mailaddress']])
            ->andwhere(['password' => $_SESSION['password']])
            ->all();
        foreach($data as $obj){
            $user_id = $obj->user_id;
        }
        $data = $this->chats->find()
                ->where(['user_id' => $user_id])
                ->count();
        if($data > 0){
            $this->chat_contents = TableRegistry::get('chat_contents');
            $data = $this->chats->find()
                ->where(['user_id' => $user_id])
                ->all();
            $this->set('chat',$data);
            foreach($data as $obj){
                $data2 = $this->chat_contents->find()
                ->where(['chat_id' => $obj->chat_id])
                ->all();
                foreach($data2 as $obj2){
                    $this->set($obj->chat_id,$obj2->content);
                }
            }
        }else{
            $this->set('message','誰もいません');
        }
    }
    public function crd(){
        $this->set('img','../img/coollogo_com-13563663.png');
        session_start();
        if(!(empty($_SESSION['mailaddress']))){
            return $this->redirect(['controller' => 'Commons','action' => 'login']);
        }
        $this->users = TableRegistry::get('users');
        $this->chats = TableRegistry::get('chats');
        $this->chat_contents = TableRegistry::get('chat_contents');
        if(!(empty($this->request->data['user_id']))){
            $data = $this->users->find('all',array('conditions' => array('mailaddress' => $this->request->data['mailaddress'],'password' => $this->request->data['password'])));
            foreach($data as $obj){
                $user_id = $obj->user_id;
            }
            $chat_count = $this->chats->find()
                ->where(['user_id' => $user_id,'opponent_user_id' => $this->request->data['user_id']])
                ->count();
            if($chat_count == 0){
                $chat_save = array(
                'user_id' => $user_id,
                'opponent_user_id' => $this->request->data['user_id']
                );
                $chat = $this->chats->newEntity($chat_save);
                $this->chats->save($chat,false);
            }
            $chat_data = $this->chats->find()
                ->where(['user_id' => $user_id,'opponent_user_id' => $this->request->data['user_id']])
                ->all();
            foreach($chat_data as $obj){
                $chat_id = $obj->chat_id;
            }
            $this->set('chat_id',$chat_id);
        }
        if(!(empty($this->request->data['chat_id']))){
            $chat_count = $this->chats->find()->where(['chat_id' => $this->request->data['chat_id']])->count();
            $cnt = $chat_count + 1;
            $chat_content_save = array(
                'chat_id' => $this->request->data['chat_id'],
                'content_id' => $cnt,
                'content' => $this->request->data['content']
                );
            $chat_content = $this->chat_contents->newEntity($chat_content_save);
            $this->chat_contents->save($chat_content,false);
        }
    }
    public function logout(){
        $this->set('img','../img/coollogo_com-13563663.png');
        session_start();
        if(empty($_SESSION['mailaddress'])){
            return $this->redirect(['controller' => 'Commons','action' => 'login']);
        }
        unset($_SESSION['mailaddress']);
        unset($_SESSION['password']);
        return $this->redirect(['controller' => 'Commons','action' => 'index/']);
    }
}
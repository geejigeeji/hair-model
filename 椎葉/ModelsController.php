<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\ORM\TableRegistry;

class ModelsController extends AppController{
     public function initialize() {
        $this->viewBuilder()->layout('Model');  
    }
	public function ac(){
        session_start();
        if(empty($_SESSION['mailaddress'])){
            return $this->redirect(['controller' => 'Commons','action' => 'login']);
        }
	}
    public function acc(){
        session_start();
        if(empty($_SESSION['mailaddress'])){
            return $this->redirect(['controller' => 'Commons','action' => 'login']);
        }
    }
    public function accc(){
        session_start();
        if(empty($_SESSION['mailaddress'])){
            return $this->redirect(['controller' => 'Commons','action' => 'login']);
        }
    }
    public function adc(){
        session_start();
        if(empty($_SESSION['mailaddress'])){
            return $this->redirect(['controller' => 'Commons','action' => 'login']);
        }
    }
    public function ade(){
        session_start();
        if(empty($_SESSION['mailaddress'])){
            return $this->redirect(['controller' => 'Commons','action' => 'login']);
        }
    }
    public function apc(){
        session_start();
        if(empty($_SESSION['mailaddress'])){
            return $this->redirect(['controller' => 'Commons','action' => 'login']);
        }
    }
    public function apcc(){
        session_start();
        if(empty($_SESSION['mailaddress'])){
            return $this->redirect(['controller' => 'Commons','action' => 'login']);
        }
    }
    public function index(){
        session_start();
        if(empty($_SESSION['mailaddress'])){
            return $this->redirect(['controller' => 'Commons','action' => 'login']);
        }
    }
    public function mbd(){
        session_start();
        if(empty($_SESSION['mailaddress'])){
            return $this->redirect(['controller' => 'Commons','action' => 'login']);
        }
    }
    public function mpd(){
        session_start();
        if(empty($_SESSION['mailaddress'])){
            return $this->redirect(['controller' => 'Commons','action' => 'login']);
        }
    }
    public function mpe(){
        session_start();
        if(empty($_SESSION['mailaddress'])){
            return $this->redirect(['controller' => 'Commons','action' => 'login']);
        }
    }
    public function mbpd(){
        session_start();
        if(empty($_SESSION['mailaddress'])){
            return $this->redirect(['controller' => 'Commons','action' => 'login']);
        }
    }
    public function smb(){
        session_start();
        if(empty($_SESSION['mailaddress'])){
            return $this->redirect(['controller' => 'Commons','action' => 'login']);
        }
    }
    public function smbd(){
        session_start();
        if(empty($_SESSION['mailaddress'])){
            return $this->redirect(['controller' => 'Commons','action' => 'login']);
        }
    }
    public function signup(){
        if($this->request->is('post')){
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
}
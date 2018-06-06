<style type="text/css">
.kensakuform {
    margin-top: 80px;
    margin-left: 80px;
    margin-right: 80px;
    margin-bottom: 20px;
}
.namelavel {
    background-color: rgba(0,222,222,0.40);
    margin: 0 auto;
    width: 100%;
    max-width: 900px;
    font-size: 1rem;
    line-height: auto;
    /*border-radius: 10px;*/
}
    .back{
        position: relative;
        background-image: url("../img/tophaikei.jpg");
        background-size:cover;
        padding: 500px 0;
        margin: 0;
    }
    .back1{
        background-color: white;
        padding: 20px 10px;
        margin: 0 auto;
        width: 100%;
        max-width: 900px;
        font-size: 1rem;
        line-height: 1.7;
        border-radius: 10px;
    }
    .back2{
        background-color: white;
        padding: 20px 10px;
        margin: 0 auto;
        width: 100%;
        max-width: 900px;
        font-size: 1rem;
        line-height: auto;   
    }
    .imazine{
    height:300px;
    width: 300px;
    background-image: url("../img/single3.PNG");
}
</style>
<div class="container-fluid back">
  
           <div class="row">
                    <div class="namelavel text-white">応募済み掲示板詳細画面</div>
                    </div>
            <div class="jumbotron back2">
                        <div class="row">
                            <div class="col-2">
                                <div class="imazine ml-4 mt-2"></div> 
                            </div>
                        
                            <div class="col-8"></div>
                            <form action="" method="get"><input class="btn btn-dark btn-lg mt-2" type="submit" value="応募取消"></form>
                            <div class="col-6"></div>
                            <template id="page2.html">
  <ons-page id="second-page">
    <ons-toolbar>
      <div class="left"><ons-back-button>入室</ons-back-button></div>
      <div class="center">チャット</div>
    </ons-toolbar>
 
    <div class="content">
      <ons-list id="chats">
      </ons-list>
    </div>
 
    <div class="send-area">
      <ons-input id="message" placeholder="メッセージ"></ons-input>
      <ons-button id="send" modifier="quiet">送信</ons-button>
    </div>
  </ons-page>
</template>
                        </div>
                        
                
            </div>


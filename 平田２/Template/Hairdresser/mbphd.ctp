<style>
.jumbotron{
    position: relative;
    background-image: url("../img/tophaikei.jpg");
    background-size: cover;
    padding: 200px 0;

}
img {
    width:auto;
    height:auto;
    max-width:100%;
    max-height:100%;
}
</style>
<div class="jumbotron">
    <div class="namelavel2 text-white"><h2>美容師掲示板詳細</h2></div>
    <div class="back2 container pt-0">
        <form action="al" method="post">
            <?php foreach($result as $obj):?>
        <div class="row"> 
            <div class="col-12 text-right">
                    <?=$this->Form->hidden("recruitment_id",array('value' => $obj['recruitment_id']))?>
                    <input class="btn-dark btn-lg mt-2 " type="submit" value="応募者一覧">
                      
            </div> 
        </div>  
        <div class="row">       
                <div class="back3 col-3 ml-3">
                    <div class="imazine2 ml-0 mr-0">
                    <img class="adapt" alt="" src="../img/single4.PNG">
                    </div>
                    <div class="text-center mt-4"><?= $obj['user_profession']?></div>
                    <div class="row mt-2">
                        <div class="col-2"></div>
                        <h4><?= $obj['user_name']?></h4>
                        <h4><?= $obj['user_sex']?></h4>
                    </div>
                    <div class="text-center mt-2"><?= $obj['user_age']?></div>
                    <div class="row mt-2">
                        <div class="col-1"></div>
                        <div class="font-weight-bold">エリア:</div>
                        <div class="ml-3"><?= $obj['prefecture_name']?><?= $obj['city_name']?></div>
                    </div>
                </div>
                <div class="ml-3 col-7">
                    <div class="waku4 col-12">
                        <h2 class="font-weight-bold"><?= $obj['recruitment_title']?></h2>
                        <h5><?= $obj['recruitment_comment']?>
                        </h5>
                    </div>
                    <strong>メニュー情報</strong>
                    <div class="waku5 col-10 mt-2">
                        <div class="row ml-2 mt-2">    
                            <strong>メニュー</strong>
                            <div class="ml-4"><?= $obj['menu_name']?></div>
                        </div>
                        <div class="row ml-2 mt-2">    
                            <strong>価格</strong>
                            <div class="ml-5"><?= $obj['price_first']?>円〜<?= $obj['price_last']?>円</div>
                        </div>
                        <div class="row ml-2 mt-2">    
                            <strong>日付</strong>
                            <div class="ml-5"><?= $obj['recruitment_date']->format('m/d')?></div>
                        </div>
                        <div class="row ml-2 mt-2">    
                            <strong>時間</strong>
                            <div class="ml-5"><?= $obj['first_time']?>〜<?= $obj['last_time']?></div>
                        </div>
                    </div>
                </div>
        </div>
        <?php endforeach;?> 
     </form>  
    </div>    
</div>

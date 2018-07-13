<style>
.jumbotron{
    position: relative;
    background-image: url("../img/sa113_list_F800-800.jpg");
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

    <div class="namelavel text-white"><h3>応募済み掲示板詳細</h3></div>
    <?php foreach($result as $obj):?>
    <div class="back container pt-0">
        <div class="row"> 
            <div class="col-12 text-right">
                <form action="acc" method="post">
                    <?=$this->Form->hidden("id",array('value' => $obj['recruitment_id']))?>
                    <input class="btn-dark btn-lg mt-2 " type="submit" value="応募取り消し">
                </form>        
            </div> 
        </div>  
        <div class="row">       
                <div class="back2 col-3 ml-3">
                    <div class="imazine2 ml-0 mr-0">
                    <img class="adapt" alt="" src="../img/single4.PNG">
                    </div>
                    <div class="text-center mt-4"><?= $obj['user_profession']?></div>
                    <div class="row mt-2">
                        <div class="col-2"></div>
                        <h4><?= $obj['user_name']?></h4>
                        <h4>(<?= $obj['user_sex']?>)</h4>
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
                            <div class="ml-5"><?= $obj['price_first']?>〜<?= $obj['price_last']?></div>
                        </div>
                        <div class="row ml-2 mt-2">    
                            <strong>日付</strong>
                            <div class="ml-5"><?= $obj['recruitment_date']->format('Y/m/d')?></div>
                        </div>
                        <div class="row ml-2 mt-2">    
                            <strong>時間</strong>
                            <div class="ml-5"><?= $obj['recruitment_first_time']?>〜<?= $obj['recruitment_last_time']?></div>
                        </div>
                    </div>
                </div>
        </div>
         
    </div>   
    <?php endforeach;?>     
</div>

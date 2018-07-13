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
        padding:0px;
        margin: 0 auto;
        width: 100%;
        max-width: 900px;
        font-size: 1rem;
        line-height: auto;   
    }
    img{
        width:100px;
        height:100px;
    }
</style>
<div class="container-fluid back">

<div class="row text-white mx-5" >
</div>

<?php foreach($result as $obj):?>
            <div class="row">
                    <div class="namelavel text-white"><?= $obj['user_name']?></div>
            </div>
            <div class=" back2">
                
                        <div class="row">
                            <div class="col-3">
                                <div class="col-4"><img class='img-responsive' src='../img/single3.PNG'>
                                </div> 
                            </div>
                                <div class="row">
                                   <b>メニュー<br>希望価格<br>希望時刻</b>
                                   <div class="col-1"></div>
                                   <?= $obj['menu_name']?>
                                   <br>
                                   <?= $obj['price_first']?>〜<?= $obj['price_last']?>
                                   <br>
                                   <?= $obj['first_time']?>〜<?= $obj['last_time']?>
                                </div>
                                <div class="col-2"></div>
                                <div class="row">
                                    <b>エリア<br>希望日</b>
                                    <div class="col-1"></div>
                                    <?= $obj['prefecture_name']?><?= $obj['city_name']?>
                                    <br>
                                    <?= $obj['recruitment_date']?>
                                </div>
                        </div>
                            <div class="row">
                                <form action="smbd" method="post">
                                    <?=$this->Form->hidden("id",array('value' => $obj['recruitment_id']))?>
                                    <input class="btn btn-link text-primary  " type="submit" value="もっと見る">
                                </form>
                                <div class="col-8"></div>
                                <form action="acc" method="post">
                                    <?=$this->Form->hidden("id",array('value' => $obj['recruitment_id']))?>
                                    <input class="btn btn-link text-primary" type="submit" value="応募取り消し">
                                </form>
                            </div>
                </div>
<?php endforeach;?>  
            
             
        </div>
                   


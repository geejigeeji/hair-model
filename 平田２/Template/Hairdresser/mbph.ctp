<style type="text/css">
.kensakuform0 {
    margin-top: 80px;
    margin-left: 80px;
    margin-right: 80px;
    margin-bottom: 20px;
}
.namelavel0 {
    background-color: rgba(0,222,222,0.40);
    margin: 0 auto;
    width: 100%;
    max-width: 900px;
    font-size: 1rem;
    line-height: auto;
    /*border-radius: 10px;*/
}
    .back0{
        position: relative;
        background-image: url("../img/tophaikei.jpg");
        background-size:cover;
        padding: 100px 0;
        margin: 0;
    }
    .back10{
        background-color: white;
        padding: 20px 10px;
        margin: 0 auto;
        width: 100%;
        max-width: 900px;
        font-size: 1rem;
        line-height: 1.7;
        border-radius: 10px;
    }
    .back20{
        background-color: white;
        padding: 20px 10px;
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

<div class="container-fluid back0">
    <?php foreach($result as $obj):?>
<div class="row text-white mx-5" >
    
</div>
  <div class="namelavel0 container">
           <div class="row">
               <h5 class="font-weight-bold text-white ml-2"><?= $obj['user_name']?></h5>
                    <div class="text-white ml-5"><?= $obj['recruitment_title']?></div>
                    </div>
    </div>
            <div class="jumbotron back20">
                
                        <div class="row">
                            <div class="col-3">
                                <div class="col-4">

                                    <?php foreach($obj['image'] as $ima):?>
                                    
                                    <?php
                                    $img = base64_encode(stream_get_contents($ima['image']));
                                    ?>
                                    <img class='img-responsive' src="data:obj/png;base64,<?= $img ?>">
                                    <?php endforeach;?>
                                    
                                </div>
                            </div>
                                <div class="row">
                                   <b>メニュー<br>価格<br>時刻</b>
                                   <div class="col-1"></div>
                                   <?= $obj['menu_name']?>
                                   <br>
                                   <?= $obj['price_first']?>円〜<?= $obj['price_last']?>円
                                   <br>
                                   <?= $obj['recruitment_first_time']?>〜<?= $obj['recruitment_last_time']?>
                               </div>
                                <div class="col-2"></div>
                                <div class="row">
                                    <b>エリア<br>希望日</b>
                                    <div class="col-1"></div>
                                    <?= $obj['prefecture_name']?><?= $obj['city_name']?><br>
                                    <?= $obj['recruitment_date']->format('m/d')?>
                                </div>        
                        </div>
                        <div class="row">
                            <form action="mbphd" method="post">
                                <input type="hidden" name="data" value="<?php echo $obj['recruitment_id']; ?>">
                                <input class="btn btn-link text-primary  " type="submit" value="もっと見る">
                            </form>
                            <div class="col-9"></div>
                            <form action="mbpd" method="post">
                                <input type="hidden" name="data" value="<?php echo $obj['recruitment_id']; ?>">
                                <input class="btn btn-link text-primary" type="submit" value="削除">
                            </form>
                            <form action="mbpcr" method="post">
                                <input type="hidden" name="data" value="<?php echo $obj['recruitment_id']; ?>">
                                <input class="btn btn-link text-primary" type="submit" value="変更">
                            </form>
                        </div>
                
            </div>


            <?php endforeach;?>


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
        padding:     500px 0;
        margin: 0;
    }
    .back10{
        background-color: white;
        padding: 50px 10px;
        margin: 0 auto;
        width: 100%;
        max-width: 900px;
        font-size: 1rem;
        line-height: 1.7;
        border-radius: 10px;
    }
    .back20{
        background-color: white;
        padding: 10px 0px;
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
<div class="back10 container">
            <form action="" method="get">
                <div class ="row">
                      <div class ="col-1"></div>
                      <h3>条件検索</h3>
                      <div class ="col-7"></div>
                      <input class="btn btn-dark btn-lg mt-2" type="submit" value="条件を変更">
                </div> 
                <br>
                <div class = "row">
                    <div class = "col-2">
                        <div class = "col-7"></div>
                        希望メニュー
                    </div>
                        <div class="checkbox">
                            <?php foreach($youso as $key){ ?>
                                <label class="checkbox-inline"><input type="checkbox" name="menu_id[]" value='<?=$key['menu_id']?>'><?=$key['menu_name']?>　　</label>
                            <?php } ?>
                        </div>  
                </div>
                <br>
                <div class = "row">
                    <div class = "col-2">
                        <div class = "col-2"></div>
                        エリア
                    </div>
                    <select name="prefecture">
                    <option value=-1>選択してください</option>
                    <?php
                    foreach($pref as $keyp){
                    ?>
                    <option value='<?=$keyp['prefecture_id']?>'><?=$keyp['prefecture_name']?></option>
                    <?php
                    }
                    ?>
                    </select>
                </div>
                <br>
                <div class = "row">
                    <div class = "col-2">
                        <div class = "col-2"></div>
                        希望価格
                    </div>
                    <?php
                    $nedan=array();
                    foreach($price as $obj1){
                        array_push($nedan,$obj1['price_first']."〜".$obj1['price_last']);
                    }
                    ?>
                    <select name="price">
                    <option value=-1>選択してください</option>
                    <?php for($i=0;$i<count($nedan);$i++){ ?>
                    <option value='<?=$i?>'><?=$nedan[$i]?></option>
                    <?php } ?>
                    </select>
                </div>
                <br>
                <div class = "row">
                    <div class = "col-2">
                        <div class = "col-2"></div>
                        希望時刻
                    </div>
                    <select name="zikoku">
                    <option value=-1>選択してください</option>
                    <?php
                    foreach($time as $keyt){
                    ?>
                    <option value='<?=$keyt['time_id']?>'><?=$keyt['time']?></option>
                    <?php
                    }
                    ?>
                    </select>
                </div>
            </form>
        </div>
        <br>
        <div class="row">
            <div class="col-2 "></div>
            <h4 class="text-white"><?php echo count($result)."件の検索結果";?></h4>
        </div>
        <br>
        <?php foreach($result as $obj):?>
          <form action="mbd" method="post">
            <input type="hidden" name="data" value="<?php echo $obj['user_id']; ?>">
            <div class="row">
                    <div class="namelavel0 text-white"><?= $obj['user_name']?></div>
                    </div>
            <div class="back20 container">
              
                    <div class="row">
                        <div class="col-2">
                            <div class="col-1">
                                <img class='img-responsive' src='../img/single3.PNG'>
                            </div>
                        </div>
                               <b>メニュー<br>希望価格</b>
                               <div class="ml-4"></div>
                               <?= $obj['menu_name']?>
                               <br>
                               ¥<?= $obj['price_first']?>〜¥<?= $obj['price_last']?>
                               <div class="ml-3"></div>
                                <b>エリア<br>希望時刻</b>
                                <div class="ml-4"></div>
                                <?= $obj['prefecture_name']?><?= $obj['city_name']?>
                                <br>
                                <?= $obj['user_first_time']?>〜<?= $obj['user_last_time']?>       
                    </div>
                        <input class="btn btn-link text-primary  " type="submit" value="もっと見る">    
                </form>
            </div>
        <?php endforeach;?>
</div>


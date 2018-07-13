<style type="text/css">
.kensakuform {
    margin-top: 80px;
    margin-left: 80px;
    margin-right: 80px;
    margin-bottom: 20px;
}
.namelavel0 {
    background-color: rgba(0,222,222,0.40);
    margin-top: 30px;
    margin: 0 auto;
    width: 100%;
    max-width: 900px;
    font-size: 1rem;
    line-height: 2.0;
    border-radius: 10px 10px 0px 0px;
}
    .back0{
        position: relative;
        background-image: url("../img/tophaikei.jpg");
        background-size:cover;
        padding: 500px 0;
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
        border-radius: 0px 0px 10px 10px;
    }
    .form-group{
        width: 70%;
    
    }
</style>
<form action="mbpcrc" method="post">
<div class="container-fluid back0">
    <div class="row">
       <?php foreach($result as $obj):?>
       <?=$this->Form->hidden("id",array('value' => $obj['recruitment_id']))?>
        <div class="namelavel0 text-white">投稿修正画面</div>
    </div>
    <div class="jumbotron back10">
       
            <div class="row">
              <div class="col-2 text-center">
                  <b>メニュー</b>
              </div>
               <div class="form-inline">
                <?php
                    $stack=array();
                    foreach($result2 as $obj2){
                        array_push($stack,$obj2['menu_id']);
                    }

                    $hoge=array();
                    foreach($youso as $obj3){
                        array_push($hoge,$obj3['menu_id']);
                    }
                    
                    $hoge2=array();
                    foreach($youso as $obj4){
                        array_push($hoge2,$obj4['menu_name']);
                    }
                    
                    for($i=0;$i<count($hoge);$i++){

                        if(isset($stack)){
                            if(in_array($hoge[$i],$stack)){
                                echo $this -> Form -> input ( "check[$i]", [ "type" => "checkbox",
                                                         "label" => $hoge2[$i],
                                                         "checked" => true,
                                                         'templates' => [
                                                            'inputContainer' => '<div class="checkbox-inline">{{content}}</div>'
                                                         ]
                                                         ] );
                            }else{
                                echo $this -> Form -> input ( "check[$i]", [ "type" => "checkbox",
                                                         "label" => $hoge2[$i],
                                                         'templates' => [
                                                            'inputContainer' => '<div class="checkbox-inline">{{content}}</div>'
                                                         ]
                                                         ] );
                            }
                            echo "　　";
                        }
                        
                    }

                ?>                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-2 text-center">
                    <b>価格</b>
                    <?php
                        $first_kakaku=array();
                        $nedan=array();
                        foreach($kakaku as $obj1){
                            array_push($first_kakaku,$obj1['price_first']);
                            array_push($nedan,$obj1['price_first']."〜".$obj1['price_last']);
                        }

                        $f_kakaku = array_search($obj['price_first'],$first_kakaku);
                    ?>
                </div>
                    <?=$this->Form->select('recruitment_price_id', $nedan, ['default' => $f_kakaku]);?>
            </div>
            <br>
            <div class="row">
                <div class="col-2 text-center">
                    <b>時刻</b>
                </div>
                <select name="recruitment_first_time_id">
                <?php

                foreach($time as $keyt){

                    if($keyt['time_id']==$obj['recruitment_first_time']){
                ?>
                <option value='<?=$keyt['time_id']?>' selected><?=$keyt['time']?></option>
                <?php
                    }else{
                ?>
                <option value='<?=$keyt['time_id']?>'><?=$keyt['time']?></option>
                <?php
                    }
                ?>

                <?php
                }
                ?>
                </select>
            <div class="col-1"></div>～<div class="col-1"></div>
                <select name="recruitment_last_time_id">
                <?php

                foreach($time as $keyt){

                    if($keyt['time_id']==$obj['recruitment_last_time']){
                ?>
                <option value='<?=$keyt['time_id']?>' selected><?=$keyt['time']?></option>
                <?php
                    }else{
                ?>
                <option value='<?=$keyt['time_id']?>'><?=$keyt['time']?></option>
                <?php
                    }
                ?>

                <?php
                }
                ?>
                </select>
            </div>
            <br>
            <div class="row">
                <div class="col-2 text-center">
                    <b>募集人数</b>
                </div>
                <?=$this->Form->select('recruitment_people', $sizes, ['default' => $obj['recruitment_people']-1]);?>
            </div>
            
            <br>
            <div class="row">
                <div class="col-2 text-center">
                    <b>タイトル</b>
                </div>
            <div class="form-group">
                    <?=$this->Form->text("recruitment_title",['value'=>$obj['recruitment_title'],'class'=>'form-control'])?>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-2 text-center">
                    <b>コメント</b>
                </div>
                <div class="form-group">
                    <?=$this->Form->textarea("recruitment_comment",['value'=>$obj['recruitment_comment'],'class'=>'form-control','rows'=>'10'])?>
                </div>
            </div>
                
            
               <div class="row">
                <div class ="col-6"></div>
                <input class="btn btn-dark" type="submit" value="投稿">
                </div>
    </div>
<?php endforeach;?> 
</div>
</form>
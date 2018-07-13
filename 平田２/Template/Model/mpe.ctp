<style>
    .jumbotron0 {
        position: relative;
        background-image: url("../img/tophaikei.jpg");
        background-size: cover;
        padding: 200px 0;
    }

    .menu0 {
        background-color: #c7c7c959;
        width: 100%;
        height: 50px;
    }

    .back0 {
        background-color: rgba(255, 253, 253, 0.932);
        margin: 0 auto;
        width: 100%;
        height: 700px;
        max-width: 800px;
        border-radius: 10px;
    }

    .back10 {
        background-color: rgba(255, 253, 253, 0.932);
        margin: 0 auto;
        width: 100%;
        height: 300px;
        max-width: 500px;
        border-radius: 10px;
    }

    .imazine0 {
        background-color: rgba(59, 59, 59, 0.253);
        width: 100%;
        height: 250px;
        background-image: url("../img/single3.PNG");
    }

    .waku0 {
        background-color: rgba(110, 108, 108, 0.425);
        width: 400px;
        height: 600px;
        border-radius: 20px;
        border: solid thin #0f0f0f;
    }

    .maru {
        border-radius: 20px;
    }

    #ask {
        border: none;
        border-radius: 30px;
        padding: 5px 10px;
    }

    .namelavel0 {
        background-color: rgba(0, 222, 222, 0.40);
        margin: 0 auto;
        width: 100%;
        max-width: 800px;
        font-size: 1rem;
        line-height: auto;
    }
</style>
<div class="jumbotron0">
    <div class="namelavel0 text-white col-11" >カットモデル詳細</div>
    <div class="back0 container">
        <div class="row">
            <div class="col-11 text-right">
                <form action="mpd" method="post">
                    <?php foreach($result as $obj):?>
                    <?=$this->Form->hidden("id",array('value' => $obj['user_id']))?>
                    <input class="btn-dark btn-lg mt-2 " type="submit" value="完了">
                
            </div>
        </div>
        <div class="row">
            <div class="imazine0 col-3 ml-4 mt-2">
            </div>
            <div class="waku0 container col-8 mt-2 mx-auto">
                <div class="row">
                    <div class="col-1"></div>
                    <div class="form-inline mt-5">
                        <strong for="name" class="control-label mr-3 ">ニックネーム</strong>
                        <div class="col-1"></div>
                        <div class="maru">
                            <?=$this->Form->text("user_name",['value'=>$obj['user_name'],'class'=>'form-control','rows'=>'1'])?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="form-inline mt-2">
                        <strong for="name" class="control-label mr-5 ">性別</strong>
                        <div class="col-1"></div>

                            <?php foreach($sex as $s):?>
                            <?php if($s==$obj['user_sex']){ ?>
                                <input type="radio" name="user_sex" value='<?=$s?>' checked/><?=$s?>
                            <?php }else{ ?>
                                <input type="radio" name="user_sex" value='<?=$s?>'/><?=$s?>
                            <?php } ?>
                            
                            <?php endforeach;?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="form-inline mt-2">
                        <strong for="name" class="control-label mr-5 ">職業</strong>
                        <div class="col-1"></div>
                        <?=$this->Form->text("user_profession",['value'=>$obj['user_profession'],'class'=>'form-control ml-4','rows'=>'1'])?>

                    </div>
                </div>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="form-inline mt-2">
                        <strong for="name" class="control-label mr-5 ">都道府県</strong>
                        <div class="col-1"></div>
                        <select name="prefecture_id">
                            <?php foreach($pre as $p):?>
                            <?php if($p['prefecture_id']==$obj['prefecture_id']){ ?>
                                <option value='<?=$p['prefecture_id']?>' selected><?=$p['prefecture_name']?></option>
                            <?php }else{ ?>
                                <option value='<?=$p['prefecture_id']?>'><?=$p['prefecture_name']?></option>
                            <?php } ?>
                            
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="form-inline mt-2">
                        <strong for="name" class="control-label mr-5 ">市町村</strong>
                        <div class="col-1"></div>
                        <?=$this->Form->text("city_name",['value'=>$obj['city_name'],'class'=>'form-control ml-3','rows'=>'1'])?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="form-inline mt-3">
                        <strong for="name" class="control-label mr-5 ">希望価格</strong>
                        <?php
                        $first_kakaku=array();
                        $nedan=array();
                        foreach($kakaku as $obj1){
                            array_push($first_kakaku,$obj1['price_id']);
                            array_push($nedan,$obj1['price_first']."〜".$obj1['price_last']);
                        }

                        $f_kakaku = array_search($obj['price_id'],$first_kakaku);
                        ?>
                        <div class="col-1"></div>
                        <?=$this->Form->select('price_id', $nedan, ['default' => $f_kakaku]);?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="form-inline mt-3">
                        <strong for="name" class="control-label mr-5 ">希望メニュー</strong>
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

                ?><div class="ml-1"></div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="form-inline mt-3">
                        <strong for="name" class="control-label mr-5 ">希望時間</strong>
                        <select name="user_first_time_id">
                            <?php

                            foreach($time as $keyt){

                                if($keyt['time_id']==$obj['user_first_time_id']){
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
                        <h3>~</h3>
                        <select name="user_last_time_id">
                            <?php

                            foreach($time as $keyt){

                                if($keyt['time_id']==$obj['user_last_time_id']){
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
                </div>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="mt-3">
                        <strong for="name" class="control-label mr-5 mb-5">自己紹介一覧</strong>
                        <div class="mt-3">
                            <?=$this->Form->textarea("user_comment",['value'=>$obj['user_comment'],'class'=>'form-control','rows'=>'4','cols'=>'60'])?>
                        </div>
                    </div>
                </div>
                <?php endforeach;?> 
            </form>
            </div>
        </div>
    </div>
</div>

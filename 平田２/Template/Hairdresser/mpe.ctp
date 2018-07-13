<style>
    #footer {
        background-image: url("../img/untitled99.png")
    }

    .jumbotron {
        position: relative;
        background-image: url("../img/tophaikei.jpg");
        background-size: cover;
        padding: 200px 0;
    }

    .menu {
        background-color: #c7c7c959;
        width: 100%;
        height: 50px;
    }

    .back {
        background-color: rgba(255, 253, 253, 0.932);
        margin: 0 auto;
        width: 100%;
        max-height: 700px;
        max-width: 800px;
        border-radius: 10px;
    }

    .back1 {
        background-color: rgba(255, 253, 253, 0.932);
        margin: 0 auto;
        width: 100%;
        max-height: 300px;
        max-width: 500px;
        border-radius: 10px;
    }

    .imazine {
        background-color: rgba(59, 59, 59, 0.253);
        width: 100%;
        height: 250px;
        background-image: url("../img/single3.PNG");
    }

    .waku {
        background-color: rgba(110, 108, 108, 0.425);
        width: 400px;
        max-height: 500px;
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

    .namelavel {
        background-color: rgba(0, 222, 222, 0.40);
        margin: 0 auto;
        width: 100%;
        max-width: 800px;
        font-size: 1rem;
        line-height: auto;
    }

</style>
<div class="jumbotron">
    <div class="namelavel text-white">マイページ</div>
    <div class="back">
        <form action="mpd" method="post">
        <?php foreach($result as $obj):?>
        <?=$this->Form->hidden("id",array('value' => $obj['user_id']))?>
        <div class="row">
            <div class="col-11 text-right">
                
                    <input class="btn-dark btn-lg mt-2 " type="submit" value="完了">
                
            </div>
        </div>
        <div class="row">
            <div class="imazine col-3 ml-4 mt-2">
            </div>
            <div class="waku  col-8 mt-2 mx-auto">
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
                        <div class=" ml-5 ">

                            
                            

                            <?php foreach($sex as $s):?>
                            <?php if($s==$obj['user_sex']){ ?>
                                <input type="radio" name="user_sex" value='<?=$s?>' checked/><?=$s?>
                            <?php }else{ ?>
                                <input type="radio" name="user_sex" value='<?=$s?>'/><?=$s?>
                            <?php } ?>
                            
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="form-inline mt-2">
                        <strong for="name" class="control-label mr-5 ">職業</strong>
                        <div class="col-1"></div>
                        <?=$this->Form->text("user_profession",['value'=>$obj['user_profession'],'class'=>'form-control','rows'=>'1'])?>
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
                        <?=$this->Form->text("city_name",['value'=>$obj['city_name'],'class'=>'form-control','rows'=>'1'])?>
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
            </div>
        <?php endforeach;?> 
        </div>
        </form>
    </div>
</div>
<!doctype html>
<html lang="ja">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

</head>

<body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>

</html>

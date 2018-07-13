<style type="text/css">
    .kensakuform {
        margin-top: 80px !important;
        margin-left: 80px !important;
        margin-right: 80px !important;
        margin-bottom: 20px !important;
    }

    .namelavel {
        background-color: rgba(0, 222, 222, 0.40) !important;
        margin: 0 auto !important;
        width: 100% !important;
        max-width: 900px !important;
        font-size: 1rem !important;
        line-height: auto !important;
        /*border-radius: 10px;*/
    }

    .back {
        position: relative !important;
        background-image: url("../img/ハサミ.jpg") !important;
        background-size: cover !important;
        padding: 200px 0 !important;
        margin: 0 !important;
    }

    .back1 {

        background-color: white !important;
        padding: auto !important;
        margin: 0 auto !important;
        width: 100% !important;
        height: 1300px !important;
        max-width: 1000px !important;
        font-size: 1rem !important;
        line-height: 1.7 !important;
        border-radius: 10px !important;
        background-color: rgba(238, 238, 238, 0.7) !important;
    }

    h2 {
        text-align: center !important;
    }

</style>
<div class="container-fluid back">
    <h2>新規登録画面（カットモデル）</h2>
    <div class="jumbotron back1">
        <form action="http://localhost/cake3kadai1/commons/sc" method="post">
        <div class="mt-5">
            <div class="col-5"></div>
            <div class="form-inline">
                <label class="label-control col-3">プロフィール画像:</label>
                    <input type="file" name="image">
                </div>
            <br>
            <div class="form-inline">
                <label class="label-control col-3">名前:</label>
                <input type="text" class="form-control col-8" name="user_name" placeholder="ニックネーム">
            </div>
            <br>
            <div class="form-inline">
                <label class="label-control col-3">メールアドレス:</label>
                <input type="email" class="form-control col-8" name="mailaddress" placeholder="メールアドレス">
            </div>
            <br>
            <div class="col-5"></div>
            <div class="form-inline">
                <label class="label-control col-3">パスワード:</label>
                <input type="password" class="form-control col-8" name="password" placeholder="パスワード">
            </div>
        </div>
        <br>
        <div class="col-5"></div>
        <div class="form-inline">
            <label class="label-control col-3">パスワード（確認用）:</label>
            <input type="password" class="form-control col-8" name="password_kakunin" placeholder="パスワード（確認用）">
        </div>
        <br>
        <div class="form-inline">
            <label class="label-control col-3">性別:</label>
            <select name="user_sex">
                <option value="">選択してください</option>
                <option value="男">男</option>
                <option value="女">女</option>
            </select>
        </div>
        <br>
        <div class="col-5"></div>
        <div class="form-inline">
            <label class="label-control col-3">年齢:</label>
            <select name="user_age">
                <option value="">選択してください</option>
                <?php for($i=1;$i<=100;$i++){
                ?>
                <option value='<?=$i?>'><?=$i?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <br>
        <div class="col-5"></div>
        <div class="form-inline">
            <label class="label-control col-3">職業:</label>
            <select name="user_profession">
                <option value="">選択してください</option>
                <?php
                foreach($prof as $p){
                ?>
                <option value='<?=$p['profession']?>'><?=$p['profession']?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <br>
        <div class="form-inline">
            <label class="label-control col-3">都道府県:</label>
            <select name="prefecture_id">
                <option value="">選択してください</option>
                <?php
                foreach($pref as $p){
                ?>
                <option value='<?=$p['prefecture_id']?>'><?=$p['prefecture_name']?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <br>
        <div class="col-5"></div>
        <div class="form-inline">
            <label class="label-control col-3">市町村:</label>
            <input type="text" class="form-control col-8" name="city_name" placeholder="市町村">
        </div>
        <br>
        <div class="col-5"></div>
        <div class="form-inline">
            <label class="label-control col-3">希望価格:</label>
            <select name="user_price_id">
            <option value="">選択してください</option>
                <?php
                foreach($price as $p){
                ?>
                <option value='<?=$p['price_id']?>'><?=$p['price_first']?>〜<?=$p['price_last']?></option>
                <?php
                }
                ?>
        </select>
            <br>
            <div class="col-5"></div>
            <div class="form-inline mx-auto col-12 mt-3">
                <label class="label-control col-3">希望メニュー:</label>
                
                    <p>
                        <?php
                        $hoge2=array();
                        foreach($youso as $obj4){
                            array_push($hoge2,$obj4['menu_name']);
                        }
                        for($i=0;$i<count($hoge2);$i++){
                        ?>
                            <label class="checkbox-inline" style="display: inline;"><input type="checkbox" name="check['<?=$i?>']" value='<?=$i?>'><?=$hoge2[$i]?>　　</label>
                        <?php
                        }
                        ?>
                    </p>
            </div>
            <br>
            <div class="col-5"></div>
            <div class="form-inline mx-auto col-12 mt-3">
                <label class="label-control col-3">希望時間帯:</label>
                <select name="user_first_time_id">
                    <option value="">選択してください</option>
                    <?php foreach($time as $tf):?>
                    <option value='<?=$tf['time_id']?>'><?=$tf['time']?></option>
                    <?php endforeach;?>
                </select>
                <div class="col-1"></div>～<div class="col-1"></div>
                <select name="user_last_time_id">
                    <option value="">選択してください</option>
                    <?php foreach($time as $tl):?>
                    <option value='<?=$tl['time_id']?>'><?=$tl['time']?></option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>
        <br>
        <div class="form-inline mx-auto col-12">
            <label class="label-control col-3">自己紹介欄:</label>
            <textarea rows="9" cols="60" name="user_comment"></textarea>
        </div>
        <div class="row mt-5 mx-auto">
            <div class=" mx-auto">
                
                    <input type="hidden" name="modelflg" value=0>
                    <input class="btn btn-dark btn-1g m1-4 " type="submit" value="新規登録" style="width:200px;">
                </form>
            </div>

        </div>
    </div>
</div>

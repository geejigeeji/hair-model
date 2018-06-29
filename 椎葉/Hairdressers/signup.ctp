<style type="text/css">
    .kensakuform {
        margin-top: 80px;
        margin-left: 80px;
        margin-right: 80px;
        margin-bottom: 20px;
    }

    .namelavel {
        background-color: rgba(0, 222, 222, 0.40);
        margin: 0 auto;
        width: 100%;
        max-width: 900px;
        font-size: 1rem;
        line-height: auto;
        /*border-radius: 10px;*/
    }

    .back {
        position: relative;
        background-image: url("../img/ハサミ.jpg");
        background-size: cover;
        padding: 200px 0;
        margin: 0;
    }

    .back1 {

        background-color: white;
        padding: auto;
        margin: 0 auto;
        width: 100%;
        height: 1100px;
        max-width: 1000px;
        font-size: 1rem;
        line-height: 1.7;
        border-radius: 10px;
        background-color: rgba(238, 238, 238, 0.7);
    }

    h2 {
        text-align: center;
    }
    .imagePreview {
        width: 100%;
        height: 180px;
        background-position: center center;
        background-size: cover;
        -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
        display: inline-block;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
<div class="container-fluid back">
    <h2>新規登録画面（美容師）</h2>
    <div class="jumbotron back1">
        <form action="" method="post">
        <div class="mt-5">
            <div class="col-5"></div>
            <div class="form-inline">
                <label class="label-control col-3">君の顔:</label>
                    <input type="file">
                </div>
            <br>
            <div class="form-inline">
                <label class="label-control col-3">ニックネーム:</label>
                <input type="text" name="user_name" class="form-control col-8" id="exampleInputEmail1" placeholder="ニックネーム">
            </div>
            <br>
            <div class="form-inline">
                <label class="label-control col-3">メールアドレス:</label>
                <input type="text" name="mailaddress" class="form-control col-8" id="exampleInputEmail1" placeholder="メールアドレス">
            </div>
            <br>
            <div class="col-5"></div>
            <div class="form-inline">
                <label class="label-control col-3">パスワード:</label>
                <input type="password" name="password" class="form-control col-8" id="exampleInputPassword1" placeholder="パスワード">
            </div>
        </div>
        <br>
        <div class="col-5"></div>
        <div class="form-inline">
            <label class="label-control col-3">パスワード（確認用）:</label>
            <input type="password" name="password2" class="form-control col-8" id="exampleInputPassword1" placeholder="パスワード（確認用）">
        </div>
        <br>
        <div class="form-inline">
            <label class="label-control col-3">性別:</label>
            <select name="sex_id">
                <option value="">選択してください</option>
                <?php
                foreach($sex as $obj){
                    echo '<option value="'.$obj->sex_id.'">'.$obj->sex_name.'</option>';
                }
                ?>
            </select>
        </div>
        <br>
        <div class="col-5"></div>
        <div class="form-inline">
            <label class="label-control col-3">年齢:</label>
            <select name="age_id">
                <option value="">選択してください</option>
                <?php
                foreach($age as $obj){
                    echo '<option value="'.$obj->age_id.'">'.$obj->age_name.'</option>';
                }
                ?>
            </select>
        </div>
        <br>
        <div class="col-5"></div>
        <div class="form-inline">
            <label class="label-control col-3">職業:</label>
            <select name="profession_id">
                <option value="">選択してください</option>
                <?php
                foreach($profession as $obj){
                    echo '<option value="'.$obj->profession_id.'">'.$obj->profession_name.'</option>';
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
                foreach($prefecture as $obj){
                    echo '<option value="'.$obj->prefecture_id.'">'.$obj->prefecture_name.'</option>';
                }
                ?>
            </select>
        </div>
        <br>
        <div class="col-5"></div>
        <div class="form-inline">
            <label class="label-control col-3">市町村:</label>
            <input type="text" name="city_name" class="form-control col-8" id="exampleInputText" placeholder="市町村">
        </div>
        <br>
        <div class="col-5"> </div>
        <div class="form-inline">
            <label class="label-control col-3">自己紹介欄:</label>
            <textarea rows="9" name="user_comment" cols="60"></textarea>
        </div>
            <div class="row mt-5 mx-auto">
                <div class="col-5"></div>
                <input class="btn btn-dark btn-1g m1-4 " type="submit" value="新規登録" style="width:200px;">
            </div>
        </form>
    </div>
</div>

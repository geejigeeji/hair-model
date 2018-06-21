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
        <div class="mt-5">
            <div class="col-5"></div>
            <div class="form-inline">
                <label class="label-control col-3">君の顔:</label>
                    <input type="file">
                </div>
            <br>
            <div class="form-inline">
                <label class="label-control col-3">ニックネーム:</label>
                <input type="email" class="form-control col-8" id="exampleInputEmail1" placeholder="ニックネーム">
            </div>
            <br>
            <div class="form-inline">
                <label class="label-control col-3">メールアドレス:</label>
                <input type="email" class="form-control col-8" id="exampleInputEmail1" placeholder="メールアドレス">
            </div>
            <br>
            <div class="col-5"></div>
            <div class="form-inline">
                <label class="label-control col-3">パスワード:</label>
                <input type="password" class="form-control col-8" id="exampleInputPassword1" placeholder="パスワード">
            </div>
        </div>
        <br>
        <div class="col-5"></div>
        <div class="form-inline">
            <label class="label-control col-3">パスワード（確認用）:</label>
            <input type="password" class="form-control col-8" id="exampleInputPassword1" placeholder="パスワード（確認用）">
        </div>
        <br>
        <div class="form-inline">
            <label class="label-control col-3">性別:</label>
            <select name="sex">
                <option value="">選択してください</option>
                <option value="男">男</option>
                <option value="女">女</option>
                <option value="オカマ">オカマ</option>
            </select>
        </div>
        <br>
        <div class="col-5"></div>
        <div class="form-inline">
            <label class="label-control col-3">年齢:</label>
            <select name="age">
                <option value="">選択してください</option>
                <option value="20歳未満">20歳未満</option>
                <option value="20-29歳">20-29歳</option>
                <option value="30-39歳">30-39歳</option>
                <option value="40-49歳">40-49歳</option>
                <option value="50-59歳">50-59歳</option>
                <option value="60-69歳">60-69歳</option>
                <option value="70-79歳">70-79歳</option>
                <option value="80歳以上">80歳以上</option>
            </select>
        </div>
        <br>
        <div class="col-5"></div>
        <div class="form-inline">
            <label class="label-control col-3">職業:</label>
            <select name="job">
                <option value="">選択してください</option>
                <option value="公務員">公務員</option>
                <option value="経営者・役員">経営者・役員</option>
                <option value="会社員">会社員</option>
                <option value="自営業">自営業</option>
                <option value="自由業">自由業</option>
                <option value="専業主婦">専業主婦</option>
                <option value="パート・アルバイト">パート・アルバイト</option>
                <option value="学生">学生</option>
                <option value="その他">その他</option>
            </select>
        </div>
        <br>
        <div class="form-inline">
            <label class="label-control col-3">都道府県:</label>
            <select name="pref">
                <option value="">選択してください</option>
                <option value="北海道">北海道</option>
                <option value="青森県">青森県</option>
                <option value="岩手県">岩手県</option>
                <option value="宮城県">宮城県</option>
                <option value="秋田県">秋田県</option>
                <option value="山形県">山形県</option>
                <option value="福島県">福島県</option>
                <option value="茨城県">茨城県</option>
                <option value="栃木県">栃木県</option>
                <option value="群馬県">群馬県</option>
                <option value="埼玉県">埼玉県</option>
                <option value="千葉県">千葉県</option>
                <option value="東京都" selected>東京都</option>
                <option value="神奈川県">神奈川県</option>
                <option value="新潟県">新潟県</option>
                <option value="富山県">富山県</option>
                <option value="石川県">石川県</option>
                <option value="福井県">福井県</option>
                <option value="山梨県">山梨県</option>
                <option value="長野県">長野県</option>
                <option value="岐阜県">岐阜県</option>
                <option value="静岡県">静岡県</option>
                <option value="愛知県">愛知県</option>
                <option value="三重県">三重県</option>
                <option value="滋賀県">滋賀県</option>
                <option value="京都府">京都府</option>
                <option value="大阪府">大阪府</option>
                <option value="兵庫県">兵庫県</option>
                <option value="奈良県">奈良県</option>
                <option value="和歌山県">和歌山県</option>
                <option value="鳥取県">鳥取県</option>
                <option value="島根県">島根県</option>
                <option value="岡山県">岡山県</option>
                <option value="広島県">広島県</option>
                <option value="山口県">山口県</option>
                <option value="徳島県">徳島県</option>
                <option value="香川県">香川県</option>
                <option value="愛媛県">愛媛県</option>
                <option value="高知県">高知県</option>
                <option value="福岡県">福岡県</option>
                <option value="佐賀県">佐賀県</option>
                <option value="長崎県">長崎県</option>
                <option value="熊本県">熊本県</option>
                <option value="大分県">大分県</option>
                <option value="宮崎県">宮崎県</option>
                <option value="鹿児島県">鹿児島県</option>
                <option value="沖縄県">沖縄県</option>
            </select>
        </div>
        <br>
        <div class="col-5"></div>
        <div class="form-inline">
            <label class="label-control col-3">市町村:</label>
            <input type="text" class="form-control col-8" id="exampleInputText" placeholder="市町村">
        </div>
        <br>
        <div class="col-5"> </div>
        <div class="form-inline">
            <label class="label-control col-3">自己紹介欄:</label>
            <textarea rows="9" cols="60"></textarea>
        </div>

        <div class="row mt-5 mx-auto">
            <div class="col-5"></div>
            <form action="sc" method="post">
                <input class="btn btn-dark btn-1g m1-4 " type="submit" value="新規登録" style="width:200px;">
            </form>
        </div>
    </div>
</div>

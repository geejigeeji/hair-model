<style>
    .jumbotron {
        position: relative;
        background-image: url("../img/sa113_list_F800-800.jpg");
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
        height: 700px;
        max-width: 800px;
        border-radius: 10px;
    }

    .back1 {
        background-color: rgba(255, 253, 253, 0.932);
        margin: 0 auto;
        width: 100%;
        height: 300px;
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

    .namelavel {
        background-color: rgba(0, 222, 222, 0.40);
        margin: 0 auto;
        width: 100%;
        max-width: 720px;
        font-size: 1rem;
        line-height: auto;
    }
</style>
<div class="jumbotron">
    <div class="namelavel text-white col-10" >カットモデル詳細</div>
    <div class="back container">
        <div class="row">
            <div class="col-11 text-right">
                <form action="mpd" method="get">
                    <input class="btn-dark btn-lg mt-2 " type="submit" value="完了">
                </form>
            </div>
        </div>
        <div class="row">
            <div class="imazine col-3 ml-4 mt-2">
            </div>
            <div class="waku container col-8 mt-2 mx-auto">
                <div class="row">
                    <div class="col-1"></div>
                    <div class="form-inline mt-5">
                        <strong for="name" class="control-label mr-3 ">ニックネーム</strong>
                        <div class="col-1"></div>
                        <div class="maru">
                            <textarea rows="1" class="form-control" id="ask"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="form-inline mt-2">
                        <strong for="name" class="control-label mr-5 ">性別</strong>
                        <div class="col-1"></div>
                        <input type="radio" name="性別" value="男" /> 男　
                        <input type="radio" name="性別" value="女" /> 女
                    </div>
                </div>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="form-inline mt-2">
                        <strong for="name" class="control-label mr-5 ">年齢</strong>
                        <div class="col-1"></div>
                        <textarea rows="1" class="form-control ml-4" id="ask"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="form-inline mt-2">
                        <strong for="name" class="control-label mr-5 ">都道府県</strong>
                        <div class="col-1"></div>
                        <select name="pref_id">
                            <option value="" selected>都道府県</option>
                            <option value="1">北海道</option>
                            <option value="2">青森県</option>
                            <option value="3">岩手県</option>
                            <option value="4">宮城県</option>
                            <option value="5">秋田県</option>
                            <option value="6">山形県</option>
                            <option value="7">福島県</option>
                            <option value="8">茨城県</option>
                            <option value="9">栃木県</option>
                            <option value="10">群馬県</option>
                            <option value="11">埼玉県</option>
                            <option value="12">千葉県</option>
                            <option value="13">東京都</option>
                            <option value="14">神奈川県</option>
                            <option value="15">新潟県</option>
                            <option value="16">富山県</option>
                            <option value="17">石川県</option>
                            <option value="18">福井県</option>
                            <option value="19">山梨県</option>
                            <option value="20">長野県</option>
                            <option value="21">岐阜県</option>
                            <option value="22">静岡県</option>
                            <option value="23">愛知県</option>
                            <option value="24">三重県</option>
                            <option value="25">滋賀県</option>
                            <option value="26">京都府</option>
                            <option value="27">大阪府</option>
                            <option value="28">兵庫県</option>
                            <option value="29">奈良県</option>
                            <option value="30">和歌山県</option>
                            <option value="31">鳥取県</option>
                            <option value="32">島根県</option>
                            <option value="33">岡山県</option>
                            <option value="34">広島県</option>
                            <option value="35">山口県</option>
                            <option value="36">徳島県</option>
                            <option value="37">香川県</option>
                            <option value="38">愛媛県</option>
                            <option value="39">高知県</option>
                            <option value="40">福岡県</option>
                            <option value="41">佐賀県</option>
                            <option value="42">長崎県</option>
                            <option value="43">熊本県</option>
                            <option value="44">大分県</option>
                            <option value="45">宮崎県</option>
                            <option value="46">鹿児島県</option>
                            <option value="47">沖縄県</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="form-inline mt-2">
                        <strong for="name" class="control-label mr-5 ">市町村</strong>
                        <div class="col-1"></div>
                        <textarea rows="1" class="form-control ml-3" id="ask"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="form-inline mt-3">
                        <strong for="name" class="control-label mr-5 ">希望価格</strong>
                        <div class="col-1"></div>
                        <select name="price">
                            <option value="無料">無料</option>
                            <option value="500円">500円</option>
                            <option value="1000円前後">1000円前後</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="form-inline mt-3">
                        <strong for="name" class="control-label mr-5 ">希望メニュー</strong>
                        <input type="checkbox" name="cut" value="カット"> カット
                        <div class="ml-1"></div>
                        <input type="checkbox" name="color" value="ヘアカラー"> ヘアカラー
                        <div class="ml-1"></div>
                        <input type="checkbox" name="perm" value="パーマ"> パーマ
                        <div class="ml-1"></div>
                        <input type="checkbox" name="Curly hair" value="縮毛矯正"> 縮毛矯正
                    </div>
                </div>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="form-inline mt-3">
                        <strong for="name" class="control-label mr-5 ">希望時間</strong>
                        <select name="time">
                            <option value="無料">無料</option>
                            <option value="500円">500円</option>
                            <option value="1000円前後">1000円前後</option>
                        </select>
                        <h3>~</h3>
                        <select name="time">
                            <option value="無料">無料</option>
                            <option value="500円">500円</option>
                            <option value="1000円前後">1000円前後</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="mt-3">
                        <strong for="name" class="control-label mr-5 mb-5">自己紹介一覧</strong>
                        <div class="mt-3">
                            <textarea rows="4" cols="60" class="form-control" id="ask"></textarea>
                        </div>
                    </div>
                </div>


            </div>
        </div>
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

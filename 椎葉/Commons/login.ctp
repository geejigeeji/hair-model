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
        height:500px;
        max-width: 1000px;
        font-size: 1rem;
        line-height: 1.7;
        border-radius: 10px;
        background-color: rgba(238,238,238 ,0.7);
    }



</style>
<div class="container-fluid back">
    <div class="jumbotron back1">
        <div>
            <form action="" method="post">
                <div class="mt-5">
                    <div class="col-5"></div>
                    <div class="form-inline">
                        <label class="label-control col-3">メールアドレス:</label>
                        <input type="text" name="mailaddress" class="form-control col-8" id="exampleInputEmail1" placeholder="メールアドレス">
                    </div>
                    <div class="mt-5">
                        <div class="col-5"></div>
                        <div class="form-inline">
                            <label class="label-control col-3">パスワード:</label>
                            <input type="text" name="password" class="form-control col-8" id="exampleInputPassword1" placeholder="パスワード">
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-9"></div>
                    <input class="btn btn-dark btn-1g ml-5" type="submit" value="ログイン">
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-8"></div>
            <form action="pw" method="get">
                <input class="btn btn-primary btn-link" type="submit" value="パスワードを忘れた方はこちら">
            </form>
        </div>
        <div class="row mt-5">
            <div class="col-5 ml-5"></div>
            <form action="/cake/Hairdressers/signup" method="get">
                <input class="btn btn-dark btn-1g ml-5" type="submit" value="美容師/新規登録">
            </form>
            <form action="/cake/Models/signup" method="get">
                <input class="btn btn-dark btn-1g ml-4" type="submit" value="カットモデル/新規登録">
            </form>
        </div>
    </div>
</div>

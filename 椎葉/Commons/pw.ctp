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
        height: 500px;
        max-width: 1000px;
        font-size: 1rem;
        line-height: 1.7;
        border-radius: 10px;
        background-color: rgba(238, 238, 238, 0.7);
    }
</style>
<div class="container-fluid back">
    <div class="jumbotron back1">
        <div class="mt-5">
            <div class="col-5"></div>
            <div class="form-inline">
                <label class="label-control col-3">メールアドレス:</label>
                <input type="email" class="form-control col-8" id="exampleInputEmail1" placeholder="メールアドレス"
                style="padding:25px;">
            </div>
        </div>
        <div class="row mt-5 pt-10">
            <div class="col-5"></div>
            <form action="pwfc" method="post">
                <input class="btn btn-dark btn-1g m1-4 " type="submit" value="送信" style="width:100px;height:50px">
            </form>
        </div>
    </div>
</div>

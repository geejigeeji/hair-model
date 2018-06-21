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
    line-height: 2.0;
    border-radius: 10px 10px 0px 0px;
}
    .back0{
        position: relative;
        background-image: url("../img/tophaikei.jpg");
        background-color: green;
        background-size:cover;
        padding: 250px 0;
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

<div class="container-fluid back0">
    <div class="row">
       
        <div class="namelavel0 text-white">　掲示板投稿画面</div>
    </div>
    <div class="jumbotron back10">
       
            <div class="row">
              <div class="col-2 text-center">
                  <b>メニュー</b>
              </div>
               <div class="checkbox">
                    <label class="checkbox-inline"><input type="checkbox" value="">カット　　</label>
                    <label class="inline"><input type="checkbox" value="">ヘアカラー　　</label>
                    <label class="checkbox-inline"><input type="checkbox" value="">ネイル　　</label>
                    <label class="checkbox-inline"><input type="checkbox" value="">縮毛矯正　　</label>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-2 text-center">
                    <b>価格</b>
                </div>
                <select name="money">
                        <option value="">選択してください</option>
                        <option value="0～1000">0～1000</option>
                        <option value="1000～2000">1000～20000</option>
                    </select>
            </div>
            <br>
            <div class="row">
                <div class="col-2 text-center">
                    <b>時刻</b>
                </div>
                <select name="fasttime">
                        <option value="">選択してください</option>
                        <option value="9:00">9:00</option>
                        <option value="10:00">10:00</option>
                    </select>
                        <div class="col-1"></div>～<div class="col-1"></div>
                        <select name="lasttime">
                        <option value="">選択してください</option>
                        <option value="11:00">11:00</option>
                        <option value="12:00">12:00</option>
                    </select>
                
                
            </div>
            <br>
            <div class="row">
                <div class="col-2 text-center">
                    <b>募集人数</b>
                </div>
             <select>
                        <option value="">選択してください</option>
                        <option value="1">1人</option>
                        <option value="2">2人</option>
                        <option value="3">3人</option>
                    </select>
            </div>
            <br>
            <div class="row">
                <div class="col-2 text-center">
                    <b>タイトル</b>
                </div>
            <div class="form-group">
                    <textarea rows="1" class="form-control"id="ask1"></textarea>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-2 text-center">
                    <b>コメント</b>
                </div>
                <div class="form-group">
                    <textarea rows="10" class="form-control"id="ask1"></textarea>
                </div>
            </div>
                
            
               <div class="row">
                <div class ="col-6"></div>
                <form action="mbpc" method="get"><input class="btn btn-dark" type="submit" value="投稿"></form>
                </div>
    </div>
                
</div>
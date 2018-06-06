<style type="text/css">
.kensakuform {
    margin-top: 80px;
    margin-left: 80px;
    margin-right: 80px;
    margin-bottom: 20px;
}
.namelavel {
    background-color: rgba(0,222,222,0.40);
    margin-top: 30px;
    width: 100%;
    max-width: 900px;
    font-size: 1rem;
    line-height: 2.0;
    border-radius: 10px 10px 0px 0px;
}
    .back{
        position: relative;
        background-image: url("../img/tophaikei.jpg");
        background-size:cover;
        padding: 500px 0;
        margin: 0;
    }
    .back1{
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

<div class="container-fluid back">
    <div class="row">
       
        <div class="namelavel text-white">投稿修正画面</div>
    </div>
    <div class="jumbotron back1">
        <form>
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
                <div class="dropdown"><!--ならない-->
                        <button type="button" class="btn btn-secondary dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        0～1000
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">0～1000</a>
                            <a class="dropdown-item" href="#">1000～2000</a>
                            <a class="dropdown-item" href="#">2000～3000</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">その他リンク</a>
                        </div>
                    </div>
            </div>
            <br>
            <div class="row">
                <div class="col-2 text-center">
                    <b>日付</b>
                </div>
                <div class="dropdown"><!--ならない-->
                        <button type="button" class="btn btn-secondary dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        5月
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">1月</a>
                            <a class="dropdown-item" href="#">2月</a>
                            <a class="dropdown-item" href="#">3月</a>
                            <a class="dropdown-item" href="#">4月</a>
                            <a class="dropdown-item" href="#">5月</a>
                            <a class="dropdown-item" href="#">6月</a>
                            <a class="dropdown-item" href="#">7月</a>
                            <a class="dropdown-item" href="#">8月</a>
                            <a class="dropdown-item" href="#">9月</a>
                            <a class="dropdown-item" href="#">10月</a>
                            <a class="dropdown-item" href="#">11月</a>
                            <a class="dropdown-item" href="#">12月</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">その他リンク</a>
                        </div>
                    </div>
                    <div class="col-2">
                <div class="dropdown"><!--ならない-->
                        <button type="button" class="btn btn-secondary dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        1日
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">1日</a>
                            <a class="dropdown-item" href="#">2日</a>
                            <a class="dropdown-item" href="#">3日</a>
                            <a class="dropdown-item" href="#">4日</a>
                            <a class="dropdown-item" href="#">5日</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">その他リンク</a>
                        </div>
                    </div>
                    </div>
            </div>
            <br>
            <div class="row">
                <div class="col-2 text-center">
                    <b>時刻</b>
                </div>
            <div class="dropdown"><!--ならない-->
                            <button type="button" class="btn btn-secondary dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            開始時間
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">9:00</a>
                                <a class="dropdown-item" href="#">10:00</a>
                                <a class="dropdown-item" href="#">11:00</a>
                            </div>
                        </div>
                        <div class="col-1"></div><h1>～</h1><div class="col-1"></div>
                        <div class="dropdown"><!--ならない-->
                            <button type="button" class="btn btn-secondary dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            終了時間
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">10:00</a>
                                <a class="dropdown-item" href="#">11:00</a>
                                <a class="dropdown-item" href="#">12:00</a>
                            </div>
                        </div>
                
                
            </div>
            <br>
            <div class="row">
                <div class="col-2 text-center">
                    <b>募集人数</b>
                </div>
             <div class="dropdown"><!--ならない-->
                        <button type="button" class="btn btn-secondary dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        1人
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">1人</a>
                            <a class="dropdown-item" href="#">2人</a>
                            <a class="dropdown-item" href="#">3人</a>
                            <a class="dropdown-item" href="#">4人</a>
                            <a class="dropdown-item" href="#">5人</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">その他リンク</a>
                        </div>
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
                <button type="submit" class="btn btn-dark">修正</button>
                </div>
        </form>
    </div>
                
</div>
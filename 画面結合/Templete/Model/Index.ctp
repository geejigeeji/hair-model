<style type="text/css">
.kensakuform {
    margin-top: 80px;
    margin-left: 80px;
    margin-right: 80px;
    margin-bottom: 20px;
}
.namelavel {
    background-color: rgba(0,222,222,0.40);
    margin: 0 auto;
    width: 100%;
    max-width: 900px;
    font-size: 1rem;
    line-height: auto;
    /*border-radius: 10px;*/
}
    .back{
        position: relative;
        background-image: url("../img/tophaikei.jpg");
        background-size:cover;
        padding:     500px 0;
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
        border-radius: 10px;
    }
    .back2{
        background-color: white;
        padding: 20px 10px;
        margin: 0 auto;
        width: 100%;
        max-width: 900px;
        font-size: 1rem;
        line-height: auto;   
    }
    img{
    width:100px;
    height:100px;
    
}
    
</style>
<div class="container-fluid back">
<div class="jumbotron back1">
            <form>
                
                <div class ="row">
                      <div class ="col-1"></div>
                      <h3>条件検索</h3>
                      <div class ="col-7"></div>
                      <form action="" method="get"><input class="btn btn-dark btn-lg mt-2" type="submit" value="条件を変更"></form>
                </div> 
                <br>
                <div class = "row">
                    <div class = "col-2">
                        <div class = "col-7"></div>
                        希望メニュー
                    </div>
                        <div class="checkbox">
                            <label class="checkbox-inline"><input type="checkbox" value="">カット　　</label>
                            <label class="inline"><input type="checkbox" value="">ヘアカラー　　</label>
                            <label class="checkbox-inline"><input type="checkbox" value="">ネイル　　</label>
                            <label class="checkbox-inline"><input type="checkbox" value="">縮毛矯正　　</label>
                        </div>  
                </div>
                <br>
                <div class = "row">
                    <div class = "col-2">
                        <div class = "col-2"></div>
                        エリア
                    </div>
                        <div class="dropdown"><!--ならない-->
                            <button type="button" class="btn btn-secondary dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            ドロップダウンボタン
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">メニュー1</a>
                                <a class="dropdown-item" href="#">メニュー2</a>
                                <a class="dropdown-item" href="#">メニュー3</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">その他リンク</a>
                            </div>
                        </div>
                </div>
                <br>
                <div class = "row">
                    <div class = "col-2">
                        <div class = "col-2"></div>
                        希望価格
                    </div>
                        <div class="dropdown"><!--ならない-->
                            <button type="button" class="btn btn-secondary dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            希望価格
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">0～1000</a>
                                <a class="dropdown-item" href="#">1000～2000</a>
                                <a class="dropdown-item" href="#">2000～3000</a>
                            </div>
                        </div>
                </div>
                <br>
                <div class = "row">
                    <div class = "col-2">
                        <div class = "col-2"></div>
                        希望時刻
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
            </form>
        </div>
        <br>
        <div class="row">
            <div class="col-2 "></div>
            <h4 class="text-white">〇〇件の検索結果</h4>
        </div>
        <br>
           <div class="row">
                    <div class="namelavel text-white">岡林連</div>
                    </div>
            <div class="jumbotron back2">
                    
                        <div class="row">
                            <div class="col-3">
                                <div class="col-2"><img class='img-responsive' src='../img/single3.PNG'><div class="col-3"></div>
                                </div> 
                            </div>
                                <div class="row">
                                   <b>メニュー<br>価格<br>時刻</b>
                                   <div class="col-1"></div>
                                   カット
                                   <br>
                                   0～1000円
                                   <br>
                                   21:00～06:00
                               </div>
                                <div class="col-1"></div>
                                <div class="row">
                                    <b>エリア<br>希望日</b>
                                    <div class="col-1"></div>
                                    福岡県福岡市
                                    <br>
                                    6/31
                                </div>
                                <div class ="col-1"></div>
                                    <form action="mbd" method="get"><input class="btn btn-dark btn-lg mt-2" type="submit" value="詳細を見る"></form>
                                    
                                
                        </div>
               
            </div>
</div>


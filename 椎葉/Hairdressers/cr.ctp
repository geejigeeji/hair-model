<style>
.jumbotron{
    position: relative;
    background-image: url("../img/sa113_list_F800-800.jpg");
    background-size: cover;
    padding: 200px 0;
}
.back{
background-color: rgba(255, 255, 255, 0.849);
margin: 0 auto;
width: 100%;
height: 125px;
max-width: 700px;
border-radius: 10px;
}
.namelavel{
background-color:rgba(0,222,222,0.40);
margin:0 auto;
width:100%;
max-width:700px;
font-size:1rem;
line-height:auto;
}  
.chatuser{
height:120px;
border: solid thin #0f0f0f;
}
.waku3{
height:100px;


}
.waku4{
height:100px;


}
img {
width:auto;
height:auto;
max-width:100%;
max-height:100%;
}

</style>
<div class="jumbotron">
<div class="namelavel text-white">チャットルーム</div>
    <div class="back container">
        <?php if(!(empty($chat))){
                    foreach($chat as $obj){ 
        ?>
        <div class="row">
            <div class="chatuser col-12">
                <div class="row">
                    <div class="chatuserimg col-2 ml-3 mt-2">
                    <img alt="" src="../img/single4.PNG">
                    </div>
                    <div class="waku3 col-6 mt-2">
                        <h5 class="font-weight-bold">岡林連</h5>
                        <h6 class="mt-3">↪ <?=${$obj->chat_id}?></h6>
                    </div>
                    <div class="waku4 col-3 mt-2 ml-3">
                        <form action="crd" method="post">
                            <input type="hidden" name="chat_id" value="<?=$obj->chat_id?>"?>
                            <input class="btn-dark btn-lg mt-2 " type="submit" value="詳細を見る">
                        </form>        
                    </div>
                </div>
            </div>
        </div>
        <?php }
            }else{
                echo $message;
            }
        ?>
    </div>
</div>

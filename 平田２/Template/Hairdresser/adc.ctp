<style>
.jumbotron{
    position: relative;
    background-image: url("../img/tophaikei.jpg");
    background-size: cover;
    padding: 200px 0;
}
    .back10{
  background-color:  rgb(252, 250, 250);
    margin: 0 auto;
    width: 100%;
    height: 300px;
    max-width: 500px;
    border-radius: 10px;
}
</style>
  <div class="jumbotron">
    <div class="back10">
      <h2 class="text-center pt-5">
       応募者にメールで通知しました
      </h2>
      <div class="row mt-5">
        <div class="col-4"></div>
          <form action="al" method="post">
            <?=$this->Form->hidden("recruitment_id",array('value' => $result2))?>
            <input class="btn btn-dark btn-lg ml-4" type="submit" value="応募者一覧へ">
          </form>
      </div>    	
    </div>
  </div>

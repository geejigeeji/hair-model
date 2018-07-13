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
       こちらの応募者で決定しますか？
      </h2>
      <div class="row mt-5">
        <div class="col-2"></div>
          <form action="al" method="post">
            <?=$this->Form->hidden("recruitment_id",array('value' => $result2))?>
            <input class="btn btn-dark btn-lg ml-4" type="submit" value="いいえ">

          </form>
          <div class="col-2"></div>
          <form action='<?= $seni ?>' method="post">
              <?=$this->Form->hidden("id",array('value' => $result))?>
              <?=$this->Form->hidden("recruitment_id",array('value' => $result2))?>
            <input class="btn btn-dark btn-lg ml-4" type="submit" value="はい">
          </form>
      </div>    	
    </div>
  </div>

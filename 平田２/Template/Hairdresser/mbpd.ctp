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
      この投稿を削除しますか？
      </h2>
      <div class="row mt-5">
        <div class="col-2"></div>
          <form action="mbph" method="get">
            <input class="btn btn-dark btn-lg ml-4" type="submit" value="いいえ">
          </form>
          <div class="col-2"></div>
          <form action="mbpdc" method="post">
            <input type="hidden" name="data" value="<?php echo $recruitment_id; ?>">
            <input class="btn btn-dark btn-lg ml-4" type="submit" value="はい">
          </form>
      </div>    	
    </div>
  </div>

<!DOCTYPE html>
<html lang="ja">

<head>
<?=$this->Html->charset(); ?>
<title>
	<?=$this->fetch('title') ?>
</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<?php
echo $this->Html->css('model');
echo $this->fetch('meta');
echo $this->fetch('css');
?>

</head>

<body>
<header>
	<div class = "row">
		<div class=col-1></div>
		<h1 class = "display-4">CUTMO</h1>
			<div class ="col-5"></div>
				<form action="" method="post">
					<input class="btn btn-dark mt-4 mr-3" type="submit" value="マイページ">
				</form>
				<form action="" method="post">
					<input class="btn btn-dark mt-4" type="submit" value="ログアウト">
				</form>		
	</div>
<div class="menu">
	<div class="row ">
		<div class="col-1"></div>
		<form action="" method="get">
			<input class="btn btn-link text-dark mt-3 ml-5" type="submit" value="応募済み掲示板">
		</form>
		<form action="" method="get">
			<input class="btn btn-link text-dark mt-3 ml-5" type="submit" value="チャット">
		</form>	
</div>	
</div>	
</header>
<main>
	<div id = "content">
		<?=$this->fetch('content') ?>
	</div>

</main>  
<footer>
		<p class="text-center"><img src="../img/Untitled99.png"></p>
		<div class ="text-center text-muted font-weight-bold">
			© CUTMO Inc., All rights reserved.
		</div>
</footer>
</body>

</html>
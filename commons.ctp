<!DOCTYPE html>
<html lang="ja">

<head>
<?=$this->Html->charset(); ?>
<title>
	<?=$this->fetch('title') ?>
</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<?php
echo $this->Html->css('commons');
echo $this->fetch('meta');
echo $this->fetch('css');
?>

</head>

<body>
<header>
<div class = "container">
	<div class="row">
	<h1 class = "display-4">CUTMO</h1>
			<div class = "text-right col mt-4">
				<a href="http://localhost/cake3app/commons/login" class="btn btn-dark" role="button">ログイン/新規登録</a>
				<a href="http://localhost/cake3app/commons/Inquiry" class="btn btn-dark" role="button">お問い合わせ</a>
		<div>	
	</div>			
</div>
</header>
<main>
	<div id="content">
		<?=$this->fetch('content') ?>
	</div>
</main>  
<footer>
	<div>
		<p class="text-center"><img src="webroot/img/Untitled99.png"></p>
		<div class ="text-center text-muted font-weight-bold">
			© CUTMO Inc., All rights reserved.
		</div>
	</div>
</footer>
</body>

</html>

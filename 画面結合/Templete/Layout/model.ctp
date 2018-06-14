<!DOCTYPE html>
<html lang="ja">

<head>
<?=$this->Html->charset(); ?>
<title>
	<?=$this->fetch('title') ?>
</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<meta charset="utf-8">
<?php
echo $this->Html->css('model');
echo $this->fetch('meta');
echo $this->fetch('css');
?>

</head>
<style>
    .menu{
        background-color: #c7c7c959;
    }  
</style>

<body>
<header>
	<div class = "row">
		<div class=col-1></div>
		<form action="index" method="get">
			<a href="http://localhost/cake3app/Hairdresser/index"><img src="../img/coollogo_com-13563663.png"border="0"></a>
		</form>
			<div class ="col-5"></div>
				<form action="mpd" method="get">
					<input class="btn btn-dark mt-4 mr-3" type="submit" value="マイページ">
				</form>
				<form action="http://localhost/cake3app/Commons/index" method="get">
					<input class="btn btn-dark mt-4" type="submit" value="ログアウト">
				</form>		
	</div>
<div class="menu">
	<div class="row ">
		<div class="col-1"></div>
		<form action="smb" method="get">
			<input class="btn btn-link text-dark mt-3 ml-5" type="submit" value="応募済み掲示板">
		</form>
		<form action="cr" method="get">
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
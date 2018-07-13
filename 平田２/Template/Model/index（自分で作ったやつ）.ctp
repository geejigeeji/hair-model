<form action="model" method="post">
<p>メニュー：
<?php foreach($youso as $key){ ?>
<input type="checkbox" name="menu_id[]" value='<?=$key['menu_id']?>'><?=$key['menu_name']?>
<?php } ?>
</p>



<p>エリア：</p>
<select name="prefecture">
<option value=-1>指定なし</option>
<?php
foreach($pref as $keyp){
?>
<option value='<?=$keyp['prefecture_id']?>'><?=$keyp['prefecture_name']?></option>
<?php
}
?>
</select>



<p>価格：
<?php
$nedan=array();
foreach($price as $obj1){
	array_push($nedan,$obj1['price_first']."〜".$obj1['price_last']);
}
?>
<select name="price">
<option value=-1>指定なし</option>
<?php for($i=0;$i<count($nedan);$i++){ ?>
<option value='<?=$i?>'><?=$nedan[$i]?></option>
<?php } ?>
</select></p>

時刻：
<select name="zikoku">
<option value=-1>指定なし</option>
<?php
foreach($time as $keyt){
?>
<option value='<?=$keyt['time_id']?>'><?=$keyt['time']?></option>
<?php
}
?>
</select>
<input type="submit" value="条件を変更する">
</form>

<?php foreach($result as $obj):?>
<p><?= $obj['user_name']?></p>
<p>地域：<?= $obj['prefecture_name']?><?= $obj['city_name']?></p>
<p>時刻：<?= $obj['recruitment_first_time']?>〜<?= $obj['recruitment_last_time']?></p>
<p>希望価格：<?= $obj['price_first']?>〜<?= $obj['price_last']?></p>
<p>メニュー：<?= $obj['menu_name']?></p>

<br>
<?php endforeach;?>
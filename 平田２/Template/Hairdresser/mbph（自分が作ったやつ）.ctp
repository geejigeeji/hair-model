
<?php foreach($result as $obj):?>
<p><?= $obj['recruitment_title']?></p>
<p><?= $obj['user_name']?></p>
<p>地域：<?= $obj['prefecture_name']?><?= $obj['city_name']?></p>
<p>時刻：<?= $obj['recruitment_first_time']?>〜<?= $obj['recruitment_last_time']?></p>
<p>希望価格：<?= $obj['price_first']?>〜<?= $obj['price_last']?></p>
<p>メニュー：<?= $obj['menu_name']?></p>
<form action="mbpd" name="form1" method="post">
<input type="hidden" name="data" value="<?php echo $obj['recruitment_id']; ?>">
<input type="submit" value="削除">
</form>
<form action="edit" name="form" method="post">
<input type="hidden" name="data" value="<?php echo $obj['recruitment_id']; ?>">
<input type="submit" value="編集">
</form>
<form action="henkou" name="form" method="post">
<input type="hidden" name="id" value="<?php echo $obj['recruitment_id']; ?>">
<input type="submit" value="変更">
</form>
<?php endforeach;?>
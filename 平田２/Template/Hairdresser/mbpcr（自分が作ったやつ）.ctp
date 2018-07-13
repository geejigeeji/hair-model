<?=$this->Form->create($result,['url'=>['action'=>'editpage']])?>
<?php foreach($result as $obj):?>
<?=$this->Form->hidden("id",array('value' => $obj['recruitment_id']))?>
<?php
$first_kakaku=array();
$nedan=array();
foreach($kakaku as $obj1){
	array_push($first_kakaku,$obj1['price_first']);
	array_push($nedan,$obj1['price_first']."〜".$obj1['price_last']);
}

$f_kakaku = array_search($obj['price_first'],$first_kakaku);
?>

価格：
<?=$this->Form->select('recruitment_price_id', $nedan, ['default' => $f_kakaku]);?>

メニュー：

<?php
	$stack=array();
	foreach($result2 as $obj2){
		array_push($stack,$obj2['menu_id']);
	}

	$hoge=array();
	foreach($youso as $obj3){
		array_push($hoge,$obj3['menu_id']);
	}
	
	$hoge2=array();
	foreach($youso as $obj4){
		array_push($hoge2,$obj4['menu_name']);
	}
	
	for($i=0;$i<count($hoge);$i++){

		if(isset($stack)){
			if(in_array($hoge[$i],$stack)){
				echo $this -> Form -> input ( "check[$i]", [ "type" => "checkbox",
                                         "label" => $hoge2[$i],
                                         "checked" => true,
                                         
                                         ] );
			}else{
				echo $this -> Form -> input ( "check[$i]", [ "type" => "checkbox",
                                         "label" => $hoge2[$i],
                                         ] );
			}
		}
		
	}

?>

日付：<?=$this->Form->text("recruitment_date",['value'=>$obj['recruitment_date']->format('Y/m/d')])?>




時間：
<select name="recruitment_first_time_id">
<?php

foreach($time as $keyt){

	if($keyt['time_id']==$obj['recruitment_first_time']){
?>
<option value='<?=$keyt['time_id']?>' selected><?=$keyt['time']?></option>
<?php
	}else{
?>
<option value='<?=$keyt['time_id']?>'><?=$keyt['time']?></option>
<?php
	}
?>

<?php
}
?>
</select>

〜

<select name="recruitment_last_time_id">
<?php

foreach($time as $keyt){

	if($keyt['time_id']==$obj['recruitment_last_time']){
?>
<option value='<?=$keyt['time_id']?>' selected><?=$keyt['time']?></option>
<?php
	}else{
?>
<option value='<?=$keyt['time_id']?>'><?=$keyt['time']?></option>
<?php
	}
?>

<?php
}
?>
</select>

募集人数：
<?=$this->Form->select('recruitment_people', $sizes, ['default' => $obj['recruitment_people']-1]);?>

タイトル：<?=$this->Form->text("recruitment_title",['value'=>$obj['recruitment_title']])?>

コメント：<?=$this->Form->text("recruitment_comment",['value'=>$obj['recruitment_comment']])?>

<?=$this->Form->button("変更")?>
<?=$this->Form->end()?>
<?php endforeach;?>
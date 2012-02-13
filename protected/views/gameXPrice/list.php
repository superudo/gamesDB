<?php
$this->breadcrumbs=array(
	'Games'=>array('game/index'),
	$game->name => array('game/view', 'id' => $game->id),
	'Awards',
);

$this->menu=array(
array('label' => 'Awards', 'items' => array(
	array('label'=>'Assign new award', 'url'=>array('create', 'gid' => $game->id)),
)),
);
?>

<h1>Awards for &quot;<?php echo $game->name; ?>&quot;</h1>

<table>
	<tr><th>ID</th><th>Award</th><th>Year</th></tr>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_list',
	'viewData'=>array(
		'game' => $game
	)
)); ?>
</table>
<?php
$this->breadcrumbs=array(
	'Games'=>array('game/index'),
	$game->name => array('game/view', 'id' => $game->id),
	'Features',
);

$this->menu=array(
array('label' => 'Features', 'items' => array(
	array('label'=>'Assign new feature', 'url'=>array('create', 'gid' => $game->id)),
)),
);
?>

<h1>Features for &quot;<?php echo $game->name; ?>&quot;</h1>

<table>
	<tr><th>ID</th><th>Feature</th><th>Year</th></tr>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_list',
	'viewData'=>array(
		'game' => $game
	)
)); ?>
</table>
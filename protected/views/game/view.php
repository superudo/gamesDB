<?php
$this->breadcrumbs=array(
	'Games'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label' => 'Games', 'itemOptions' => array('class' => 'operation_header'),
		'items' => array(
		array('label'=>'List games', 'url'=>array('index')),
		array('label'=>'Create new game', 'url'=>array('create')),
		array('label'=>'Update this game', 'url'=>array('update', 'id'=>$model->id)),
		array('label'=>'Delete this game', 'url'=>'#', 'linkOptions'=>array(
			'submit'=>array('delete','id'=>$model->id),
			'confirm'=>'Are you sure you want to delete this item?')
		),
		array('label'=>'Manage games', 'url'=>array('admin')),
	)),
	array('label' => 'Awards', 'items' => array(
		array('label' => 'List awards', 'url' => array('gameXPrice/list', 'gid' => $model->id)),
		array('label' => 'Assign award', 'url' => array('gameXPrice/create', 'gid' => $model->id)),
	)),
);
?>

<h1>View Game #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'min_players',
		'max_players',
		'min_age',
		'duration',
		'boxwidth',
		'boxlength',
		'boxheight',
		array(
			'name' => 'publisher_id',
			'value' => ($model->publisher)? $model->publisher->name: "",
			'visible' => ($model->publisher !== null),
		),
		array(
		 'name' => 'base_game_id',
		 'value' => ($model->baseGame)?$model->baseGame->name: "",
		 'visible' => ($model->baseGame !== null),
		),
	),
)); ?>

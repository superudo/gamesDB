<?php
$this->breadcrumbs=array(
	'Games'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Game', 'url'=>array('index')),
	array('label'=>'Create Game', 'url'=>array('create')),
	array('label'=>'Update Game', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Game', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Game', 'url'=>array('admin')),
	array('label' => 'Assign game price', 'url' => array('gameXPrice/create', 'gid' => $model->id)),
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

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
		array('label' => 'List awards', 'url' => array('gameXAward/list', 'gid' => $model->id)),
		array('label' => 'Assign award', 'url' => array('gameXAward/create', 'gid' => $model->id)),
	)),
	array('label' => 'Features', 'items' => array(
		array('label' => 'List features', 'url' => array('gameXFeature/list', 'gid' => $model->id)),
		array('label' => 'Assign feature', 'url' => array('gameXFeature/create', 'gid' => $model->id)),
	)),
	);
?>

<h1>View Game #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name',
		array(
			'label' => 'Luding URL',
			'type' => 'raw',
			'value' => CHtml::link($model->ludingUrl, $model->ludingUrl, array('target' => 'luding')),
		),
		array(
			'label' => 'Players',
			'type' => 'raw',
			'value' => $model->min_players . " - " . $model->max_players, 
		),
		'min_age',
		array(
			'name' => 'duration',
			'type' => 'raw',
			'value' => $model->gameDuration,
		), 
		array(
			'label' => 'Boxsize',
			'type' => 'raw',
			'value' => $model->boxSize,
		),
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

<?php
$this->breadcrumbs=array(
	'Games'=>array('game/index'),
	Game::model()->findByPk($model->game_id)->name => array('game/view', 'id' => $model->game_id),
	'Features'=>array('list', 'gid' => $model->game_id),
	$model->id,
);

$this->menu=array(
	array('label'=>'Create another feature', 'url'=>array('create', 'gid' => $model->game_id)),
	array('label'=>'Update feature', 'url'=>array('update', 'id'=>$model->id, 'gid' => $model->game_id)),
	array(
		'label'=>'Delete feature', 
		'url'=>'#', 
		'linkOptions'=>array(
			'submit'=>array(
				'delete',
				'id'=>$model->id,
				'gid'=>$model->game_id
			),
			'confirm'=>'Are you sure you want to delete this item?'
		)
	),
);
?>

<h1>View feature #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'feature_id',
		'game_id',
		'value',
	),
)); ?>

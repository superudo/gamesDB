<?php
$this->breadcrumbs=array(
	'Games'=>array('game/index'),
	Game::model()->findByPk($model->game_id)->name => array('game/view', 'id' => $model->game_id),
	'Awards'=>array('list', 'gid' => $model->game_id),
	$model->id,
);

$this->menu=array(
	array('label'=>'Create another award', 'url'=>array('create', 'gid' => $model->game_id)),
	array('label'=>'Update award', 'url'=>array('update', 'id'=>$model->id, 'gid' => $model->game_id)),
	array(
		'label'=>'Delete award', 
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

<h1>View award #<?php echo $model->id; ?></h1>

<b><?php echo CHtml::encode($model->getAttributeLabel('id')) ?>:</b> <?php echo $model->id ?><br />
<b>Award:</b> <pre><?php print_r( $model ) ?></pre><br />



<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'price_id',
		'game_id',
		'year',
	),
)); ?>

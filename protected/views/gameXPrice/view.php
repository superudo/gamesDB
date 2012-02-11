<?php
$this->breadcrumbs=array(
	'Game Xprices'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List GameXPrice', 'url'=>array('index')),
	array('label'=>'Create GameXPrice', 'url'=>array('create')),
	array('label'=>'Update GameXPrice', 'url'=>array('update', 'id'=>$model->id)),
	array(
		'label'=>'Delete GameXPrice', 
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
	array('label'=>'Manage GameXPrice', 'url'=>array('admin')),
);
?>

<h1>View GameXPrice #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'price_id',
		'game_id',
		'year',
	),
)); ?>

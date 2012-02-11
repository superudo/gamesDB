<?php
$this->breadcrumbs=array(
	'Game Prices'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List GamePrice', 'url'=>array('index')),
	array('label'=>'Create GamePrice', 'url'=>array('create')),
	array('label'=>'Update GamePrice', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete GamePrice', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GamePrice', 'url'=>array('admin')),
);
?>

<h1>View GamePrice #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'url',
	),
)); ?>

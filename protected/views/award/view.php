<?php
$this->breadcrumbs=array(
	'Awards'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List awards', 'url'=>array('index')),
	array('label'=>'Create award', 'url'=>array('create')),
	array('label'=>'Update award', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete award', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage awards', 'url'=>array('admin')),
);
?>

<h1>View award #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'url',
	),
)); ?>

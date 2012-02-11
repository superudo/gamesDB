<?php
$this->breadcrumbs=array(
	'Game Prices'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List GamePrice', 'url'=>array('index')),
	array('label'=>'Create GamePrice', 'url'=>array('create')),
	array('label'=>'View GamePrice', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage GamePrice', 'url'=>array('admin')),
);
?>

<h1>Update GamePrice <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
<?php 
/* @var $this GameController */
/* @var $model Game */
?>

<?php
$this->breadcrumbs=array(
	'Games'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Games', 'url'=>array('index')),
	array('label'=>'Create Game', 'url'=>array('create')),
	array('label'=>'View Game', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Game', 'url'=>array('admin')),
	array('label'=>'Manage Authors', 'url'=>array('author/admin')),
	array('label'=>'Manage Artists', 'url'=>array('artist/admin')),
	array('label'=>'Manage Publishers', 'url'=>array('publisher/admin')),
);
?>

<h1>Update Game <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
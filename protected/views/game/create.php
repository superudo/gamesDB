<?php 
/* @var $this GameController */
/* @var $model Game */
?>

<?php
$this->breadcrumbs=array(
	'Games'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Games', 'url'=>array('index')),
	array('label'=>'Manage Game', 'url'=>array('admin')),
	array('label'=>'Manage Authors', 'url'=>array('author/admin')),
	array('label'=>'Manage Artists', 'url'=>array('artist/admin')),
	array('label'=>'Manage Publishers', 'url'=>array('publisher/admin')),
);
?>

<h1>Create Game</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
<?php 
/* @var $this GameController */
/* @var $model Game */
?>

<?php
$this->breadcrumbs=array(
	'Games',
);

$this->menu=array(
	array('label'=>'Create Game', 'url'=>array('create')),
	array('label'=>'Manage Games', 'url'=>array('admin')),
);
?>

<h1>Games</h1>

<?php $this->widget('FlashMessage'); ?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

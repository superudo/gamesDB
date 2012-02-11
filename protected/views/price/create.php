<?php
$this->breadcrumbs=array(
	'Game Prices'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GamePrice', 'url'=>array('index')),
	array('label'=>'Manage GamePrice', 'url'=>array('admin')),
);
?>

<h1>Create GamePrice</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
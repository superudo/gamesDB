<?php
$this->breadcrumbs=array(
	'Awards'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List awards', 'url'=>array('index')),
	array('label'=>'Manage awards', 'url'=>array('admin')),
);
?>

<h1>Create award</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
$this->breadcrumbs=array(
	'Features'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List features', 'url'=>array('index')),
	array('label'=>'Create feature', 'url'=>array('create')),
	array('label'=>'View feature', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage feature', 'url'=>array('admin')),
);
?>

<h1>Update feature <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'game' => $game)); ?>
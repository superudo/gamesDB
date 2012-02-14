<?php
$this->breadcrumbs=array(
	'Awards'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List awards', 'url'=>array('index')),
	array('label'=>'Create award', 'url'=>array('create')),
	array('label'=>'View award', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage awards', 'url'=>array('admin')),
);
?>

<h1>Update award <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
$this->breadcrumbs=array(
	'Game Xprices'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List GameXPrice', 'url'=>array('index')),
	array('label'=>'Create GameXPrice', 'url'=>array('create')),
	array('label'=>'View GameXPrice', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage GameXPrice', 'url'=>array('admin')),
);
?>

<h1>Update GameXPrice <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
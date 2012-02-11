<?php
$this->breadcrumbs=array(
	'Game Xprices'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GameXPrice', 'url'=>array('index')),
	array('label'=>'Manage GameXPrice', 'url'=>array('admin')),
);
?>

<h1>Create GameXPrice</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'game' => $game)); ?>
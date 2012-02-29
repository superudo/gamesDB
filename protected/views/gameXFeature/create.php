<?php
$this->breadcrumbs=array(
	'Games'=>array('game/index'),
	$game->name => array('game/view', 'id' => $game->id),
	'Create',
);

$this->menu=array(
	array('label'=>'List features', 'url'=>array('index')),
	array('label'=>'Manage features', 'url'=>array('admin')),
);
?>

<h1>Assign new feature value</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'game' => $game)); ?>
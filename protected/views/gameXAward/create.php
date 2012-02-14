<?php
$this->breadcrumbs=array(
	'Games'=>array('game/index'),
	$game->name => array('game/view', 'id' => $game->id),
	'Create',
);

$this->menu=array(
	array('label'=>'List awards', 'url'=>array('index')),
	array('label'=>'Manage awards', 'url'=>array('admin')),
);
?>

<h1>Assign new award</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'game' => $game)); ?>
<?php
$this->breadcrumbs=array(
	'Game Prices',
);

$this->menu=array(
	array('label'=>'Create GamePrice', 'url'=>array('create')),
	array('label'=>'Manage GamePrice', 'url'=>array('admin')),
);
?>

<h1>Game Prices</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

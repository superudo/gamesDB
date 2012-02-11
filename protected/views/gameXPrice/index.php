<?php
$this->breadcrumbs=array(
	'Game Xprices',
);

$this->menu=array(
	array('label'=>'Create GameXPrice', 'url'=>array('create')),
	array('label'=>'Manage GameXPrice', 'url'=>array('admin')),
);
?>

<h1>Game Xprices</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

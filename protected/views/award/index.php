<?php
$this->breadcrumbs=array(
	'Awards',
);

$this->menu=array(
	array('label'=>'Create award', 'url'=>array('create')),
	array('label'=>'Manage award', 'url'=>array('admin')),
);
?>

<h1>Awards</h1>

<?php $this->widget('FlashMessage'); ?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

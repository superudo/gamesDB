<?php
$this->breadcrumbs=array(
	'Features',
);

$this->menu=array(
	array('label'=>'Create feature', 'url'=>array('create')),
	array('label'=>'Manage features', 'url'=>array('admin')),
);
?>

<h1>Features</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

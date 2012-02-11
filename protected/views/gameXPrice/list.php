<?php
$this->breadcrumbs=array(
	'Game Xprices',
);

$this->menu=array(
	array('label'=>'Create GameXPrice', 'url'=>array('create', 'gid' => $game->id)),
	array('label'=>'Manage GameXPrice', 'url'=>array('admin', 'gid' => $game->id)),
);
?>

<h1>Game prices for &quot;<?php echo $game->name; ?>&quot;</h1>

<table>
	<tr><th>ID</th><th>Price</th><th>Year</th></tr>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_list',
	'viewData'=>array(
		'gid' => $game->id
	)
)); ?>
</table>
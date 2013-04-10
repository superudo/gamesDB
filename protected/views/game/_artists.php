<?php
/**
 * @var $this GameController
 * @var $model Game
 */
?>

<?php echo CHtml::activeListBox($model, 'artistIds', 
	CHtml::listData(Artist::model()->findAll(array('order' => 'name')), 'id', 'name'),
	array(
		'multiple' => true,
		'checkAll' => 'Check all',
		'style' => 'width:200px',
	));
?>
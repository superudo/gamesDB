<?php
/**
 * @var $this GameController
 * @var $model Game
 */
?>

<?php echo CHtml::activeListBox($model, 'authorIds', 
	CHtml::listData(Author::model()->findAll(array('order' => 'name')), 'id', 'name'),
	array(
		'multiple' => true,
		'checkAll' => 'Check all',
		'style' => 'width:200px',
	));
?>
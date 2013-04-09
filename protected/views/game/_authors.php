<?php
/**
 * @var $this GameController
 * @var $model Game
 */
?>

<?php echo CHtml::activeListBox($model, 'authorIds', 
	CHtml::listData(Author::model()->findAll(), 'id', 'name'),
	array(
		'multiple' => true,
		'checkAll' => 'Check all',
	));
?>
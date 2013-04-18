<?php 
/* @var $this GameController */
/* @var $model Game */
?>

<h1>Testseite</h1>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'game-form',
	'enableAjaxValidation'=>false,
)); ?>

<div class="row">
	<?php
		echo $form->textField($model, 'min_players');
		echo $form->textField($model, 'max_players');
	?>
</div>

<div class="row">
	<?php
		echo CHtml::button('Show', array(
			'onclick' => 'jQuery("#overlay1").overlay();'
		));
	?>
</div>

<div class="simple_overlay" id="overlay1">
	<p>This is a simple overlay.</p>
</div>

<div class="row buttons">
	<?php echo CHtml::submitButton('Save'); ?>
</div>

<?php $this->endWidget(); ?>

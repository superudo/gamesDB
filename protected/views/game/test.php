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
		<?php echo $form->labelEx($model, 'players'); ?>
		<?php $this->widget('application.extensions.selectToUISlider.ESelectToUISlider',
			array(
				'model' => $model,
				'properties' => array('min_players', 'max_players'),
				'values' => $model->getPlayerCountValues(),
				'htmlOptions' => array(
					'hidden' => true
				),
			)
		); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'min_age'); ?>
		<?php $this->widget('application.extensions.selectToUISlider.ESelectToUISlider',
			array(
				'model' => $model,
				'properties' => array('min_age'),
				'values' => $model->getAgeStepValues(),
				'htmlOptions' => array('hidden' => true),
			)
		); ?>
	</div>

<div class="row buttons">
	<?php echo CHtml::submitButton('Save'); ?>
</div>

<?php $this->endWidget(); ?>

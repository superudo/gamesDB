<?php 
/* @var $this GameController */
/* @var $model Game */
?>

<h1>Testseite</h1>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'game-form',
	'enableAjaxValidation'=>false,
)); ?>
<!--
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
-->
<div class="row">
	<?php
		echo $form->textField($model, 'min_players');
		echo $form->textField($model, 'max_players');
		$this->widget('zii.widgets.jui.CJuiSliderInput', array(
			'model' => $model,
			'attribute' => 'min_players',
			'maxAttribute' => 'max_players',
			'event' => 'change',
			// additional javascript options for the slider plugin
			'options' => array(
				'range' => true,
				'min' => 1,
				'max' => 10,
				'step' => 1,
				'slide' => 'js:function(ev,ui) {
					$("#Game_min_players").val(ui.values[0]);
					$("#Game_max_players").val(ui.values[1]);
				}',
			),
		));
	?>
</div>

<div class="row buttons">
	<?php echo CHtml::submitButton('Save'); ?>
</div>

<?php $this->endWidget(); ?>

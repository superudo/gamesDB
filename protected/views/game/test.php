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
				'values' => array(
					1 => 1,
					2 => 2,
					3 => 3,
					4 => 4,
					5 => 5,
					6 => 6,
					7 => 7,
					8 => 8,
					9 => 9,
					10 => 10
					),
				'htmlOptions' => array('hidden' => true),
			)
		); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'min_age'); ?>
		<?php $this->widget('application.extensions.selectToUISlider.ESelectToUISlider',
			array(
				'model' => $model,
				'properties' => array('min_age'),
				'values' => array(
					3 => 3,
					6 => 6,
					8 => 8,
					12 => 12
				),
				'htmlOptions' => array('hidden' => true),
			)
		); ?>
	</div>

<div class="row">
	<input type="text" id="TextBoxId">
	<?php echo $form->labelEx($model, 'min_age'); ?>
	<?php $this->widget('zii.widgets.jui.CJuiSlider', array(
	    'value' => 50,
	    'options' => array(
	        'min' => 0,
	        'max' => 100,
			'step' => 5,
	        'slide' => 'js:function(event, ui) { $("#TextBoxId").val(ui.value);}'
	    ),
	    'htmlOptions' => array(
	        'style'=>'height:12px;'
	    ),
	));
	?>
</div>

<div class="row"><hr></div>
<div class="row buttons">
	<?php echo CHtml::submitButton('Save'); ?>
</div>

<?php $this->endWidget(); ?>

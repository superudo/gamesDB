<h1>Testseite</h1>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'game-form',
	'enableAjaxValidation'=>false,
)); ?>

	<div class="row">
		<?php $this->widget('application.extensions.selectToUISlider.ESelectToUISlider',
			array(
				'label' => 'Number of Players',
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
				'htmlOptions' => array(),
			)
		); ?>
	</div>

<div class="row"><hr></div>
<div class="row buttons">
	<?php echo CHtml::submitButton('Save'); ?>
</div>

<?php $this->endWidget(); ?>

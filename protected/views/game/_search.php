<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'min_players'); ?>
		<?php echo $form->textField($model,'min_players'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'max_players'); ?>
		<?php echo $form->textField($model,'max_players'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'min_age'); ?>
		<?php echo $form->textField($model,'min_age'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'duration'); ?>
		<?php echo $form->textField($model,'duration'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'boxwidth'); ?>
		<?php echo $form->textField($model,'boxwidth',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'boxlength'); ?>
		<?php echo $form->textField($model,'boxlength',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'boxheight'); ?>
		<?php echo $form->textField($model,'boxheight',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'publisher_id'); ?>
		<?php echo $form->textField($model,'publisher_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'base_game_id'); ?>
		<?php echo $form->textField($model,'base_game_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'game-xaward-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo CHtml::hiddenField('GameXAward[game_id]', $game->id) ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'award_id'); ?>
		<?php echo $form->dropDownList($model, 'award_id', 
			CHtml::listData(Award::model()->findAll(), 'id', 'name')); 
		?>
		<?php echo $form->error($model,'award_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'year'); ?>
		<?php echo $form->textField($model,'year'); ?>
		<?php echo $form->error($model,'year'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
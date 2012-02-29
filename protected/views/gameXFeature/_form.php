<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'game-xfeature-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo CHtml::hiddenField('GameXFeature[game_id]', $game->id) ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'feature_id'); ?>
		<?php echo $form->dropDownList($model, 'feature_id', 
			CHtml::listData(Feature::model()->findAll(), 'id', 'name')); 
		?>
		<?php echo $form->error($model,'feature_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'value'); ?>
		<?php echo $form->textField($model,'value'); ?>
		<?php echo $form->error($model,'value'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
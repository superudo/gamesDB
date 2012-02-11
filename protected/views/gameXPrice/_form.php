<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'game-xprice-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo CHtml::hiddenField('GameXPrice[game_id]', $game->id) ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'price_id'); ?>
		<?php echo $form->dropDownList($model, 'price_id', GamePrice::model()->getAsList()); ?>
		<?php echo $form->error($model,'price_id'); ?>
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
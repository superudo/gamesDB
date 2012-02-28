<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'game-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'min_players'); ?>
		<?php echo $form->textField($model,'min_players'); ?>
		<?php echo $form->error($model,'min_players'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'max_players'); ?>
		<?php echo $form->textField($model,'max_players'); ?>
		<?php echo $form->error($model,'max_players'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'min_age'); ?>
		<?php echo $form->textField($model,'min_age'); ?>
		<?php echo $form->error($model,'min_age'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'duration'); ?>
		<?php echo $form->textField($model,'duration'); ?>
		<?php echo $form->error($model,'duration'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'boxwidth'); ?>
		<?php echo $form->textField($model,'boxwidth',array('size'=>4,'maxlength'=>4)); ?> x <?php echo $form->textField($model,'boxlength',array('size'=>4,'maxlength'=>4)); ?> x <?php echo $form->textField($model,'boxheight',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'boxwidth'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'categories'); ?>
	    <?php echo $form->listBox($model, 'categoryIds', 
	    	CHtml::listData(Category::model()->findAll(), 'id', 'name'), 
	    	array(
	    		'multiple' => true,
	    		'checkAll' => 'Check All'
			)); 
	    ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'publisher_id'); ?>
		<?php echo $form->dropDownList($model, 'publisher_id', Publisher::model()->getPublisherOptions(), array('empty' => '-- Select publisher --')); ?>
		<?php echo $form->error($model,'publisher_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'base_game_id'); ?>
		<?php echo $form->dropDownList($model, 'base_game_id', $model->getPotentialBaseGameOptions(), array('empty' => '-- Select base game --')); ?>
		<?php echo $form->error($model,'base_game_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
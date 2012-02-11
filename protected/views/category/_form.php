<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'category-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
<!--
	<div class="row">
		<?php echo $form->labelEx($model, 'parent_category_id'); ?>
		<?php echo CHtml::activeDropDownList($model, 'parent_category_id', 
			CHtml::listData(
				($model->id == null) 
				? Category::model()->findAll()
				: Category::model()->findAll('id <> :this_id', array( ':this_id' => $model->id )), 
				'id', 'name'), 
			array('empty' => 'Select parent category')); ?> 
		<?php echo $form->error($model,'parent_category_id'); ?>
	</div>
-->
	<div class="row">
		<?php echo $form->labelEx($model, 'parent_category_id'); ?>
		<select name='Category[parent_category_id]'>
            <option value='0'>No Parent</option>
            <?php echo Category::model()->get_category_hr(NULL, $model->parent_category_id, $model->id, ''); ?>
        </select>
		<?php echo $form->error($model,'parent_category_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
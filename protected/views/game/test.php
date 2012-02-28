<h1>Testseite</h1>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'game-form',
	'enableAjaxValidation'=>false,
)); ?>


<div>
    <b><?php echo $form->labelEx($model, 'categories'); ?></b>
    <?php echo $form->listBox($model, 'categoryIds', 
    	CHtml::listData(Category::model()->findAll(), 'id', 'name'), 
    	array(
    		'multiple' => true,
    		'checkAll' => 'Check All'
		)); 
    ?>
</div>

<div class="row buttons">
	<?php echo CHtml::submitButton('Save'); ?>
</div>

<?php $this->endWidget(); ?>

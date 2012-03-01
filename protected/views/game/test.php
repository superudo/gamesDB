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


<div>
	<? echo CHtml::textField('x1'); ?><br />
	<? echo CHtml::textField('x2'); ?><br />

	<?
	$this->widget('application.extensions.jui.ESlider',
	              array(                    
	                    'name' => 'slider',
	                    'theme' => 'ui-lightness',
	                    'enabled' => true,
	                    'minValue' => 1.0,
	                    'maxValue' => 8.0,
	                    'value' => array(1.0, 8.0),
	                    'linkedElements' => array('x1','x2'),
	                    'numberOfHandlers' => 2,
	                    'range' => true,
	                    'htmlOptions' => array('style'=>'width:200px;height:10px;')
	                   )
	             );
	?>
</div>




<div class="row buttons">
	<?php echo CHtml::submitButton('Save'); ?>
</div>

<?php $this->endWidget(); ?>

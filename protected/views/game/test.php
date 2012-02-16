<h1>Testseite</h1>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'game-form',
	'enableAjaxValidation'=>false,
)); ?>

<div class="row oneLineLabel">
    <b><?php echo $form->labelEx($model, 'categories'); ?></b>
    <?php echo $form->checkBoxList($model, 'categoryIds',
        CHtml::listData(Category::model()->findAll(), 'id', 'name'),
        array('checkAll' => 'Check All')); ?>
    <?php echo $form->error($model, 'categories'); ?>
</div>

<?php $this->endWidget(); ?>

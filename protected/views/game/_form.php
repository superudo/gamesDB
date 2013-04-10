<?php
/**
 * @var $this GameController
 * @var $model Game
 */
?>

<div class="form">

	<?php
	$form = $this->beginWidget('CActiveForm', array(
		'id' => 'game-form',
		'focus' => array($model, 'name'),
		'enableAjaxValidation' => false,
		'enableClientValidation' => true,
	));
	?>

	<?php echo CHtml::hiddenField('id', $model->id); ?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model, 'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 100)); ?>
		<?php echo $form->error($model, 'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'luding_id'); ?>
		<?php echo $form->textField($model, 'luding_id'); ?>
		<?php echo $form->error($model, 'luding_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'players'); ?>
		<?php echo $form->textField($model, 'min_players', array('size' => 1, 'maxlength' => 10, 'disabled' => FALSE)); ?>
		-
		<?php echo $form->textField($model, 'max_players', array('size' => 1, 'maxlength' => 10, 'disabled' => FALSE)); ?>
		<?php echo $form->error($model, 'min_players'); ?>

	</div>

	<div class="row">
		<?php
		$this->widget('application.extensions.jui.ESlider', array(
			'name' => 'slider',
			'theme' => 'ui-lightness',
			'enabled' => true,
			'minValue' => 1.0,
			'maxValue' => 10.0,
			'value' => array($model->min_players, $model->max_players),
			'linkedElements' => array('Game_min_players', 'Game_max_players'),
			'numberOfHandlers' => 2,
			'range' => true,
			'htmlOptions' => array('style' => 'width:300px;height:10px;')
				)
		);
		?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'min_age'); ?>
		<?php echo $form->textField($model, 'min_age'); ?>
		<?php echo $form->error($model, 'min_age'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'duration'); ?>
		<?php echo $form->textField($model, 'duration'); ?>
		<?php echo $form->error($model, 'duration'); ?>
	</div>

	<div class="row">
		<?php
		$this->widget('application.extensions.jui.ESlider', array(
			'name' => 'slider2',
			'theme' => 'ui-lightness',
			'enabled' => true,
			'minValue' => 5.0,
			'maxValue' => 120.0,
			'step' => 5.0,
			'value' => array($model->duration),
			'linkedElements' => array('Game_duration'),
			'range' => false,
			'htmlOptions' => array(
				'style' => 'width:300px;height:10px;',
			),
				)
		);
		?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'boxsize'); ?>
		<?php
		echo $form->textField($model, 'boxwidth', array(
			'size' => 4,
			'maxlength' => 4)
		)
		. ' x ' .
		$form->textField($model, 'boxlength', array(
			'size' => 4,
			'maxlength' => 4
				)
		)
		. ' x ' .
		$form->textField($model, 'boxheight', array(
			'size' => 4,
			'maxlength' => 4
				)
		);
		?>
		<?php echo $form->error($model, 'boxwidth'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'categories'); ?>
		<?php
		echo $form->listBox($model, 'categoryIds', CHtml::listData(Category::model()->findAll(), 'id', 'name'), array(
			'multiple' => true,
			'checkAll' => 'Check All',
			'style' => 'width:200px',
		));
		?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'publisher_id'); ?>
		<?php
		echo $form->dropDownList($model, 'publisher_id', Publisher::model()->getPublisherOptions(), array(
			'empty' => '-- Select publisher --',
			'style' => 'width:200px',
				)
		);
		?>
		<?php echo $form->error($model, 'publisher_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'artists'); ?>
		<?php $this->renderPartial('_artists', array('model' => $model)); ?>
	</div>

	<div class="row">
		<?php echo CHtml::textField('new_artist', '', 
				array(
					'style' => 'width:200px',
					'placeholder' => 'New artist',
				)
			); ?> 
		<?php
		echo CHtml::ajaxSubmitButton(
				' + ', array('game/reqUpdateArtist'), 
				array(
					'data' => 'js:jQuery(this).parents("form").serialize()+"&isAjaxRequest=1"',
					'success' => 'function (data) {
								$("#Game_artistIds").html(data);
								$("#new_artist").val("");
							}',
				), 
				array(
					'id' => 'new_artist_ajax',
					'name' => 'new_artist_ajax'
				)
		);
		?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'authors'); ?>
		<?php $this->renderPartial('_authors', array('model' => $model)); ?>
	</div>

	<div class="row">
		<?php echo CHtml::textField('new_author', '', 
				array(
					'style' => 'width:200px',
					'placeholder' => 'New author'
				)); ?>
		<?php
		echo CHtml::ajaxSubmitButton(
				' + ', array('game/reqUpdateAuthor'), array(
			'data' => 'js:jQuery(this).parents("form").serialize()+"&isAjaxRequest=1"',
			'success' => 'function (data) {
						$("#Game_authorIds").html(data);
						$("#new_author").val("");
					}',
				), array(
			'id' => 'new_author_ajax',
			'name' => 'new_author_ajax'
				)
		);
		?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'base_game_id'); ?>
		<?php echo $form->dropDownList($model, 'base_game_id', $model->getPotentialBaseGameOptions(), array('empty' => '-- Select base game --')); ?>
		<?php echo $form->error($model, 'base_game_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->
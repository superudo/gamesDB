<?php
/**
 * @var $this GameController
 * @var $model Game
 */
?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/custom/gamesDB.js'); ?>

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
		<?php 
			echo $form->labelEx($model, 'name');
			echo $form->textField($model, 'name', array('maxlength' => 100));
			echo CHtml::button("luding lookup", array( 
				'title' => 'luding_lookup', 
				'onclick' => "return openDialog($('#Game_name').val());",
			));
			echo $form->error($model, 'name'); 
		?>
	</div>

	<div class="row">
		<?php 
			echo $form->labelEx($model, 'luding_id');
			echo $form->textField($model, 'luding_id');
			echo $form->error($model, 'luding_id'); 
		?>
	</div>

	<div class="row">
		<?php 
			echo $form->labelEx($model, 'players');
			echo $form->textField($model, 'min_players', array('size' => 1, 'maxlength' => 10, 'disabled' => FALSE));
			echo " - ";
			echo $form->textField($model, 'max_players', array('size' => 1, 'maxlength' => 10, 'disabled' => FALSE));
			echo $form->error($model, 'min_players'); 
		?>

	</div>

	<div class="row">
		<?php 
			echo $form->labelEx($model, 'min_age');
			echo $form->textField($model, 'min_age');
			echo $form->error($model, 'min_age'); 
		?>
	</div>

	<div class="row">
		<?php 
			echo $form->labelEx($model, 'duration');
			echo $form->textField($model, 'duration');
			echo $form->error($model, 'duration'); 
		?>
	</div>

	<div class="row">
		<?php 
			echo $form->labelEx($model, 'boxsize');
			$minifield = array('size' => 4, 'maxlength' => 4);
			echo $form->textField($model, 'boxwidth', $minifield) . ' x ' . $form->textField($model, 'boxlength', $minifield) . ' x ' . $form->textField($model, 'boxheight', $minifield);
			echo $form->error($model, 'boxwidth'); 
		?>
	</div>

	<div class="row">
		<?php 
			echo $form->labelEx($model, 'categories');
			echo $form->listBox($model, 'categoryIds', 
				CHtml::listData(Category::model()->findAll(), 'id', 'name'), array(
					'multiple' => true,
					'checkAll' => 'Check All',
					'style' => 'width:200px',
				)
			);
		?>
	</div>

	<div class="row">
		<?php 
			echo $form->label($model, "Publisher");
			echo $form->hiddenField($model, 'publisher_id', array());
			$this->widget('zii.widgets.jui.CJuiAutoComplete',
				array(
					'model' => $model,
					'attribute' => 'publishers_name',
					'source' => $this->createUrl('publisher/autocomplete'),
					'htmlOptions' => array('placeholder' => 'Any'),
					'options' => array(
						'showAnim' => 'fold',
						'select' => "js:function(publisher, ui) {
							$('#Game_publisher_id').val(ui.item.id);
							$('#Game_publishers_name').val(ui.item.name);
						}"
						),
					'cssFile' => false,
				)
			); 
			echo $form->error($model, 'publisher_id'); 
		?>
	</div>
	
	<div class="row">
		<div class="span-8">
			<?php 
				echo $form->labelEx($model, 'artists');
				$this->renderPartial('_artists', array('model' => $model));
				echo CHtml::textField('new_artist', '', 
					array(
						'style' => 'width:200px',
						'placeholder' => 'New artist',
					)
				);
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
		
		<div class="span-8 last">
			<?php 
				echo $form->labelEx($model, 'authors');
				$this->renderPartial('_authors', array('model' => $model));
				echo CHtml::textField('new_author', '', 
					array(
						'style' => 'width:200px',
						'placeholder' => 'New author'
					)
				);
			
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
		<hr />
	</div>

	<div class="row">
		<?php 
			echo $form->labelEx($model, 'base_game_id');
			echo $form->dropDownList($model, 'base_game_id', $model->getPotentialBaseGameOptions(), array('empty' => '-- Select base game --'));
			echo $form->error($model, 'base_game_id'); 
		?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

	<?php $this->endWidget(); ?>
</div><!-- form -->
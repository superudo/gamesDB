<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('min_players')); ?>:</b>
	<?php echo CHtml::encode($data->min_players); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('max_players')); ?>:</b>
	<?php echo CHtml::encode($data->max_players); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('min_age')); ?>:</b>
	<?php echo CHtml::encode($data->min_age); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('duration')); ?>:</b>
	<?php echo CHtml::encode($data->duration); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('boxwidth')); ?>:</b>
	<?php echo CHtml::encode($data->boxwidth); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('boxlength')); ?>:</b>
	<?php echo CHtml::encode($data->boxlength); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('boxheight')); ?>:</b>
	<?php echo CHtml::encode($data->boxheight); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('publisher_id')); ?>:</b>
	<?php echo CHtml::encode($data->publisher_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('base_game_id')); ?>:</b>
	<?php echo CHtml::encode($data->base_game_id); ?>
	<br />

	*/ ?>

</div>
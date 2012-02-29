<tr>
	<td><?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?></td>
	<td><?php echo CHtml::encode(Feature::model()->findByPk($data->feature_id)->name); ?></td>
	<td><?php echo CHtml::encode($data->value); ?></td>
</tr>
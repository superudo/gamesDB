<tr>
	<td><?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?></td>
	<td><?php echo CHtml::encode(Award::model()->findByPk($data->award_id)->name); ?></td>
	<td><?php echo CHtml::encode($data->year); ?></td>
</tr>
<tr>
	<td><?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?></td>
	<td><?php echo CHtml::encode(GamePrice::model()->findByPk($data->price_id)->name); ?></td>
	<td><?php echo CHtml::encode($data->year); ?></td>
</tr>
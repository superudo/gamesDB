<div class="view">

    <b>	
        <?php if ($data->luding_id != null): ?>
            <?php echo CHtml::link("&loz;", $data->getLudingUrl(), array("target" => "luding")); ?>
        <?php endif; ?>
        <?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id' => $data->id)); ?></b><br />

    <b>Players:</b>
    <?php echo CHtml::encode($data->min_players . " - " . $data->max_players); ?>
    / 
    <b><?php echo CHtml::encode($data->getAttributeLabel('min_age')); ?>:</b>
    <?php echo CHtml::encode($data->min_age); ?>

    <?php if ($data->duration !== null): ?>
        / 
        <b><?php echo CHtml::encode($data->getAttributeLabel('duration')); ?>:</b>
        <?php echo CHtml::encode($data->duration); ?> min
    <?php endif; ?>

    <?php if ($data->boxwidth > 0): ?>
        /
        <b>Box:</b>
        <?php echo CHtml::encode($data->boxwidth . ' * ' . $data->boxlength . ' * ' . $data->boxheight); ?>
    <?php endif; ?>

	<?php if (count($data->authors) > 0): ?>
		<br />
		<b><?php echo CHtml::encode($data->getAttributeLabel('authors')); ?>:</b>
		<?php 
		$authorNames = array();
		foreach ($data->authors as $author) {
			$authorNames[] = $author->name;
		};
		echo CHtml::encode(implode(', ', $authorNames));
		?>
	<?php endif; ?>
		
	<?php if (count($data->artists) > 0): ?>
		<br />
		<b><?php echo CHtml::encode($data->getAttributeLabel('artists')); ?>:</b>
		<?php 
		$artistNames = array();
		foreach ($data->artists as $artist) {
			$artistNames[] = $artist->name;
		};
		echo CHtml::encode(implode(', ', $artistNames));
		?>
	<?php endif; ?>
		
    <?php if ($data->publisher_id): ?>
        <br />
        <b><?php echo CHtml::encode($data->getAttributeLabel('publisher_id')); ?>:</b>
        <?php echo CHtml::encode(Publisher::model()->getName($data->publisher_id)); ?>
    <?php endif; ?>

    <?php if ($data->base_game_id !== null): ?>
        <br />
        <b><?php echo CHtml::encode($data->getAttributeLabel('base_game_id')); ?>:</b>
        <?php echo CHtml::encode($data->base_game_id); ?>
        <br />
    <?php endif; ?>

</div>
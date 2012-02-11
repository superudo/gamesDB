<?php $this->pageTitle=Yii::app()->name; ?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>Congratulations! You have successfully created your Yii application.</p>

<p>You may change the content of this page by modifying the following two files:</p>
<ul>
	<li>View file: <tt><?php echo __FILE__; ?></tt></li>
	<li>Layout file: <tt><?php echo $this->getLayoutFile('main'); ?></tt></li>
</ul>

<ul>
	<li><?php echo CHtml::link('Categories', array('category/index')); ?> (<?php echo CHtml::link('Create', array('category/create')); ?>)</li>
	<li><?php echo CHtml::link('Game Prices', array('price/index')); ?> (<?php echo CHtml::link('Create', array('price/create')); ?>)</li>
	<li><?php echo CHtml::link('Games', array('game/index')); ?> (<?php echo CHtml::link('Create', array('game/create')); ?>)</li>
	<li><?php echo CHtml::link('Artists', array('artist/index')); ?> (<?php echo CHtml::link('Create', array('artist/create')); ?>)</li>
	<li><?php echo CHtml::link('Publishers', array('publisher/index')); ?> (<?php echo CHtml::link('Create', array('publisher/create')); ?>)</li>
	<li><?php echo CHtml::link('Authors', array('author/index')); ?> (<?php echo CHtml::link('Create', array('author/create')); ?>)</li>
</ul>
<p>For more details on how to further develop this application, please read
the <a href="http://www.yiiframework.com/doc/">documentation</a>.
Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>,
should you have any questions.</p>
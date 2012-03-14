<?php

class ESelectToUISlider extends CWidget 
{
	/* 
	 * parameters
	 */

	public $label = '';	
	public $model; // enthält das CActiveRecord model
	
	public $properties = array(); 
	public $values = array(); // enthält die möglichen Werte 
	
	public $show_selectbox = false; // gibt an, ob die Select-Box gezeigt werden soll
	public $htmlOptions = array();
	
	public function init() 
	{
		$cs = Yii::app()->getClientScript();
		$assets = Yii::app()->getAssetManager()->publish(dirname(__FILE__));

		$cs->registerCoreScript('jquery');
		$cs->registerScriptFile($assets . '/js/jquery-ui-1.8.18.custom.js');
		$cs->registerScriptFile($assets . '/js/selectToUISlider.jQuery.js');
		$cs->registerCssFile($assets . '/css/ui.slider.extras.css');

		parent::init();
	}
	
	public function run()
	{
		$propCount = count($this->properties);
		if ($this->model == null) return;
		if (($propCount < 1) || ($propCount > 2)) return;
		if (count($this->values) < 1) return;
	
		$sliderIds = array();
		
		foreach ($this->properties as $prop) {
			print CHtml::activeDropDownList($this->model, $prop, $this->values, $this->htmlOptions);
			$sliderIds->push($this->htmlOptions['id']);
		}
	}
}

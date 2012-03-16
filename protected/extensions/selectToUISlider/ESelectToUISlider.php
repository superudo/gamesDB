<?php

class ESelectToUISlider extends CWidget
{
	private $_assetsUrl;

	/*
	 * parameters
	 */

	public $label = '';
	public $model; // enthält das CActiveRecord model

	public $properties = array();
	public $values = array(); // enthält die möglichen Werte

	public $show_selectbox = false; // gibt an, ob die Select-Box gezeigt werden soll
	public $htmlOptions = array();

	public function getAssetsUrl()
	{
		if ($this->_assetsUrl === null) {
			$this->_assetsUrl = Yii::app()->getAssetManager()->publish(
					Yii::getPathOfAlias("application.extensions.selectToUISlider.assets"));
		}
		return $this->_assetsUrl;
	}

	public function init()
	{
		$cs = Yii::app()->getClientScript();

		$cs->registerScriptFile($this->getAssetsUrl() . '/js/jquery-1.7.1.min.js');
		$cs->registerScriptFile($this->getAssetsUrl() . '/js/jquery-ui-1.8.18.custom.min.js');
		$cs->registerScriptFile($this->getAssetsUrl() . '/js/selectToUISlider.jQuery.js');
		$cs->registerCssFile($this->getAssetsUrl() . '/css/ui.slider.extras.css');
		$cs->registerCss("estuis",
<<<EOT
fieldset { border:0; margin: 6em; height: 12em;font-size: 62.5%; font-family:"Segoe UI","Helvetica Neue",Helvetica,Arial,sans-serif;}
label {font-weight: normal; float: left; margin-right: .5em; font-size: 1.1em;}
select {margin-right: 1em; float: left;}
.ui-slider {clear: both; top: 5em;}
EOT
);
		parent::init();
	}

	public function run()
	{
		$propCount = count($this->properties);
		if ($this->model == null) return;
		if (($propCount < 1) || ($propCount > 2)) return;
		if (count($this->values) < 1) return;

		$sliderIds = array();

		print("<fieldset>");
		foreach ($this->properties as $prop) {
			CHtml::resolveNameId($this->model, $prop, $this->htmlOptions);
			print("<label for='" . $this->htmlOptions['id'] . "'>Testlabel</label>");
			print CHtml::activeDropDownList($this->model, $prop, $this->values, $this->htmlOptions);
			$sliderIds[] = "select#" . $this->htmlOptions['id'];
			unset($this->htmlOptions['id']);
			unset($this->htmlOptions['name']);
		}
		print("</fieldset>");

		print("<script type='text/javascript'>$('".implode(",", $sliderIds)."').selectToUISlider();</script>");
	}
}

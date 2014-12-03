<?php
class TbModal extends CWidget
{
	public $autoOpen = false;
	public $fade = true;
	public $options = array();
	public $events = array();
	public $htmlOptions = array();

	public function init()
	{
		if (!isset($this->htmlOptions['id']))
			$this->htmlOptions['id'] = $this->getId();

		if ($this->autoOpen === false && !isset($this->options['show']))
			$this->options['show'] = false;

		$classes = array('modal hide');

		if ($this->fade === true)
			$classes[] = 'fade';

		if (!empty($classes))
		{
			$classes = implode(' ', $classes);
			if (isset($this->htmlOptions['class']))
				$this->htmlOptions['class'] .= ' '.$classes;
			else
				$this->htmlOptions['class'] = $classes;
		}

		echo CHtml::openTag('div', $this->htmlOptions);
	}

	public function run()
	{
		$id = $this->htmlOptions['id'];

		echo '</div>';

		/** @var CClientScript $cs */
		$cs = Yii::app()->getClientScript();

		$options = !empty($this->options) ? CJavaScript::encode($this->options) : '';
		$cs->registerScript(__CLASS__.'#'.$id, "jQuery('#{$id}').modal({$options});");

		foreach ($this->events as $name => $handler)
		{
			$handler = CJavaScript::encode($handler);
			$cs->registerScript(__CLASS__.'#'.$id.'_'.$name, "jQuery('#{$id}').on('{$name}', {$handler});");
		}
	}
}

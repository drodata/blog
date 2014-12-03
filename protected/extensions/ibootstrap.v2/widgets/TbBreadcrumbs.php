<?php
/**
 * TbCrumb class file.
 * @author Christoffer Niska <ChristofferNiska@gmail.com>
 * @copyright Copyright &copy; Christoffer Niska 2011-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package bootstrap.widgets
 */

Yii::import('zii.widgets.CBreadcrumbs');

class TbBreadcrumbs extends CBreadcrumbs
{
	public $separator = '/';

	public function init()
	{
		if (isset($this->htmlOptions['class']))
			$this->htmlOptions['class'] .= ' breadcrumb';
		else
			$this->htmlOptions['class'] = 'breadcrumb';
	}

	public function run()
	{
		if (empty($this->links))
			return;

		$links = array();

		if (!isset($this->homeLink))
		{
			$content = CHtml::link(Yii::t('zii', 'Home'), Yii::app()->homeUrl);
			$links[] = $this->renderItem($content);
		}
		else if ($this->homeLink !== false)
			$links[] = $this->renderItem($this->homeLink);

		foreach ($this->links as $label => $url)
		{
			if (is_string($label) || is_array($url))
			{
				$content = CHtml::link($this->encodeLabel ? CHtml::encode($label) : $label, $url);
				$links[] = $this->renderItem($content);
			}
			else
				$links[] = $this->renderItem($this->encodeLabel ? CHtml::encode($url) : $url, true);
		}

		echo CHtml::tag('ul', $this->htmlOptions, implode('', $links));
	}

	protected function renderItem($content, $active = false)
	{
		$separator = !$active ? '<span class="divider">'.$this->separator.'</span>' : '';
		
		ob_start();
		echo CHtml::openTag('li', $active ? array('class'=>'active') : array());
		echo $content.$separator;
		echo '</li>';
		return ob_get_clean();
	}
}

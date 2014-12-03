<?php
class Box extends CWidget
{
	const TYPE_DEFAULT 	= 'default';
	const TYPE_PRIMARY 	= 'primary';
	const TYPE_INFO 	= 'info';
	const TYPE_SUCCESS 	= 'success';
	const TYPE_WARNING 	= 'warning';
	const TYPE_DANGER 	= 'danger';

	const TOOLS_COMMON	= 'common'; // common button
	const TOOLS_COLLAPSE	= 'collapse';
	const TOOLS_RELOAD	= 'reload';

	public $id = '';
	public $type = self::TYPE_DEFAULT;
	public $header = '';
	public $headerIcon = false;
	public $isSolid = false;
	public $tools = array();
	public $htmlOptions = array();
	public function init()
	{
		$classes = array('box');

		$validTypes = array(self::TYPE_DEFAULT, self::TYPE_PRIMARY, self::TYPE_INFO, self::TYPE_SUCCESS, self::TYPE_WARNING, self::TYPE_DANGER);

		if (in_array($this->type, $validTypes))
			$classes[] = 'box-'.$this->type;
		if ($this->isSolid == true)
			$classes[] = 'box-solid';

		$this->htmlOptions['class'] = implode(" ", $classes);
		$this->htmlOptions['id'] = $this->id;

		$opt = '<div class="'. $this->htmlOptions["class"]. '" id="' .$this->htmlOptions["id"]. '">';
		$opt .= '<div class="box-header">';

		if (sizeof($this->tools) > 0) {
			$opt .= '<div class="pull-right box-tools">';

			foreach ($this->tools as $tool) {
			
				if (gettype($tool) == 'string') {
					switch ($tool) {
						case self::TOOLS_COLLAPSE:
							$ar[] = '<button class="btn btn-'. $this->type .' btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="折叠">'
								.'<i class="ion-minus"></i>'
								.'</button>';
							break;
					}
				} else if (gettype($tool) == 'array' && $tool['type'] == 'reload') {
					$ar[] = '<button class="btn btn-'. $this->type .' btn-sm pull-right refresh-btn" data-toggle="tooltip" data-original-title="刷新">'
						.'<i class="ion-refresh"></i>'
						.'</button>';
					Yii::app()->clientScript->registerScript('box-refresh-1','
						$("#box-reload-'.$this->id.'").boxRefresh({
						source: "'.$tool['ajaxUrl'].'",
						});
					',CClientScript::POS_END);
				} else if (gettype($tool) == 'array' && $tool['type'] == 'common') {

					$toggle = ($tool['toggle']) ? $tool['toggle'] : '';
					$rel = ($tool['data-rel']) ? 'rel="'.$tool['data-rel'].'"' : '';
					$ar[] = '<button class="'.$toggle.' btn btn-'.$this->type.' btn-sm pull-right" data-toggle="tooltip" 
						data-original-title="'.$tool['tooltip'].'"'.$rel.'>'
					.'<i class="ion-'. $tool['icon'].'"></i>'
					.'</button>';
				}
			}
			$opt .= implode('', $ar);
			$opt .= '</div>';
		}

		$opt .= '<h3 class="box-title">';
		if (isset($this->headerIcon))
			$opt .= '<i class="ion-' .$this->headerIcon. '"></i>&nbsp;';
		$opt .= $this->header.'</h3>';
		$opt .= '</div>';
		$opt .= '<div class="box-body">';
		
		echo $opt;
	}

	public function run()
	{
		$opt = '</div>';
		$opt .= '</div>';

		echo $opt;
	}
}

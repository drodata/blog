<?php
/**
 * This is the template for generating an action view file.
 * The following variables are available in this template:
 * - $this: the ControllerCode object
 * - $action: the action ID
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */

$this->breadcrumbs = array(
	'' => '',
);

$this->widget('bootstrap.widgets.Button', array(
	'buttonType'=>'button',
	'htmlOptions' => array(
		'class' => 'CustomerCU',
	),
	'label'=>'新建客户',
	'size' => 'normal',
	'type' => 'primary',
));

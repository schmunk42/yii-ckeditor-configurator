<?php
$this->breadcrumbs=array(
	$this->module->id,
);
?>
<h1><?php echo $this->uniqueId . '/' . $this->action->id; ?></h1>

<?php echo CHtml::link('Styles', array('/ckeditorConfigurator/ckeditorStyle')); ?>
<?php echo CHtml::link('Templates', array('/ckeditorConfigurator/ckeditorTemplate')); ?>
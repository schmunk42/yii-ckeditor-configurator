<?php
$this->breadcrumbs = array(
    $this->module->id,
);
$this->pageTitle = "CKEditor Configurator 1.0";
?>
<h1>CKEditor <small>Configurator</small></h1>
<p>
    This module provides the ability to configurate the templates and styles that will be further availible in your CKEditor.
</p>
<div class="row">
    <div class="span12">
        <ul class="thumbnails">
            <li class="span4">
                <div class="thumbnail">
                    <h3><?php echo CHtml::link('Templates', array('/ckeditorConfigurator/ckeditorTemplate')); ?></h3>
                    <small>vendor<wbr></wbr>.schmunk42<wbr></wbr>.ckeditor-configurator<wbr></wbr>.views<wbr></wbr>.ckeditorTemplate</small>
                </div>
            </li>
             <li class="span4">
                <div class="thumbnail">
                    <h3><?php echo CHtml::link('Styles', array('/ckeditorConfigurator/ckeditorStyle')); ?></h3>
                    <small>vendor<wbr></wbr>.schmunk42<wbr></wbr>.ckeditor-configurator<wbr></wbr>.views<wbr></wbr>.ckeditorStyle</small>
                </div>
            </li>
        </ul>
    </div>
</div>

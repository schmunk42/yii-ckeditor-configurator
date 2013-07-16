<div class="crud-form">

    <?php
    Yii::app()->bootstrap->registerAssetCss('select2.css');
    Yii::app()->bootstrap->registerAssetJs('select2.js');
    Yii::app()->clientScript->registerScript('crud/variant/update','$(".crud-form select").select2();');

    $form=$this->beginWidget('CActiveForm', array(
    'id'=>'ckeditor-style-form',
    'enableAjaxValidation'=>true,
    'enableClientValidation'=>true,
    ));

    echo $form->errorSummary($model);

    ?>
    <div class="row">
        <div class="span8"> <!-- main inputs -->
            <h2>
                <?php echo Yii::t('crud','Data')?>            </h2>

            <h3>
                <?php echo $model->name?>            </h3>

            <div class="form-horizontal">
                
    <div class="control-group">
            <div class='control-label'><?php echo $form->labelEx($model,'name'); ?></div>

            <div class='controls'><?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>128)); ?></div>
            <?php echo $form->error($model,'name'); ?>
            <?php if('help.name' != $help = Yii::t('crud', 'help.name')) { 
                echo "<span class='help-block'>{$help}</span>";            
} ?>
    </div>


    <div class="control-group">
            <div class='control-label'><?php echo $form->labelEx($model,'element'); ?></div>
            <div class='controls'><?php echo $form->textField($model,'element',array('size'=>60,'maxlength'=>128)); ?></div>
            <?php echo $form->error($model,'element'); ?>
            <?php if('help.element' != $help = Yii::t('crud', 'help.element')) { 
                echo "<span class='help-block'>{$help}</span>";            
} ?>
    </div>


    <div class="control-group">
            <div class='control-label'><?php echo $form->labelEx($model,'class'); ?></div>
            <div class='controls'><?php echo $form->textField($model,'class',array('size'=>60,'maxlength'=>128)); ?></div>
            <?php echo $form->error($model,'class'); ?>
            <?php if('help.class' != $help = Yii::t('crud', 'help.class')) { 
                echo "<span class='help-block'>{$help}</span>";            
} ?>
    </div>


    <div class="control-group">
            <div class='control-label'><?php echo $form->labelEx($model,'attributes_json'); ?></div>
            <div class='controls'><?php echo $form->textArea($model,'attributes_json',array('rows'=>6, 'cols'=>50)); ?></div>
            <?php echo $form->error($model,'attributes_json'); ?>
            <?php if('help.attributes_json' != $help = Yii::t('crud', 'help.attributes_json')) { 
                echo "<span class='help-block'>{$help}</span>";            
} ?>
    </div>

            </div>
        </div>
        <!-- main inputs -->

        <div class="span4"> <!-- sub inputs -->
            <h2>
                <?php echo Yii::t('crud','Relations')?>            </h2>
            

        </div>
        <!-- sub inputs -->
    </div>

    <p class="alert">
        <?php echo Yii::t('crud','Fields with <span class="required">*</span> are required.');?> 
    </p>

    <div class="form-actions">
        
    <?php
        echo CHtml::Button(Yii::t('crud', 'Cancel'), array(
			'submit' => (isset($_GET['returnUrl']))?$_GET['returnUrl']:array('ckeditorstyle/admin'),
			'class' => 'btn'
			));
        echo ' '.CHtml::submitButton(Yii::t('crud', 'Save'), array(
            'class' => 'btn btn-primary'
            ));
    ?>
    </div>

    <?php $this->endWidget() ?>
</div> <!-- form -->
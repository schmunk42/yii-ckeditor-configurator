<div class="crud-form">

    <?php
    Yii::app()->bootstrap->registerAssetCss('select2.css');
    Yii::app()->bootstrap->registerAssetJs('select2.js');
    Yii::app()->clientScript->registerScript('crud/variant/update','$(".crud-form select").select2();');

    $form=$this->beginWidget('CActiveForm', array(
    'id'=>'ckeditor-template-form',
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
                <?php echo $model->title?>            </h3>

            <div class="form-horizontal">
                
    <div class="control-group">
            <div class='control-label'><?php echo $form->labelEx($model,'title'); ?></div>

            <div class='controls'><?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>128)); ?></div>
            <?php echo $form->error($model,'title'); ?>
            <?php if('help.title' != $help = Yii::t('crud', 'help.title')) { 
                echo "<span class='help-block'>{$help}</span>";            
} ?>
    </div>


    <div class="control-group">
            <div class='control-label'><?php echo $form->labelEx($model,'image'); ?></div>
            <div class='controls'><?php echo $form->textField($model,'image',array('size'=>60,'maxlength'=>128)); ?></div>
            <?php echo $form->error($model,'image'); ?>
            <?php if('help.image' != $help = Yii::t('crud', 'help.image')) { 
                echo "<span class='help-block'>{$help}</span>";            
} ?>
    </div>


    <div class="control-group">
            <div class='control-label'><?php echo $form->labelEx($model,'description'); ?></div>
            <div class='controls'><?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?></div>
            <?php echo $form->error($model,'description'); ?>
            <?php if('help.description' != $help = Yii::t('crud', 'help.description')) { 
                echo "<span class='help-block'>{$help}</span>";            
} ?>
    </div>


    <div class="control-group">
            <div class='control-label'><?php echo $form->labelEx($model,'html'); ?></div>
            <div class='controls'><?php echo $form->textArea($model,'html',array('rows'=>6, 'cols'=>50)); ?></div>
            <?php echo $form->error($model,'html'); ?>
            <?php if('help.html' != $help = Yii::t('crud', 'help.html')) { 
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
			'submit' => (isset($_GET['returnUrl']))?$_GET['returnUrl']:array('ckeditortemplate/admin'),
			'class' => 'btn'
			));
        echo ' '.CHtml::submitButton(Yii::t('crud', 'Save'), array(
            'class' => 'btn btn-primary'
            ));
    ?>
    </div>

    <?php $this->endWidget() ?>
</div> <!-- form -->
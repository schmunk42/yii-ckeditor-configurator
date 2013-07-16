<div class="wide form">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'action'=>Yii::app()->createUrl($this->route),
        'method'=>'get',
)); ?>

                    <div class="row">
            <?php echo $form->label($model,'id'); ?>
                            <?php echo $form->textField($model,'id'); ?>
                    </div>

                    <div class="row">
            <?php echo $form->label($model,'name'); ?>
                            <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>128)); ?>
                    </div>

                    <div class="row">
            <?php echo $form->label($model,'element'); ?>
                            <?php echo $form->textField($model,'element',array('size'=>60,'maxlength'=>128)); ?>
                    </div>

                    <div class="row">
            <?php echo $form->label($model,'class'); ?>
                            <?php echo $form->textField($model,'class',array('size'=>60,'maxlength'=>128)); ?>
                    </div>

                    <div class="row">
            <?php echo $form->label($model,'attributes_json'); ?>
                            <?php echo $form->textArea($model,'attributes_json',array('rows'=>6, 'cols'=>50)); ?>
                    </div>

        <div class="row buttons">
        <?php echo CHtml::submitButton(Yii::t('crud', 'Search')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->

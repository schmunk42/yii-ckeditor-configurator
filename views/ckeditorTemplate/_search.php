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
            <?php echo $form->label($model,'title'); ?>
                            <?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>128)); ?>
                    </div>

                    <div class="row">
            <?php echo $form->label($model,'image'); ?>
                            <?php echo $form->textField($model,'image',array('size'=>60,'maxlength'=>128)); ?>
                    </div>

                    <div class="row">
            <?php echo $form->label($model,'description'); ?>
                            <?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
                    </div>

                    <div class="row">
            <?php echo $form->label($model,'html'); ?>
            <?php echo $form->textArea($model,'html',array('rows'=>6, 'cols'=>50)); ?>
                    </div>

        <div class="row buttons">
        <?php echo CHtml::submitButton(Yii::t('crud', 'Search')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->

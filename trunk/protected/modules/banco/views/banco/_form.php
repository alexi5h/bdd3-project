<?php
/** @var BancoController $this */
/** @var Banco $model */
/** @var AweActiveForm $form */
$form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
'type' => 'horizontal',
'id' => 'banco-form',
'enableAjaxValidation' => true,
'clientOptions' => array('validateOnSubmit' => false, 'validateOnChange' => true,),
'enableClientValidation' => false,
));?>
<div class="widget blue">
    <div class="widget-title">
        <h4><i class="icon-plus"></i><?php echo Yii::t('AweCrud.app',$model->isNewRecord ? 'Create' : 'Update') . ' ' . Banco::label(1); ?></h4>
        <span class="tools">
            <a href="javascript:;" class="icon-chevron-down"></a>
            <!--a href="javascript:;" class="icon-remove"></a-->
        </span>
    </div>
    <div class="widget-body">
        
        
            
                                        <?php echo $form->textFieldRow($model, 'NRO_CUENTA', array('maxlength' => 20)) ?>
                                
                                        <?php echo $form->dropDownListRow($model, 'TIPO_CUENTA', array('AHORRO' => 'AHORRO','CORRIENTE' => 'CORRIENTE',)) ?>
                                
                                        <?php echo $form->textFieldRow($model, 'NOMBRE_BANCO', array('maxlength' => 20)) ?>
                                
                                        <?php echo $form->textFieldRow($model, 'SALDO', array('maxlength' => 10)) ?>
                                
                                        <?php echo $form->textFieldRow($model, 'PERSONA_ID') ?>
                                        </div>                <div class="form-actions">
                        <?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'success',
			'label'=>$model->isNewRecord ? Yii::t('AweCrud.app', 'Create') : Yii::t('AweCrud.app', 'Save'),
		)); ?>
            <?php $this->widget('bootstrap.widgets.TbButton', array(
			'label'=> Yii::t('AweCrud.app', 'Cancel'),
			'htmlOptions' => array('onclick' => 'javascript:history.go(-1)')
		)); ?>
        </div>
    </div>
</div>
<?php $this->endWidget(); ?>

<?php
/** @var BancoDepositoController $this */
/** @var BancoDeposito $model */
/** @var AweActiveForm $form */
$form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
'type' => 'horizontal',
'id' => 'banco-deposito-form',
'enableAjaxValidation' => true,
'clientOptions' => array('validateOnSubmit' => false, 'validateOnChange' => true,),
'enableClientValidation' => false,
));?>
<div class="widget blue">
    <div class="widget-title">
        <h4><i class="icon-plus"></i><?php echo Yii::t('AweCrud.app',$model->isNewRecord ? 'Create' : 'Update') . ' ' . BancoDeposito::label(1); ?></h4>
        <span class="tools">
            <a href="javascript:;" class="icon-chevron-down"></a>
            <!--a href="javascript:;" class="icon-remove"></a-->
        </span>
    </div>
    <div class="widget-body">
        
        
            
                                        <?php echo $form->textFieldRow($model, 'NRO_COMPROBANTE', array('maxlength' => 20)) ?>
                                
                                        <?php echo $form->textFieldRow($model, 'VALOR', array('maxlength' => 10)) ?>
                                
                                        <?php echo $form->dropDownListRow($model, 'BANCO_ID', array('' => ' -- Seleccione -- ') + CHtml::listData(Banco::model()->findAll(), 'ID', Banco::representingColumn())) ?>
                                
                                        <?php echo $form->dropDownListRow($model, 'CURSO_EDICION_ID', array('' => ' -- Seleccione -- ') + CHtml::listData(CursoEdicion::model()->findAll(), 'ID', CursoEdicion::representingColumn())) ?>
                                                        <div class="form-actions">
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

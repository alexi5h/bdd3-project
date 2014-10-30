<?php
/** @var PersonaController $this */
/** @var Persona $model */
/** @var AweActiveForm $form */
$form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
    'type' => 'horizontal',
    'id' => 'persona-form',
    'enableAjaxValidation' => true,
    'clientOptions' => array('validateOnSubmit' => true, 'validateOnChange' => false,),
    'enableClientValidation' => false,
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
        ));
?>
<div class="widget blue">
    <div class="widget-title">
        <h4><i class="icon-plus"></i><?php echo Yii::t('AweCrud.app', $model->isNewRecord ? 'Create' : 'Update') . ' ' . Persona::label(1); ?></h4>
        <span class="tools">
            <a href="javascript:;" class="icon-chevron-down"></a>
            <!--a href="javascript:;" class="icon-remove"></a-->
        </span>
    </div>
    <div class="widget-body">


        <?php // echo $form->textFieldRow($model, 'ID') ?>

        <?php echo $form->textFieldRow($model, 'CEDULA', array('maxlength' => 20)) ?>

        <?php echo $form->textFieldRow($model, 'RUC', array('maxlength' => 20)) ?>

        <?php echo $form->textFieldRow($model, 'NOMBRES', array('maxlength' => 20)) ?>

        <?php echo $form->textFieldRow($model, 'APELLIDOS', array('maxlength' => 20)) ?>

        <?php echo $form->textFieldRow($model, 'DIRECCION', array('maxlength' => 100)) ?>

        <?php echo $form->textFieldRow($model, 'TELEFONO', array('maxlength' => 20)) ?>

        <?php echo $form->textFieldRow($model, 'TITULOS_ACADEMICOS', array('maxlength' => 70)) ?>

        <?php echo $form->textFieldRow($model, 'LUGAR_TRABAJO', array('maxlength' => 20)) ?>

        <?php echo $form->dropDownListRow($model, 'TIPO_PERSONA', array('' => ' -- Seleccione -- ', 1 => 'ESTUDIANTE', 2 => 'PARTICULAR', 3 => 'INSTRUCTOR'), array('placeholder' => null)) ?>

        <?php // echo $form->textFieldRow($model, 'NRO_CURSOS_APROBADOS') ?>
        <?php echo $form->fileFieldRow($model, 'FOTO'); ?>

        <div class = "form-actions">
            <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType' => 'submit',
                'type' => 'success',
                'label' => $model->isNewRecord ? Yii::t('AweCrud.app', 'Create') : Yii::t('AweCrud.app', 'Save'),
            ));
            ?>
            <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                'label' => Yii::t('AweCrud.app', 'Cancel'),
                'htmlOptions' => array('onclick' => 'javascript:history.go(-1)')
            ));
            ?>
        </div>
    </div>
</div>
<?php $this->endWidget(); ?>

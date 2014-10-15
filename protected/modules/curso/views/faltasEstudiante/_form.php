<?php
/** @var FaltasEstudianteController $this */
/** @var FaltasEstudiante $model */
/** @var AweActiveForm $form */
$form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
    'type' => 'horizontal',
    'id' => 'faltas-estudiante-form',
    'enableAjaxValidation' => true,
    'clientOptions' => array('validateOnSubmit' => true, 'validateOnChange' => false,),
    'enableClientValidation' => false,
        ));
?>
<div class="widget blue">
    <div class="widget-title">
        <h4><i class="icon-plus"></i><?php echo Yii::t('AweCrud.app', $model->isNewRecord ? 'Create' : 'Update') . ' ' . FaltasEstudiante::label(1); ?></h4>
        <span class="tools">
            <a href="javascript:;" class="icon-chevron-down"></a>
            <!--a href="javascript:;" class="icon-remove"></a-->
        </span>
    </div>
    <div class="widget-body">



        <?php echo $form->textFieldRow($model, 'NRO_FALTAS') ?>

        <?php echo $form->textFieldRow($model, 'TOTAL_DIAS_CURSO') ?>

        <?php echo $form->dropDownListRow($model, 'PERSONA_ID', array('' => ' -- Seleccione -- ') + CHtml::listData(Persona::model()->findAll(), 'ID', Persona::representingColumn())) ?>

            <?php echo $form->dropDownListRow($model, 'CURSO_EDICION_ID', array('' => ' -- Seleccione -- ') + CHtml::listData(CursoEdicion::model()->findAll(), 'ID', CursoEdicion::representingColumn())) ?>
        <div class="form-actions">
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

<?php
/** @var CursoEdicionController $this */
/** @var CursoEdicion $model */
/** @var AweActiveForm $form */
$form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
    'type' => 'horizontal',
    'id' => 'curso-edicion-form',
    'enableAjaxValidation' => true,
    'clientOptions' => array('validateOnSubmit' => false, 'validateOnChange' => true,),
    'enableClientValidation' => false,
        ));
?>
<div class="widget blue">
    <div class="widget-title">
        <h4><i class="icon-plus"></i><?php echo Yii::t('AweCrud.app', $model->isNewRecord ? 'Create' : 'Update') . ' ' . CursoEdicion::label(1); ?></h4>
        <span class="tools">
            <a href="javascript:;" class="icon-chevron-down"></a>
            <!--a href="javascript:;" class="icon-remove"></a-->
        </span>
    </div>
    <div class="widget-body">



        <?php // echo $form->datepickerRow($model, 'FECHA_INICIO', array('prepend' => '<i class="icon-calendar"></i>')) ?>
        <?php
        echo $form->datepickerRow(
                $model, 'FECHA_INICIO', array(
            'options' => array(
                'language' => 'es',
                'readonly' => 'readonly',
            ),
                )
        );
        ?>

        <?php // echo $form->datepickerRow($model, 'FECHA_FINALIZACION', array('prepend' => '<i class="icon-calendar"></i>')) ?>
        <?php
        echo $form->datepickerRow(
                $model, 'FECHA_FINALIZACION', array(
            'options' => array(
                'language' => 'es',
                'readonly' => 'readonly',
            ),
                )
        );
        ?>

        <?php echo $form->textFieldRow($model, 'AULA', array('maxlength' => 20)) ?>

        <?php echo $form->textFieldRow($model, 'NRO_ESTUDIANTES') ?>

        <?php echo $form->dropDownListRow($model, 'CURSO_ID', array('' => ' -- Seleccione -- ') + CHtml::listData(Curso::model()->findAll(), 'ID', Curso::representingColumn())) ?>

        <?php echo $form->dropDownListRow($model, 'HORARIO_ID', array('' => ' -- Seleccione -- ') + CHtml::listData(Horario::model()->findAll(), 'ID', Horario::representingColumn())) ?>

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

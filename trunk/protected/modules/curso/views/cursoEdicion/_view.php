<?php
/** @var CursoEdicionController $this */
/** @var CursoEdicion $data */
?>
<div class="view">
                    
        <?php if (!empty($data->FECHA_INICIO)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('FECHA_INICIO')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo Yii::app()->getDateFormatter()->formatDateTime($data->FECHA_INICIO, 'medium', 'medium'); ?>
            <br/>
                 <?php echo date('D, d M y H:i:s', strtotime($data->FECHA_INICIO)); ?>
                            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->FECHA_FINALIZACION)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('FECHA_FINALIZACION')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo Yii::app()->getDateFormatter()->formatDateTime($data->FECHA_FINALIZACION, 'medium', 'medium'); ?>
            <br/>
                 <?php echo date('D, d M y H:i:s', strtotime($data->FECHA_FINALIZACION)); ?>
                            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->AULA)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('AULA')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->AULA); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->NRO_ESTUDIANTES)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('NRO_ESTUDIANTES')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->NRO_ESTUDIANTES); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->cURSO->NOMBRE)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('CURSO_ID')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->cURSO->NOMBRE); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->hORARIO->HORA_INICIO)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('HORARIO_ID')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->hORARIO->HORA_INICIO); ?>
            </div>
        </div>

        <?php endif; ?>
    </div>
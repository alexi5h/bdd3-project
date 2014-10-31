<?php
/** @var EdicionCursoController $this */
/** @var EdicionCurso $data */
?>
<div class="view">
                    
        <?php if (!empty($data->ID_CURSO)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('ID_CURSO')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->ID_CURSO); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->NOMBRE)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('NOMBRE')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->NOMBRE); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->CONTENIDO)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('CONTENIDO')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->CONTENIDO); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->PRERREQUISITOS)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('PRERREQUISITOS')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->PRERREQUISITOS); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->ESPECIALIDAD)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('ESPECIALIDAD')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->ESPECIALIDAD); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->ID_EDICION)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('ID_EDICION')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->ID_EDICION); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->NRO_EDICION)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('NRO_EDICION')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->NRO_EDICION); ?>
            </div>
        </div>

        <?php endif; ?>
                
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
                
        <?php if (!empty($data->HORARIO_ID)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('HORARIO_ID')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->HORARIO_ID); ?>
            </div>
        </div>

        <?php endif; ?>
    </div>
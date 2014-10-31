<?php
/** @var FormularioController $this */
/** @var Formulario $data */
?>
<div class="view">
                    
        <?php if (!empty($data->CONOCIMIENTOS)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('CONOCIMIENTOS')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->CONOCIMIENTOS); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->PUNTUALIDAD)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('PUNTUALIDAD')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->PUNTUALIDAD); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->MAT_DIDACTICO)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('MAT_DIDACTICO')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->MAT_DIDACTICO); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->FORMA_ENSENANZA)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('FORMA_ENSENANZA')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->FORMA_ENSENANZA); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->ESTUDIANTE_ID)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('ESTUDIANTE_ID')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->ESTUDIANTE_ID); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->INSTRUCTOR_ID)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('INSTRUCTOR_ID')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->INSTRUCTOR_ID); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->cURSOEDICION->NRO_EDICION)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('CURSO_EDICION_ID')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->cURSOEDICION->NRO_EDICION); ?>
            </div>
        </div>

        <?php endif; ?>
    </div>
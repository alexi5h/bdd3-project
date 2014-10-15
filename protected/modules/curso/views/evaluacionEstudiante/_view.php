<?php
/** @var EvaluacionEstudianteController $this */
/** @var EvaluacionEstudiante $data */
?>
<div class="view">
                    
        <?php if (!empty($data->NOTA)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('NOTA')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->NOTA); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->pERSONA->CEDULA)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('PERSONA_ID')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->pERSONA->CEDULA); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->cURSOEDICION->FECHA_INICIO)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('CURSO_EDICION_ID')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->cURSOEDICION->FECHA_INICIO); ?>
            </div>
        </div>

        <?php endif; ?>
    </div>
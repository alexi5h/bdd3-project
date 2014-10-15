<?php
/** @var FaltasEstudianteController $this */
/** @var FaltasEstudiante $data */
?>
<div class="view">
                    
        <?php if (!empty($data->NRO_FALTAS)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('NRO_FALTAS')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->NRO_FALTAS); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->TOTAL_DIAS_CURSO)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('TOTAL_DIAS_CURSO')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->TOTAL_DIAS_CURSO); ?>
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
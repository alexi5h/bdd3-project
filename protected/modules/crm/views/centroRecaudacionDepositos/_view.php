<?php
/** @var CentroRecaudacionDepositosController $this */
/** @var CentroRecaudacionDepositos $data */
?>
<div class="view">
                    
        <?php if (!empty($data->NRO_FACTURA)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('NRO_FACTURA')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->NRO_FACTURA); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->VALOR)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('VALOR')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->VALOR); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->PERSONA_ID)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('PERSONA_ID')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->PERSONA_ID); ?>
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
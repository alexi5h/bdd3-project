<?php
/** @var BancoDepositoController $this */
/** @var BancoDeposito $data */
?>
<div class="view">
                    
        <?php if (!empty($data->NRO_COMPROBANTE)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('NRO_COMPROBANTE')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->NRO_COMPROBANTE); ?>
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
                
        <?php if (!empty($data->bANCO->NRO_CUENTA)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('BANCO_ID')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->bANCO->NRO_CUENTA); ?>
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
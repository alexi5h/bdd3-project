<?php
/** @var BancoController $this */
/** @var Banco $data */
?>
<div class="view">
                    
        <?php if (!empty($data->NRO_CUENTA)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('NRO_CUENTA')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->NRO_CUENTA); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->TIPO_CUENTA)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('TIPO_CUENTA')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->TIPO_CUENTA); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->NOMBRE_BANCO)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('NOMBRE_BANCO')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->NOMBRE_BANCO); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->SALDO)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('SALDO')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->SALDO); ?>
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
    </div>
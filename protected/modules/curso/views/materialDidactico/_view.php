<?php
/** @var MaterialDidacticoController $this */
/** @var MaterialDidactico $data */
?>
<div class="view">
                    
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
    </div>
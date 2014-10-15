<?php
/** @var HorarioController $this */
/** @var Horario $data */
?>
<div class="view">
                    
        <?php if (!empty($data->HORA_INICIO)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('HORA_INICIO')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo Yii::app()->getDateFormatter()->formatDateTime($data->HORA_INICIO, 'medium', 'medium'); ?>
            <br/>
                 <?php echo date('D, d M y H:i:s', strtotime($data->HORA_INICIO)); ?>
                            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->HORA_FIN)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('HORA_FIN')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo Yii::app()->getDateFormatter()->formatDateTime($data->HORA_FIN, 'medium', 'medium'); ?>
            <br/>
                 <?php echo date('D, d M y H:i:s', strtotime($data->HORA_FIN)); ?>
                            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->NUM_HORAS)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('NUM_HORAS')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->NUM_HORAS); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->DETALLE)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('DETALLE')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->DETALLE); ?>
            </div>
        </div>

        <?php endif; ?>
    </div>
<?php
/** @var CursoController $this */
/** @var Curso $data */
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
    </div>
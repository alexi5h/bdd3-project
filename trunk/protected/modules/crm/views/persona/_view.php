<?php
/** @var PersonaController $this */
/** @var Persona $data */
?>
<div class="view">
                    
        <?php if (!empty($data->CEDULA)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('CEDULA')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->CEDULA); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->RUC)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('RUC')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->RUC); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->NOMBRES)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('NOMBRES')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->NOMBRES); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->APELLIDOS)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('APELLIDOS')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->APELLIDOS); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->DIRECCION)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('DIRECCION')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->DIRECCION); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->TELEFONO)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('TELEFONO')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->TELEFONO); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->TITULOS_ACADEMICOS)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('TITULOS_ACADEMICOS')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->TITULOS_ACADEMICOS); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->LUGAR_TRABAJO)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('LUGAR_TRABAJO')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->LUGAR_TRABAJO); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->TIPO_PERSONA)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('TIPO_PERSONA')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->TIPO_PERSONA); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->NRO_CURSOS_APROBADOS)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('NRO_CURSOS_APROBADOS')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->NRO_CURSOS_APROBADOS); ?>
            </div>
        </div>

        <?php endif; ?>
    </div>
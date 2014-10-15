<?php
/** @var FaltasEstudianteController $this */
/** @var FaltasEstudiante $model */
$this->menu = array(
    array('label' => Yii::t('AweCrud.app', 'Create'), 'icon' => 'plus', 'url' => array('create'), 
    //'visible' => (Util::checkAccess(array('action_incidenciaPrioridad_create')))
    ),
);
?>
<div id="flashMsg"  class="flash-messages">

</div> 
<div class="widget blue">
    <div class="widget-title">
        <h4> <i class="icon-fire-extinguisher"></i> <?php echo Yii::t('AweCrud.app', 'Manage') ?> <?php echo FaltasEstudiante::label(2) ?> </h4>
        <span class="tools">
            <a href="javascript:;" class="icon-chevron-down"></a>
            <!--a href="javascript:;" class="icon-remove"></a-->
        </span>
    </div>
    <div class="widget-body">

            <?php 
        $this->widget('bootstrap.widgets.TbGridView',array(
        'id' => 'faltas-estudiante-grid',
        'type' => 'striped bordered hover advance',
        'dataProvider' => $model->search(),
        'columns' => array(
                    'NRO_FALTAS',
                        'TOTAL_DIAS_CURSO',
                        array(
                    'name' => 'PERSONA_ID',
                    'value' => 'isset($data->pERSONA) ? $data->pERSONA : null',
                    'filter' => CHtml::listData(Persona::model()->findAll(), 'ID', Persona::representingColumn()),
                ),
                        array(
                    'name' => 'CURSO_EDICION_ID',
                    'value' => 'isset($data->cURSOEDICION) ? $data->cURSOEDICION : null',
                    'filter' => CHtml::listData(CursoEdicion::model()->findAll(), 'ID', CursoEdicion::representingColumn()),
                ),
                    array(
                    'class' => 'CButtonColumn',
                    'template' => '{update} {delete}',
                    'afterDelete' => 'function(link,success,data){ 
                    if(success) {
                         $("#flashMsg").empty();
                         $("#flashMsg").css("display","");
                         $("#flashMsg").html(data).animate({opacity: 1.0}, 5500).fadeOut("slow");
                    }
                    }',
                    'buttons' => array(
                        'update' => array(
                            'label' => '<button class="btn btn-primary"><i class="icon-pencil"></i></button>',
                            'options' => array('title' => 'Actualizar'),
                            'imageUrl' => false,
                             //'visible' => 'Util::checkAccess(array("action_incidenciaPrioridad_update"))'
                        ),
                        'delete' => array(
                            'label' => '<button class="btn btn-danger"><i class="icon-trash"></i></button>',
                            'options' => array('title' => 'Eliminar'),
                            'imageUrl' => false,
                            //'visible' => 'Util::checkAccess(array("action_incidenciaPrioridad_delete"))'
                        ),
                    ),
                    'htmlOptions' => array(
                        'width' => '80px'
                    )
                ),
        ),
        )); ?>
    </div>
</div>
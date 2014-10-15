<?php
/** @var CursoEdicionController $this */
/** @var CursoEdicion $model */
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
        <h4> <i class="icon-fire-extinguisher"></i> <?php echo Yii::t('AweCrud.app', 'Manage') ?> <?php echo CursoEdicion::label(2) ?> </h4>
        <span class="tools">
            <a href="javascript:;" class="icon-chevron-down"></a>
            <!--a href="javascript:;" class="icon-remove"></a-->
        </span>
    </div>
    <div class="widget-body">

            <?php 
        $this->widget('bootstrap.widgets.TbGridView',array(
        'id' => 'curso-edicion-grid',
        'type' => 'striped bordered hover advance',
        'dataProvider' => $model->search(),
        'columns' => array(
                    'FECHA_INICIO',
                        'FECHA_FINALIZACION',
                        'AULA',
                        'NRO_ESTUDIANTES',
                        array(
                    'name' => 'CURSO_ID',
                    'value' => 'isset($data->cURSO) ? $data->cURSO : null',
                    'filter' => CHtml::listData(Curso::model()->findAll(), 'ID', Curso::representingColumn()),
                ),
                        array(
                    'name' => 'HORARIO_ID',
                    'value' => 'isset($data->hORARIO) ? $data->hORARIO : null',
                    'filter' => CHtml::listData(Horario::model()->findAll(), 'ID', Horario::representingColumn()),
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
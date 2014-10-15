<?php
/** @var CursoEdicionController $this */
/** @var CursoEdicion $model */

$this->menu=array(
    //array('label' => Yii::t('AweCrud.app', 'List') . ' ' . CursoEdicion::label(2), 'icon' => 'list', 'url' => array('index')),
    array('label' => "<div>" . CHtml::image(Yii::app()->baseUrl . "/images/topbar/administrar.png") . "</div>" . Yii::t('AweCrud.app', 'Manage'), 'url' => array('admin')),
    array('label' => "<div>" . CHtml::image(Yii::app()->baseUrl . "/images/topbar/nuevo.png") . "</div>" .  Yii::t('AweCrud.app', 'Create'), 'url' => array('create')),
    //array('label' => Yii::t('AweCrud.app', 'View'), 'icon' => 'eye-open', 'itemOptions'=>array('class'=>'active')),
    //array('label' => Yii::t('AweCrud.app', 'Update'), 'icon' => 'pencil', 'url' => array('update', 'id' => $model->ID)),
    //array('label' => Yii::t('AweCrud.app', 'Delete'), 'icon' => 'trash', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->ID), 'confirm' => Yii::t('AweCrud.app', 'Are you sure you want to delete this item?'))),
    
);
?>

<fieldset>
    <legend><?php echo Yii::t('AweCrud.app', 'View'); ?> </legend>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data' => $model,
	'attributes' => array(
                  'FECHA_INICIO',
             'FECHA_FINALIZACION',
             'AULA',
             'NRO_ESTUDIANTES',
             array(
			'name' => 'CURSO_ID',
			'value'=>($model->cURSO !== null) ? CHtml::link($model->cURSO, array('/curso/view', 'ID' => $model->cURSO->ID)).' ' : null,
			'type' => 'html',
		),
             array(
			'name' => 'HORARIO_ID',
			'value'=>($model->hORARIO !== null) ? CHtml::link($model->hORARIO, array('/horario/view', 'ID' => $model->hORARIO->ID)).' ' : null,
			'type' => 'html',
		),
	),
)); ?>
</fieldset>
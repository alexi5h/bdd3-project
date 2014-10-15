<?php
/** @var EvaluacionEstudianteController $this */
/** @var EvaluacionEstudiante $model */

$this->menu=array(
    //array('label' => Yii::t('AweCrud.app', 'List') . ' ' . EvaluacionEstudiante::label(2), 'icon' => 'list', 'url' => array('index')),
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
                  'NOTA',
             array(
			'name' => 'PERSONA_ID',
			'value'=>($model->pERSONA !== null) ? CHtml::link($model->pERSONA, array('/persona/view', 'ID' => $model->pERSONA->ID)).' ' : null,
			'type' => 'html',
		),
             array(
			'name' => 'CURSO_EDICION_ID',
			'value'=>($model->cURSOEDICION !== null) ? CHtml::link($model->cURSOEDICION, array('/cursoEdicion/view', 'ID' => $model->cURSOEDICION->ID)).' ' : null,
			'type' => 'html',
		),
	),
)); ?>
</fieldset>
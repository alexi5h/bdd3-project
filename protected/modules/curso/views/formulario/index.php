<?php
/** @var FormularioController $this */
/** @var Formulario $model */
$this->menu=array(
    //array('label' => Yii::t('AweCrud.app', 'List') . ' ' . Formulario::label(2), 'icon' => 'list', 'itemOptions'=>array('class'=>'active')),
    array('label' => "<div>" . CHtml::image(Yii::app()->baseUrl . "/images/topbar/administrar.png") . "</div>" .  Yii::t('AweCrud.app', 'Manage'), 'url' => array('admin')),
    array('label' => "<div>" . CHtml::image(Yii::app()->baseUrl . "/images/topbar/nuevo.png") . "</div>" .  Yii::t('AweCrud.app', 'Create'), 'url' => array('create')),
);
?>
<fieldset>
    <legend>
        <?php echo Yii::t('AweCrud.app', 'List') ?> <?php echo Formulario::label(2) ?>    </legend>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider' => $dataProvider,
	'itemView' => '_view',
)); ?>
</fieldset>
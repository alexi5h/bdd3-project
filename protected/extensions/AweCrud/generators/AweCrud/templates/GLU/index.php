<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
/** @var AweCrudCode $this */
?>
<?php echo "<?php\n" ?>
/** @var <?php echo $this->controllerClass; ?> $this */
/** @var <?php echo $this->modelClass; ?> $model */
<?php
$label=$this->pluralize($this->class2name($this->modelClass));
?>
$this->menu=array(
    //array('label' => Yii::t('AweCrud.app', 'List') . ' ' . <?php echo $this->modelClass ?>::label(2), 'icon' => 'list', 'itemOptions'=>array('class'=>'active')),
    array('label' => "<div>" . CHtml::image(Yii::app()->baseUrl . "/images/topbar/administrar.png") . "</div>" .  Yii::t('AweCrud.app', 'Manage'), 'url' => array('admin')),
    array('label' => "<div>" . CHtml::image(Yii::app()->baseUrl . "/images/topbar/nuevo.png") . "</div>" .  Yii::t('AweCrud.app', 'Create'), 'url' => array('create')),
);
?>
<fieldset>
    <legend>
        <?php echo "<?php echo Yii::t('AweCrud.app', 'List') ?>" ?> <?php echo "<?php echo {$this->modelClass}::label(2) ?>" ?>
    </legend>

<?php echo "<?php" ?> $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider' => $dataProvider,
	'itemView' => '_view',
)); ?>
</fieldset>
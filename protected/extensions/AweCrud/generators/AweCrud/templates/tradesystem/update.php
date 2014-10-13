<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */

/** @var AweCrudCode $this  */
?>
<?php echo "<?php\n" ?>
/** @var <?php echo $this->controllerClass; ?> $this */
/** @var <?php echo $this->modelClass; ?> $model */
<?php
$nameColumn=$this->guessNameColumn($this->tableSchema->columns);
$label=$this->pluralize($this->class2name($this->modelClass));
?>

$this->menu=array(
    //array('label' => Yii::t('AweCrud.app', 'List') . ' ' . <?php echo $this->modelClass ?>::label(2), 'icon' => 'list', 'url' => array('index')),
    array('label' => "<div>" . CHtml::image(Yii::app()->baseUrl . "/images/topbar/administrar.png") . "</div>" .  Yii::t('AweCrud.app', 'Manage'), 'url' => array('admin')),
    array('label' => "<div>" . CHtml::image(Yii::app()->baseUrl . "/images/topbar/nuevo.png") . "</div>" .  Yii::t('AweCrud.app', 'Create'), 'url' => array('create')),
    //array('label' => Yii::t('AweCrud.app', 'View'), 'icon' => 'eye-open', 'url'=>array('view', 'id' => $model-><?php echo $this->tableSchema->primaryKey; ?>)),
    //array('label' => Yii::t('AweCrud.app', 'Update'), 'icon' => 'pencil', 'itemOptions'=>array('class'=>'active')),
    //array('label' => Yii::t('AweCrud.app', 'Delete'), 'icon' => 'trash', 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model-><?php echo $this->tableSchema->primaryKey; ?>), 'confirm' => Yii::t('AweCrud.app', 'Are you sure you want to delete this item?'))),
	
);
?>

<fieldset>
    <legend><?php echo "<?php echo Yii::t('AweCrud.app', 'Update') . ' ' . {$this->modelClass}::label();  ?>" ?></legend>
    <?php echo "<?php echo \$this->renderPartial('_form',array('model' => \$model)); ?>".PHP_EOL; ?>
</fieldset>
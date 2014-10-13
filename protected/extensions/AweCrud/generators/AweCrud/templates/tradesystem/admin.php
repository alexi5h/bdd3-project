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
$label = $this->pluralize($this->class2name($this->modelClass));
?>
$this->menu = array(
    //array('label' => Yii::t('AweCrud.app', 'List') . ' ' . <?php echo $this->modelClass ?>::label(2), 'icon' => 'list', 'url' => array('index')),
    array('label' => "<div>" . CHtml::image(Yii::app()->baseUrl . "/images/topbar/administrar.png") . "</div>" . Yii::t('AweCrud.app', 'Manage'), 'itemOptions' => array('class' => 'active')),
    array('label' => "<div>" . CHtml::image(Yii::app()->baseUrl . "/images/topbar/nuevo.png") . "</div>" . Yii::t('AweCrud.app', 'Create'), 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('<?php echo $this->class2id($this->modelClass); ?>-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<fieldset>
    <legend>
        <?php echo "<?php echo Yii::t('AweCrud.app', 'Manage') ?>" ?> <?php echo "<?php echo {$this->modelClass}::label(2) ?>" ?>
    </legend>

    <div class="well">
    <?php echo "    <?php"; ?> 
        $this->widget('bootstrap.widgets.TbGridView',array(
    'id' => '<?php echo $this->class2id($this->modelClass); ?>-grid',
    'type' => 'striped condensed',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
    <?php
    $count = 0;
    foreach ($this->tableSchema->columns as $column) {
        if ($column->isPrimaryKey || in_array($column->name, $this->descriptionFields)) {
            continue;
        }
        if (++$count == 7):
            ?>
            /*<?php echo "\n" ?>
        <?php endif; ?>
        <?php echo $this->generateGridViewColumn($this->modelClass, $column) . ",\n" ?>
        <?php
    }
    if ($count >= 7):
        ?>
        */<?php echo "\n" ?>
<?php endif; ?>
    array(
    'class' => 'bootstrap.widgets.TbButtonColumn',
    'template' => '{view} {update}'
    ),
    ),
    )); ?>
    </div>
</fieldset>
<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
/** @var AweCrudCode $this */
?>
<?php echo "<?php" . PHP_EOL ?>
/** @var <?php echo $this->controllerClass; ?> $this */
/** @var AweActiveForm $form */
<?php
echo "\$form = \$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'type'=>'horizontal',
	'action' => Yii::app()->createUrl(\$this->route),
	'method' => 'get',
)); ?>\n"
;
?>
<?php $aux = 1; //auxiliar para ver si el campo es par o impar ?>
<?php foreach ($this->tableSchema->columns as $column): ?>
    <?php
    $field = $this->generateInputField($this->modelClass, $column);
    if (strpos($field, 'password') !== false) {
        continue;
    }
    ?>
    <?php if ($aux % 2): //ver elemento es par, creo q si la cantidad de campos es impar no generaria el ultimo </div>  ?>
        <div class="span-12 ">
            <?php echo "<?php echo " . $this->generateActiveField($this->modelClass, $column) . "; ?>\n"; ?>
        <?php else: ?>
            <?php echo "<?php echo " . $this->generateActiveField($this->modelClass, $column) . "; ?>\n"; ?>
        </div>
    <?php endif ?>
    <?php $aux++; ?>
<?php endforeach; ?>
<?php if ($aux % 2==FALSE)    echo('</div>');     ?>
<div class="form-actions">
    <?php echo "<?php \$this->widget('bootstrap.widgets.TbButton', array(
			'type' => 'primary',
			'label' => Yii::t('AweCrud.app', 'Search'),
		)); ?>\n"; ?>
</div>

<?php echo "<?php \$this->endWidget(); ?>\n"; ?>
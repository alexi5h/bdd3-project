<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 * CHANGE LOG:
 * @author Ivan Naranjo <inaranjo@tradesystem.com.ec>
 * @version 0.1
 * @date 2013/06/13
 *  - Agregado 'clientOptions', para que diferencie la validación en el submit y onChange
 *  - Modificación en la función generateActiveField
 */
/** @var AweCrudCode $this */
?>
<div class="form">
    <?php echo "<?php\n" ?>
    /** @var <?php echo $this->controllerClass; ?> $this */
    /** @var <?php echo $this->modelClass; ?> $model */
    /** @var AweActiveForm $form */
    $form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
        'type' => 'horizontal',
        'id' => '<?php echo $this->class2id($this->modelClass) ?>-form',
        'enableAjaxValidation' => <?php echo $this->validation == 1 || $this->validation == 3 ? 'true' : 'false' ?>,
        'clientOptions' => array('validateOnSubmit' => <?php echo $this->validation == 2 || $this->validation == 3 ? 'true' : 'false' ?>, 'validateOnChange' => <?php echo $this->validation == 1 || $this->validation == 3 ? 'true' : 'false' ?>,),
        'enableClientValidation' => <?php echo $this->validation == 2 || $this->validation == 3 ? 'true' : 'false' ?>,
    ));?>

    <?php echo "<?php echo \$form->errorSummary(\$model) ?>\n";
    $aux = 1; //auxiliar para ver si el campo es par o impar
    ?>

    <?php foreach ($this->tableSchema->columns as $column): ?>

        <?php
        if ($column->autoIncrement || in_array($column->name, array_merge($this->create_time, $this->update_time))) {
            continue;
        }
        //skip many to many relations, they are rendered below, this allows handling of nm relationships
        foreach ($this->getRelations() as $relation) {
            if ($relation[2] == $column->name && $relation[0] == 'CManyManyRelation') {
                continue 2;
            }
        }
        ?>
        <?php if ($aux % 2): //ver elemento es par, creo q si la cantidad de campos es impar no generaria el ultimo </div>?>
            <div class="span12 ">
                <?php echo "<?php echo " . $this->generateActiveField($this->modelClass, $column) . " ?>\n"; ?>
        <?php else: ?>
                <?php echo "<?php echo " . $this->generateActiveField($this->modelClass, $column) . " ?>\n"; ?>
            </div>
        <?php endif ?>
        <?php $aux++; ?>
    <?php endforeach; ?>
    <?php if ($aux % 2 == FALSE) echo('</div>'); ?>
    <?php
    foreach ($this->getRelations() as $relatedModelClass => $relation) {
        if ($relation[0] == 'CManyManyRelation') {
            echo "<div class=\"row nm_row\">\n";
            echo $this->getNMField($relation, $relatedModelClass, $this->modelClass);
            echo "</div>\n\n";
        }
    }
    ?>
    <div class="form-actions">
        <?php echo "" ?>
        <?php echo "<?php \$this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>\$model->isNewRecord ? Yii::t('AweCrud.app', 'Create') : Yii::t('AweCrud.app', 'Save'),
		)); ?>\n" ?>
        <?php echo "<?php \$this->widget('bootstrap.widgets.TbButton', array(
			//'buttonType'=>'submit',
			'label'=> Yii::t('AweCrud.app', 'Cancel'),
			'htmlOptions' => array('onclick' => 'javascript:history.go(-1)')
		)); ?>\n" ?>
    </div>

    <?php echo "<?php \$this->endWidget(); ?>\n" ?>
</div>
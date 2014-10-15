<?php

/**
 * This is the model base class for the table "curso_edicion_has_personas".
 * DO NOT MODIFY THIS FILE! It is automatically generated by AweCrud.
 * If any changes are necessary, you must set or override the required
 * property or method in class "CursoEdicionHasPersonas".
 *
 * Columns in table "curso_edicion_has_personas" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $PERSONA_ID
 * @property integer $CURSO_EDICION_ID
 *
 */
abstract class BaseCursoEdicionHasPersonas extends AweActiveRecord {

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'curso_edicion_has_personas';
    }

    public static function representingColumn() {
        return array(
            'PERSONA_ID',
            'CURSO_EDICION_ID',
        );
    }

    public function rules() {
        return array(
            array('PERSONA_ID, CURSO_EDICION_ID', 'required'),
            array('PERSONA_ID, CURSO_EDICION_ID', 'numerical', 'integerOnly'=>true),
            array('PERSONA_ID, CURSO_EDICION_ID', 'safe', 'on'=>'search'),
        );
    }

    public function relations() {
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
                'PERSONA_ID' => Yii::t('app', 'Persona'),
                'CURSO_EDICION_ID' => Yii::t('app', 'Curso Edicion'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('PERSONA_ID', $this->PERSONA_ID);
        $criteria->compare('CURSO_EDICION_ID', $this->CURSO_EDICION_ID);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function behaviors() {
        return array_merge(array(
        ), parent::behaviors());
    }
}
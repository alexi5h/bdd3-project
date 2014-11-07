<?php

/**
 * This is the model base class for the table "faltas_estudiante".
 * DO NOT MODIFY THIS FILE! It is automatically generated by AweCrud.
 * If any changes are necessary, you must set or override the required
 * property or method in class "FaltasEstudiante".
 *
 * Columns in table "faltas_estudiante" available as properties of the model,
 * followed by relations of table "faltas_estudiante" available as properties of the model.
 *
 * @property integer $ID
 * @property integer $NRO_FALTAS
 * @property integer $TOTAL_DIAS_CURSO
 * @property integer $PERSONA_ID
 * @property integer $CURSO_EDICION_ID
 *
 * @property CursoEdicion $cURSOEDICION
 */
abstract class BaseFaltasEstudiante extends AweActiveRecord {

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'faltas_estudiante';
    }

    public static function representingColumn() {
        return 'ID';
    }

    public function rules() {
        return array(
            array('NRO_FALTAS, TOTAL_DIAS_CURSO, PERSONA_ID, CURSO_EDICION_ID', 'required'),
            array('NRO_FALTAS, TOTAL_DIAS_CURSO, PERSONA_ID, CURSO_EDICION_ID', 'numerical', 'integerOnly'=>true),
            array('ID, NRO_FALTAS, TOTAL_DIAS_CURSO, PERSONA_ID, CURSO_EDICION_ID', 'safe', 'on'=>'search'),
        );
    }

    public function relations() {
        return array(
            'cURSOEDICION' => array(self::BELONGS_TO, 'CursoEdicion', 'CURSO_EDICION_ID'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
                'ID' => Yii::t('app', 'ID'),
                'NRO_FALTAS' => Yii::t('app', 'Nro Faltas'),
                'TOTAL_DIAS_CURSO' => Yii::t('app', 'Total Dias Curso'),
                'PERSONA_ID' => Yii::t('app', 'Persona'),
                'CURSO_EDICION_ID' => Yii::t('app', 'Curso Edicion'),
                'cURSOEDICION' => null,
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('ID', $this->ID);
        $criteria->compare('NRO_FALTAS', $this->NRO_FALTAS);
        $criteria->compare('TOTAL_DIAS_CURSO', $this->TOTAL_DIAS_CURSO);
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
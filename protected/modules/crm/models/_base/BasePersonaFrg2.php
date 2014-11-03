<?php

/**
 * This is the model base class for the table "persona_frg2".
 * DO NOT MODIFY THIS FILE! It is automatically generated by AweCrud.
 * If any changes are necessary, you must set or override the required
 * property or method in class "PersonaFrg2".
 *
 * Columns in table "persona_frg2" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $ID
 * @property string $CEDULA
 * @property string $RUC
 * @property string $NOMBRES
 * @property string $APELLIDOS
 * @property string $DIRECCION
 * @property string $TELEFONO
 * @property string $TITULOS_ACADEMICOS
 * @property string $LUGAR_TRABAJO
 * @property integer $TIPO_PERSONA
 * @property integer $NRO_CURSOS_APROBADOS
 *
 */
abstract class BasePersonaFrg2 extends AweActiveRecord {

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'persona_frg2';
    }

    public static function representingColumn() {
        return 'CEDULA';
    }

    public function rules() {
        return array(
            array('ID, CEDULA, NOMBRES, APELLIDOS, DIRECCION, TELEFONO, LUGAR_TRABAJO, TIPO_PERSONA', 'required'),
            array('ID, TIPO_PERSONA, NRO_CURSOS_APROBADOS', 'numerical', 'integerOnly'=>true),
            array('CEDULA, RUC, NOMBRES, TELEFONO, LUGAR_TRABAJO', 'length', 'max'=>20),
            array('APELLIDOS', 'length', 'max'=>45),
            array('DIRECCION', 'length', 'max'=>100),
            array('TITULOS_ACADEMICOS', 'length', 'max'=>70),
            array('RUC, TITULOS_ACADEMICOS, NRO_CURSOS_APROBADOS', 'default', 'setOnEmpty' => true, 'value' => null),
            array('ID, CEDULA, RUC, NOMBRES, APELLIDOS, DIRECCION, TELEFONO, TITULOS_ACADEMICOS, LUGAR_TRABAJO, TIPO_PERSONA, NRO_CURSOS_APROBADOS', 'safe', 'on'=>'search'),
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
                'ID' => Yii::t('app', 'ID'),
                'CEDULA' => Yii::t('app', 'Cedula'),
                'RUC' => Yii::t('app', 'Ruc'),
                'NOMBRES' => Yii::t('app', 'Nombres'),
                'APELLIDOS' => Yii::t('app', 'Apellidos'),
                'DIRECCION' => Yii::t('app', 'Direccion'),
                'TELEFONO' => Yii::t('app', 'Telefono'),
                'TITULOS_ACADEMICOS' => Yii::t('app', 'Titulos Academicos'),
                'LUGAR_TRABAJO' => Yii::t('app', 'Lugar Trabajo'),
                'TIPO_PERSONA' => Yii::t('app', 'Tipo Persona'),
                'NRO_CURSOS_APROBADOS' => Yii::t('app', 'Nro Cursos Aprobados'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('ID', $this->ID);
        $criteria->compare('CEDULA', $this->CEDULA, true);
        $criteria->compare('RUC', $this->RUC, true);
        $criteria->compare('NOMBRES', $this->NOMBRES, true);
        $criteria->compare('APELLIDOS', $this->APELLIDOS, true);
        $criteria->compare('DIRECCION', $this->DIRECCION, true);
        $criteria->compare('TELEFONO', $this->TELEFONO, true);
        $criteria->compare('TITULOS_ACADEMICOS', $this->TITULOS_ACADEMICOS, true);
        $criteria->compare('LUGAR_TRABAJO', $this->LUGAR_TRABAJO, true);
        $criteria->compare('TIPO_PERSONA', $this->TIPO_PERSONA);
        $criteria->compare('NRO_CURSOS_APROBADOS', $this->NRO_CURSOS_APROBADOS);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function behaviors() {
        return array_merge(array(
        ), parent::behaviors());
    }
}
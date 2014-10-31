<?php

/**
 * This is the model base class for the table "banco".
 * DO NOT MODIFY THIS FILE! It is automatically generated by AweCrud.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Banco".
 *
 * Columns in table "banco" available as properties of the model,
 * followed by relations of table "banco" available as properties of the model.
 *
 * @property integer $ID
 * @property string $NRO_CUENTA
 * @property string $TIPO_CUENTA
 * @property string $NOMBRE_BANCO
 * @property string $SALDO
 * @property integer $PERSONA_ID
 *
 * @property BancoDeposito[] $bancoDepositos
 */
abstract class BaseBanco extends AweActiveRecord {

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'banco';
    }

    public static function representingColumn() {
        return 'NRO_CUENTA';
    }

    public function rules() {
        return array(
            array('NRO_CUENTA, TIPO_CUENTA, NOMBRE_BANCO, SALDO, PERSONA_ID', 'required'),
            array('PERSONA_ID', 'numerical', 'integerOnly'=>true),
            array('NRO_CUENTA, NOMBRE_BANCO', 'length', 'max'=>20),
            array('TIPO_CUENTA', 'length', 'max'=>9),
            array('SALDO', 'length', 'max'=>10),
            array('TIPO_CUENTA', 'in', 'range' => array('AHORRO','CORRIENTE')), // enum,
            array('ID, NRO_CUENTA, TIPO_CUENTA, NOMBRE_BANCO, SALDO, PERSONA_ID', 'safe', 'on'=>'search'),
        );
    }

    public function relations() {
        return array(
            'bancoDepositos' => array(self::HAS_MANY, 'BancoDeposito', 'BANCO_ID'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
                'ID' => Yii::t('app', 'ID'),
                'NRO_CUENTA' => Yii::t('app', 'Nro Cuenta'),
                'TIPO_CUENTA' => Yii::t('app', 'Tipo Cuenta'),
                'NOMBRE_BANCO' => Yii::t('app', 'Nombre Banco'),
                'SALDO' => Yii::t('app', 'Saldo'),
                'PERSONA_ID' => Yii::t('app', 'Persona'),
                'bancoDepositos' => null,
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('ID', $this->ID);
        $criteria->compare('NRO_CUENTA', $this->NRO_CUENTA, true);
        $criteria->compare('TIPO_CUENTA', $this->TIPO_CUENTA, true);
        $criteria->compare('NOMBRE_BANCO', $this->NOMBRE_BANCO, true);
        $criteria->compare('SALDO', $this->SALDO, true);
        $criteria->compare('PERSONA_ID', $this->PERSONA_ID);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function behaviors() {
        return array_merge(array(
        ), parent::behaviors());
    }
}
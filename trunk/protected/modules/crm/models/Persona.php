<?php

Yii::import('crm.models._base.BasePersona');

class Persona extends BasePersona {

    /**
     * @return Persona
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function label($n = 1) {
        return Yii::t('app', 'Persona|Personas', $n);
    }

    public function attributeLabels() {
        return array_merge(parent::attributeLabels(), array(
            'CEDULA' => Yii::t('app', 'Cédula'),
            'TELEFONO' => Yii::t('app', 'Teléfono'),
            'DIRECCION' => Yii::t('app', 'Dirección'),
            'LUGAR_TRABAJO' => Yii::t('app', 'Lugar de trabajo o Carrera'),
        ));
    }

}

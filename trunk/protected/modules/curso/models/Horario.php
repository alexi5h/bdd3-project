<?php

Yii::import('curso.models._base.BaseHorario');

class Horario extends BaseHorario {

    private $horario_formato;

    /**
     * @return Horario
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function label($n = 1) {
        return Yii::t('app', 'Horario|Horarios', $n);
    }

//    public static function representingColumn() {
//        return 'HORA_INICIO';
//    }

    public function getHorario_formato() {
        $return = $this->DETALLE . ' -> ' . $this->HORA_INICIO . ' - ' . $this->HORA_FIN;
        $this->horario_formato = $return;
        return $this->horario_formato;
    }

    public function setHorario_formato($horario_formato) {
        $this->horario_formato = $horario_formato;
        return $this->horario_formato;
    }

}

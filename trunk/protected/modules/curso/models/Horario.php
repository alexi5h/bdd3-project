<?php

Yii::import('curso.models._base.BaseHorario');

class Horario extends BaseHorario
{
    /**
     * @return Horario
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Horario|Horarios', $n);
    }

}
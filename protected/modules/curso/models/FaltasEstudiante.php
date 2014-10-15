<?php

Yii::import('curso.models._base.BaseFaltasEstudiante');

class FaltasEstudiante extends BaseFaltasEstudiante
{
    /**
     * @return FaltasEstudiante
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'FaltasEstudiante|FaltasEstudiantes', $n);
    }

}
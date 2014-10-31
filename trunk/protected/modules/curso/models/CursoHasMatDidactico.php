<?php

Yii::import('curso.models._base.BaseCursoHasMatDidactico');

class CursoHasMatDidactico extends BaseCursoHasMatDidactico
{
    /**
     * @return CursoHasMatDidactico
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'CursoHasMatDidactico|CursoHasMatDidacticos', $n);
    }

}
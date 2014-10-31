<?php

Yii::import('curso.models._base.BaseMaterialDidactico');

class MaterialDidactico extends BaseMaterialDidactico
{
    /**
     * @return MaterialDidactico
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Material Didáctico|Materiales Didácticos', $n);
    }

}
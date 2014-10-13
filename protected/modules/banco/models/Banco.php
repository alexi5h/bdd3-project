<?php

Yii::import('banco.models._base.BaseBanco');

class Banco extends BaseBanco
{
    /**
     * @return Banco
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Banco|Bancos', $n);
    }

}
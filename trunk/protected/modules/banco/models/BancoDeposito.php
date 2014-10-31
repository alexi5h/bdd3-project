<?php

Yii::import('banco.models._base.BaseBancoDeposito');

class BancoDeposito extends BaseBancoDeposito
{
    /**
     * @return BancoDeposito
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'BancoDeposito|BancoDepositos', $n);
    }

}
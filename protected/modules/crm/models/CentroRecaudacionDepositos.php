<?php

Yii::import('crm.models._base.BaseCentroRecaudacionDepositos');

class CentroRecaudacionDepositos extends BaseCentroRecaudacionDepositos
{
    /**
     * @return CentroRecaudacionDepositos
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'CentroRecaudacionDepositos|CentroRecaudacionDepositoses', $n);
    }

}
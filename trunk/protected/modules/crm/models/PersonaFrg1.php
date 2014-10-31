<?php

Yii::import('crm.models._base.BasePersonaFrg1');

class PersonaFrg1 extends BasePersonaFrg1
{
    /**
     * @return PersonaFrg1
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'PersonaFrg1|PersonaFrg1s', $n);
    }

}
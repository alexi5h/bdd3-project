<?php

Yii::import('crm.models._base.BasePersonaFrg2');

class PersonaFrg2 extends BasePersonaFrg2
{
    /**
     * @return PersonaFrg2
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'PersonaFrg2|PersonaFrg2s', $n);
    }

}
<?php

Yii::import('curso.models._base.BaseFormulario');

class Formulario extends BaseFormulario
{
    /**
     * @return Formulario
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Formulario|Formularios', $n);
    }

}
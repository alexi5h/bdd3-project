<?php

Yii::import('curso.models._base.BaseCursoEdicion');

class CursoEdicion extends BaseCursoEdicion
{
    /**
     * @return CursoEdicion
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'CursoEdicion|CursoEdicions', $n);
    }

}
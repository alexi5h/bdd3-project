<?php

Yii::import('curso.models._base.BaseCursoEdicionHasPersonas');

class CursoEdicionHasPersonas extends BaseCursoEdicionHasPersonas
{
    /**
     * @return CursoEdicionHasPersonas
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'CursoEdicionHasPersonas|CursoEdicionHasPersonases', $n);
    }

}
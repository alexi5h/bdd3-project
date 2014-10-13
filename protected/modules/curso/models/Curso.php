<?php

Yii::import('curso.models._base.BaseCurso');

class Curso extends BaseCurso
{
    /**
     * @return Curso
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Curso|Cursos', $n);
    }

}
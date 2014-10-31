<?php

Yii::import('curso.models._base.BaseEdicionCurso');

class EdicionCurso extends BaseEdicionCurso
{
    /**
     * @return EdicionCurso
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Edición Curso (PART)|Ediciones Cursos (PART)', $n);
    }

}
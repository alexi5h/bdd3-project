<?php

Yii::import('curso.models._base.BaseEvaluacionEstudiante');

class EvaluacionEstudiante extends BaseEvaluacionEstudiante
{
    /**
     * @return EvaluacionEstudiante
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'EvaluacionEstudiante|EvaluacionEstudiantes', $n);
    }

}
<?php

Yii::import('curso.models._base.BaseCursoEdicion');

class CursoEdicion extends BaseCursoEdicion {

    /**
     * @return CursoEdicion
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function label($n = 1) {
        return Yii::t('app', 'Curso Edición|Curso Ediciones', $n);
    }

    public function relations() {
        return array_merge(parent::relations(), array(
            'curso' => array(self::BELONGS_TO, 'Curso', 'CURSO_ID'),
            'horario' => array(self::BELONGS_TO, 'Horario', 'HORARIO_ID'),
        ));
    }

//    public function attributeLabels() {
//        return array_merge(parent::attributeLabels(), array(
//            'nombre_formato' => Yii::t('app', 'Nombre Completo'),
//                )
//        );
//    }

}

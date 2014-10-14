<?php

/**
 * This is the model base class for the table "curso".
 * DO NOT MODIFY THIS FILE! It is automatically generated by AweCrud.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Curso".
 *
 * Columns in table "curso" available as properties of the model,
 * followed by relations of table "curso" available as properties of the model.
 *
 * @property integer $ID
 * @property string $NOMBRE
 * @property string $CONTENIDO
 * @property string $PRERREQUISITOS
 * @property string $ESPECIALIDAD
 *
 * @property CursoEdicion[] $cursoEdicions
 * @property MaterialDidactico[] $materialDidacticos
 */
abstract class BaseCurso extends AweActiveRecord {

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'curso';
    }

    public static function representingColumn() {
        return 'NOMBRE';
    }

    public function rules() {
        return array(
            array('NOMBRE, CONTENIDO', 'required'),
            array('NOMBRE, ESPECIALIDAD', 'length', 'max'=>20),
            array('CONTENIDO, PRERREQUISITOS', 'length', 'max'=>100),
            array('PRERREQUISITOS, ESPECIALIDAD', 'default', 'setOnEmpty' => true, 'value' => null),
            array('ID, NOMBRE, CONTENIDO, PRERREQUISITOS, ESPECIALIDAD', 'safe', 'on'=>'search'),
        );
    }

    public function relations() {
        return array(
            'cursoEdicions' => array(self::HAS_MANY, 'CursoEdicion', 'CURSO_ID'),
            'materialDidacticos' => array(self::MANY_MANY, 'MaterialDidactico', 'curso_has_mat_didactico(CURSO_ID, MAT_DIDACTICO_ID)'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
                'ID' => Yii::t('app', 'ID'),
                'NOMBRE' => Yii::t('app', 'Nombre'),
                'CONTENIDO' => Yii::t('app', 'Contenido'),
                'PRERREQUISITOS' => Yii::t('app', 'Prerrequisitos'),
                'ESPECIALIDAD' => Yii::t('app', 'Especialidad'),
                'cursoEdicions' => null,
                'materialDidacticos' => null,
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('ID', $this->ID);
        $criteria->compare('NOMBRE', $this->NOMBRE, true);
        $criteria->compare('CONTENIDO', $this->CONTENIDO, true);
        $criteria->compare('PRERREQUISITOS', $this->PRERREQUISITOS, true);
        $criteria->compare('ESPECIALIDAD', $this->ESPECIALIDAD, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function behaviors() {
        return array_merge(array(
        ), parent::behaviors());
    }
}
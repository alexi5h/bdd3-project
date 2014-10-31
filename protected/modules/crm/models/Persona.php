<?php

Yii::import('crm.models._base.BasePersona');

class Persona extends BasePersona {

    /**
     * @return Persona
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function label($n = 1) {
        return Yii::t('app', 'Persona|Personas', $n);
    }

    public function attributeLabels() {
        return array_merge(parent::attributeLabels(), array(
            'CEDULA' => Yii::t('app', 'Cédula'),
            'TELEFONO' => Yii::t('app', 'Teléfono'),
            'DIRECCION' => Yii::t('app', 'Dirección'),
            'LUGAR_TRABAJO' => Yii::t('app', 'Lugar de trabajo o Carrera'),
        ));
    }

    public function guardarImg($id, $data) {
//        $command = Yii::app()->db->createCommand(
//                "UPDATE persona SET FOTO= :foto WHERE ID= :id"
//        );
//        $command->execute(array(':foto' => $data, ':id' => $id));
        //conexion a la base de datos
        mysql_connect("localhost", "root", "") or die(mysql_error());
        mysql_select_db("bdd3-project") or die(mysql_error());
        $resultado = @mysql_query("UPDATE persona SET FOTO= '$data' WHERE ID= '$id'");
    }

}

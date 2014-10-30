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

    public function obtenerImagen() {
//        $command = Yii::app()->db->createCommand()
//                ->select("pe.FOTO")
//                ->from("persona pe")
//                ->where("pe.id = :id");
//        $command->bindValues(array(
//            ':id' => 6
//        ));
//        $resultado=$command->queryAll();
        //vamos a crear nuestra consulta SQL
        //conexion a la base de datos
        mysql_connect("localhost", "root", "") or die(mysql_error());
        mysql_select_db("bdd3-project") or die(mysql_error());

        $consulta = "SELECT FOTO FROM persona WHERE id = 6";
        //con mysql_query la ejecutamos en nuestra base de datos indicada anteriormente
        //de lo contrario mostraremos el error que ocaciono la consulta y detendremos la ejecucion.
        $resultado = @mysql_query($consulta) or die(mysql_error());

        //si el resultado fue exitoso
        //obtendremos el dato que ha devuelto la base de datos
        $datos = mysql_fetch_assoc($resultado);
//        var_dump($datos);
//        die();
        //ruta va a obtener un valor parecido a "imagenes/nombre_imagen.jpg" por ejemplo
        $imagen = $datos['FOTO'];
        $tipo = 'image/jpeg';

        //ahora colocamos la cabeceras correcta segun el tipo de imagen
        header("Content-type: $tipo");

        echo $imagen;
    }

}

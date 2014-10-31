<?php

class PersonaController extends AweController {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';
    public $admin = false;
    public $defaultAction = 'admin';

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Persona;
        $data = null;
        $this->performAjaxValidation($model, 'persona-form');

        if (isset($_POST['Persona'])) {
//            var_dump($_FILES["Persona"]["error"]["FOTO"]);
//            die();
            //comprobamos si ha ocurrido un error.
            if (!isset($_FILES["Persona"]) || $_FILES["Persona"]["error"]["FOTO"] > 0) {
                echo "ha ocurrido un error";
            } else {
                //ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
                //y que el tamano del archivo no exceda los 16MB
                $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
                $limite_kb = 16384;
//                var_dump($_FILES["Persona"]);
//                die();
                if (in_array($_FILES['Persona']['type']["FOTO"], $permitidos) && $_FILES['Persona']['size']["FOTO"] <= $limite_kb * 1024) {
                    //este es el archivo temporal
                    $imagen_temporal = $_FILES['Persona']['tmp_name']["FOTO"];
                    //este es el tipo de archivo
                    $tipo = $_FILES['Persona']['type']["FOTO"];
                    //leer el archivo temporal en binario
                    $fp = fopen($imagen_temporal, 'r+b');
                    $data = fread($fp, filesize($imagen_temporal));
//                    $data=  addslashes($data);
                    fclose($fp);

                    //escapar los caracteres
                    $data = mysql_real_escape_string($data);
//                    var_dump($data);
//                    die();
//                    $resultado = @mysql_query("INSERT INTO imagenes (imagen, tipo_imagen) VALUES ('$data', '$tipo')");
//
//                    if ($resultado) {
//                        echo "el archivo ha sido copiado exitosamente";
//                    } else {
//                        echo "ocurrio un error al copiar el archivo.";
//                    }
                } else {
                    echo "archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes";
                }
            }
            $model->attributes = $_POST['Persona'];

//            $model->FOTO = $data;
//            var_dump($model->FOTO);
//            die();
            if ($model->save()) {
                $id = $model->ID;
                Persona::model()->guardarImg($id, $data);
//                if (isset($_POST['Persona']['cursoEdicions']))
//                    $model->saveManyMany('cursoEdicions', $_POST['Persona']['cursoEdicions']);
                $this->redirect(array('admin'));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        $this->performAjaxValidation($model, 'persona-form');

        if (isset($_POST['Persona'])) {
            $model->attributes = $_POST['Persona'];
            if ($model->save()) {
                if (isset($_POST['Persona']['cursoEdicions']))
                    $model->saveManyMany('cursoEdicions', $_POST['Persona']['cursoEdicions']);
                else
                    $model->saveManyMany('cursoEdicions', array());
                $this->redirect(array('admin'));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Persona('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Persona'])) {
            $model->attributes = $_GET['Persona'];
        }
//        var_dump($model->findAll());
//        die();
        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionImagen($id) {
        mysql_connect("localhost", "root", "") or die(mysql_error());
        mysql_select_db("bdd3-project") or die(mysql_error());

//si la variable imagen no ha sido definida nos dara un advertencia.
//        $id = $_GET['id'];

        if ($id > 0) {
            //vamos a crear nuestra consulta SQL
            $consulta = "SELECT FOTO FROM persona WHERE id = $id";
            //con mysql_query la ejecutamos en nuestra base de datos indicada anteriormente
            //de lo contrario mostraremos el error que ocaciono la consulta y detendremos la ejecucion.
            $resultado = @mysql_query($consulta) or die(mysql_error());

            //si el resultado fue exitoso
            //obtendremos el dato que ha devuelto la base de datos
            $datos = mysql_fetch_assoc($resultado);

            //ruta va a obtener un valor parecido a "imagenes/nombre_imagen.jpg" por ejemplo
            $imagen = $datos['FOTO'];
            $tipo = 'image/jpeg';

            //ahora colocamos la cabeceras correcta segun el tipo de imagen
            header("Content-type: $tipo");

            echo $imagen;
        }
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id, $modelClass = __CLASS__) {
        $model = Persona::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model, $form = null) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'persona-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}

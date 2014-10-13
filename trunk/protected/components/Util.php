<?php

/**
 * Description of Util
 *
 * 
 */
class Util {

    /**
     * fucnion para el guardado de multiples registrsos
     * @param type $inserValues
     * @param type $tableName
     * @return type
     */
    public static function saveBulk($inserValues, $tableName) {
        try {
            $builder = Yii::app()->db->getSchema()->getCommandBuilder();
            $comand = $builder->createMultipleInsertCommand($tableName, $inserValues);
            $countRow = $comand->execute();
            $lastRow = $builder->dbConnection->createCommand('SELECT max(id) FROM ' . $builder->dbConnection->quoteTableName($tableName))->queryScalar();
            $idNewRows = $builder->dbConnection->createCommand()
                    ->select("id")
                    ->from($tableName)
                    ->where("id > :ini and id <= :end", array(
                ':ini' => ((int) $lastRow - $countRow),
                ':end' => (int) $lastRow
            ));
            return $idNewRows->queryColumn();
        } catch (Exception $exc) {
            return array();
        }
    }

    /**
     * Retorna la lista de usuarios con el mismo rol
     * @param type $Rol
     * @return array
     */
    public static function getUsersRol($Rol) {
        $command = Yii::app()->db->createCommand()
                ->select("cu.iduser as id,"
                        . "cu.username as nombre")
                ->from("cruge_authassignment ata")
                ->leftJoin('cruge_user cu', 'ata.userid = cu.iduser')
                ->Where("ata.itemname = :rol", array(':rol' => $Rol));
        return $command->queryAll();
    }

    /**
     * @param type $rolUser
     * @param type $rolPermitido
     * @return boolean
     */
    public static function validarRol($rolUser, $rolPermitido) {

        $acceso = false;
        $cont = 0;
        foreach ($rolUser as $rol) {
            if (count($rolPermitido) == 1) {
                if ($rol['rol'] == $rolPermitido[0]) {
                    $acceso = true;
                    return $acceso;
                }
            } else {
                foreach ($rolPermitido as $rolP) {
                    if ($rol['rol'] == $rolP) {
                        $cont++;
                    }
                }
            }
        }
        if ($cont == count($rolPermitido)) {
            return true;
        }
        return $acceso;
    }

    /**
     * @param type $user_id 'id del usuario'
     * @return string $rol
     */
    public static function getRolUser($user_id) {
        $consulta = Yii::app()->db->createCommand()
                ->select('as.itemname as rol')
                ->from('cruge_authassignment as')
                ->where('(as.userid =:userid)', array(':userid' => $user_id))
                ->queryAll();
        return $consulta;
    }

    /**
     * retona texto truncado en caso de que sea demasiado largo
     * @param string $texto
     * @param int $caracteresPermitidos
     * @return string
     */
    public static function Truncate($texto, $caracteresPermitidos) {
        if (strlen($texto) > $caracteresPermitidos) {
            $texto = substr($texto, 0, $caracteresPermitidos);
            $texto = $texto . '...';
        }
        return $texto;
    }

    /**
     * @param array $elementos 
     * altera el valor en forma acendente desde 0 de una determinada columna
     * @return array $NewArray nuevo array con la columna 'id' con valores desde 0 a $elementos.length
     */
    public static function AlterIdAttrArray($elementos) {
        $NewArray = array();
        foreach ($elementos as $key => $value) {
            $value['id'] = ($key + 1) . '';
            array_push($NewArray, $value);
        }
        return $NewArray;
    }

    /**
     * 
     * @param matriz $arrayInicial
     * @param array $NewKeys las nuevas claves
     * @param array $val los nuevos valores
     * agraga las claves y valores a cara array de la matriz $arrayInicial
     * @return array $NewArray
     */
    public static function AddNewKeyArray($arrayInicial, $NewKeys, $val) {
        $NewArray = array();
        foreach ($arrayInicial as $key => $elemento) {
            for ($i = 0; $i < count($NewKeys); $i++) {

                if ($NewKeys[$i] == 'className') {
                    $elemento[$NewKeys[$i]] = $val[$i] . '_' . $elemento['id'];
                } else {
                    $elemento[$NewKeys[$i]] = $val[$i];
                }
            }
            array_push($NewArray, $elemento);
        }
        return $NewArray;
    }

    /**
     * retona la fecha actual del sistema
     * @return string
     */
    public static function FechaActual() {
        $tz_object = new DateTimeZone('America/Guayaquil');
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
        return $datetime->format('Y-m-d H:i:s');
    }

    /**
     * @param type $fechaAt
     * @param type $tipo
     * @return string
     */
    public static function FormatDate($fechaAt, $tipo) {
        if ($fechaAt) {
            $date = str_replace('/', '-', $fechaAt);
            $fechaAt = date($tipo, strtotime($date));
            return $fechaAt;
        }
    }

    public static function nicetime($date) {
        if ($date) {
            $periods = array("segundo", "minuto", "hora", "día", "semana", "mes", "año");
            $lengths = array("60", "60", "24", "7", "4.35", "12");

            $now = time();
            $unix_date = strtotime($date);

            // is it future date or past date
            if ($now > $unix_date) {
                $difference = $now - $unix_date;
                $tense = "hace";
            } else {
                $difference = $unix_date - $now;
                $tense = "dentro de";
            }

            for ($j = 0; $difference >= $lengths[$j] && $j < count($lengths) - 1; $j++) {
                $difference /= $lengths[$j];
            }

            $difference = round($difference);

            if ($difference != 1) {
                if ($j == 5)
                    $periods[$j].= "es";
                else
                    $periods[$j].= "s";
            }

            return "{$tense} $difference $periods[$j]";
        }
    }

    public static function nicetimeColor($date) {
        if ($date) {
            $now = time();
            $unix_date = strtotime($date);

            // is it future date or past date
            if ($now > $unix_date) {
                return "label-important";
            } else if (($unix_date - $now) == 86400) {
                return "label-warning";
            } else {
                return "label-success";
            }
        }
    }

    /**
     * Revisa si el usuario tiene acceso dependiendo de las operaciones que se envien
     * @param array $operations
     * @return boolean resultado
     */
    public static function checkAccess($operations) {
        if (is_array($operations)) {
            foreach ($operations as $operation) {
                if (Yii::app()->user->checkAccess($operation)) {
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Register a specific js file in the asset's js folder
     * @param string $jsFile
     * @param int $position the position of the JavaScript code.
     * @see CClientScript::registerScriptFile
     */
    public static function tsRegisterAssetJs($jsFile, $position = CClientScript::POS_END) {
        $assetsPath = Yii::getPathOfAlias(YiiBase::app()->getController()->getModule()->getId() . '.assets');
        $assetsUrl = Yii::app()->assetManager->publish($assetsPath, false, -1, true);
        Yii::app()->getClientScript()->registerScriptFile($assetsUrl . "/js/" . YiiBase::app()->getController()->getId() . "/" . $jsFile, $position);
    }

    /**
     * Al buscar cliente/proveedor/distribuidor, me retorn ael id de la columna seleccionada
     * @param type $button
     * @param type $data
     * @return type
     */
    public static function getGridViewId($options, $data) {
        foreach ($options as &$option) {
            if (strpos($option, '$data->') !== false) {
                $propiedad = str_replace('$data->', '', $option);
                $option = $data->$propiedad;
            }
        }
        return $options;
    }

    /**
     * // regresa la cadena sin subguiones("_"), y los convierte en espacios, ademas de poner letra capital
     * @param type $nomre
     */
    public static function setName($nombre) {
        $nombre = str_replace('_', " ", $nombre);
        return ucwords(strtolower($nombre)); //retorna la primera letra de cada palabra en mayusculas
    }

    /**
     * recibe 2 fechas, 1)el tiempo de creacion. 2)El tiempo que toma en resolverse una incidencia y devuelve
     * el tiempo restante para resolverla en horas 
     * @param type $fCreacion
     * @param type $tIncidencia
     * @return type
     */
    //TODO: Borrar en caso que ya no se utilice
    public static function semaforoUtil($fCreacion, $tIncidencia) {
        $tiempo = (strtotime($fCreacion . "+ {$tIncidencia} hour") - strtotime(date("Y-m-d H:i:s"))) / 3600;
        $minutos = round(($tiempo - floor($tiempo)) * 60);
        if ($minutos < 10) {//si los minutos son menores a 10, setear con 0 adelante
            $minutos = "0" . $minutos;
        } else if ($minutos == 60) {
            $minutos = "00";
            $tiempo += 1;
        }
        return floor($tiempo) . "h " . $minutos . "m"; //retorna la diferencia de tiempo en horas y minutos
    }

    /**
     * recive 2 fechas, 1)el tiempo de creacion. 2)El tiempo que toma en resolverse una incidencia y devuelve
     * el tiempo restante para resolverla en horas 
     * @param type $fCreacion
     * @param type $tIncidencia
     * @return type
     */
    public static function semaforo($fGestion) {
        $tiempoDias = (strtotime($fGestion) - strtotime(date("Y-m-d H:i:s"))) / 86400;
        $dias = floor($tiempoDias);
        $tiempoHoras = ($tiempoDias - $dias) * 24;
        $horas = floor($tiempoHoras);
        $minutos = round(($tiempoHoras - $horas) * 60);
        if ($horas == 24 || ($horas == 23 && $minutos == 60)) {
            $horas = "00";
            $minutos = "00";
            $dias += 1;
            $tiempoDias += 1;
        } else if ($minutos == 60) {
            $minutos = "00";
            $horas += 1;
            $tiempoHoras += 1;
        }
//        echo $dias . ", " .$horas . ", " . $minutos."      ";
        if ($tiempoDias >= 0) {
            return (floor($tiempoDias) != 0 ? ($dias . "d ") : "") . (floor($tiempoHoras) != 0 ? ($horas . "h ") : "") . $minutos . "m"; //retorna la diferencia de tiempo en horas y minutos
        } else {
            return "Vencido";
        }
    }

    /**
     * Retorna los años cercanos al año actual
     * @param type $yearsMin
     * @param type $yearsMax
     * @return array
     */
    public static function getYears($yearsMin = 10, $yearsMax = 0) {
        $year = intval(date("Y"));
        $years = array();
        for ($i = $year - $yearsMin; $i <= $year + $yearsMax; $i++) {
            $years[$i] = $i;
        }
        return $years;
    }

    /**
     * exporta una tabla a pdf
     * @param type $pag_render
     * @param array $options
     * @param type $boolean
     * @param Controller $controller
     */
    public static function llamarPdf($controller, $titulo, $pag_render, $options, $boolean, $reporte_nombre) {

        //PDF
        # You can easily override default constructor's params
        $mPDF1 = Yii::app()->ePdf->mpdf('', 'A4');

        # Load a stylesheet
        $stylesheet2 = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/bootstrap.css');
        $stylesheet3 = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/screen.css');
        $mPDF1->WriteHTML($stylesheet2, 1);
        $mPDF1->WriteHTML($stylesheet3, 1);

        # Renders image
        $mPDF1->WriteHTML('<div class="row">');
        $mPDF1->WriteHTML("<div class='span9'");
        $mPDF1->WriteHTML(CHtml::image(Yii::getPathOfAlias('webroot.images') . '/repsol.gif'));
//                . " GAS(GPL)"
        $mPDF1->WriteHTML("</div>");
        $mPDF1->WriteHTML("<table border='0' class='table span3' style='float: left;'>");
        $mPDF1->WriteHTML("<tbody>");
        $mPDF1->WriteHTML("<tr>");
        $mPDF1->WriteHTML("<td>Guayaquil: Edificio San Borondón Business Center, Torre B, piso B oficina 211 </td>");
        $mPDF1->WriteHTML("</tr>");
        $mPDF1->WriteHTML("<tr>");
        $mPDF1->WriteHTML("<td>Quito: Av. 12 de octubre N24-593 y Francisco Salazar, Edif. Plaza 2000</td>");
        $mPDF1->WriteHTML("</tr>");
        $mPDF1->WriteHTML("<tr>");
        $mPDF1->WriteHTML("<td>Tlf: 1-700-Repsolgas (1-700-737765)</td>");
        $mPDF1->WriteHTML("</tr>");
        $mPDF1->WriteHTML("</tbody>");
        $mPDF1->WriteHTML("</table>");
        $mPDF1->WriteHTML("</div>");
        $mPDF1->WriteHTML('<strong style="font-size: 18px;">' . $titulo);
        $mPDF1->WriteHTML("<br>");
        $mPDF1->WriteHTML("<strong>" . Util::traducirFechaActual() . "</strong>");
        //Tabla de datos
        $mPDF1->WriteHTML("<br><br><br>");
        $mPDF1->WriteHTML("<strong>DATOS DEL CLIENTE</strong>");
        $mPDF1->WriteHTML("<table border='1'>");
        $mPDF1->WriteHTML("<tbody>");
        $mPDF1->WriteHTML("<tr>");
        $mPDF1->WriteHTML("<td><strong>NUMERO DE INSTALACION:</strong>&nbsp;" . $options[0] . "</td>");
        $mPDF1->WriteHTML("<td><strong>RAZON SOCIAL:</strong>&nbsp;" . $options[1] . "</td>");
        $mPDF1->WriteHTML("</tr>");
        $mPDF1->WriteHTML("<tr>");
        $mPDF1->WriteHTML("<td><strong>RUC:</strong>&nbsp;" . $options[2] . "</td>");
        $mPDF1->WriteHTML("<td><strong>CODIGO CLIENTE:</strong>&nbsp;" . $options[3] . "</td>");
        $mPDF1->WriteHTML("</tr>");
        $mPDF1->WriteHTML("</tbody>");
        $mPDF1->WriteHTML("</table>");
        $mPDF1->WriteHTML("<br>");
        $mPDF1->WriteHTML("<strong>DETALLE</strong>");
        $mPDF1->WriteHTML("<table border='1'>");
        $mPDF1->WriteHTML("<tbody>");
        $mPDF1->WriteHTML("<tr>");
        $mPDF1->WriteHTML("<td><strong>TIPIFICACION:</strong>&nbsp;" . $options[4] . "</td>");
        $mPDF1->WriteHTML("<td><strong>MOTIVO:</strong>&nbsp;" . $options[5] . "</td>");
        $mPDF1->WriteHTML("</tr>");
        $mPDF1->WriteHTML("<tr>");
        $mPDF1->WriteHTML("<td><strong>SUBMOTIVO:</strong>&nbsp;" . $options[6] . "</td>");
        $mPDF1->WriteHTML("<td><strong>TIEMPO ESTIMADO DE RESOLUCION:</strong>&nbsp;" . $options[7] . " horas </td>");
        $mPDF1->WriteHTML("</tr>");
        $mPDF1->WriteHTML("</tbody>");
        $mPDF1->WriteHTML("</table>");
        $mPDF1->WriteHTML("<br>");
        $mPDF1->WriteHTML("<table border='1'>");
        $mPDF1->WriteHTML("<tbody>");
        $mPDF1->WriteHTML("<tr>");
        $mPDF1->WriteHTML("<td><strong>OBSERVACIONES:</strong>&nbsp;" . $options[8] . "</td>");
        $mPDF1->WriteHTML("</tr>");
        $mPDF1->WriteHTML("</tbody>");
        $mPDF1->WriteHTML("</table>");
        $mPDF1->WriteHTML("<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>");
        $mPDF1->WriteHTML("<table border='0'>");
        $mPDF1->WriteHTML("<tbody>");
        $mPDF1->WriteHTML("<tr>");
        $mPDF1->WriteHTML("<td>______________________________________ </td>");
        $mPDF1->WriteHTML("<td>______________________________________ </td>");
        $mPDF1->WriteHTML("</tr>");
        $mPDF1->WriteHTML("<tr>");
        $mPDF1->WriteHTML("<td><strong>Cliente</strong></td>");
        $mPDF1->WriteHTML('<td><strong>Responsable</strong></td>');
        $mPDF1->WriteHTML("</tr>");
        $mPDF1->WriteHTML("</tbody>");
        $mPDF1->WriteHTML("</table>");
        # Outputs ready PDF
        $mPDF1->WriteHTML($controller->renderPartial($pag_render, $options, $boolean));
        $mPDF1->Output($reporte_nombre . '.pdf', 'D');
//        die();
    }

    /**
     * Transforma un arreglo de objetos ActiveRecord para que se desplieguen en un select de HTML
     * @param type $arrayOptions
     * @return String $options
     */
    public static function toSelectOptions($arrayOptions) {
        $options = array("" => " - Seleccione - ") + CHtml::listData($arrayOptions, 'id', TipificacionIncidencia::representingColumn());
        $htmlOptions = "";
        foreach ($options as $key => $option) {
            $htmlOptions .= '<option value="' . $key . '">' . $option . '</option>';
        }
        return $htmlOptions;
    }

    /**
     * Traduce la fecha actual a español
     * @return type
     */
    public static function traducirFechaActual() {
        $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        return date('d') . " de " . $meses[date('n') - 1] . " del " . date('Y');
    }

    public static function quitarScripts() {
        Yii::app()->clientScript->scriptMap['*.js'] = false;
        Yii::app()->clientScript->scriptMap['*.css'] = false;
    }

    public static function obtenerMeses() {
        return array(
            'Enero',
            'Febrero',
            'Marzo',
            'Abril',
            'Mayo',
            'Junio',
            'Julio',
            'Agosto',
            'Septiembre',
            'Octubre',
            'Noviembre',
            'Diciembre');
    }

    public static function obtenerMesesCortos() {
        return array('Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic');
    }

    public static function obtenerDias() {
        return array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sabado');
    }

    public static function obtenerDiasCortos() {
        return array('Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab');
    }

    public static function obtenerBotonesCalendario() {
        return array(
            'today' => 'hoy',
            'month' => 'mes',
            'week' => 'semana',
            'day' => 'día'
        );
    }

    public static function obtenerColumnasCalendario() {
        return array(
            'week' => 'ddd d',
            'day' => 'dddd',
        );
    }

    public static function obtenerTitulosCalendario() {
        return array(
            'month' => "MMMM yyyy",
            'week' => "MMMM d[, yyyy]{ '-'[ MMMM] d, yyyy}",
            'day' => "dddd d 'de' MMMM, yyyy",
        );
    }

    public static function obtenerPrimerDiaMes() {
        $fecha = new DateTime();

        $fecha->modify('first day of this month');

        $dia = date_format($fecha, 'd');
        return $dia;
    }

    public static function obtenerUltimoDiaMes() {
        $fecha = new DateTime();
        $fecha->modify('last day of this month');
        $fecha->format("Y-m-d");
        $dia = date_format($fecha, 'd');
        return $dia;
    }

    public static function calcularMesAnterior($var = null) {
        $fecha = new DateTime();
        $fecha->modify("-1 month");
        $var == 0 ? $fecha->modify('first day of this month') : $fecha->modify('last day of this month');
        $fecha = date_format($fecha, 'Y-m-d');
        return $fecha;
    }

    public static function calcularSemanaAnterior($var = null) {

        $fecha = new DateTime();
        $fecha->modify("-1 week");
        $dia = DATE_FORMAT($fecha, 'D');
        if ($var == '0') {
            if ($dia == 'Mon') {
                $fecha->modify('monday');
            } else {
                $fecha->modify(' last monday');
            }
        } else {
            $fecha->modify('sunday');
        }


        return date_format($fecha, 'Y-m-d');
    }

    public static function generarColores() {

        $colores = array("rgb(116,183,73)", "rgb(274,70,74)", "rgb(70,191,189)",
            "rgb(253,180,92)", "rgb(77,83,96)", "rgb(70,136,71)", "rgb(78,138,199)",
            "rgb(119,128,138)", "rgb(243,123,83)", "rgb(13,174,211)", "rgb(148,159,167)", "rgb(139,20,15)", "rgb(222,87,123)");



        shuffle($colores);

        return $colores;
    }

    /**
     * Enlista los templates disponibles que tenemos en Mandrill
     * @return type array()
     */
    public static function getTemplatesMandrill() {
        $mandrill = new Mandrill(Constants::KEY_MANDRILLAPP);
        $templates = $mandrill->templates->getList();
        $namesT = array();
        foreach ($templates as $key => $raw) {

            $namesT[$raw['name']] = $raw['name'];
        }
        return $namesT;
    }

    /**
     * Devuelve la tabla de amortización para créditos en MCRMIRA incluido sumas totales
     * @param type $cantidad_total
     * @param type $interes
     * @param type $periodos
     * @return type array()
     */
    public static function calculo_amortizacion($cantidad_total = null, $interes = null, $periodos = null) {
        $tabla = array();
        //Datos de cálculo
        $interes_mensual = ($interes / 12) * 0.01;
        $cuota = ($cantidad_total * $interes_mensual * 100) / (100 * (1 - pow(1 + $interes_mensual, -$periodos)));
        $fecha_temp = date("Y-m-d", strtotime(self::FechaActual() . " +1month"));
        $intereses = $cantidad_total * $interes_mensual;
        $amortizacion = $cuota - $intereses;
        $capital_vivo = $cantidad_total - $amortizacion;

        //Datos suma total
        $sumaInteres = $intereses;
        $sumaCuota = $cuota;
        $sumaAmort = $amortizacion;

        //Llenar tabla
        for ($i = 0; $i < $periodos; $i++) {
            array_push($tabla, array('nro_cuota' => $i + 1, 'fecha_pago' => $fecha_temp, 'cuota' => round($cuota, 2), 'interes' => round($intereses, 2), 'amortizacion' => round($amortizacion, 2), 'mora' => null, 'estado' => null, 'credito_id' => null));
            $fecha_temp = date("Y-m-d", strtotime($fecha_temp . " +1month"));
            if ($i != $periodos - 1) {
                $intereses = $capital_vivo * $interes_mensual;
                $amortizacion = $cuota - $intereses;
                $capital_vivo = $capital_vivo - $amortizacion;
                $sumaInteres += $intereses;
                $sumaCuota += $cuota;
                $sumaAmort += $amortizacion;
            }
        }
        return array('tabla' => $tabla, 'suma_cuota' => round($sumaCuota, 2), 'suma_interes' => round($sumaInteres, 2), 'suma_amortizacion' => round($sumaAmort, 2));
    }

}

?>

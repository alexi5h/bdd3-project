<?php

class Menu {

    private static $_controller;

    public static function getMenu($controller) {
        self::$_controller = $controller;
        $items = array(
            array('label' => '<i class="icon-home"></i> Home', 'url' => Yii::app()->homeUrl),
            array('label' => '<i class="icon-briefcase"></i> ' . Persona::label(2), 'url' => array('/crm/persona/admin'), 'active_rules' => array('module' => 'crm', 'controller' => 'persona')),
            array('label' => '<i class="icon-book"></i> ' . Curso::label(2), 'url' => array('/curso/curso/admin'), 'active_rules' => array('module' => 'curso', 'controller' => 'curso')),
            array('label' => '<i class="icon-book"></i> ' . CursoEdicion::label(2), 'url' => array('/curso/cursoEdicion/admin'), 'active_rules' => array('module' => 'curso', 'controller' => 'cursoEdicion')),
            array('label' => '<i class="icon-book"></i> ' . Horario::label(2), 'url' => array('/curso/horario/admin'), 'active_rules' => array('module' => 'curso', 'controller' => 'horario')),
//            array('label' => '<i class="icon-usd"></i> ' . AhorroRetiro::label(2), 'url' => array('/ahorro/ahorroRetiro/admin'), 'access' => 'action_ahorroRetiro_admin', 'active_rules' => array('module' => 'ahorro', 'controller' => 'ahorroRetiro')),
//            array('label' => '<i class="icon-shopping-cart"></i> '.Credito::label(2), 'url' => array('/credito/credito/admin'), 'access' => 'action_credito_admin', 'active_rules' => array('module' => 'credito', 'controller' => 'credito')),
//            array('label' => '<i class="icon-book"></i>  Pagos', 'url' => '#', 'items' => array(
//                array('label' => '<i class="icon-briefcase"></i> Pagos', 'url' => array('/pagos/pago/admin'), 'access' => 'action_pago_admin', 'active_rules' => array('module' => 'pagos', 'controller' => 'pago')),
//                array('label' => '<i class="icon-briefcase"></i> Depositos', 'url' => array('/pagos/deposito/admin'), 'access' => 'action_deposito_admin', 'active_rules' => array('module' => 'pagos', 'controller' => 'deposito')),
//            )),
//            array('label' => '<i class="icon-group"></i> Contactos', 'url' => array('/crm/contacto/admin'), 'access' => 'action_contacto_admin', 'active_rules' => array('module' => 'crm', 'controller' => 'contacto')),
//            array('label' => '<i class="icon-rocket"></i> Campañas', 'url' => array('/campanias/campania/admin'),'access'=>'action_campania_admin', 'active_rules' => array('module' => 'campanias')),
//            array('label' => '<i class="icon-tags"></i> Oportunidades', 'url' => array('/oportunidades/oportunidad/admin'), 'access' => 'action_oportunidad_admin', 'active_rules' => array('module' => 'oportunidades')),
//            array('label' => '<i class="icon-money"></i> Cobranzas', 'url' => array('/cobranzas/cobranza/admin'), 'access' => 'action_cobranza_admin', 'active_rules' => array('module' => 'cobranzas')),
//            array('label' => '<i class="icon-fire-extinguisher"></i>Incidencias', 'url' => array('/incidencias/incidencia/admin'), 'access' => 'action_incidencia_admin', 'active_rules' => array('module' => 'incidencias', 'controller' => 'incidencia')),
//            array('label' => '<i class="icon-tasks"></i> Tareas', 'url' => array('/tareas/tarea/admin'), 'access' => 'action_tarea_admin', 'active_rules' => array('module' => 'tareas')),
//            array('label' => '<i class="icon-calendar"></i> Calendario', 'url' => array('/eventos/calendario/index'), 'access' => 'action_calendario_index', 'active_rules' => array('module' => 'eventos')),
//            array('label' => '<i class="icon-book"></i>  Reportes', 'url' => '#', 'items' => array(
//                    array('label' => 'Llamadas', 'url' => array('/llamadas/llamadaReporte'), 'access' => 'action_llamadaReporte_admin', 'active_rules' => array('module' => 'llamadas', 'controller' => 'llamadaReporte')),
//                    array('label' => 'Sms', 'url' => array('/sms/reports/reporteSms'), 'access' => 'action_reporteSms_admin', 'active_rules' => array('module' => 'sms', 'controller' => 'reports/reporteSms')),
//                    array('label' => 'Mail', 'url' => array('/mail/mailReporte'), 'access' => 'action_mailReporte_index', 'active_rules' => array('module' => 'mail', 'controller' => 'reports/mailReporte')),
//                )),
//            array('label' => '<i class="icon-fire-extinguisher"></i>Historial Incidencias', 'url' => array('/incidencias/incidencia/historial'), 'access' => 'action_incidencia_historial', 'active_rules' => array('module' => 'incidencias', 'controller' => 'incidencia', 'action' => 'historial'), 'visible' => (Yii::app()->user->checkAccess(Constants::ROL_ESPECIALISTA)) && !Yii::app()->user->checkAccess(Constants::ROL_ESPECIALISTA)),
////            array('label' => '<i class="icon-rocket"></i>  Gestiona Campaña', 'url' => array('/campanias/campania/gestionOperadorAcciones/idCampania/2/'), 'access' => 'action_campania_gestionOperadorAcciones', 'active_rules' => array('module' => 'campanias'),'visible'=>(!Yii::app()->user->isSuperAdmin)&&(Util::validarRol(Util::getRolUser(Yii::app()->user->id), array(Constants::ROL_OPERADOR)))),
//            array('label' => '<i class="icon-rocket"></i>  Gestiona Campaña', 'url' => array('/campanias/campania/campaniasRoles'), 'access' => 'action_campania_campaniasRoles', 'active_rules' => array('module' => 'campanias'),'visible'=>(!Yii::app()->user->isSuperAdmin)&&(Util::validarRol(Util::getRolUser(Yii::app()->user->id), array(Constants::ROL_OPERADOR)))),
//            array('label' => '<i class="icon-globe"></i> Marketing', 'url' => array('/marketing/default/index'), 'active_rules' => array('module' => 'marketing')),
//            array('label' => '<i class="icon-folder-open"></i> Proyectos', 'url' => array('/proyectos/default/index'), 'active_rules' => array('module' => 'proyecto')),
//            array('label' => '<i class="icon-shopping-cart"></i> Productos', 'url' => array('/productos/default/index'), 'active_rules' => array('module' => 'producto')),
//            array('label' => '<i class="icon-truck"></i> Courier', 'url' => array('/courier/default/index'), 'active_rules' => array('module' => 'courier')),
        );

        return self::generateMenu($items);
    }

    public static function getAdminMenu($controller) {
        self::$_controller = $controller;
        $items = array(
            array('label' => '<i class="icon-mail-reply"></i>  Regresar a la App', 'url' => Yii::app()->homeUrl),
//            array('label' => '<i class="icon-user"></i>  Usuarios', 'url' => Yii::app()->user->ui->userManagementAdminUrl, 'access' => 'Cruge.ui.*', 'active_rules' => array('module' => 'cruge')),
//            array('label' => '<i class="icon-map-marker"></i>  Catálogos', 'url' => '#', 'items' => array(
//                    array('label' => 'Provincias', 'url' => array('/crm/provincia/admin'), 'access' => 'action_provincia_admin', 'active_rules' => array('module' => 'crm', 'controller' => 'provincia')),
//                    array('label' => 'Cantones', 'url' => array('/crm/canton/admin'), 'access' => 'action_canton_admin', 'active_rules' => array('module' => 'crm', 'controller' => 'canton')),
//                    array('label' => 'Parroquias', 'url' => array('/crm/parroquia/admin'), 'access' => 'action_parroquia_admin', 'active_rules' => array('module' => 'crm', 'controller' => 'parroquia')),
//                    array('label' => 'Barrios', 'url' => array('/crm/barrio/admin'), 'access' => 'action_barrio_admin', 'active_rules' => array('module' => 'crm', 'controller' => 'barrio')),
//                )),
//            array('label' => '<i class="icon-dollar"></i>  Entidades', 'url' => '#', 'items' => array(
//                    array('label' => 'Entidad Bancaria', 'url' => array('/crm/entidadBancaria/admin'), 'access' => 'action_entidadBancaria_admin', 'active_rules' => array('module' => 'crm', 'controller' => 'entidadBancaria')),
//                    array('label' => 'Sucursal', 'url' => array('/crm/sucursal/admin'), 'access' => 'action_sucursal_admin', 'active_rules' => array('module' => 'crm', 'controller' => 'sucursal')),
//                )),
//            array('label' => '<i class="icon-tasks"></i>  Etapa Registro', 'url' => array('/crm/personaEtapa/admin'), 'access' => 'action_personaEtapa_admin', 'active_rules' => array('module' => 'crm', 'controller' => 'personaEtapa')),
//            array('label' => '<i class="icon-leaf"></i> Actividad Económica', 'url' => array('/crm/actividadEconomica/admin'), 'access' => 'action_actividadEconomica_admin', 'active_rules' => array('module' => 'crm', 'controller' => 'actividadEconomica')),
        );

        return self::generateMenu($items);
    }

    /**
     * Function to create a menu with acces rules and active item
     * @param array $items items to build the menu
     * @return array the formated menu
     */
    private static function generateMenu($items) {
        $menu = array();

        foreach ($items as $k => $item) {
            $access = false;
            $menu_item = $item;

            // Check children access
            if (isset($item['items'])) {
                $menu_item['items'] = array();
                // Check childrens access
                foreach ($item['items'] as $j => $children) {
                    if ($access = Yii::app()->user->checkAccess($children['access'])) {
                        $menu_item['items'][$j] = $children;
                        if (isset($children['active_rules']) && self::getActive2($children['active_rules'])) {
                            $menu_item['items'][$j]['active'] = true;
                            $menu_item['active'] = true;
                        }
                    }
                }
            } else {
                // Check item access
                if (isset($item['access'])) {
                    $access = Yii::app()->user->checkAccess($item['access']);
                } else {
                    $access = true;
                }
                // Check active
                if (isset($item['active_rules'])) {
                    $menu_item['active'] = self::getActive2($item['active_rules']);
                }
            }

            // If acces to the item or any child add to the menu
            if ($access) {
                $menu[] = $menu_item;
            }
        }

        return $menu;
    }

    /**
     * Function to compare the menu active rules with the current url
     * @param array $active_rules the array of rules to compare
     * @return boolean true if the rules match the current url
     */
//    private static function getActive($active_rules) {
//        $current = false;
//
//        if (self::$_controller) {
//            if (is_array(current($active_rules))) {
//                foreach ($active_rules as $rule) {
//                    $operator = isset($rule['operator']) ? $rule['operator'] : '==';
//
//                    if (isset($rule['module']) && self::$_controller->module) {
//                        if ($operator == "==")
//                            $current = self::$_controller->module->id == $rule['module'];
//                        if ($operator == "!=")
//                            $current = self::$_controller->module->id != $rule['module'];
//                    }
//                    if (isset($rule['controller'])) {
//                        if ($operator == "==")
//                            $current = self::$_controller->id == $rule['controller'];
//                        if ($operator == "!=")
//                            $current = self::$_controller->id != $rule['controller'];
//                    }
//                    if (isset($rule['action'])) {
//                        if ($operator == "==")
//                            $current = self::$_controller->action->id == $rule['action'];
//                        if ($operator == "!=")
//                            $current = self::$_controller->action->id != $rule['action'];
//                    }
//
//                    if (!$current)
//                        break;
//                }
//            } else {
//                $operator = isset($active_rules['operator']) ? $active_rules['operator'] : '==';
//
//                if (isset($active_rules['module']) && self::$_controller->module) {
//                    if ($operator == "==")
//                        $current = self::$_controller->module->id == $active_rules['module'];
//                    if ($operator == "!=")
//                        $current = self::$_controller->module->id != $active_rules['module'];
//                }
//                if (isset($active_rules['controller'])) {
//                    if ($operator == "==")
//                        $current = self::$_controller->id == $active_rules['controller'];
//                    if ($operator == "!=")
//                        $current = self::$_controller->id != $active_rules['controller'];
//                }
//                if (isset($active_rules['action'])) {
//                    if ($operator == "==")
//                        $current = self::$_controller->action->id == $active_rules['action'];
//                    if ($operator == "!=")
//                        $current = self::$_controller->action->id != $active_rules['action'];
//                }
//            }
//        }
//        return $current;
//    }


    private static function getActive2($active_rules) {
        $current = false;
        //MODULE
        $module = false;
        //CONTROLLER
        $controller = FALSE;
        //ACTION
        $action = false;
        if (self::$_controller) {
            if (is_array(current($active_rules))) {
                foreach ($active_rules as $rule) {
                    $operator = isset($rule['operator']) ? $rule['operator'] : '==';
                    if (isset($rule['module'])) {
                        if (self::$_controller->module) {
                            $module = self::BooleanOperator($operator, self::$_controller->module->id, $rule['module']);
                        }
                    } else {
                        $module = true;
                    }
                    if (isset($rule['controller'])) {
                        $controller = self::BooleanOperator($operator, self::$_controller->id, $rule['controller']);
                    } else {
                        $controller = true;
                    }
                    if (isset($rule['action'])) {
                        $action = self::BooleanOperator($operator, self::$_controller->action->id, $rule['action']);
                    } else {
                        $action = true;
                    }
                    if (!isset($rule['controller']) && !isset($rule['module']) && !isset($rule['action']))
                        $current = false;
                    else
                        $current = $module && $controller && $action;
                    if (!$current)
                        break;
                }
            } else {
                $operator = isset($active_rules['operator']) ? $active_rules['operator'] : '==';
                if (isset($active_rules['module'])) {
                    if (self::$_controller->module) {
                        $module = self::BooleanOperator($operator, self::$_controller->module->id, $active_rules['module']);
                    }
                } else {
                    $module = true;
                }
                if (isset($active_rules['controller'])) {
                    $controller = self::BooleanOperator($operator, self::$_controller->id, $active_rules['controller']);
                } else {
                    $controller = true;
                }
                if (isset($active_rules['action'])) {
                    $action = self::BooleanOperator($operator, self::$_controller->action->id, $active_rules['action']);
                } else {
                    $action = true;
                }
                if (!isset($active_rules['controller']) && !isset($active_rules['module']) && !isset($active_rules['action']))
                    $current = false;
                else
                    $current = $module && $controller && $action;
//                var_dump($current);
            }
        }
        return $current;
    }

    private static function BooleanOperator($operator, $compare1, $compare2) {
        $result = FALSE;
        if ($operator == "==")
            $result = $compare1 == $compare2;
        if ($operator == "!=")
            $result = $compare1 != $compare2;

        return $result;
    }

}


<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--><html lang="en"> <!--<![endif]-->

    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <!--<link rel="shortcut icon" href="<?php // echo Yii::app()->theme->baseUrl;            ?>/images/favicon.ico" type="image/x-icon">-->
        <!--<link rel="icon" href="<?php // echo Yii::app()->theme->baseUrl;            ?>/images/favicon.ico" type="image/x-icon">-->

        <!-- CSS FILES -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/fonts/font-awesome.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style-responsive.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/jquery.selectBox.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/kanban.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/custom-fixes.css" />
        <!--<link rel="stylesheet" type="text/css" href="<?php // echo Yii::app()->theme->baseUrl;  ?>/css/bootstrap-modal.css" />-->
        <!--<link rel="stylesheet" type="text/css" href="<?php // echo Yii::app()->theme->baseUrl;              ?>/css/reports.css" />-->

        <script>
            var baseUrl = "<?php print Yii::app()->baseUrl . '/'; ?>";
            var themeUrl = "<?php print Yii::app()->theme->baseUrl . '/'; ?>";
            var user_id = "<?php print Yii::app()->user->id; ?>";
        </script>
    </head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body class="fixed-top">

        <!-- BEGIN HEADER -->
        <div id="header" class="navbar navbar-inverse navbar-fixed-top">
            <!-- BEGIN TOP NAVIGATION BAR -->
            <div class="navbar-inner">
                <div class="container-fluid">
                    <!--BEGIN SIDEBAR TOGGLE-->
                    <div class="sidebar-toggle-box hidden-phone">
                        <div class="icon-reorder"></div>
                    </div>
                    <!--END SIDEBAR TOGGLE-->
                    <!-- BEGIN LOGO -->
                    <a class="brand" href="<?php echo Yii::app()->homeUrl ?>">
                        <!--<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/logo.png" alt="Rio Mira" />-->
                    </a>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="arrow"></span>
                    </a>

                    <div class="top-nav">

                        <ul class="nav pull-right top-menu notify-row">
                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle link-current-user" data-toggle="dropdown">
                                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/demo/avatar1_small.jpg" alt="">
                                    <span class="username"><?php echo Yii::app()->user->name ? Yii::app()->user->name : "Guest" ?></span>
                                    <b class="caret"></b>
                                </a>

                                
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                        </ul>
                        <!-- END TOP NAVIGATION MENU -->
                    </div>
                </div>
            </div>
            <!-- END TOP NAVIGATION BAR -->
        </div>
        <!-- END HEADER -->


        <!-- BEGIN CONTAINER -->
        <div id="container" class="row-fluid">
            <!-- BEGIN SIDEBAR -->
            <div class="sidebar-scroll">

                <div id="sidebar" class="nav-collapse collapse">
                    <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                    <div class="navbar-inverse">
                        <form class="navbar-search visible-phone">
                            <input type="text" class="search-query" placeholder="Search" />
                        </form>
                    </div>
                    <!-- END RESPONSIVE QUICK SEARCH FORM -->
                    <!-- BEGIN SIDEBAR MENU -->
                    <?php
                    $this->widget('zii.widgets.CMenu', array(
                        'items' => $this->admin ? Menu::getAdminMenu($this) : Menu::getMenu($this),
                        'encodeLabel' => false,
                        'itemCssClass' => 'sub-menu',
                        'activeCssClass' => 'active',
                        'htmlOptions' => array('class' => 'sidebar-menu'),
                        'submenuHtmlOptions' => array('class' => 'sub')
                    ));
                    ?>
                    <!-- END SIDEBAR MENU -->
                </div>
            </div>
            <!-- END SIDEBAR -->

            <!-- BEGIN PAGE -->  
            <div id="main-content">
                <!-- BEGIN PAGE CONTAINER-->
                <div class="container-fluid">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- FLASH MESSAGES -->
                    <div class="row-fluid">
                        <div id="maiMessages" class="flash-messages">
                            <?php
                            $messages = Yii::app()->user->getFlashes();
                            if ($messages) {
                                foreach ($messages as $key => $message) {
                                    echo '<div class="alert alert-' . $key . '">'
                                    . '<button data-dismiss="alert" class="close" type="button">×</button>'
                                    . $message . "</div>\n";
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <!-- END PAGE HEADER-->

                    <!-- BEGIN PAGE CONTENT-->
                    <div class="row-fluid">
                        <?php echo $content; ?>
                    </div>
                    <!-- END PAGE CONTENT-->    
                    <?php ?>
                </div>
                <!-- END PAGE CONTAINER-->
            </div>
            <!-- END PAGE -->  
        </div>
        <!-- END CONTAINER -->

        <!-- MAIN MODAL -->
        <div class="row-fluid">
            <?php
// El modal de la página
            $this->beginWidget('bootstrap.widgets.TbModal', array('id' => 'mainModal', 'options' => array('backdrop' => 'static')));
            $this->endWidget();
            ?>
        </div>
        <div class="row-fluid">
            <?php
// El modal de la página
            $this->beginWidget('ext.bootstrap.widgets.TbModal', array('id' => 'mainBigModal', 'options' => array('backdrop' => 'static')));
            $this->endWidget();
            ?>
        </div>

        <!-- END MAIN MODAL -->

        <!-- BEGIN FOOTER -->
        <div id="footer">
            <?php echo date('Y') ?> &copy; Universidad T&eacute;cnica del Norte
        </div>
        <!-- END FOOTER -->

        <!-- BEGIN JAVASCRIPTS -->
        <!-- Load javascripts at bottom, this will reduce page load time -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.selectBox.js" type="text/javascript"></script>
        <!--<script src="<?php // echo Yii::app()->theme->baseUrl;              ?>/js/_alerta.js" type="text/javascript"></script>-->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.mask.min.js" type="text/javascript"></script>
        <!--<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap-modal.js" type="text/javascript"></script>-->
        <!--<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap-modalmanager.js" type="text/javascript"></script>-->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.validateAjax.js" type="text/javascript"></script>
        <!--scroll infinito-->
        <!--<script src="<?php // echo Yii::app()->theme->baseUrl;              ?>/js/jquery-ias.min.js" type="text/javascript"></script>--> 

        <!--//        common script for all pages-->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/common-scripts.js"></script>

        <!-- END JAVASCRIPTS -->   

    </body>
    <!-- END BODY -->
</html>
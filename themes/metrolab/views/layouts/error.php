<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/images/favicon.ico" type="image/x-icon">
   
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/fonts/font-awesome.css" />
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" rel="stylesheet" />
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style-responsive.css" rel="stylesheet" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body>
    <div class="lock-header">
        <!-- BEGIN LOGO -->
        <a class="center" id="logo" href="index.html">
            <img class="center" alt="logo" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/logo.png" width="200">
        </a>
        <!-- END LOGO -->
    </div>
    
    <?php echo $content ?>
</body>
<!-- END BODY -->
</html>
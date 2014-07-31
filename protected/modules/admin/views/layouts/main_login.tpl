<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title>{Yii::app()->name} - Вход в систему</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="{Yii::app()->request->baseUrl}/bootstrap/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="{Yii::app()->request->baseUrl}/bootstrap/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
    <link href="{Yii::app()->request->baseUrl}/bootstrap/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="{Yii::app()->request->baseUrl}/bootstrap/css/style-metro.css" rel="stylesheet" type="text/css"/>
    <link href="{Yii::app()->request->baseUrl}/bootstrap/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="{Yii::app()->request->baseUrl}/bootstrap/css/style-responsive.css" rel="stylesheet" type="text/css"/>
    <link href="{Yii::app()->request->baseUrl}/bootstrap/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="{Yii::app()->request->baseUrl}/bootstrap/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{Yii::app()->request->baseUrl}/bootstrap/plugins/select2/select2_metro.css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{Yii::app()->request->baseUrl}/bootstrap/css/pages/login.css" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL STYLES -->
    <link rel="shortcut icon" href="favicon.ico" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN LOGO -->
<div class="logo">
    <img src="{Yii::app()->request->baseUrl}/bootstrap/img/logoSparta.png" alt="" />
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
  {$content}
</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<div class="copyright">
    2013 &copy; Websparta.
</div>
<!-- END COPYRIGHT -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<script src="{Yii::app()->request->baseUrl}/bootstrap/plugins/jquery-1.10.1.min.js" type="text/javascript"></script>
<script src="{Yii::app()->request->baseUrl}/bootstrap/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="{Yii::app()->request->baseUrl}/bootstrap/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="{Yii::app()->request->baseUrl}/bootstrap/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{Yii::app()->request->baseUrl}/bootstrap/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
<!--[if lt IE 9]>
<script src="{Yii::app()->request->baseUrl}/bootstrap/plugins/excanvas.min.js"></script>
<script src="{Yii::app()->request->baseUrl}/bootstrap/plugins/respond.min.js"></script>
<![endif]-->
<script src="{Yii::app()->request->baseUrl}/bootstrap/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="{Yii::app()->request->baseUrl}/bootstrap/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="{Yii::app()->request->baseUrl}/bootstrap/plugins/jquery.cookie.min.js" type="text/javascript"></script>
<script src="{Yii::app()->request->baseUrl}/bootstrap/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{Yii::app()->request->baseUrl}/bootstrap/plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript" src="{Yii::app()->request->baseUrl}/bootstrap/plugins/select2/select2.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{Yii::app()->request->baseUrl}/bootstrap/scripts/app.js" type="text/javascript"></script>
<script src="{Yii::app()->request->baseUrl}/bootstrap/scripts/login.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
    jQuery(document).ready(function() {
        App.init();
        Login.init();
    });
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
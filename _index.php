<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/../yii/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
require_once($yii);
Yii::createWebApplication($config)->run();
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo CHtml::encode(Yii::app()->name); ?></title>
	
    <!-- Reset -->
    <link rel="stylesheet" type="text/css" href="cupcake/style/reset.css" /> 
    <!-- Main Style File -->
    <link rel="stylesheet" type="text/css" href="cupcake/style/root.css" /> 
    <!-- Grid Styles -->
    <link rel="stylesheet" type="text/css" href="cupcake/style/grid.css" /> 
    <!-- Typography Elements -->
    <link rel="stylesheet" type="text/css" href="cupcake/style/typography.css" /> 
    <!-- Jquery UI -->
    <link rel="stylesheet" type="text/css" href="cupcake/style/jquery-ui.css" />
    <!-- Jquery Plugin Css Files Base -->
    <link rel="stylesheet" type="text/css" href="cupcake/style/jquery-plugin-base.css" />
    
    <!--[if IE 7]>	  <link rel="stylesheet" type="text/css" href="cupcake/style/ie7-style.css" />	<![endif]-->
    
    <!-- jquery base -->
	<script type="text/javascript" src="cupcake/js/jquery.min.js"></script>
	<script type="text/javascript" src="cupcake/js/jquery-ui-1.8.11.custom.min.js"></script>
    <!-- jquery plugins settings -->
	<script type="text/javascript" src="cupcake/js/jquery-settings.js"></script>
    <!-- toggle -->
	<script type="text/javascript" src="cupcake/js/toogle.js"></script>
    <!-- tipsy -->
	<script type="text/javascript" src="cupcake/js/jquery.tipsy.js"></script>
    <!-- uniform -->
	<script type="text/javascript" src="cupcake/js/jquery.uniform.min.js"></script>
    <!-- Jwysiwyg editor -->
	<script type="text/javascript" src="cupcake/js/jquery.wysiwyg.js"></script>
    <!-- table shorter -->
	<script type="text/javascript" src="cupcake/js/jquery.tablesorter.min.js"></script>
    <!-- raphael base and raphael charts -->
	<script type="text/javascript" src="cupcake/js/raphael.js"></script>
	<script type="text/javascript" src="cupcake/js/analytics.js"></script>
	<script type="text/javascript" src="cupcake/js/popup.js"></script>
    <!-- fullcalendar -->
	<script type="text/javascript" src="cupcake/js/fullcalendar.min.js"></script>
    <!-- prettyPhoto -->
	<script type="text/javascript" src="cupcake/js/jquery.prettyPhoto.js"></script>
    <!-- Jquery.UI Base -->
	<script type="text/javascript" src="cupcake/js/jquery.ui.core.js"></script>
	<script type="text/javascript" src="cupcake/js/jquery.ui.mouse.js"></script>
	<script type="text/javascript" src="cupcake/js/jquery.ui.widget.js"></script>
    <!-- Slider -->
	<script type="text/javascript" src="cupcake/js/jquery.ui.slider.js"></script>
    <!-- Date Picker -->
	<script type="text/javascript" src="cupcake/js/jquery.ui.datepicker.js"></script>
    <!-- Tabs -->
	<script type="text/javascript" src="cupcake/js/jquery.ui.tabs.js"></script>
    <!-- Accordion -->
	<script type="text/javascript" src="cupcake/js/jquery.ui.accordion.js"></script>
    <!-- Google Js Api / Chart and others -->
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <!-- Date Tables -->
	<script type="text/javascript" src="cupcake/js/jquery.dataTables.js"></script>
	
        
    
</head>
<body>


	
    <div class="loginform">
    	<div class="title"> <img src="cupcake/img/logo.png" width="112" height="35" /></div>
        <div class="body">
       	  <form id="form1" name="form1" method="post" action="index.html">
          	<label class="log-lab">Username</label>
            <input name="textfield" type="text" class="login-input-user" id="textfield" value="Admin"/>
          	<label class="log-lab">Password</label>
            <input name="textfield" type="password" class="login-input-pass" id="textfield" value="Password"/>
            <input type="submit" name="button" id="button" value="Login" class="button"/>
       	  </form>
        </div>
    </div>
    
    
    
    





</div>
</body>
</html>

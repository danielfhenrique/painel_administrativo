<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/../yii_cms/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
require_once 'protected/components/Tools.php';

$WebApp = Yii::createWebApplication($config);
//Tools::var_dump(Yii::app()->user);
if(!Yii::app()->user->getIsGuest())
	$WebApp->run();

$erro = "";
if(isset($_GET['error']))
	if($_GET['error']==true)
		$erro = '<span class="st-form-error" style="margin-left:0;">*Usuário ou senha inválido.</span>';
//Tools::var_dump($erro);
if(count($_POST))
	$WebApp->runController('site/login');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cupcake Premium Admin Template</title>
	
 <?php include("protected/views/layouts/head.php"); ?>
        
</head>
<body>

    <div class="loginform">
    	<div class="title"> <img src="<?php echo Yii::app()->request->baseUrl.'/'.CHtml::encode(Yii::app()->params->configLayout['imgLogo']); ?>" width="112" height="35" /></div>
        <div class="body">
       	  <form id="form1" name="form1" method="post" action="">
          	<label class="log-lab">Username</label>
            <input name="username" type="text" class="login-input-user" id="txt_log_usuario" value="Usuário"/>
          	<label class="log-lab">Password</label>
            <input name="password" type="password" class="login-input-pass" id="txt_log_senha" value="Senha"/>
            <?php echo $erro; ?>
            <input type="submit" name="button" id="button" value="Login" class="button"/>
       	  </form>
        </div>
    </div>
    
</div>
</body>
</html>
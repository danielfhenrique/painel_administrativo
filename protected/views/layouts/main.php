<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo CHtml::encode(Yii::app()->name); ?></title>
	
        <?php include("head.php"); ?>
    
</head>
<body>
<div class="wrapper">


	<!-- START HEADER -->
    <div id="header">
    
    	<?php include("header.php"); ?>
    
    </div>
    <!-- END HEADER -->
    
    
        <?php echo $content; ?>
     
    
    
    <!-- START FOOTER -->
    <div id="footer">
			<?php include("footer.php"); ?>
    </div>
    <!-- END FOOTER -->
    

</div>
</body>
</html>

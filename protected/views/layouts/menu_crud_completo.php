<?php 
	$base_url = Yii::app()->request->baseUrl; 
	$admin_path = $menu_path['admin'];
	$create_path = $menu_path['create'];
?>

								<div class="shortcuts-icons">
								<a class="shortcut tips" href="#" title="Refresh"><img src="<?php echo $base_url.'/cupcake/img/icons/shortcut/'; ?>refresh.png" width="25" height="25" alt="icon" /></a>
								<a class="shortcut tips" href="<?php  echo $base_url;?>" title="Dashboard"><img src="<?php echo $base_url.'/cupcake/img/icons/shortcut/'; ?>dashboard.png" width="25" height="25" alt="icon" /></a>
								<a class="shortcut tips" href="<?php  echo $base_url.'/'.$create_path;?>" title="Add Categoria"><img src="<?php echo $base_url.'/cupcake/img/icons/shortcut/'; ?>plus.png" width="25" height="25" alt="icon" /></a>
								<a class="shortcut tips" href="<?php  echo $base_url.'/'.$admin_path;?>" title="Search on This Page"><img src="<?php echo $base_url.'/cupcake/img/icons/shortcut/'; ?>search.png" width="25" height="25" alt="icon" /></a>
								 
								</div>

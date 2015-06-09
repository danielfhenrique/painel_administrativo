
	<!-- start searchbox -->
	<div id="searchbox">
		<div class="in">
			<form id="form1" name="form1" method="post" action="">
				<input name="textfield" type="text" class="input" id="textfield" onfocus="$(this).attr('class','input-hover')" onblur="$(this).attr('class','input')"  />
			</form>
        </div>
	</div>
	<!-- end searchbox -->

	<!-- start sidemenu -->
	<div id="sidemenu">
		<ul>
		<?php 
			$base_url = Yii::app()->request->baseUrl;
			foreach ($obj_sidebar as $item){
				
				$categoria 		= $item["categoria"];
				$menu_principal = $item["menu_principal"];
				$itens_menu 	= $item["itens_menu"];
				$icon 			= "";
				
				if(isset($menu_principal))
					$icon = $base_url.'/images/icons/sidemenu/'.$menu_principal->icon;
		?>
		
				<li class="subtitle"><a class="action tips-right" href="#" title="Submenu with icon"><img src="<?php echo $icon; ?>" width="16" height="16"/><?php echo $categoria->nome;?><img src="<?php echo $base_url.'/cupcake/img/arrow-down.png'; ?>" width="7" height="4" alt="arrow" class="arrow" /></a>
					<ul class="submenu" style="display: block" >
					
					<?php if($itens_menu != "")
							foreach ($itens_menu as $item_menu){ ?>
								<li><a href="<?php echo $base_url.'/'.$item_menu->link?>"><img src="<?php echo $base_url.'/images/icons/sidemenu/'.$item_menu->icon; ?>" width="16" height="16" alt="icon"/><?php echo $item_menu->nome; ?></a></li>
					<?php 	} ?>
					
					</ul>
				</li>
		<?php } ?>	
							
	    </ul>
    </div>
    <!-- end sidemenu -->
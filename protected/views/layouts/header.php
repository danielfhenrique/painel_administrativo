	
    	<!-- logo -->
    	<div class="logo">	<a href="index.html"><img src="<?php echo Yii::app()->request->baseUrl; ?>/<?php echo CHtml::encode(Yii::app()->params->configLayout['imgLogo']); ?>" width="112" height="35" alt="logo"/></a>	</div>
        
        
        <!-- notifications -->
        <div id="notifications" style="display: <?php echo CHtml::encode(Yii::app()->params->configLayout['showNotifications']); ?>">
        	<a href="index.html" class="qbutton-left"><img src="<?php echo Yii::app()->request->baseUrl; ?>/cupcake/img/icons/header/dashboard.png" width="16" height="15" alt="dashboard" /></a>
        	<a href="#" class="qbutton-normal tips"><img src="<?php echo Yii::app()->request->baseUrl; ?>/cupcake/img/icons/header/message.png" width="19" height="13" alt="message" /> <span class="qballon">23</span> </a>
        	<a href="#" class="qbutton-right"><img src="<?php echo Yii::app()->request->baseUrl; ?>/cupcake/img/icons/header/support.png" width="19" height="13" alt="support" /> <span class="qballon">8</span> </a>
          <div class="clear"></div>
        </div>
        
        
        <!-- quick menu -->
        <div id="quickmenu" style="display: <?php echo CHtml::encode(Yii::app()->params->configLayout['showQuickMenu']); ?>">
        	<a href="#" class="qbutton-left tips" title="Add a new post"><img src="<?php echo Yii::app()->request->baseUrl; ?>/cupcake/img/icons/header/newpost.png" width="18" height="14" alt="new post" /></a>
        	<a id="open-stats" href="#" class="qbutton-right tips" title="Statistics"><img src="<?php echo Yii::app()->request->baseUrl; ?>/cupcake/img/icons/header/graph.png" width="17" height="15" alt="graph" /></a>
            <div class="clear"></div>
        </div>
        
        
        <!-- profile box -->
        <div id="profilebox" style="display: <?php echo CHtml::encode(Yii::app()->params->configLayout['showProfileBox']); ?>">
        	<a href="#" class="display">
            	<img src="<?php echo Yii::app()->request->baseUrl; ?>/cupcake/img/simple-profile-img.jpg" width="33" height="33" alt="profile"/>	<b>Logado como</b>	<span>Administrador</span>
            </a>
            
            <div class="profilemenu">
            	<ul>
                	<li><a href="#">Account Settings</a></li>
                	<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/logout">Logout</a></li>
                </ul>
            </div>
            
        </div>
        
        
        <div class="clear"></div>

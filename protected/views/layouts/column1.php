
        
<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
        
        <!-- START SIDEBAR -->
        <div id="sidebar">
        	
            <?php echo $sidebar;
             //include("sidebar.php"); ?>
            
        </div>
        <!-- END SIDEBAR -->
        
        
    <!-- START MAIN -->
    <div id="main">
    
    	<!-- START PAGE -->
        <div id="page"> 
			<div id="content">
				<?php echo $content; ?>
			</div><!-- content -->

        </div>
        <!-- END PAGE -->  
           
    <div class="clear"></div>
    </div>
    <!-- END MAIN -->
<?php $this->endContent(); ?>
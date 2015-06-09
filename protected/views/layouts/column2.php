<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div id="sidebar">
	<?php
		echo $sidebar;		
	?>
</div><!-- sidebar -->

<div class="span-5 last">
	<!-- <div id="sidebar"> -->
	<?php
		//echo $sidebar;
		//*
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Operations',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
		//*/
	?>
	<!-- </div> --><!-- sidebar -->
</div>

<div class="span-19">
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
</div>

<?php $this->endContent(); ?>
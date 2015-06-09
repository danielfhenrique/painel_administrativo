
<?php
/* @var $this DevMenuController */
/* @var $model DevMenu */
/* @var $form CActiveForm */
?>

<div class="form" style="margin: 20px 24px;border:1px solid #ccc">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'dev-menu-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="st-form-line" style="z-index: 680;">
		<span class="st-labeltext"><?php echo $label_colunas['nome']?></span>
		<?php echo $form->textField($model,'nome',array('style'=>'width:510px','size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'nome'); ?>
	</div>

	<div class="st-form-line" style="z-index: 680;">
		<span class="st-labeltext"><?php echo $label_colunas['id_menu_categoria']?></span>
		<?php echo $form->dropDownList($model,'id_menu_categoria',$DropDownListData['id_menu_categoria'],array('style'=>'width:510px')); ?>
		<?php echo $form->error($model,'id_menu_categoria'); ?>
	</div>

	<div class="st-form-line" style="z-index: 680;">
		<span class="st-labeltext"><?php echo $label_colunas['id_menu_pai']?></span>
		<?php echo $form->dropDownList($model,'id_menu_pai',$DropDownListMenus,array('style'=>'width:510px')); ?>
		<?php echo $form->error($model,'id_menu_pai'); ?>
	</div>

	<div class="st-form-line" style="z-index: 680;">
		<span class="st-labeltext"><?php echo $label_colunas['id_menu_filho']?></span>
		<?php echo $form->dropDownList($model,'id_menu_filho',$DropDownListMenus,array('style'=>'width:510px')); ?>
		<?php echo $form->error($model,'id_menu_filho'); ?>
	</div>
 	<!-- This is uniform upload input -->
   	<div class="st-form-line">	
        <span class="st-labeltext"><?php echo $label_colunas['icon']?></span>	
        <?php echo $form->fileFieldCustom($model,'icon',array('onblur'=>'$(\'#DevMenu_icon\').val($(\'.filename\').html())')); ?>
        <?php echo $form->error($model,'icon'); ?>
        <div class="clear"></div> 
    </div>
	
	<div class="st-form-line" style="z-index: 680;">
		<span class="st-labeltext"><?php echo $label_colunas['ordem']?></span>
		<?php echo $form->textField($model,'ordem',array('style'=>'width:510px','size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'ordem'); ?>
	</div>

	<div class="row buttons">
		<?php $button_attr = array("class"=>"button-aqua",'style'=>'float:right;margin:20px 0;width:116px;'); ?>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Criar' : 'Alterar',$button_attr); ?>
	</div>

<?php $this->endWidget(); ?>
	
</div><!-- form -->
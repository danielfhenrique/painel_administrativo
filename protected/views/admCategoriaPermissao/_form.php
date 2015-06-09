
<?php
/* @var $this AdmCategoriaPermissaoController */
/* @var $model AdmCategoriaPermissao */
/* @var $form CActiveForm */
?>

<div class="form" style="margin: 20px 24px;border:1px solid #ccc">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'adm-categoria-permissao-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="st-form-line" style="z-index: 680;">
		<span class="st-labeltext"><?php echo $label_colunas['id_usuario_tipo']?></span>
		<?php echo $form->dropDownList($model,'id_usuario_tipo',$DropDownListData['id_usuario_tipo'],array('style'=>'width:510px')); ?>
		<?php echo $form->error($model,'id_usuario_tipo'); ?>
	</div>

	<div class="st-form-line" style="z-index: 680;">
		<span class="st-labeltext"><?php echo $label_colunas['id_menu_categoria']?></span>
		<?php echo $form->dropDownList($model,'id_menu_categoria',$DropDownListData['id_menu_categoria'],array('style'=>'width:510px')); ?>
		<?php echo $form->error($model,'id_menu_categoria'); ?>
	</div>

	<div class="row buttons">
		<?php $button_style = array("class"=>"button-aqua",'style'=>'float:right;margin:20px 0;width:116px;'); ?>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Criar' : 'Alterar',$button_style); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
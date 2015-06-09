
<?php
/* @var $this DevMenuCategoriaController */
/* @var $model DevMenuCategoria */
/* @var $form CActiveForm */
?>

<div class="form" style="margin: 20px 24px;border:1px solid #ccc">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'dev-menu-categoria-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="st-form-line" style="z-index: 680;">
		<span class="st-labeltext">nome</span>
		<?php echo $form->textField($model,'nome',array('style'=>'width:510px','size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'nome'); ?>
	</div>

	<div class="st-form-line" style="z-index: 680;">
		<span class="st-labeltext">ordem</span>
		<?php echo $form->textField($model,'ordem',array('style'=>'width:510px','size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'ordem'); ?>
	</div>

	<div class="row buttons">
		<?php $button_style = array("class"=>"button-aqua",'style'=>'float:right;margin:20px 0;width:116px;'); ?>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Criar' : 'Alterar',$button_style); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
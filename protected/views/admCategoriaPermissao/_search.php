<?php
/* @var $this AdmCategoriaPermissaoController */
/* @var $model AdmCategoriaPermissao */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_usuario_tipo'); ?>
		<?php echo $form->textField($model,'id_usuario_tipo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_menu_categoria'); ?>
		<?php echo $form->textField($model,'id_menu_categoria'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
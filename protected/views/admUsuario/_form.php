
<?php
/* @var $this AdmUsuarioController */
/* @var $model AdmUsuario */
/* @var $form CActiveForm */
?>

<div class="form" style="margin: 20px 24px;border:1px solid #ccc">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'adm-usuario-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="st-form-line" style="z-index: 680;">
		<span class="st-labeltext"><?php echo $label_colunas['nome']?></span>
		<?php echo $form->textField($model,'nome',array('style'=>'width:510px','size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'nome'); ?>
	</div>

	<div class="st-form-line" style="z-index: 680;">
		<span class="st-labeltext"><?php echo $label_colunas['username']?></span>
		<?php echo $form->textField($model,'username',array('style'=>'width:510px','size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="st-form-line" style="z-index: 680;display:<?php echo ($model->isNewRecord) ? 'none' : 'block';?>">
		<span class="st-labeltext" >Resetar Senha</span>
		<p class="field switch" style="  padding: 0 20px 32px">
        	<label for="radio1" onClick="$('#campo_senha').css('display','none')" class="cb-enable selected"><span>Não</span></label>
            <label for="radio2" onClick="$('#campo_senha').css('display','block')" class="cb-disable"><span>Sim</span></label>
        </p> 
	</div>
	
	<div class="st-form-line" id="campo_senha" style="z-index: 680;display:<?php echo ($model->isNewRecord) ? 'block' : 'none';?>">
		<span class="st-labeltext"><?php echo $label_colunas['senha']?></span>
		<?php echo $form->textField($model,'senha',array('style'=>'width:510px','size'=>30,'maxlength'=>30,'value'=>"")); ?>
		<?php echo $form->error($model,'senha'); ?>
	</div>

	<div class="st-form-line" style="z-index: 680;">
		<span class="st-labeltext"><?php echo $label_colunas['id_usuario_tipo']?></span>
		<?php echo $form->dropDownList($model,'id_usuario_tipo',$DropDownListData['id_usuario_tipo'],array('style'=>'width:510px')); ?>
		<?php echo $form->error($model,'id_usuario_tipo'); ?>
	</div>

	<div class="row buttons">
		<?php $button_style = array("class"=>"button-aqua",'style'=>'float:right;margin:20px 0;width:116px;'); ?>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Criar' : 'Alterar',$button_style); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
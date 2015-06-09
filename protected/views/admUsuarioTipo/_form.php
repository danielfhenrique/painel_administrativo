
<?php
/* @var $this AdmUsuarioTipoController */
/* @var $model AdmUsuarioTipo */
/* @var $form CActiveForm */
?>

<div class="form" style="margin: 20px 24px;border:1px solid #ccc">

<?php $form=$this->beginWidget('CActiveForm', array( 
	'id'=>'adm-usuario-tipo-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); //Tools::var_dump($categorias[0]->id);?>

	<?php echo $form->errorSummary($model); ?>

	<div class="st-form-line" style="z-index: 680;">
		<span class="st-labeltext"><?php echo $label_colunas['nome']?></span>
		<?php echo $form->textField($model,'nome',array('style'=>'width:510px','size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'nome'); ?>
	</div>
	<div class="st-form-line" style="z-index: 680;">
		<span class="st-labeltext">Categorias</span>
		<div id="menu_categorias"  style="display:inline-block;">
		<?php foreach ($categorias as $categoria){ ?>
				<div >
					<input type="checkbox" name="categoria['<?php echo $categoria->nome?>']" id="categoria_<?php echo $categoria->id?>" onclick="mostra_permissoes_tela(this,'<?php echo strtolower($categoria->nome)?>')" class="uniform" value="<?php echo $categoria->id?>" />
					<label for="categoria_<?php echo $categoria->id?>"><?php echo $categoria->nome?></label>
				</div>
		<?php 	}
		?>
		</div>		
	</div>
	<div class="st-form-line" style="z-index: 680;">
		<span class="st-labeltext">Telas</span>
		<div id="menu_categorias"  style="display:inline-block;width:500px;min-height:50px">
		<?php foreach ($itens_menu as $itens){ ?>
				<div class="tela_<?php echo strtolower($itens->idMenuPai->nome)?>" style="display: none;">
					<input type="checkbox" name="telas['<?php echo $itens->nome?>']['id']" onclick="abilita_acoes(this,<?php echo $itens->id?>)" class="uniform cb_<?php echo strtolower($itens->idMenuPai->nome)?>" value="<?php echo $itens->id?>" />
					<label for="categoria_<?php echo $itens->id?>"><?php echo $itens->nome?></label>
					<div  class="acoes_<?php echo $itens->id?>" style="float: right;">
						<input type="checkbox" name="telas['<?php echo $itens->nome?>']['acao']['criar']" id="criar_<?php echo $itens->id?>" class="uniform acao_<?php echo strtolower($itens->idMenuPai->nome)?>" value="1" />					
						<label for="criar_<?php echo $itens->id?>">Criar</label>
						<input type="checkbox" name="telas['<?php echo $itens->nome?>']['acao']['alterar']"  id="alterar_<?php echo $itens->id?>" class="uniform acao_<?php echo strtolower($itens->idMenuPai->nome)?>" value="1" />					
						<label for="alterar_<?php echo $itens->id?>">Alterar</label>
						<input type="checkbox" name="telas['<?php echo $itens->nome?>']['acao']['apagar']"  id="apagar_<?php echo $itens->id?>" class="uniform acao_<?php echo strtolower($itens->idMenuPai->nome)?>" value="1" />					
						<label for="apagar_<?php echo $itens->id?>">Apagar</label>
					</div>
				</div>
		<?php } ?>
		</div>		
	</div>

	<div class="row buttons">
		<?php $button_style = array("class"=>"button-aqua",'style'=>'float:right;margin:20px 0;width:116px;'); ?>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Criar' : 'Alterar',$button_style); ?>
	</div>

<?php $this->endWidget(); ?>
<script type="text/javascript">
	/**
	 * Mostra checkbox de categorias.
	 */
	function mostra_permissoes_tela(id,nome){
		if($(id).is(':checked')) {
			$(".tela_"+nome).css('display','block');
			abilita_telas(nome);
		}
		else {
			$(".tela_"+nome).css('display','none');
			desabilita_telas(nome);
		}
	}

	function abilita_telas(nome){
		$(".tela_"+nome+" span").each(function(){ $(this).attr('class','checked'); });
		$(".tela_"+nome+" input:checkbox").each(function(){ $(this).attr('checked','checked'); });		
	}
	function desabilita_telas(nome){
		$(".tela_"+nome+" span").each(function(){ $(this).attr('class',''); });
		$(".tela_"+nome+" input:checkbox").each(function(){ $(this).removeAttr('checked'); });		
	}
	function abilita_acoes(thi,id){
		if($(thi).is(':checked')) {
			$(".acoes_"+id+" span").each(function(){ $(this).attr('class','checked'); });
			$(".acoes_"+id+" input:checkbox").each(function(){ $(this).attr('checked','checked'); });	
		}
		else{
			$(".acoes_"+id+" span").each(function(){ $(this).attr('class',''); });
			$(".acoes_"+id+" input:checkbox").each(function(){ $(this).removeAttr('checked'); });	
		}
	}
	
</script>
</div><!-- form -->
$(document).ready(function(){
	/**
	 * Limpa campos de login.
	 */
	$('#txt_log_usuario').click(function(){$('#txt_log_usuario').val("");});
	$('#txt_log_senha').click(function(){$('#txt_log_senha').val("");});
	
	
	/**
	 * Seta labels de campo de arquivo.
	 */
	$('.uploader .filename').text('Selecionar');
	$('.uploader .action').text('Procurar');
	
	
	
});
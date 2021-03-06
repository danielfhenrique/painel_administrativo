<?php

class AdmUsuarioTipoController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
	
	private $erros = array();

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$model = AdmUsuarioTipo::model();
		$data = $model->findAllByPk($id);
		$label_colunas = $this->get_label_colunas($model);
		$this->render('view',array(
			'model'=>$this->loadModel($id),'data'=>$data,'label_colunas'=>$label_colunas,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new AdmUsuarioTipo;
		$data = AdmUsuarioTipo::model()->findAll();
		$label_colunas = $this->get_label_colunas($model);
		$DropDownList = null;
		$categorias = DevMenuCategoria::model()->findAll();
		$itens_menu = DevMenuItem::model()->findAll();
		
		if(count($data[0]->relations())!=0)
			$DropDownList = $this->getFkDropDownList($data);
			
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['AdmUsuarioTipo']))
		{
			if($this->saveAdmUsuarioTipo($model,$_POST))
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,'data'=>$data,'label_colunas'=>$label_colunas,'DropDownList'=>$DropDownList,
			'categorias'=>$categorias,'itens_menu'=>$itens_menu,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$data = AdmUsuarioTipo::model()->findAll();
		$label_colunas = $this->get_label_colunas($model);
		$DropDownList = null;
		$categorias = DevMenuCategoria::model()->findAll();
		$itens_menu = DevMenuItem::model()->findAll();
		
		if(count($data[0]->relations())!=0)
			$DropDownList = $this->getFkDropDownList($data);
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['AdmUsuarioTipo']))
		{
		//Tools::var_dump($_POST);
			$model->attributes=$_POST['AdmUsuarioTipo'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,'data'=>$data,'label_colunas'=>$label_colunas,'DropDownList'=>$DropDownList,
			'categorias'=>$categorias,'itens_menu'=>$itens_menu,
		));
	}
	
	private function saveAdmUsuarioTipo($model,$post){
		$connection = Yii::app()->db;
		$transaction = $connection->beginTransaction();
		
		try{			
			$model->attributes	=$post['AdmUsuarioTipo'];
			$post_categorias  	= $post['categoria'];
			$id_usuario_tipo 	= null;
			$isNewRecord 		= $model->isNewRecord;
			
			if($model->save()){
				$id_usuario_tipo 		= $model->id;
					
				foreach ($post_categorias as $id_menu_categoria){
					$categoriaPermissaoAttributes = array('id_usuario_tipo'=>$id_usuario_tipo,'id_menu_categoria'=>$id_menu_categoria);
					
					if($isNewRecord)
						$categoriaPermissao = new AdmCategoriaPermissao;
					else 
						$categoriaPermissao = AdmCategoriaPermissao::model()->findAllByAttributes($categoriaPermissaoAttributes);
					
					$categoriaPermissao->attributes = $categoriaPermissaoAttributes;
					$categoriaPermissao->save();					
				}
			}
			else {
				throw new Exception();
			}
			$transaction->commit();
		}
		catch (Exception $e){
			$transaction->rollback();
			die($e->getMessage());
			return false;
		}
		return true;
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id=null)
	{	
		if(isset($_POST))
			$id = $_POST['id']; 
		$cont = 0;
		$connection = Yii::app()->db;
		$transaction = $connection->beginTransaction();
		try{
			$categoriasPermissao = AdmCategoriaPermissao::model()->findAllByAttributes(array('id_usuario_tipo'=>$id));
			foreach ($categoriasPermissao as $categoriaPermissao){
				
				$categoriaPermissao->delete();
			}
			$result = array('status'=>($this->loadModel($id)->delete()) ? true : false,'msg'=>"");
			$transaction->commit();
		}
		catch (Exception $e){
			die(array('status'=>false,'msg'=>'Registro não pode ser deletado. Status: '.$e->getMessage()));
		}
		
		die(json_encode($result));

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('AdmUsuarioTipo');
		$this->redirect(array('admin'),array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$data= AdmUsuarioTipo::model()->findAll(); 
		$model=new AdmUsuarioTipo('search');
		$model->unsetAttributes();  // clear any default values
		$label_colunas = $this->get_label_colunas($model);
		
		if(isset($_GET['AdmUsuarioTipo']))
			$model->attributes=$_GET['AdmUsuarioTipo'];

		$this->render('admin',array(
			'model'=>$model,'data'=>$data,'label_colunas'=>$label_colunas,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return AdmUsuarioTipo the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=AdmUsuarioTipo::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param AdmUsuarioTipo $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='adm-usuario-tipo-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	/**
	 * Realiza o upload de imagem.
	 * @param array $file - Dados da imagem.
	 * @param string $target_path - Caminho alvo para guardar a imagem.
	 * @param int $max_size - Tamanho máximo permitido para a imagem.
	 * @param array $file_types - Tipos de formatos permitidos. 
	 */
	protected function imageUpload($file,$target_path,$max_size,array $file_types)
	{
		$tmp_name = $file["tmp_name"];
		$target_file = $target_path . basename($file["name"]);
		$model = DevMenu::model();
		
		if(isset($file['name'])&&$file['name']!==""){
			try{
				if($this->validateImage($file, $target_path, $max_size, $file_types))
					$model->moveFile($tmp_name, $target_file);
				else{
					throw new Exception('Erro ao mover imagem para o diretório informado. Contate o administrador do sistema.');
				}
			}
			catch (Exception $e){
				$this->erros = array('icon' =>'Erro ao inserir imagem: '.$e->getMessage());
			}
		}
		return true;
	}
	
	/**
	 * Valida o upload de imagem.
	 * @param array $file - Dados da imagem.
	 * @param string $target_path - Caminho alvo para guardar a imagem.
	 * @param int $max_size - Tamanho máximo permitido para a imagem.
	 * @param array $file_types - Tipos de formatos permitidos. 
	 */
	protected function validateImage($file,$target_path,$max_size,array $file_types)	
	{		 
		$types = implode(", ", $file_types);
		$target_file = $target_path . basename($file["name"]);
		$file_type = pathinfo($target_file,PATHINFO_EXTENSION);
		$file_size = $file["size"];
		$tmp_name = $file["tmp_name"];
		
		$model = DevMenu::model();
		
		$label_max_size = $max_size.' bytes';
		
		if($max_size>=1000000)
			$label_max_size = ($max_size/1000000).' Mb';
		else 
			if($max_size>=1000)
				$label_max_size = ($max_size/1000).' Kb';
		
		if(!$model->isImage($tmp_name))
			throw new Exception('Arquivo não é uma imagem.');
		
		if(!$model->isCorrectFileSize($file_size, $max_size))
			throw new Exception('Imagem deve ter no máximo '.$label_max_size);
			
		if(!$model->isCorrectFileType($file_type, $file_types))
			throw new Exception('Imagem deve ter um dos seguintes formatos: '.$types.'.');
		
		return true;
		
	}
	
	
	/**
	 * Array com dados de tabelas relacionadas para o preenchimento de DropDownList.
	 * @param  $data Todos os dados da tabela do model AdmUsuarioTipo.
	 */
	protected function getFkDropDownList($data){
		$indexNomeTabela = 1;
		$indexNomeFK = 2;
		$relations 	= $data[0]->relations();
		$DropDownList = null;
		
		foreach ($relations as $relation){
			$fTable = $relation[$indexNomeTabela];
			$fdata  = AdmUsuarioTipo::model($fTable)->findAll();
			if(count($fdata)>0){
				$pk = $fdata[0]->tableSchema->primaryKey;
				$DropDownList[$relation[$indexNomeFK]]['fTable'] = $fTable;
				$DropDownList[$relation[$indexNomeFK]]['fdata'] = $fdata;
				$DropDownList[$relation[$indexNomeFK]]['fdataId']['NULL'] = "";
				
				foreach ($fdata as $arr)
					$DropDownList[$relation[$indexNomeFK]]['fdataId'][$arr->{$pk}] = $arr->{$pk};
			}
		}
		
		return $DropDownList;
	}
	
	
	protected function get_label_colunas($data){
		$label_colunas = $data->attributeLabels();
		
		foreach ($label_colunas as $key=>$label_coluna){
			if(strpos($label_coluna,'Id ')!==false)
				$label_colunas[$key] = str_replace("Id ","",$label_coluna);
		}
		
		return $label_colunas;
	}
}

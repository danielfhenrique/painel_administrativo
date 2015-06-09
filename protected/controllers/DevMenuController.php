<?php

class DevMenuController extends Controller
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
		$data = DevMenu::model()->findAll();
		$label_colunas = $this->get_label_colunas($data);
		$this->render('view',array(
			'model'=>DevMenu::model()->findAllByPk($id),'data'=>$data,'label_colunas'=>$label_colunas,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new DevMenu;
		$data = DevMenu::model()->findAll();
		$label_colunas = $this->get_label_colunas($data);
		$erros = array();
		
		if(count($data[0]->relations())!=0)
			$DropDownList = $this->getFkDropDownList($data);
			
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['DevMenu']))
		{
			$model->attributes=$_POST['DevMenu'];
			
			$this->imageUpload($_FILES['icon'],"images/icons/sidemenu/",500000,array('png','jpg'));
			
			if($model->save()){
				$this->redirect(array('view','id'=>$model->id));
			}
			
			if(count($this->erros)>0)
				foreach ($this->erros as $atributo=>$erro)
					$model->addError($atributo, $erro);
		}
		
		$this->render('create',array(
			'model'=>$model,'data'=>$data,'label_colunas'=>$label_colunas,'DropDownList'=>$DropDownList,
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
		$data = DevMenu::model()->findAll();
		$label_colunas = $this->get_label_colunas($data);
		$DropDownList = null;

		if(count($data[0]->relations())!=0)
			$DropDownList = $this->getFkDropDownList($data);
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['DevMenu']))
		{	
			$model->attributes=$_POST['DevMenu'];
			
			$this->imageUpload($_FILES['icon'],"images/icons/sidemenu/",500000,array('png','jpg'));
						
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
			
			if(count($this->erros)>0)
				foreach ($this->erros as $atributo=>$erro)
					$model->addError($atributo, $erro);
		}

		$this->render('update',array(
			'model'=>$model,'data'=>$data,'label_colunas'=>$label_colunas,'DropDownList'=>$DropDownList,
		));
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
		
		$result = array('status'=>($this->loadModel($id)->delete()) ? true : false);
		
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
		$dataProvider=new CActiveDataProvider('DevMenu');
		$this->redirect(array('admin'),array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$data= DevMenu::model()->findAll(); 
		$label_colunas = $this->get_label_colunas($data);
		$model=new DevMenu('search');
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['DevMenu']))
			$model->attributes=$_GET['DevMenu'];

		$this->render('admin',array(
			'model'=>$model,'data'=>$data,'label_colunas'=>$label_colunas,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return DevMenu the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=DevMenu::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param DevMenu $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='dev-menu-form')
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
	 * @param  $data Todos os dados da tabela do model DevMenu.
	 */
	protected function getFkDropDownList($data){
		$indexNomeTabela = 1;
		$indexNomeFK = 2;
		$relations 	= $data[0]->relations();
		
		foreach ($relations as $relation){
			$fTable = $relation[$indexNomeTabela];
			$fdata  = DevMenu::model($fTable)->findAll();
			$pk = $fdata[0]->tableSchema->primaryKey;
			$DropDownList[$relation[$indexNomeFK]]['fTable'] = $fTable;
			$DropDownList[$relation[$indexNomeFK]]['fdata'] = $fdata;
			$DropDownList[$relation[$indexNomeFK]]['fdataId']['NULL'] = "";
			
			foreach ($fdata as $arr)
				$DropDownList[$relation[$indexNomeFK]]['fdataId'][$arr->{$pk}] = $arr->{$pk};
		}
		
		return $DropDownList;
	}
	
	
	protected function get_label_colunas($data){
		$label_colunas = $data[0]->attributeLabels();
		
		foreach ($label_colunas as $key=>$label_coluna){
			if(strpos($label_coluna,'Id ')!==false)
				$label_colunas[$key] = str_replace("Id ","",$label_coluna);
		}
		
		return $label_colunas;
	}
}

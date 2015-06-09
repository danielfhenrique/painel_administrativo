<?php

/**
 * This is the model class for table "adm_usuario".
 *
 * The followings are the available columns in table 'adm_usuario':
 * @property integer $id
 * @property string $nome
 * @property string $username
 * @property string $senha
 * @property integer $id_usuario_tipo
 *
 * The followings are the available model relations:
 * @property AdmUsuarioTipo $idUsuarioTipo
 */
class AdmUsuario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'adm_usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nome, username, senha, id_usuario_tipo', 'required'),
			array('id_usuario_tipo', 'numerical', 'integerOnly'=>true),
			array('nome', 'length', 'max'=>50),
			array('username', 'length', 'max'=>70),
			array('senha', 'length', 'max'=>40),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nome, username, senha, id_usuario_tipo', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idUsuarioTipo' => array(self::BELONGS_TO, 'AdmUsuarioTipo', 'id_usuario_tipo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nome' => 'Nome',
			'username' => 'Username',
			'senha' => 'Senha',
			'id_usuario_tipo' => 'Id Usuario Tipo',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('nome',$this->nome,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('senha',$this->senha,true);
		$criteria->compare('id_usuario_tipo',$this->id_usuario_tipo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AdmUsuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * Verifica se arquivo é uma imagem.
	 * @param string $tmp_name - Caminho do arquivo temporário.
	 * @return boolean - True se for uma imagem.
	 */
	public function isImage($tmp_name)
	{
		return (getimagesize($tmp_name) !== false);
	}
	
	/**
	 * Verifica se arquivo já existe no caminho indicado.
	 * @param string $target_path - Caminho do diretório alvo.
	 * @return boolean - True se arquivo já existir.
	 */
	public function isFileAlreadyExist($target_path)
	{
		return file_exists($target_path);
	}
	
	/**
	 * Verifica se o arquivo é menor do que o tamanho máximo exigido.
	 * @param int $file_size - Tamanho do arquivo.
	 * @param int $max_size - Tamanho máximo que o arquivo pode ter.
	 * @return boolean - True se o arquivo tiver o tamanho correto.
	 */
	public function isCorrectFileSize($file_size,$max_size)
	{
		return ($file_size < $max_size);
	}
	
	/**
	 * Verifica se o formato do arquivo está dentro dos formatos permitidos.
	 * @param string $file_type - Formato do arquivo.
	 * @param array $file_types - Formatos permitidos.
	 * @return boolean - True se o arquivo tiver o formato correto.
	 */
	public function isCorrectFileType($file_type,array $file_types)
	{
		if(count($file_types)>0)
			foreach ($file_types as $type)
				if($type == $file_type)
					return true;
					
				return false;
	}
	
	/**
	 * Verifica se o formato do arquivo está dentro dos formatos permitidos.
	 * @param string $tmp_name - Caminho do arquivo temporário.
	 * @param string $target_file - Arquivo alvo.
	 * @return boolean - True se o arquivo foi alocado corretamente.
	 */
	public function moveFile($tmp_name,$target_file)
	{
		return (move_uploaded_file($tmp_name, $target_file));
	}
	
	/**
	 * Apaga o arquivo no diretório informado.
	 * @param string $file_path - Caminho do arquivo.
	 * @return boolean - True se o arquivo for apagado corretamente.
	 */
	public function deleteFile($file_path)
	{
		return unlink($file_path);
	}
}

<?php

/**
 * This is the model class for table "dev_menu".
 *
 * The followings are the available columns in table 'dev_menu':
 * @property integer $id
 * @property string $nome
 * @property integer $id_menu_categoria
 * @property integer $id_menu_pai
 * @property integer $id_menu_filho
 * @property string $icon
 * @property integer $ordem
 */
class DevMenu extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dev_menu';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nome, id_menu_categoria, ordem', 'required'),
			array('id_menu_categoria, id_menu_pai, id_menu_filho, ordem', 'numerical', 'integerOnly'=>true),
			array('nome', 'length', 'max'=>30),
			array('icon', 'length', 'max'=>300),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nome, id_menu_categoria, id_menu_pai, id_menu_filho, icon, ordem', 'safe', 'on'=>'search'),
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
			'categoria'=>array(self::BELONGS_TO,'DevMenuCategoria','id_menu_categoria')
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
			'id_menu_categoria' => 'Id Menu Categoria',
			'id_menu_pai' => 'Id Menu Pai',
			'id_menu_filho' => 'Id Menu Filho',
			'icon' => 'Icon',
			'ordem' => 'Ordem',
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
		$criteria->compare('id_menu_categoria',$this->id_menu_categoria);
		$criteria->compare('id_menu_pai',$this->id_menu_pai);
		$criteria->compare('id_menu_filho',$this->id_menu_filho);
		$criteria->compare('ordem',$this->ordem);
		$criteria->compare('icon',$this->icon,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DevMenu the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	const IMAGE_PLACEHOLDER = '/images/default_user.jpg';
	
	public function getDisplayImage() {
		if (empty($model->image_file)) {
			// if you do not want a placeholder
			$image = null;
	
			// else if you want to display a placeholder
			$image = Html::img(self::IMAGE_PLACEHOLDER, [
					'alt'=>Yii::t('app', 'No avatar yet'),
					'title'=>Yii::t('app', 'Upload your avatar by selecting browse below'),
					'class'=>'file-preview-image'
					// add a CSS class to make your image styling consistent
			]);
		}
		else {
			$image = Html::img(Yii::$app->urlManager->baseUrl . '/' . $model->image_file, [
					'alt'=>Yii::t('app', 'Avatar for ') . $model->username,
					'title'=>Yii::t('app', 'Click remove button below to remove this image'),
					'class'=>'file-preview-image'
					// add a CSS class to make your image styling consistent
			]);
		}
	
		// enclose in a container if you wish with appropriate styles
		return ($image == null) ? null :
		Html::tag('div', $image, ['class' => 'file-preview-frame']);
	}
	
	public function isImage($tmp_name)
	{
		return (getimagesize($tmp_name) !== false);
	}
	
	public function isFileAlreadyExist($target_path)
	{
		return file_exists($target_path);		
	}
	
	public function isCorrectFileSize($file_size,$expected_size)
	{
		return ($file_size < $expected_size);
	}
	
	public function isCorrectFileType($file_type,array $file_types)
	{
		if(count($file_types)>0)
			foreach ($file_types as $type)
				if($type == $file_type)
					return true;
			
		return false;		
	}
	
	public function moveFile($tmp_name,$target_file)
	{
		return (move_uploaded_file($tmp_name, $target_file));
	}	
	
	public function deleteImage() 
	{
		$image = Yii::$app->basePath . '/uploads/' . $this->image_file;
		if (unlink($image)) {
			$this->image_file = null;
			$this->save();
			return true;
		}
		return false;
	}
}

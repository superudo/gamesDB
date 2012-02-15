<?php

/**
 * This is the model class for table "publisher".
 *
 * The followings are the available columns in table 'publisher':
 * @property integer $id
 * @property string $name
 * @property string $url
 *
 * The followings are the available model relations:
 * @property Game[] $games
 */
class Publisher extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Publisher the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'publisher';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('name, url', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, url', 'safe', 'on'=>'search'),
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
			'games' => array(self::HAS_MANY, 'Game', 'publisher_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'url' => 'Url',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('url',$this->url,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getName($pub_id)
	{
		$ret = '';
		$publisher = $this->findByPk($pub_id);
		if ($publisher) {
			$ret = $publisher->name;
		}
		return $ret;
	}
	
	public function getPublisherOptions()
	{
		return CHtml::listData(
			$this->findAll(), 'id', 'name'
		);
	}
}
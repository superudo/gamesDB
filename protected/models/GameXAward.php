<?php

/**
 * This is the model class for table "game_x_award".
 *
 * The followings are the available columns in tagame_x_awardprice':
 * @property integer $id
 * @property integer $price_id
 * @property integer $game_id
 * @property integer $year
 *
 * The followings are the available model relations:
 * @property Price $price
 * @property Game $game
 */
class GameXAward extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return GameXAward the static model class
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
		return 'game_x_award';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('award_id, game_id', 'required'),
			array('award_id, game_id, year', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, award_id, game_id, year', 'safe', 'on'=>'search'),
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
			'award' => array(self::BELONGS_TO, 'Award', 'award_id'),
			'game' => array(self::BELONGS_TO, 'Game', 'game_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'award_id' => 'Award',
			'game_id' => 'Game',
			'year' => 'Year',
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
		$criteria->compare('award_id',$this->award_id);
		$criteria->compare('game_id',$this->game_id);
		$criteria->compare('year',$this->year);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
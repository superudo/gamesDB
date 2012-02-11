<?php

/**
 * This is the model class for table "game".
 *
 * The followings are the available columns in table 'game':
 * @property integer $id
 * @property string $name
 * @property integer $min_players
 * @property integer $max_players
 * @property integer $min_age
 * @property integer $duration
 * @property string $boxwidth
 * @property string $boxlength
 * @property string $boxheight
 * @property integer $publisher_id
 * @property integer $base_game_id
 *
 * The followings are the available model relations:
 * @property Publisher $publisher
 * @property Game $baseGame
 * @property Game[] $games
 * @property Artist[] $artists
 * @property Author[] $authors
 * @property Category[] $categories
 * @property GameXFeature[] $gameXFeatures
 * @property GameXPrice[] $gameXPrices
 */
class Game extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Game the static model class
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
		return 'game';
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
			array('min_players, max_players, min_age, duration, publisher_id, base_game_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>100),
			array('boxwidth, boxlength, boxheight', 'length', 'max'=>4),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, min_players, max_players, min_age, duration, boxwidth, boxlength, boxheight, publisher_id, base_game_id', 'safe', 'on'=>'search'),
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
			'publisher' => array(self::BELONGS_TO, 'Publisher', 'publisher_id'),
			'baseGame' => array(self::BELONGS_TO, 'Game', 'base_game_id'),
			'games' => array(self::HAS_MANY, 'Game', 'base_game_id'),
			'artists' => array(self::MANY_MANY, 'Artist', 'game_x_artist(game_id, artist_id)'),
			'authors' => array(self::MANY_MANY, 'Author', 'game_x_author(game_id, author_id)'),
			'categories' => array(self::MANY_MANY, 'Category', 'game_x_category(game_id, category_id)'),
			'gameXFeatures' => array(self::HAS_MANY, 'GameXFeature', 'game_id'),
			
			'prices' => array(self::MANY_MANY, 'GamePrice', 'game_x_price(price_id, game_id)', 'index' => 'id'),
			'gameXPrices' => array(self::HAS_MANY, 'GameXPrice', 'game_id', 'index' => 'price_id'),
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
			'min_players' => 'Min Players',
			'max_players' => 'Max Players',
			'min_age' => 'Min Age',
			'duration' => 'Duration',
			'boxwidth' => 'Boxwidth',
			'boxlength' => 'Boxlength',
			'boxheight' => 'Boxheight',
			'publisher_id' => 'Publisher',
			'base_game_id' => 'Base Game',
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
		$criteria->compare('min_players',$this->min_players);
		$criteria->compare('max_players',$this->max_players);
		$criteria->compare('min_age',$this->min_age);
		$criteria->compare('duration',$this->duration);
		$criteria->compare('boxwidth',$this->boxwidth,true);
		$criteria->compare('boxlength',$this->boxlength,true);
		$criteria->compare('boxheight',$this->boxheight,true);
		$criteria->compare('publisher_id',$this->publisher_id);
		$criteria->compare('base_game_id',$this->base_game_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
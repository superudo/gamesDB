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
 * @property GameXAward[] $gameXAwards
 */
class Game extends CActiveRecord
{
	public $categoryIds = array();
	public $authorIds = array();
	public $artistIds = array();
	
	/**
	 * Returns the static model of the specified AR class.
	 * @return Game the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	protected function afterConstruct() {
		$this->min_players = 1;
		$this->max_players = 10;
	}

	public function afterFind()
	{
		if (!empty($this->categories)) {
			foreach ($this->categories as $n => $category) {
				$this->categoryIds[] = $category->id;
			}
		}
		
		if (!empty($this->authors)) {
			foreach ($this->authors as $a => $author) {
				$this->authorIds[] = $author->id;
			}
		}
		
		if (!empty($this->artists)) {
			foreach ($this->artists as $a => $artist) {
				$this->artistIds[] = $artist->id;
			}
		}
		
		parent::afterFind();
	}
	
	public function behaviors()
    {
        return array('CAdvancedArBehavior' => array(
            'class' => Yii::getPathOfAlias('behaviors') . 'CAdvancedArBehavior',
		));
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
			array('min_age, duration, publisher_id, base_game_id', 'numerical', 'integerOnly'=>true, 'min'=>0),
			array('min_players, max_players', 'numerical', 'min' => 1, 'max' => 10, 'integerOnly'=>true), 
			array('luding_id', 'numerical', 'integerOnly' => true),
			array('name', 'length', 'max'=>100),
			array('boxwidth, boxlength, boxheight', 'length', 'max'=>4),
			array('categoryIds', 'safe'),
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
			
			'awards' => array(self::MANY_MANY, 'Award', 'game_x_award(award_id, game_id)', 'index' => 'id'),
			'gameXAwards' => array(self::HAS_MANY, 'GameXAward', 'game_id', 'index' => 'award_id'),
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
			'luding_id' => 'Luding Id',
			
			'boxsize' => 'Boxsize',
			'categories' => 'Categories',
			'artists' => 'Artists',
			'authors' => 'Authors',
			'players' => 'Players',
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
	
	public function getPotentialBaseGameOptions()
	{
		$criteria = new CDBCriteria;
		$criteria->select = 'id, name';
		$criteria->condition = 'base_game_id IS NULL';
		if ($this->id !== null) {
			$criteria->condition = $criteria->condition . ' AND id <> :id';
			$criteria->params = array(':id' => $this->id);
		}
		return CHtml::listData($this->findAll($criteria), 'id', 'name');
	}
	
	public function getLudingUrl() 
	{
		if ($this->luding_id != null) {
			return "http://luding.org/Skripte/GameData.py/DEgameid/" . $this->luding_id;
		}
		else {
			return null;
		}
	}
	
	public function getBoxSize() {
		return $this->boxlength . " x " . $this->boxwidth . " x " . $this->boxheight;
	}
	
	public function getGameDuration() {
		return (($this->duration == null) || ($this->duration == 0))? "n/a": $this->duration . " min";
	}
}

<?php

/**
 * This is the model class for table "category".
 *
 * The followings are the available columns in table 'category':
 * @property integer $id
 * @property string $name
 * @property integer $parent_category_id
 *
 * The followings are the available model relations:
 * @property Category $parentCategory
 * @property Category[] $categories
 * @property Game[] $games
 */
class Category extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Category the static model class
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
		return 'category';
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
			array('parent_category_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, parent_category_id', 'safe', 'on'=>'search'),
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
			'parentCategory' => array(self::BELONGS_TO, 'Category', 'parent_category_id'),
			'subCategories' => array(self::HAS_MANY, 'Category', 'parent_category_id'),
			'games' => array(self::MANY_MANY, 'Game', 'game_x_category(category_id, game_id)'),
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
			'parent_category_id' => 'Parent Category',
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
		$criteria->compare('parent_category_id',$this->parent_category_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getListed() {
    	$subitems = array();
    	if ($this->subCategories) {
    		foreach ($this->subCategories as $child) {
        		$subitems[] = $child->getListed();
    		}
		}
    	
    	$returnarray = array('label' => $this->name, 'url' => array('Hierarchy/view', 'id' => $this->id));
    	if ($subitems != array()) {
	        $returnarray = array_merge($returnarray, array('items' => $subitems));
    	}
    	return $returnarray;
	}
	
	public function get_category_hr($cat_id, $selected_cat_id, $curr_cat_id, $level_string) {
		$select_str='';
       
        if (!$level_string) {
 			$level_string='';
		}
       
	   $wherestring = ($cat_id)? 'parent_category_id=' . $cat_id: 'parent_category_id IS NULL';
	   $cat_id = ($cat_id)? $cat_id: '';
		if ($cat_arr = $this->findAll($wherestring)) {
			foreach ($cat_arr as $cat) {
				if ($cat->id == $curr_cat_id) {
					continue;
				}
				
				$select_str .= "<option value={$cat->id}";

                if ($selected_cat_id == $cat->id) {
					$select_str.= ' selected';
                }

                $select_str .= ">{$level_string}{$cat->name}</option>";
				$select_str .= $this->get_category_hr($cat->id, $selected_cat_id, $curr_cat_id, $level_string . '+');
            }
        }
        else {
            return false;
        }
       
        return $select_str;
    }

	public function getName($cat_id) {
		$name = '(ohne)';
		if ($cat_id) {
			$o = Category::model()->findByPk($cat_id);
			if ($o) {
				$name = $o->name;
			}
		}
		return $name;
	}	
}


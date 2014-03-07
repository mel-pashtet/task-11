<?php

/**
 * This is the model class for table "notes".
 *
 * The followings are the available columns in table 'notes':
 * @property integer $id
 * @property string $notes_name
 * @property string $notes_value
 * @property string $notes_author
 * @property string $notes_update
 * @property integer $author_id
 *
 * The followings are the available model relations:
 * @property Assignment[] $assignments
 * @property Comment[] $comments
 * @property Comment[] $comments1
 * @property Users $author
 */
class Notes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function addComment($model_comment)
	{
		  $model_comment->notes_id=$this->id;
		  $model_comment->author_id =$this->author_id;
		  return $model_comment;
	}

	protected function beforeSave()
	{
    if(parent::beforeSave())
    {
        if($this->isNewRecord)
        {
            $this->notes_update = new CDbExpression('NOW()');
            
        }
        else
        {
        	$this->notes_update = new CDbExpression('NOW()');

        }
            
        return true;
    }
    else
        return false;
	}
	public function tableName()
	{
		return 'notes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('author_id', 'required'),
			array('author_id', 'numerical', 'integerOnly'=>true),
			array('notes_name, notes_value, notes_author, notes_update', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, notes_name, notes_value, notes_author, notes_update, author_id', 'safe', 'on'=>'search'),
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
			
			'comments' => array(self::HAS_MANY, 'Comment', 'notes_id'),
			
			'author' => array(self::BELONGS_TO, 'Users', 'author_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'notes_name' =>  Yii::t('notes', 'notes_name'),
			'notes_value' => Yii::t('notes', 'notes_value'),
			'notes_author' => Yii::t('notes', 'notes_author'),
			'notes_update' => Yii::t('notes', 'notes_update'),
			'author_id' => 'Author',
		);
	}

	
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('notes_name',$this->notes_name,true);
		$criteria->compare('notes_value',$this->notes_value,true);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Notes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

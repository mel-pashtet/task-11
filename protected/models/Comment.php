<?php

/**
 * This is the model class for table "comment".
 *
 * The followings are the available columns in table 'comment':
 * @property integer $id
 * @property string $comment_author
 * @property string $comment_text
 * @property integer $notes_id
 * @property integer $author_id
 
 * @property string $time_comment
 *
 * The followings are the available model relations:
 * @property Notes $author
 * @property Notes $notes
 */
class Comment extends CActiveRecord
{
	public $verifyCode;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'comment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	protected function beforeSave()
	{
    if(parent::beforeSave())
    {
        if($this->isNewRecord)
        {
            $this->time_comment = new CDbExpression('NOW()');
            
        }
        else
        {
        	$this->time_comment = new CDbExpression('NOW()');

        }
            
        return true;
    }
    else
        return false;
	}
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('comment_author, comment_text, notes_id, author_id', 'required'),
			array('notes_id, author_id', 'numerical', 'integerOnly'=>true),
			 array(
                'verifyCode',
                'captcha',
                // авторизованным пользователям код можно не вводить
                'allowEmpty'=>!Yii::app()->user->isGuest || !CCaptcha::checkRequirements(),
            ),
            // The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, comment_author, comment_text, notes_id, author_id, verifyCode, time_comment', 'safe', 'on'=>'search'),
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
			//'author' => array(self::BELONGS_TO, 'Notes', 'author_id'),
			'notes' => array(self::BELONGS_TO, 'Notes', 'notes_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'comment_author' => Yii::t('comment', 'comment_author'),
			'comment_text' => Yii::t('comment', 'comment_text'),
			'notes_id' => 'Notes',
			'author_id' => 'Author',
			'verifyCode' => Yii::t('comment', 'verifyCode'),
			'time_comment' => Yii::t('comment', 'time_comment'),
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
		$criteria->compare('comment_author',$this->comment_author,true);
		$criteria->compare('comment_text',$this->comment_text,true);
		$criteria->compare('notes_id',$this->notes_id);
		$criteria->compare('author_id',$this->author_id);
		$criteria->compare('verifyCode',$this->verifyCode,true);
		$criteria->compare('time_comment',$this->time_comment,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Comment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

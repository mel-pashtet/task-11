<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class ContactForm extends CFormModel
{
public $id;
public $comment_author;
public $comment_text;
public $notes_id;
public $author_id;
public $verifyCode;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('comment_author, comment_text, notes_id, author_id', 'required'),
			array('notes_id, author_id', 'numerical', 'integerOnly'=>true),
			 array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, comment_author, comment_text, notes_id, author_id', 'safe', 'on'=>'search'),
		);
	}
	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'comment_author' => 'Comment Author',
			'comment_text' => 'Comment Text',
			'notes_id' => 'Notes',
			'author_id' => 'Author',
			'verifyCode' => 'Код проверки',
		);
	}
}
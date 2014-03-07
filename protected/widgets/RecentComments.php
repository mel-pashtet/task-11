<?php
/**
 * RecentComments is a Yii widget used to display a list of recent 
comments 
 */
class RecentComments extends CWidget
{
  private $_comments;  
  public $displayLimit = 100;
  public $notesID;
  
  	public function init()
    {
        //$dependency = new CDbCacheDependency('SELECT COUNT(*) FROM comment');
        //$this->_comments = Comment::model()->cache(1000, $dependency)->findAll()
        //з залежністю кеша теж працює.
        $this->_comments = Comment::model()->cache(3600)->findAll(array(
        'condition'=>'notes_id=:notes_id',
        'params'=>array(':notes_id'=>$this->notesID),
        'order'=>'time_comment DESC',
        'limit'=>$this->displayLimit,
      ));
    
    }
    
    public function getRecentComments()
  	{
    	return $this->_comments;
  	}
    public function run()
    {
        $this->render('recentComments');
    }
}
<?
class ClearcommCommand extends CConsoleCommand
{
    public function actionIndex()
    {
        foreach (Yii::app()->params['words'] as $word)
        {
            $sql = 'comment_text LIKE :some';
               
        }
        $model = Comment::model()->deleteAll($sql, array(':some'=>'%'."$word".'%'));

        if ($model !== 0)
        {
           
            echo "The comment is cleared";
            Yii::app()->cache->flush();
            Yii::log(' The comment is cleared ', 'info');
                
        }
        else
        {
            echo "no comment for clear";
            Yii::log(' no comment for clear ', 'info');
        
        }
                            
        
    }
}
?>
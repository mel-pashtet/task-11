<?php

class CommentController extends Controller
{
  public function filters()
  {
    return array(
      'accessControl', // perform access control for CRUD operations
      
    );
  }

  public function accessRules()
  {
    return array(
      array('allow',  // allow all users to perform 'index' and 'view' actions
        'actions'=>array('create'),
        'users'=>array('*'),
      ),
      array('allow', // allow authenticated user to perform 'create' and 'update' actions
        'actions'=>array('delete'),
        'users'=>array('@'),
      ),
      
      array('deny',  // deny all users
        'users'=>array('*'),
      ),
    );
  }

  public function actionDelete()
  {
    $id = '';

    if (isset($_GET['id']))
    {
      $id = $_GET['id'];

    }
    if (isset($_GET['current_id']))
    {
      $current_id = $_GET['current_id'];

    }

    $model=Comment::model()->findByPk($id);
      
        if (isset($model))
        {
          $model->delete();
          Yii::app()->cache->flush();
          Yii::app()->user->setFlash('success',Yii::t('default',"your comment deleted"));
          Yii::log(' коментарій видалений ', 'info');
          $this->redirect($this->createUrl('notes/read', array('id'=>$current_id)));
          
        }
        else
          throw new CHttpException(404,Yii::t('default','Not found this request'));
      
    
    
  }
		
}

<?php

class NotesController extends Controller
{
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			 array('allow',
                'actions'=>array('captcha'),
                'users'=>array('*'),
            ),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','read','search'),
				'users'=>array('*'),

			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','delete'),
				'users'=>array('@'),
			),
			
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function actions()
	{
		return array(
			
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			'page'=>array(
				'class'=>'CViewAction',
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
			
		$model=Notes::model()->findByPk($id);
			
			if (isset($model))
			{
				$model->delete();
				Yii::log(' замітка удалена ', 'info');
				$this->redirect($this->createUrl('notes/index'));
				
			}
			else
				throw new CHttpException(404,Yii::t('default','Not found this request'));
				
		
		
		
	}
	public function actionUpdate()
	{
		$id = '';
		if (isset($_GET['id']))
		{
			$id = $_GET['id'];
		}

		$model=Notes::model()->findByPk($id);
			if (isset($model))						
			{
				if (isset($_POST['Notes']))
				{
					$model->attributes = $_POST['Notes'];
					if($model->validate())												// якщо дані проходять валідацію, оновлюєм
		    		{
		    			$model->save();
		    			Yii::log(' замітка оновлена ', 'info');
		    			$this->redirect($this->createUrl('notes/index'));

			    	}
				}

			    

			}
			else
			{
				throw new CHttpException(404,Yii::t('default','Not found this request'));

			}

		$this->render('update', array('model'=>$model));
			

		
	
	}
	protected function createComment($model)
	{
		$model_comment=new Comment;
		$model->addComment($model_comment);
		
		if(!Yii::app()->user->isGuest)
		{
			$model_comment->comment_author = Yii::app()->user->name; 

		}

		if(isset($_POST['Comment']))
		{
			//print_r($_POST['Comment']);
			
		    $model_comment->attributes=$_POST['Comment'];
		    $model_comment->save();
		    Yii::app()->cache->flush();
		    Yii::app()->user->setFlash('success',Yii::t('default',"your comment added"));
		    Yii::log(' коментарій створений ', 'info');
		    $this->refresh();

		   
		}
  			return $model_comment;    	
			    	

	}
	public function actionRead()												// просмотр однієї замітки
	{

		$id = '';
		if (isset($_GET['id']))
		{
			$id = $_GET['id'];
		}
		
		$model = Notes::model()->findByPK($id);
		
	   
		
		if (isset($model))
		{
			$model_comment=$this->createComment($model);
			
			
			/*$dependency = new CDbCacheDependency('SELECT COUNT(*) FROM comment');
			
			$commentsDataProvider=new CActiveDataProvider(Comment::model()->cache(3600, $dependency), array(
    		'criteria'=>array(
        		'condition'=>'notes_id=:notes_id',
        		'params'=>array(':notes_id'=>$model->id),
     		 ),
      		'pagination'=>array(
        	'pageSize'=>1,
      		),
    		));
    		*/
			$this->render('read', array('model'=>$model,  'model_comment'=>$model_comment));

		}
		else
			throw new CHttpException(404,Yii::t('default','Not found this request'));
		
		
		

	}
	public function actionSearch()
	{
		if (isset($_GET['notes_author']))										// якщо задано пошук по автору
		{
			$search = $_GET['notes_author'];
			$condition = array(
	        'condition'=>"notes_author = :search",
	        'params' => array( ':search' => $search ),
	        'order'=>'id',
	        
	        );
	        
	        

		}
		
		if (isset($_GET['search']))												// якщо задано пошуковий запит по назві або вмісту замітки
		{
			$search = $_GET['search'];
			$condition = array(
	        'condition'=>"notes_name LIKE :search OR notes_value LIKE :search",
	        'params' => array( ':search' => '%' . $search . '%' ),
	        'order'=>'id',
	        
	        );

		
			
        }

 
        $dataProvider=new CActiveDataProvider('Notes', array(
	    	'criteria'=>$condition,
	        'countCriteria'=>$condition,
	        'pagination'=>array(
	        'pageSize'=>1,
	        ),
	        ));

			$this->render('search', array(
	            'dataProvider'=>$dataProvider
            ));

		
	}
	
	public function actionCreate()
	{
		
		$model = new Notes();
		$model->notes_author = Yii::app()->user->name;
		$model->author_id = Yii::app()->user->id;

		if (isset($_POST['Notes']))												// якщо задано поля форми
		{			
		    $model->attributes = $_POST['Notes'];
		    
		    if($model->validate())												// якщо значення полів валідні, записуєм
		    {
		    	$model->save();
		    	Yii::log(' замітка створена ', 'info');
		    	
		    	$this->redirect($this->createUrl('notes/index'));

		    }
		    
            
		    
		}
		
		$this->render('create', array('model'=>$model));
		
	}

	public function actionIndex()												// екшн на відображення всього списку
	{
		$sort = new CSort();
		$sort->defaultOrder = 'id';
		$dataProvider=new CActiveDataProvider('Notes', array('pagination'=>array('pageSize'=>1), 'sort'=>$sort,));
		$this->render('index', array(
            'dataProvider'=>$dataProvider,
        ));

	
	}


}
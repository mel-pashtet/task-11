<ul>
	
  <?php foreach($this->getRecentComments() as $comment): ?>  
    <div>
	    <li>
	    	<p>
		      "<?php echo $comment->comment_author; ?>" <?= Yii::t('comment', 'added a comment at')?>  <?php echo Yii::app()->dateFormatter->format('EEEE, dd-MMMM-yyyy HH:mm:ss', $comment->time_comment); ?><br>
		       <?= Yii::t('comment', 'TEXT')?>: <?php echo $comment->comment_text; ?><br>
		       

		       <?php
		       if ($comment->author_id === Yii::app()->user->id)
		       {
		       		$this->widget('bootstrap.widgets.TbButton', array(
					    'type'=>'danger',
					    'icon'=>'remove', 
					    'buttonType'=>'link',
					    'url'=>Yii::app()->createUrl('comment/delete', array('id'=>$comment->id, 'current_id'=>$comment->notes_id)),
					    'label'=>Yii::t('comment', 'delete comment')));

		       		//echo CHtml::link(Yii::t('comment', 'delete comment'), array('comment/delete', 'id'=>$comment->id, 'current_id'=>$comment->notes_id));

		       }
	       


		       ?>
	   		</b>
		</li>    
    </div>
  <?php endforeach; ?>
  
</ul>
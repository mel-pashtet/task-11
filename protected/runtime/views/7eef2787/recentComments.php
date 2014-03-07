<?php
require_once '/var/www/protected/extensions/phamlp/vendors/phamlp/haml/HamlHelpers.php';
?><div class="comments">
<ul>
<?php foreach($this->getRecentComments() as $comment):  { ?>

<li>
<p>
<?php echo $comment->comment_author." ". Yii::t('comment', 'added a comment at')." ". Yii::app()->dateFormatter->format('EEEE, dd-MMMM-yyyy HH:mm:ss', $comment->time_comment);; ?>
</p><p>
<?php echo Yii::t('comment', 'TEXT').": ". $comment->comment_text;; ?>
</p><p>
<?php
if ($comment->author_id === Yii::app()->user->id)
{
  $this->widget('bootstrap.widgets.TbButton', array(
    'type'=>'danger',
    'icon'=>'remove', 
    'buttonType'=>'link',
    'url'=>Yii::app()->createUrl('comment/delete', array('id'=>$comment->id, 'current_id'=>$comment->notes_id)),
    'label'=>Yii::t('comment', 'delete comment')));
}
?>
</p></li><?php } ?>
<?php endforeach;; ?>
</ul></div>
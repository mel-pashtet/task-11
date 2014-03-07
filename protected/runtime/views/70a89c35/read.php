<?php
require_once '/var/www/protected/extensions/phamlp/vendors/phamlp/haml/HamlHelpers.php';
?><div class="well notes">
<h1>
<?php echo Yii::t('notes', 'notes_name').": ". $model->notes_name;; ?>

</h1><h1>
<?php
echo Yii::t('notes', 'notes_value').": ";
$this->widget('bootstrap.widgets.TbButton', array(
  'buttonType'=>'link',
  'type'=>'link',
  'size'=>'large',
  'url'=>$this->createUrl('notes/search', array('notes_author'=>$model->notes_author)),
  'label'=>$model->notes_author,

  ));
?>
</h1><h1>
<?php echo Yii::t('notes', 'notes_update').": ". Yii::app()->dateFormatter->format('EEEE, dd-MMMM-yyyy HH:mm:ss', $model->notes_update);; ?>

</h1></div><div class="well">
<?php
if ($model->author_id === Yii::app()->user->id):
  $this->widget('bootstrap.widgets.TbButton', array(
    'type'=>'success', 
    'icon'=>'edit',
    'htmlOptions' => array('class' =>'update' , ),
    'buttonType'=>'link',
    'url'=>CController::createUrl('notes/update', array('id'=>$model->id)),
    'label'=>Yii::t('default', 'update')));
  $this->widget('bootstrap.widgets.TbButton', array(
    'type'=>'danger',
    'icon'=>'remove', 
    'htmlOptions' => array('class' =>'delete' , ),
    'buttonType'=>'link',
    'url'=>CController::createUrl('notes/delete', array('id'=>$model->id)),
    'label'=>Yii::t('default', 'delete')));
endif
?>
</div><?php
$this->widget('bootstrap.widgets.TbAlert', array(
  'block' => true,
  'fade' => true,
  'closeText' => '&times;', // false equals no close link
  'events' => array(),
  'htmlOptions' => array(),
  'userComponentId' => 'user',
  'alerts' => array( 
  'success' => array('closeText' => '&times;'),
  'info',
  'warning' => array('block' => false, 'closeText' => false),
  'error' => array('block' => false, 'closeText' => 'ERROR')
  ),
));
?>
<div class="well">
<h2>
<?php
echo Yii::t('default','Recent comments');
?>
</h2><?php $this->widget('RecentComments', array('notesID'=>$model->id));; ?>
</div><div>
<?php $this->renderpartial('_form', array('model_comment'=>$model_comment));; ?>
</div>
<?php
require_once '/var/www/protected/extensions/phamlp/vendors/phamlp/haml/HamlHelpers.php';
?><h1>
<?php echo Yii::t('default', Yii::app()->user->name)." ".Yii::t('default', 'add comment');; ?>
</h1><?php
$form = $this->beginWidget(
'bootstrap.widgets.TbActiveForm',
array(
'id'=>'verticalForm',
'enableAjaxValidation'=>false,
'enableClientValidation'=>true,
'clientOptions'=>array(
  'validateOnSubmit'=>true,
),
'htmlOptions' => array('class' => 'well'), // for inset effect
)
);

if(Yii::app()->user->isGuest)
{
  echo $form->textFieldRow($model_comment, 'comment_author', array('class' => 'span3'));

} 
echo $form->textAreaRow($model_comment, 'comment_text', array('class' => 'span3'));

if(CCaptcha::checkRequirements() && Yii::app()->user->isGuest)
{
  echo $form->labelEx($model_comment,'verifyCode');
  $this->widget('CCaptcha'); 
  echo $form->textField($model_comment,'verifyCode');
  echo $form->error($model_comment,'verifyCode');
}
?>
<div>
<?php echo Yii::t('comment', 'Please enter the letters as they are shown in the image above'); ?>
</div><div>
<?php
$this->widget(
'bootstrap.widgets.TbButton',
array('buttonType' => 'submit', 'label' => Yii::t('default','save'), 'type' => 'primary', 'size'=>'large', 'icon'=>'ok')
);

?>
</div><?php
$this->endWidget();
unset($form);

?>

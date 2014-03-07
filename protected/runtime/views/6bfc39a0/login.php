<?php
require_once '/var/www/protected/extensions/phamlp/vendors/phamlp/haml/HamlHelpers.php';
?><?php
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
  'Login',
);

?>
<h1>
<?php echo Yii::t('default', 'Login');; ?>

</h1><?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm',array(
'id' => 'verticalForm',
'enableAjaxValidation'=>false,
'enableClientValidation'=>true,
'clientOptions'=>array(
  'validateOnSubmit'=>true,
),
'htmlOptions' => array('class' => 'well'), // for inset effect
)
);

echo $form->textFieldRow($model, 'username', array('class' => 'span3'));
echo $form->passwordFieldRow($model, 'password', array('class' => 'span3'));
echo $form->checkboxRow($model, 'rememberMe');

?>
<div>
<?php
$this->widget(
'bootstrap.widgets.TbButton',
array('buttonType' => 'submit', 'label' => Yii::t('default','Login'), 'type' => 'primary', 'size'=>'large', 'icon'=>'ok')
);
?>
</div><?php
$this->endWidget();
unset($form);

?>

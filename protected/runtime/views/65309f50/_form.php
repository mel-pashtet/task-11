<?php
require_once '/var/www/protected/extensions/phamlp/vendors/phamlp/haml/HamlHelpers.php';
?><?php
$form = $this->beginWidget(
'bootstrap.widgets.TbActiveForm',
array(
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
echo $form->passwordFieldRow($model,'password_repeat',array('class' => 'span3'));

?>
<div>
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

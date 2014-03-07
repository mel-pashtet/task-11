<?php
require_once 'M:\home\localhost\www\notes\protected\extensions\phamlp\vendors\phamlp\haml\HamlHelpers.php';
?><!DOCTYPE html>
<html>
<head>
<?php Yii::app()->sass->registerFile('webroot.css.main.scss', "", $force = false); ?>
<title>
<?php echo CHtml::encode($this->pageTitle);; ?>
</title></head><body>
<div class="container-fluid">
<div class="page-header">
<h1>
<?php
echo Yii::t('default', CHtml::encode(Yii::app()->name));
?>
</h1></div><div class="row-fluid">
<div class="span2 well">
<?php
$this->widget('bootstrap.widgets.TbMenu', array(
  'type' => 'list',
  'items' => array(
    array(
    'label' => Yii::t('default','Application'),
    'itemOptions' => array('class' => 'nav-header')
    ),
    array(
    'label' => Yii::t('default','Home'),
    'url'=>array('/notes/index'),
    'itemOptions' => array('class' => 'nav-header')
    ),"",
    array(
    'label' => Yii::t('default','User'),
    'itemOptions' => array('class' => 'nav-header')
    ),
    array('label' => Yii::t('default','registration'), 'url'=>array('/users/create')),
    array('label'=>Yii::t('default','Login'), 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
    array('label'=>Yii::t('default','Logout').'('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
  )
  )
);
?>
</div><div class="span10 well">
<?php
echo $content;
?>
</div></div><div class="pull-right">
Copyright &copy;
<?php echo date('Y');; ?>
by My Company.<br/>
<?php echo Yii::powered();; ?>
</div></div></body></html>
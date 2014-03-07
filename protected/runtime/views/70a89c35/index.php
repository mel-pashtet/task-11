<?php
require_once '/var/www/protected/extensions/phamlp/vendors/phamlp/haml/HamlHelpers.php';
?><div class="header">
<h2>
<?php echo Yii::t('default', 'Welcome to')." ".Yii::t('default', CHtml::encode(Yii::app()->name) );; ?>
</h2><?php if(!Yii::app()->user->isGuest) { ?>

<p>
<?php echo Yii::app()->user->name." ".Yii::t('default', 'last logged in').": ".Yii::app()->dateFormatter->format('EEEE, dd-MMMM-yyyy HH:mm:ss', Yii::app()->user->lastLoginTime);; ?>
</p><?php } ?>
</div><div class="list">
<?php
$this->widget('bootstrap.widgets.TbListView', array(
  'dataProvider'=>$dataProvider,
  'ajaxUpdate'=>false,            
  'itemView'=>'_view',
  'pager'=>array('class' => 'bootstrap.widgets.TbPager',
  'header'=>false,
  'maxButtonCount'=>'5',
  ),
));
?>
</div><div>
<?php
$this->widget('bootstrap.widgets.TbButton', array(
  'type'=>'success', 
  'icon'=>'plus',
  'buttonType'=>'link',
  'url'=>CController::createUrl('notes/create'),
  'label'=>Yii::t('default', 'Add notes')));
?>
</div><div class="pull-right">
<form action="search" method="get">
<fieldset>
</fieldset><label for="search">
<?php echo Yii::t('default', 'word for search');; ?>
</label><input class="search-query" name="search" type="text" /><input class="btn btn-primary" type="submit" value="search" /></form></div>
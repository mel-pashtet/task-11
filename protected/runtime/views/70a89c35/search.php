<?php
require_once '/var/www/protected/extensions/phamlp/vendors/phamlp/haml/HamlHelpers.php';
?><?php
$this->widget('bootstrap.widgets.TbListView', array(
  'dataProvider'=>$dataProvider,
  'ajaxUpdate'=>false,            
  'itemView'=>'_view',
  'pager'=>array(
  'class' => 'bootstrap.widgets.TbPager',
  'header'=>false,
  'maxButtonCount'=>'5',

  ),
));
?>
<h1>
<?php echo Chtml::link('reset', array('notes/index'));; ?>
</h1>
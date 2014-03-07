<?php
require_once '/var/www/protected/extensions/phamlp/vendors/phamlp/haml/HamlHelpers.php';
?><h1>
<?php echo Yii::t('default', 'registration');; ?>

</h1><?php $this->renderPartial('_form', array('model'=>$model));; ?>

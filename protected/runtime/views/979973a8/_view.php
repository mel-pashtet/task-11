<?php
require_once 'M:\home\localhost\www\notes\protected\extensions\phamlp\vendors\phamlp\haml\HamlHelpers.php';
?><p>
<li>
<?php echo Chtml::link($data->notes_name, array('notes/read', 'id'=>$data->id));; ?>
</li></p><p>
<?php echo Yii::t('notes', 'notes_author').": ".Chtml::link($data->notes_author, array('notes/search', 'notes_author'=>$data->notes_author));; ?>
</p><p>
<?php echo Yii::t('notes', 'notes_update').": ".$data->notes_update;; ?>
</p>
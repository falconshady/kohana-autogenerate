<?='<?php'?>

class <?=$className?> {

	public $tableName = <?=$tablename?>
<?php
$count = count($_POST['fieldName']);
?>
<?php for($i = 0; $i < $count; $i++): ?>
$field[] = array(
	'fieldName' => <?php echo $fieldName[$i]; ?>,
	'fieldType' => <?php echo $fieldType[$i]; ?>,
	'fieldTypeRelation' => <?php echo $fieldTypeRelation[$i]; ?>,
	'fieldRelationClass' => <?php echo $fieldRelationClass[$i]; ?>,
);

<?php endfor; ?>

}
<?php echo '<?php'; ?>

class Model_<?php echo $className; ?> extends ORM {
	
	public $_belongs_to = array(
		<?php foreach($belongs_to as $belongs): ?>
		$<?=$belongs['name'];?> = array(
			'model' => '<?=$belongs['model']?>',
		);
		<?php endforeach; ?>
	);
	
	public $_has_one = array();
	
	public $_has_many = array();
	
	public $_table_name = '<?php echo strtolower(Inflector::plural($className)); ?>';
	public $_primary_key = 'id';
	
}

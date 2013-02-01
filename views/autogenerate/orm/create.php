<?php echo '<?php'; ?>

class Model_<?=$className?> extends ORM {
	
	public $_belongs_to = array(
		<?php foreach($belongs_to as $name => $belongs): ?>
		'<?=$name?>' => array(
			'model' => '<?=$belongs['model']?>',
			'foreign_key' => '<?=$belongs['foreign_key']?>_id',
		),
		<?php endforeach; ?>
	);
	
	public $_has_one = array(
		<?php foreach($has_one as $name => $one): ?>
		'<?=$name?>' => array(
			'model' => '<?=$one['model']?>',
			'foreign_key' => '<?=$one['foreign_key']?>_id',
		),
		<?php endforeach; ?>
	);
	
	public $_has_many = array(
		<?php foreach($has_many as $name => $many): ?>
		'<?=$name?>' => array(
			'model' => '<?=$many['model']?>',
			<?php if(isset($many['foreign_key'])):?>
			'foreign_key' => '<?=$many['foreign_key']?>_id',
			<?php endif; ?>
			<?php if(isset($many['through'])):?>
			'through' => '<?=$many['table']?>',
			<?php endif; ?>
		),
		<?php endforeach; ?>
	);
	
	public $_table_name = '<?=$tableName?>';
	public $_primary_key = 'id';
	
}

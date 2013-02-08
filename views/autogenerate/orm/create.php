<?php echo '<?php'; ?>

class Model_<?=$className?> extends ORM {
	
	public $_belongs_to = array(
		<?php foreach($belongs_to as $name => $belongs): ?>
		'<?=$name?>' => array(
			'model' => '<?= Kohana_Core::VERSION < 3.3 ? strtolower($belongs['model']) : $belongs['model']; ?>',
			'foreign_key' => '<?=$belongs['foreign_key']?>',
		),
		<?php endforeach;
		?>
	);
	
	public $_has_one = array(
		<?php foreach($has_one as $name => $one): ?>
		'<?=$name?>' => array(
			'model' => '<?= Kohana_Core::VERSION < 3.3 ? strtolower($one['model']) : $one['model']; ?>',
			'foreign_key' => '<?=$one['foreign_key']?>',
		),
		<?php endforeach;
		?>
	);
	
	public $_has_many = array(
		<?php foreach($has_many as $name => $many): ?>
		'<?=$name?>' => array(
			'model' => '<?= Kohana_Core::VERSION < 3.3 ? strtolower($many['model']) : $many['model']; ?>',
			<?php if(isset($many['foreign_key'])):?>
			'foreign_key' => '<?=$many['foreign_key']?>',
			<?php endif; ?>
			<?php if(isset($many['through'])):?>
			'through' => '<?=$many['table']?>',
			<?php endif; ?>
		),
		<?php endforeach;
		?>
	);
	
	public $_table_name = '<?=$tableName?>';
	public $_primary_key = 'id';
	
}

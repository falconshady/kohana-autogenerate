<?php echo "<?php defined('SYSPATH') or die('No direct script access.');"; ?>
<?php $object = strtolower($className); ?>

class Controller_<?php echo $className; ?> extends Controller_Template {

	public $template = 'index';
	
	public function before()
	{
		parent::before();
	}
	
	public function action_index()
	{
		$view = new View('<?php echo $object; ?>/index');
		
		$view-><?php echo Inflector::plural($object); ?> = ORM::factory('<?php echo $object; ?>')->find_all();
		
		$this->template->body = $view;
	}
	
	public function action_find()
	{
		$view = new View('<?php echo $object; ?>/find');
		
		$this->template->body = $view;
	}
	
	public function action_show()
	{
		$view = new View('<?php echo $object; ?>/show');
		
		$view-><?php echo $object; ?> = ORM::factory('<?php echo $object; ?>', $this->request->param('id'));
		
		$this->template->body = $view;
	}
	
	public function action_create()
	{
		$view = View::factory('<?php echo $object; ?>/create');
		
		$<?php echo $object; ?> = ORM::factory('<?php echo $object; ?>');
		
		if($this->request->post())
		{
			<?php
			$attributes = $this->request->post('migrateFields');
			
			foreach($attributes as $attribute):
				
				list($index, $attribute) = explode(':', $atribute); 
				if($index ! in_array('belongs_to', 'has_many', 'has_one')):
			?>
			$<?php echo $object,'->',$index,' = ',$attribute, '\n'; ?>
			<?php
				endif;
				
			endforeach;
			?>
			
			$<?php echo $object; ?>->save();
		}
		
		$view-><?php echo $object; ?> = $<?php echo $object; ?>;
		
		$this->template->body = $view;
	}
	
	public function action_update()
	{
		$view = View::factory('<?php echo $object; ?>/update');
		
		$<?php echo $object; ?> = ORM::factory('<?php echo $object; ?>', $_POST['id']);
			
		if($<?php echo $object; ?>->loaded())
		{
		
			if($this->request->post())
			{
				<?php echo '<?php $attributes = $this->request->post(); ?>' ?>
				<?php echo '<?php foreach($attributes as $index => $attribute): ?>' ?>
					$<?php echo $object; ?>-><?php echo $index; ?> = <?php echo $attribute; ?>
				<?php echo '<?php endforeach; ?>' ?>
				
				$<?php echo $object; ?>->save();
			}
			
			$view-><?php echo $object; ?> = $<?php echo $object; ?>;
		}
		
		
		$this->template->body = $view;
	}
	
	public function action_delete()
	{
		$view = View::factory('<?php echo $object; ?>/update');
			
		$<?php echo $object; ?> = ORM::factory('<?php echo $object; ?>', $this->request->param('id'));
		
		if($<?php echo $object; ?>->loaded())
		{
			if($this->request->post())
			{
				$<?php echo $object; ?>->delete();
			}
			
			$view-><?php echo $object; ?> = $<?php echo $object; ?>;
		}
		
		$this->template->body = $view;
	}
	
	
	//after method
	public function after()
	{
		parent::after();
	}
}

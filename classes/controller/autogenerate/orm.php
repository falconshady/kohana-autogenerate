<?php

class Controller_Autogenerate_Orm extends Controller_Template {

	public $template = 'autogenerate/index';
	
	public function action_index()
	{
		$view = new View('autogenerate/orm/index');
		$this->template->body = $view;
	}
	
	public function action_create()
	{
		$view = new View('autogenerate/orm/create');
		$view->className = $_POST['className'];
		$view->tableName = $_POST['tableName'];
		
		$fields = explode(' ', $_POST['migrateFields']);
		
		$view->belongs_to = [];
		$view->has_one = [];
		$view->has_many = [];
		
		foreach($fields as $field):
			if(strstr('belongs_to', $field)):
				list($name, $model) = explode(':', str_replace('belongs_to:', '', $field));
				$view->belongs_to[$name] = array('model' => $model, 'foreign_key' => $model.'_id');
			endif;
			if(strstr('has_one', $field)):
				list($name, $model) = explode(':', str_replace('has_one:', '', $field));
				$view->has_one[$name] = array('model' => $model, 'foreign_key' => strtolower($_POST['className']).'_id');
			endif;
			if(strstr('has_many', $field)):
				list($name, $model) = explode(':', str_replace('has_many:', '', $field));
				$view->has_many[$name] = array('model' => $model, 'foreign_key' => strtolower($_POST['className']).'_id');
			endif;
		endforeach;
		
		$filename = APPPATH.'classes/Model/'.$_POST['className'].'.php';
		$f = fopen($filename, 'w+');
		fwrite($f, $view->render());
		fclose($f);
		$this->redirect('autogenerate/orm/index');
	}

}

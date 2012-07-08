<?php

class Controller_Autogenerate_Migrate extends Controller_Template {

	public $template = 'autogenerate/index';

	public function action_index()
	{
		$view = new View('autogenerate/migrate/index');
		
		$this->template->body = $view;
	}
	
	public function action_create()
	{
		$view = new View('autogenerate/migrate/create');
		
		$view->className = $_POST['className'];
		
		$filename = APPPATH.'classes/migrate/'.strtolower($_POST['className']).'.php';
		
		$f = fopen($filename, 'w+');
		
		fwrite($f, $view->render());
		
		fclose($f);
		
		$this->request->redirect('autogenerate/migrate/index');
	}

	public function action_addfield()
	{
		$view = new View('autogenerate/migrate/addfield');
		
		$this->template->body = $view;
	}
	
	public function action_changemigrate()
	{
		$view = new View('autogenerate/migrate/addfield');
		
		$view->className = $_POST['className'];
		
		$filename = APPPATH.'classes/migrate/'.strtolower($_POST['className']).'.php';
		
		$f = fopen($filename, 'w+');
		
		fwrite($f, $view->render());
		
		fclose($f);
	}
}
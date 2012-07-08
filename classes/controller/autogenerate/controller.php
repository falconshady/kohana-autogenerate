<?php

class Controller_Autogenerate_Controller extends Controller_Template {

	public $template = 'autogenerate/index';

	public function action_index()
	{
		$view = new View('autogenerate/controller/index');
		
		$this->template->body = $view;
	}
	
	public function action_create()
	{
		$view = new View('autogenerate/controller/create');
		
		$view->className = $_POST['className'];
		
		$filename = APPPATH.'classes/controller/'.strtolower($_POST['className']).'.php';
		
		$f = fopen($filename, 'w+');
		
		fwrite($f, $view->render());
		
		fclose($f);
		
		$this->request->redirect('autogenerate/controller/index');
	}

}
<?php

class Controller_Autogenerate_Controller extends Controller_Template {

	public $template = 'autogenerate/index';

	public function action_index()
	{
		$view = View::factory('autogenerate/controller/index');
		
		$this->template->body = $view;
	}
	
	public function action_create()
	{
		$this->auto_render = FALSE;
		
		$view = new View('autogenerate/controller/create');
		
		$view->className = $this->request->post('className');
		
		$filename = APPPATH.'classes/controller/'.strtolower($_POST['className']).'.php';
		
		$f = fopen($filename, 'w+');
		
		fwrite($f, $view->render());
		
		fclose($f);
		
		
		if($this->request->is_initial())
			$this->request->redirect('autogenerate/controller/index');
		
		return;
	}

}

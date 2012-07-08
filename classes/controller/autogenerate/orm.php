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
		$filename = APPPATH.'classes/model/'.strtolower($_POST['className']).'.php';
		$f = fopen($filename, 'w+');
		fwrite($f, $view->render());
		fclose($f);
		$this->request->redirect('autogenerate/orm/index');
	}

}
<?php

class Controller_Autogenerate_Scaffold extends Controller_Template {

	public $template = 'autogenerate/index';

	public function action_index()
	{
		$view = new View('autogenerate/scaffold/index');
		$this->template->body = $view;
	}
	
	public function action_create()
	{
		$data = NULL;
		
		Request::factory('autogenerate/controller/create')
			->method('POST')
			->post($data)
			->execute();
		
		Request::factory('autogenerate/orm/create')
			->method('POST')
			->post($data)
			->execute();
		
		Request::factory('autogenerate/view/create')
			->method('POST')
			->post($data)
			->execute();
	
		$this->request->redirect('autogenerate/scaffold/index');
	}

}

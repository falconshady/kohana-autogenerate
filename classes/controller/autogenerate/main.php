<?php

class Controller_Autogenerate_Main extends Controller_Template {

	public $template = 'autogenerate/index';

	public function action_index()
	{
		$view = new View('autogenerate/main/index');
		$this->template->body = $view;
	}

}
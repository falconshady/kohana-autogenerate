<?php

class Controller_Autogenerate_Module extends Controller_Template {

	public $template = 'autogenerate/index';

	public function action_index()
	{
		$view = View::factory('autogenerate/module/index');
		$this->template->content = $view;
	}
	
	public function action_create()
	{
		$view = View::factory('autogenerate/module/create');
		$this->template->content = $view;
	}
	
	public function action_change()
	{
		$view = View::factory('autogenerate/module/change');
		$this->template->content = $view;
	}
	
	public function action_delete()
	{
	}

}

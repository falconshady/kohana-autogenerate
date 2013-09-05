<?php

class Controller_Autogenerate_Explorer extends Controller_Template {

	public $template = 'autogenerate/index';
	
	public function action_index()
	{
		$view = View::factory('autogenerate/explorer/index');
		$this->template->content = $view;
	}
	
	public function action_create()
	{
		if($this->request->post())
		{
			$filename = $this->request->post('filename');
			//TODO: create file
		}
	}
	
	public function action_open()
	{
		
	}
	
	public function action_edit()
	{
		
	}
	
	public function action_update()
	{
		
	}
	
	public function action_delete()
	{
		$filename = $this->request->post('filename');
		if(file_exists($filename))
		{
			delete($filename);
		}
	}

}

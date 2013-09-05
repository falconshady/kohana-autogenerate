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
			$file = file($filename);
			
		}
	}
	
	public function action_open()
	{
		$view = View::factory('autogenerate/explorer/open');
		$this->template->content = $view;
	}
	
	public function action_update()
	{
		if($this->request->post())
		{
			
		}
		
		$view = View::factory('autogenerate/explorer/open');
		$this->template->content = $view;
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

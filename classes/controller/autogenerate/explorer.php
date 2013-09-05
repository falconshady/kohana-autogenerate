<?php

class ControllerAuto_Autogenerate_Explorer extends Controller_Template {

	public $template = 'autogenerate/index';
	
	public function action_index()
	{
	
	}
	
	public function action_create()
	{
		
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

<?php

class Controller_Autogenerate_View extends Controller_Template {

	public $template = 'autogenerate/index';
	
	public function action_index()
	{
		$view = new View('autogenerate/view/index');
		$this->template->body = $view;
	}
	
	public function action_create()
	{
		$directory = str_replace('\\', '/', APPPATH.'views/'.strtolower($_POST['className']).'/');
		if(! file_exists($directory)):
			mkdir($directory);
		endif;
		
		
		$view = new View('autogenerate/view/create_index');
		$view->className = $_POST['className'];
		$filename = str_replace('\\', '/', APPPATH.'views/'.strtolower($_POST['className']).'/index.php');
		$f = fopen($filename, 'w+');
		fwrite($f, $view->render());
		fclose($f);
		
		$view = new View('autogenerate/view/create_show');
		$view->className = $_POST['className'];
		$filename = str_replace('\\', '/', APPPATH.'views/'.strtolower($_POST['className']).'/show.php');
		$f = fopen($filename, 'w+');
		fwrite($f, $view->render());
		fclose($f);
		
		$view = new View('autogenerate/view/create_new');
		$view->className = $_POST['className'];
		$filename = APPPATH.'views/'.strtolower($_POST['className']).'/new.php';
		$f = fopen($filename, 'w+');
		fwrite($f, $view->render());
		fclose($f);
		
		$view = new View('autogenerate/view/create_edit');
		$view->className = $_POST['className'];
		$filename = APPPATH.'views/'.strtolower($_POST['className']).'/edit.php';
		$f = fopen($filename, 'w+');
		fwrite($f, $view->render());
		fclose($f);
		
		$this->request->redirect('autogenerate/view/index');
	}

}
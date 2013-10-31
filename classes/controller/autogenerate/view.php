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
		$this->auto_render = FALSE;
		
		//create directory
		$directory = str_replace('\\', '/', APPPATH.'views/'.strtolower($_POST['className']).'/');
		if(! file_exists($directory)):
			mkdir($directory);
		endif;
		
		//create index view
		$view = new View('autogenerate/view/create_index');
		$view->className = $_POST['className'];
		$filename = str_replace('\\', '/', APPPATH.'views/'.strtolower($_POST['className']).'/index.php');
		$f = fopen($filename, 'w+');
		fwrite($f, $view->render());
		fclose($f);
		
		//create list view
		$view = new View('autogenerate/view/create_list');
		$view->className = $_POST['className'];
		$filename = str_replace('\\', '/', APPPATH.'views/'.strtolower($_POST['className']).'/_list.php');
		$f = fopen($filename, 'w+');
		fwrite($f, $view->render());
		fclose($f);
		
		//create find view
		$view = new View('autogenerate/view/create_find');
		$view->className = $_POST['className'];
		$filename = str_replace('\\', '/', APPPATH.'views/'.strtolower($_POST['className']).'/find.php');
		$f = fopen($filename, 'w+');
		fwrite($f, $view->render());
		fclose($f);
		
		//create show view
		$view = new View('autogenerate/view/create_show');
		$view->className = $_POST['className'];
		$filename = str_replace('\\', '/', APPPATH.'views/'.strtolower($_POST['className']).'/show.php');
		$f = fopen($filename, 'w+');
		fwrite($f, $view->render());
		fclose($f);
		
		//crate form view
		$view = new View('autogenerate/view/create_form');
		$view->className = $_POST['className'];
		$filename = APPPATH.'views/'.strtolower($_POST['className']).'/_form.php';
		$f = fopen($filename, 'w+');
		fwrite($f, $view->render());
		fclose($f);
		
		//crate create view
		$view = new View('autogenerate/view/create_create');
		$view->className = $_POST['className'];
		$filename = APPPATH.'views/'.strtolower($_POST['className']).'/create.php';
		$f = fopen($filename, 'w+');
		fwrite($f, $view->render());
		fclose($f);
		
		//create update view
		$view = new View('autogenerate/view/create_update');
		$view->className = $_POST['className'];
		$filename = APPPATH.'views/'.strtolower($_POST['className']).'/update.php';
		$f = fopen($filename, 'w+');
		fwrite($f, $view->render());
		fclose($f);
		
		//create delete view
		$view = new View('autogenerate/view/create_delete');
		$view->className = $_POST['className'];
		$filename = APPPATH.'views/'.strtolower($_POST['className']).'/delete.php';
		$f = fopen($filename, 'w+');
		fwrite($f, $view->render());
		fclose($f);
		
		if($this->request->is_initial())
			$this->request->redirect('autogenerate/view/index');
		
		return;
	}

}

<?php

class Controller_Autogenerate_Migrate extends Controller_Template {

	public $template = 'autogenerate/index';

	public function action_index()
	{
		$view = new View('autogenerate/migrate/index');
		
		$migrates = opendir(APPPATH.'migrates');
		
		$view->migrates = $migrates;
		
		$this->template->body = $view;
	}
	
	public function action_create()
	{
		$view = new View('autogenerate/migrate/create');
		
		$migrate = new stdClass();
		
		$migrate->className = $_POST['className'];
		$migrate->tableName = $_POST['tableName'];
		
		$migrate->fields = explode(' ', $_POST['migrateFields']);
		
		$filename = APPPATH.'migrates/'.strtolower($migrate->className).'.php';
		
		$f = fopen($filename, 'w+');
		
		fwrite($f, json_encode($migrate));
		
		fclose($f);
		
		$this->request->redirect('autogenerate/migrate/index');
	}
	
	public function action_view()
	{
		$className = $this->request->param('id');
		
		$filename = APPPATH.'migrates/'.strtolower($className).'.php';
		
		$migrate = json_decode(file_get_contents($filename));
		
		$view = new View('autogenerate/migrate/view');
		
		$view->migrate = $migrate;
		
		$this->template->body = $view;
	}
	
	public function action_database()
	{
		$className = $this->request->param('id');
		
		$filename = APPPATH.'migrates/'.strtolower($className).'.php';
		if(! file_exists($filename)):
			$this->request->redirect('autogenerate/migrate/index');
		endif;
		
		$migrate = json_decode(file_get_contents($filename));
		
		$table = Database_Table::instance($migrate->tableName);
		
		if(! $table)
		{
			//criar tabela
			$table = Database_Table::factory($migrate->tableName);
			//adicionar primary key
			$primary_key = Database_Column::factory('int unsigned');
			$primary_key->name = 'id';
			$primary_key->datatype = 'int';
			$primary_key->scale = 11;
			$primary_key->nullable = false;
			$primary_key->auto_increment = true;
			$table->add_column($primary_key);
			$table->add_primary_key(Database_Constraint::primary_key(array('id'), $migrate->tableName));
			
			foreach($migrate->fields as $field):
				//gera array da coluna
				$field = explode(':', $field);
				$column = NULL;
				//verifica o tipo de dado para gerar a coluna
				switch($field[1])
				{
					case 'bool' : {
						//cria um bool
						$column = Database_Column::factory('bool');
						$column->name = $field[0];
						$column->nullable = false;
					}break;
					case 'int' : {
						//cria um int
						$column = Database_Column::factory('int unsigned');
						$column->name = $field[0];
						$column->scale = isset($field[2]) ? : 11;
						$column->nullable = false;
					}break;
					case 'references' : {
						//cria uma referencia int 11
						$column = Database_Column::factory('int unsigned');
						$foreign_key = $field[0].'_id';
						$column->name = $foreign_key;
						$column->scale = 11;
						$column->nullable = false;
						$table->add_constraint(Database_Constraint::foreign_key(array($foreign_key), $migrate->tableName));
					}break;
					case 'decimal' : {
						//cria um decimal
						$column = Database_Column::factory('decimal');
						$column->name = $field[0];
						$column->scale = isset($field[2]) ? $field[2] : '11,2';
						$column->nullable = false;
					}break;
					case 'string' : {
						//cria uma string
						$column = new Database_Column_String(DBForge_Database::instance());
						$column->name = $field[0];
						$column->scale = isset($field[2]) ? $field[2] : 255;
						$column->datatype = 'varchar('.$column->scale.')';
						$column->nullable = false;
					}break;
					case 'text' : {
						//cria um text
						$column = Database_Column::factory('text');
						$column->name = $field[0];
						$column->nullable = false;
					}
				}
				//adiciona a coluna obtida
				$table->add_column($column);
			endforeach;
		}
		else {
			//alterar a tabela
			foreach($migrate->fields as $field):
				//verifica o tipo de dado
				if(Database_Column::instance($migrate->tableName, $field[1])):
				
				endif;
			endforeach;
		}
		
		$table->create();
		
		$this->request->redirect('autogenerate/migrate/index');
	}
}
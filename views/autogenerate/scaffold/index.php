<?php $view = new View('autogenerate/menu'); echo $view;?>
<div class="span10">
	<h1>AutoGenerate Scaffold</h1>
	<?php echo Form::open('autogenerate/scaffold/create'); ?>
	<label>Nome da Classe:</label>
	<input type="text" name="className" />
	<label>Nome da Tabela:</label>
	<input type="text" name="tableName" />
	<p>Exemplo: users</p>
	<label>Campos:</label>
	<textarea name="migrateFields" rows="5" class="span12"></textarea>
	<p><input type="submit" name="create" value="Criar" class="btn btn-success" /></p>
	<?php echo Form::close(); ?>
</div>

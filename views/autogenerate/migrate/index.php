<?php $view = new View('autogenerate/menu'); echo $view;?>
<div class="span10">
	<h1>AutoGenerate Migrate</h1>
	<?php echo Form::open('autogenerate/migrate/create'); ?>
	<label>Nome da Classe:</label>
	<input type="text" name="className" />
	<p>Exemplo: User</p>
	<label>Nome da Tabela:</label>
	<input type="text" name="tableName" />
	<p>Exemplo: users</p>
	<label>Campos:</label>
	<textarea name="migrateFields" rows="5" class="span12"></textarea>
	<p>Exemplo: username:string:32 password:string:32 email:string belongs_to:group:Group has_many:orders:Order date_created:datetime date_updated:datetime</p>
	
	<p><input type="submit" name="create" value="Criar" class="btn btn-success" /></p>
	<?php echo Form::close(); ?>
	
	<table class="table table-bordered">
	<thead>
		<tr>
			<th>Migrate</th>
			<th>Generate ou Update</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
	<?php
	while ($migrate = readdir($migrates))
		{
			if($migrate != '.' && $migrate != '..')
			{
	?>
		<tr>
			<td><?php echo Html::anchor('autogenerate/migrate/view/'.str_replace('.php', '', $migrate), ucfirst(str_replace('.php', '', $migrate))); ?></td>
			<td><?php echo Html::anchor('autogenerate/migrate/database/'.str_replace('.php', '', $migrate), 'Database', array('title' => 'Generate ou Change Table')); ?></td>
			<td><?php echo Html::anchor('autogenerate/migrate/delete/'.str_replace('.php', '', $migrate), 'Delete', array('title' => 'Delete Migrate')); ?></td>
		</tr>
	<?php
			}
		}
	?>
	</tbody>
	</table>
</div>

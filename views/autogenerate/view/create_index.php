<h1><?php echo Inflector::plural($className); ?></h1>
<?php $object = strtolower($className); ?>
<p><?php echo '<?php echo Html::anchor(\''.$object.'\create\', \'Create\', array(\'class\' => \'btn btn-primary\')); ?>'; ?></p>
<table class="table table-bordered">
<thead>
	<tr>
		<td>Show</td>
		<td>Edit</td>
		<td>Delete</td>
	</tr>
</thead>
<tbody>
<?php echo "<?php foreach($".Inflector::plural($object)." as $".$object."): ?>"; ?>
	
	<tr>
		<td><?php echo '<?php echo Html::anchor("'.$object.'/show/{$'.$object.'->id}", "Show"); ?>'; ?></td>
		<td><?php echo '<?php echo Html::anchor("'.$object.'/edit/{$'.$object.'->id}", "Edit"); ?>'; ?></td>
		<td><?php echo '<?php echo Html::anchor("'.$object.'/delete/{$'.$object.'->id}", "Delete"); ?>'; ?></td>
	</tr>
<?php echo "<?php endforeach; ?>"; ?>

</tbody>
</table>

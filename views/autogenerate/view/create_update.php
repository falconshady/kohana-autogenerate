<h1>Edit <?php echo $className; ?></h1>
<?php $object = strtolower($className); ?>
<?php
echo '<?php echo '; ?>Form::open('<?php echo $object; ?>/update/'.$<?php echo $object; ?>->id<?php echo '); ?>'; ?>
<?php
/**
foreach($fields as $field): ?>
<label><?php echo $field->name; ?></label>
<?php
switch($field->type)
{
	case 'references' :	{
	?>
	<select name="">
	<?php echo '<?php '; ?>foreach(): <?php echo '?>'; ?>
	<option value="<?php echo '<?php ','', '?>'; ?>"><?php echo '<?php ','', '?>'; ?></option>
	<?php echo '<?php '; ?>endforeach; <?php echo '?>'; ?>
	</select>
	<?php
	} break;
	
	case 'text' : {
	?>
	<textarea name="<?php echo '<?php ','', '?>'; ?>"><?php echo '<?php ','', '?>'; ?></textarea>
	<?php
	} break;
	
	case 'string' :
	case 'integer' :
	case 'decimal' :
	case 'date' :
	case 'datetime' :
	case 'timestamp' :
	default: {
		echo '<input type="text" name="'.$className.'['.$field->name.']" />';
	}
}
echo $input;
?>

<?php endforeach;
/**/
?>

<p><input type="submit" name="update" value="Update" class="btn btn-primary" /> &nbsp; <?php echo '<?php echo Html::anchor("'.strtolower($className).'/index", "Back", array("class" => "btn")); ?>'; ?></p>
<?php echo '<?php echo '; ?>Form::close();<?php echo '?>'; ?>

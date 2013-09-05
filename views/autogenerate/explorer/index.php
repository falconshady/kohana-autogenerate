<?php $view = new View('autogenerate/menu'); echo $view;?>
<div class="span10">
	<div>
		<?php echo Form::open('autogenerate/explorer/changedir/'); ?>
		<input type="text" name="directory">
		<input type="submit" name="changedir" value="ChangeDirectory">
		<?php echo Form::close(); ?>
	</div>
	<div>
		<?php //TODO: list directory ?>
	</div>
</div>

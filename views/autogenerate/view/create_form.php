<?php echo '<?php echo '; ?>Form::open('<?php echo $object; ?>/create');<?php echo '?>'; ?>

<?php //TODO: create labels and inputs ?>

<input type="submit" name="create" value="<?php echo __('Create'); ?>" class="btn btn-primary" /> &nbsp; <?php echo '<?php echo Html::anchor("'.$object.'/index", "<?php echo __('Back'); ?>", array("class" => "btn")); ?>'; ?>
<?php echo '<?php echo '; ?>Form::close();<?php echo '?>'; ?>

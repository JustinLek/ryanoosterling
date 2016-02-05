<h1>Starving Monsters Theme options</h1>
<?php settings_errors(); ?>
<form method="post" action="options.php">
	<?php settings_fields('sm-settings-group'); ?>
	<?php do_settings_sections('starving_monsters'); ?>
	<?php submit_button(); ?>
</form>
<div class="wrap">

	<h1><?php echo __( 'SM Theme Switcher Settings.', 'sm-theme-switcher' ) ?></h1>

	<form action="options.php" method="post" autocomplete="off">

		<?php
		settings_fields( 'sm_theme_switcher_settings_page' );
		do_settings_sections( 'sm_theme_switcher_settings_page' );
		submit_button();
		?>

	</form>

	<p><strong><?php echo __( 'NOTE', 'sm-theme-switcher' ) ?>:</strong>
	<?php echo __( 'If you do not select a topic, assign the default theme', 'sm-theme-switcher' ) ?></p>

</div>
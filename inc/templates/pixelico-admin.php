<h1>Pixelico Theme Optoins</h1>
<p class="description">Customize the default wordpress appearance options.</p>
<?php settings_errors(); ?>
<form action="options.php" method="post">
    <?php settings_fields('pixelico-settings-group'); ?>
    <?php do_settings_sections('pixelico-manage-options'); ?>
    <?php submit_button(); ?>
</form>
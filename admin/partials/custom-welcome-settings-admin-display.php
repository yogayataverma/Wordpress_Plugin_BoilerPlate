<div class="wrap">
    <h1>Custom Welcome Settings</h1>
    <form method="post" action="options.php">
        <?php
        settings_fields('cwp_settings_group');
        do_settings_sections('custom-welcome-settings');
        submit_button();
        ?>
    </form>
</div>

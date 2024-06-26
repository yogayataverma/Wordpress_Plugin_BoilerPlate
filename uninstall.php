<?php

if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

// Clear stored options
delete_option('cwp_welcome_message');
delete_option('cwp_background_color');

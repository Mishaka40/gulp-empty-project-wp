<?php 
define( 'TEMPLATE_PATH', get_template_directory_uri() );

add_action('after_setup_theme', function () {
    add_theme_support('post-thumbnails');
});

add_action('wp_enqueue_scripts', function () {
    global $this_page_scripts;
    global $this_page_styles;
    
    if (!empty($this_page_scripts)) {
        foreach ($this_page_scripts as $handle => $src) {
            if ($src) {
                wp_enqueue_script($handle, $src, array('jquery'), null, true);
            } else {
                wp_enqueue_script($handle);
            }
        }
    }
    if (!empty($this_page_styles)) {
        foreach ($this_page_styles as $handle => $src) {
            wp_enqueue_style($handle, $src, array(), '', 'all');
        }
    }
});
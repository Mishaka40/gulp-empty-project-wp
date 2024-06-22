<?php 
define( 'TEMPLATE_PATH', get_template_directory_uri() );

include_once __DIR__ . '/includes/ajax-actions.php';

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

function load_custom_admin_style(){
    wp_register_style( 'admin-custom-styles', TEMPLATE_PATH.'/css/admin.css', false, '1.0.0' );
    wp_enqueue_style( 'admin-custom-styles' );
}
add_action('admin_enqueue_scripts', 'load_custom_admin_style');

function render_acf_flexible_thumbnail( $title, $field, $layout, $i ) {
    if(isset($layout['label']) && str_contains($layout['label'], 'acfe-flexible-layout-thumbnail')) {
        $new_title = $title.'</span></div><div class="acfe-flexible-layout-header">';
        $new_title .= $layout['label'];
        return $new_title;
    } else {
        return $title;
    }
}
add_filter('acf/fields/flexible_content/layout_title/name=sections', 'render_acf_flexible_thumbnail', 10, 4);
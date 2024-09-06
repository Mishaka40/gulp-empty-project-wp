<?php 
define( 'TEMPLATE_PATH', get_template_directory_uri() );

include_once __DIR__ . '/includes/ajax-actions.php';

add_action('after_setup_theme', function () {
    add_theme_support('post-thumbnails');
});

function get_file_version($file_path) {
    if (file_exists($file_path)) {
        return filemtime($file_path);
    } else {
        return '0';
    }
}
add_action('wp_enqueue_scripts', function () {
    global $this_page_scripts;
    global $this_page_styles;
    global $require_jquery;
    
    if($require_jquery) {
        wp_enqueue_script('jquery');
    } else {
        wp_deregister_script('jquery');
    }
    
    $stylesheet_directory = get_stylesheet_directory_uri();
    $theme_directory = get_template_directory();
    
    if (!empty($this_page_scripts)) {
        foreach ($this_page_scripts as $handle => $src) {
            if ($src) {
                if(!str_contains($src, '//')){
                    $file_path = $theme_directory . $src;
                    $file_uri = $stylesheet_directory . $src;
                    $version = get_file_version($file_path);
                } else {
                    $file_uri = $src;
                    $version = null;
                }
                wp_enqueue_script($handle, $file_uri, array(), $version, true);
            } else {
                wp_enqueue_script($handle);
            }
        }
    }
    if (!empty($this_page_styles)) {
        foreach ($this_page_styles as $handle => $src) {
            if ($src) {
                if(!str_contains($src, '//')){
                    $file_path = $theme_directory . $src;
                    $file_uri = $stylesheet_directory . $src;
                    $version = get_file_version($file_path);
                } else {
                    $file_uri = $src;
                    $version = null;
                }
                wp_enqueue_style($handle, $file_uri, array(), $version);
            } else {
                wp_enqueue_style($handle);
            }
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

function add_404_page_to_front_page_settings() {
    add_action('admin_footer-options-reading.php', function() {
        ?>
        <script>
          document.addEventListener('DOMContentLoaded', function() {
            var frontStaticPages = document.getElementById('front-static-pages');
            if (frontStaticPages) {
              var ul = frontStaticPages.querySelector('ul');
              if (ul) {
                var li = document.createElement('li');
                li.innerHTML = `
                    <label for="page_for_404">
                        404 Page:
                        <select name="page_for_404" id="page_for_404">
                            <option value="0">— Select —</option>
                            <?php
                $page_for_404 = get_option('page_for_404');
                $pages = get_pages();
                foreach ( $pages as $page ) {
                    $selected = ($page->ID == $page_for_404) ? 'selected="selected"' : '';
                    echo '<option value="' . esc_attr($page->ID) . '" ' . $selected . '>' . esc_html($page->post_title) . '</option>';
                }
                ?>
                        </select>
                    </label>
                `;
                ul.appendChild(li);
              }
            }
          });
        </script>
        <?php
    });
}
add_action('admin_init', 'add_404_page_to_front_page_settings');

function register_404_page_setting() {
    register_setting('reading', 'page_for_404');
}
add_action('admin_init', 'register_404_page_setting');

function custom_404_redirect() {
    if (is_404()) {
        $page_for_404 = get_option('page_for_404');
        if ($page_for_404) {
            wp_redirect(get_permalink($page_for_404));
            exit;
        }
    }
}
add_action('template_redirect', 'custom_404_redirect');

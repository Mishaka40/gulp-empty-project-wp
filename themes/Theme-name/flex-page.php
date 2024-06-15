<?php
    /*
      Template Name: Flexible page
    */
    
    global $this_page_styles;
    global $this_page_scripts;
    
    $this_page_styles = array();
    $this_page_scripts = array();
    
    $acf_page = get_fields()['page_flex'];
    
    function getAcfSection($slug=''){
        global $acf_page;
        
        $found_key = array_search($slug, array_column($acf_page, 'acf_fc_layout'));
        
        if(!is_numeric($found_key)){
            return [];
        }
        $found_item = $acf_page[$found_key];
        
        $acf_page[$found_key] = ['acf_fc_layout'=>false];
        
        return $found_item;
    }
    
    ob_start();
    if(have_rows('page_flex')):
        while(have_rows('page_flex')): the_row();
            get_template_part( 'template-parts/'. get_row_layout() );
        endwhile;
    endif;
    $sections_html = ob_get_clean();

?>

<?php get_header(); ?>

<?php echo $sections_html; ?>

<?php get_footer();
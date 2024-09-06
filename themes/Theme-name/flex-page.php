<?php
    /*
      Template Name: Flexible page
    */
    
    global $this_page_styles;
    global $this_page_scripts;
    
    $this_page_styles = array();
    $this_page_scripts = array();
    
    $acf_page = get_field('sections');
    
    ob_start();
    if(!empty($acf_page)):
        foreach($acf_page as $index=>$acf_page_section):
            $id = $acf_page_section['acf_fc_layout'].'-'.$index;
            get_template_part( 'template-parts/'. $acf_page_section['acf_fc_layout'], null, ['id' => $id, 'section' => $acf_page_section] );
        endforeach;
    endif;
    $sections_html = ob_get_clean();
?>

<?php get_header(); ?>

<?php echo $sections_html; ?>

<?php get_footer();
<?php
    global $this_page_styles;
    global $this_page_scripts;
    
    $section = $args['section'] ?? [];
    
    if(empty($section)){
        return '';
    }
    
    $this_page_styles['s-'.$section['acf_fc_layout']] = '/css/sections/promo.css';
    $this_page_scripts['s-'.$section['acf_fc_layout']] = '/js/sections/promo.js';
    
    /*
     * Quick php copy pastes
     * <?= TEMPLATE_PATH ?>/img/
     *
     * <?php if($section['big_text']) { ?>
     * <?= $section['big_text'] ?>
     * <?php } ?>
     *
     * <?php foreach($section['big_text'] as $item) { ?>
     * <?= $item['text'] ?>
     * <?php } ?>
    */
?>
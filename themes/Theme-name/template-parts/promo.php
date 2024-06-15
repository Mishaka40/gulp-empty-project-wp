<?php
  global $this_page_styles;
  global $this_page_scripts;
  
  
  $this_page_styles['s-promo'] = '/assets/redesign/css/sections/promo.css';
  $this_page_scripts['s-promo'] = '/assets/redesign/js/sections/ui-slider.js';
  
  
  $section = getAcfSection('promo');
  
/*
<?=TEMPLATE_PATH?>
<?php if($section['big_text']) { ?>
  <span><?php echo $section['big_text'] ?></span>
<?php } ?>
*/
?>
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


<?php if(!empty($section['input_fields'])){ ?>
    <?php foreach($section['input_fields'] as $index=>$field){ ?>
        <?php if ($field['input_type'] !== 'hidden'){ ?>
            <div class="input input--<?=$field['input_type']?>">
                <?php switch ($field['input_type']){
                    case 'text':
                    case 'tel':
                    case 'email': ?>
                        <input type="<?=$field['input_type']?>" name="<?=$field['name']?>" id="<?=$field['name'].$index?>" placeholder="<?=$field['placeholder']?>" data-validation="<?=$field['validation']?>" <?=$field['required'] ? 'required' : ''?>>
                        <?php if($field['label']){ ?>
                            <label for="<?=$field['name'].$index?>" class="input__span">
                                <span><?=$field['label']?></span>
                            </label>
                        <?php } ?>
                        <?php break;
                    case 'textarea': ?>
                        <textarea name="<?=$field['name']?>" placeholder="<?=$field['placeholder']?>" data-validation="<?=$field['validation']?>" <?=$field['required'] ? 'required' : ''?>></textarea>
                        <?php  break;
                    case 'select': ?>
                        <input class="output_text" type="text" id="<?=$field['name'].$index?>" placeholder="<?=$field['placeholder']?>" readonly="">
                        <input class="output_value" type="hidden" name="<?=$field['name']?>" data-validation="<?=$field['validation']?>" <?=$field['required'] ? 'required' : ''?>>
                        <?php if($field['label']){ ?>
                            <label for="<?=$field['name'].$index?>" class="input__span">
                                <span><?=$field['label']?></span>
                            </label>
                        <?php } ?>
                        <?php if(!empty($field['input_options'])){ ?>
                            <div class="input__dropdown" style="display: none;">
                                <ul>
                                    <?php foreach($field['input_options'] as $option){ ?>
                                        <li data-value="<?=$option['value']?>"><?=$option['text']?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        <?php } ?>
                        <?php break; ?>
                    <?php } ?>
            </div>
        <?php } else { ?>
            <input type="hidden" name="<?=$field['name']?>" value="<?=$field['hidden_input_value']?>" <?=$field['required'] ? 'required' : ''?>>
        <?php } ?>
    <?php } ?>
<?php } ?>
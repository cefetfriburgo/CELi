<?php
function hc_middle_css()
{

    echo '<style type="text/css" id="hc-middle-css">';

    _hc_middle_css();

    echo '</style>';
}

function _hc_middle_css()
{
    $bg_src_middle = hc_get_mod('middle_bg_image');

    hc_mod_css('.middle', 'background-color', 'middle_bg_color');

    if (!empty($bg_src_middle)) {
        hc_mod_css('.middle', 'background-image', 'middle_bg_image', 'url("', '")');
    }

    hc_mod_css_group(
        '.middle',
        array('color', 'mmenu_link_color'),
        array('background-repeat', 'middle_bg_repeat'),
        array('background-position', 'middle_bg_pos'),
        array('background-attachment', 'middle_bg_att'),
        array('background-size', 'middle_bg_size'),
        array('padding-top', 'middle_padding', '', 'px'),
        array('padding-bottom', 'middle_padding', '', 'px'),
        array('padding-left', 'middle_padding_lr', '', 'px'),
        array('padding-right', 'middle_padding_lr', '', 'px'),

        array('border-top-color', 'middle_bo_top_color'),
        array('border-top-width', 'middle_bo_top_width', '', 'px'),
        array('border-bottom-color', 'middle_bo_bottom_color'),
        array('border-bottom-width', 'middle_bo_bottom_width', '', 'px'),
        array('border-left-color', 'middle_bo_left_color'),
        array('border-left-width', 'middle_bo_left_width', '', 'px'),
        array('border-right-color', 'middle_bo_right_color'),
        array('border-right-width', 'middle_bo_right_width', '', 'px'),

        array('border-top-left-radius', 'middle_top-left_radius', '', 'px'),
        array('border-top-right-radius', 'middle_top-right_radius', '', 'px'),
        array('border-bottom-left-radius', 'middle_bottom-left_radius', '', 'px'),
        array('border-bottom-right-radius', 'middle_bottom-right_radius', '', 'px')
    );
}


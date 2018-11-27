<?php
function hc_submenus_css()
{

    echo '<style type="text/css" id="hc-submenus-css">';

    _hc_submenus_css();

    echo '</style>';
}


function _hc_submenus_css()
{
    hc_mod_css('.middle .primary .sub-menu', 'background-color', 'mmenu_item_bg_color', '', '', true, 'sm_bg_color');
    hc_mod_css('.middle .primary .sub-menu', 'min-width', 'sm_min_width', '', 'px');
    hc_mod_css_group(
        '.middle .primary > ul ul',
        array('border-top-width', 'sm_border_top_width', '', 'px'),
        array('font-size', 'sm_font_size', '', 'px'),
        array('border-bottom-width', 'sm_border_bottom_width', '', 'px'),
        array('border-left-width', 'sm_border_left_width', '', 'px'),
        array('border-right-width', 'sm_border_right_width', '', 'px'),
        array('border-color', 'sm_border_color'),
        array('box-shadow', 'sm_shadow')
    );
    hc_mod_css_group(
        '.middle .primary > ul .sub-menu li',
        array('border-top-width', 'sm_menu_items_border_top_width', '', 'px'),
        array('border-top-color', 'sm_menu_items_border_top_color'),
        array('border-bottom-width', 'sm_menu_items_border_bottom_width', '', 'px'),
        array('border-bottom-color', 'sm_menu_items_border_bottom_color')
    );
    hc_mod_css('.middle .primary > ul .sub-menu li > a', 'color', 'sm_link_color');
    hc_mod_css('.middle .primary > ul .sub-menu li:hover > a', 'color', 'sm_link_hover_color');
    hc_mod_css('.middle .primary > ul .sub-menu li:hover', 'background-color', 'sm_link_hover_background');
}


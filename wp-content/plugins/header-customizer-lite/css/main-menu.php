<?php
function hc_main_menu_css()
{

    echo '<style type="text/css" id="hc-main-menu-css">';

    _hc_main_menu_css();

    echo '</style>';
}


function _hc_main_menu_css()
{
    hc_mod_css_group(
        '.middle .primary > ul',
        array('margin-left', 'mmenu_margin_left', '', 'px'),
        array('margin-right', 'mmenu_margin_right', '', 'px')
    );

    hc_mod_css_group(
        '.middle .primary > ul > li > a',
        array('color', 'mmenu_link_color'),
        array('font-size', 'mmenu_font_size', '', 'px'),
        array('background-color', 'mmenu_link_bg_color'),
        array('padding-top', 'mmenu_link_padding', '', 'px'),
        array('padding-bottom', 'mmenu_link_padding', '', 'px'),
        array('padding-left', 'mmenu_link_padding_lr', '', 'px'),
        array('padding-right', 'mmenu_link_padding_lr', '', 'px')
    );

    echo '.middle .primary > ul > li > a {' . hc_set_font_css('mmenu_font_family') . '}';

    hc_mod_css('.middle .primary > ul > li', 'background-color', 'mmenu_item_bg_color');
    hc_mod_css_group(
        '.middle .primary > ul > li.active > a',
        array('color', 'mmenu_link_active_color'),
        array('background-color', 'mmenu_link_active_bg_color')
    );
    hc_mod_css('.middle .primary > ul > li.active', 'background-color', 'mmenu_item_active_bg_color');

    hc_mod_css_group(
        '.middle .primary > ul > li',
        array('background-color', 'mmenu_item_bg_color'),

        array('margin-top', 'mmenu_margin', '', 'px'),
        array('margin-bottom', 'mmenu_margin', '', 'px'),
        array('margin-left', 'mmenu_margin_lr', '', 'px'),
        array('margin-right', 'mmenu_margin_lr', '', 'px'),

        array('padding-top', 'mmenu_padding', '', 'px'),
        array('padding-bottom', 'mmenu_padding', '', 'px'),
        array('padding-left', 'mmenu_padding_lr', '', 'px'),
        array('padding-right', 'mmenu_padding_lr', '', 'px'),

        array('border-top-color', 'mmenu_item_border_top_color'),
        array('border-bottom-color', 'mmenu_item_border_bottom_color'),
        array('border-left-color', 'mmenu_item_border_left_color'),
        array('border-right-color', 'mmenu_item_border_right_color'),
        array('border-top-width', 'mmenu_item_border_top_width', '', 'px'),
        array('border-bottom-width', 'mmenu_item_border_bottom_width', '', 'px'),
        array('border-left-width', 'mmenu_item_border_left_width', '', 'px'),
        array('border-right-width', 'mmenu_item_border_right_width', '', 'px')
    );

    hc_mod_css('.middle nav.primary > ul > li > a:hover', 'color', 'mmenu_link_hover_color');

    hc_mod_css('.middle nav.primary > ul > li > a:hover', 'background-color', 'mmenu_link_hover_bg_color');

    hc_mod_css('.middle nav.primary > ul > li:hover', 'background-color', 'mmenu_item_hover_bg_color');


    if (hc_get_mod('mmenu_item_border_top-left_radius_first')) {
        hc_mod_css('.middle .primary > ul > li:first-child', 'border-top-left-radius', 'mmenu_item_border_top-left_radius', '', 'px');
    } else {
        hc_mod_css('.middle .primary > ul > li', 'border-top-left-radius', 'mmenu_item_border_top-left_radius', '', 'px');
    }

    if (hc_get_mod('mmenu_item_border_bottom-left_radius_first')) {
        hc_mod_css('.middle .primary > ul > li:first-child', 'border-bottom-left-radius', 'mmenu_item_border_bottom-left_radius', '', 'px');
    } else {
        hc_mod_css('.middle .primary > ul > li', 'border-bottom-left-radius', 'mmenu_item_border_bottom-left_radius', '', 'px');
    }

    if (hc_get_mod('mmenu_item_border_top-right_radius_last')) {
        hc_mod_css('.middle .primary > ul > li:last-child', 'border-top-right-radius', 'mmenu_item_border_top-right_radius', '', 'px');
    } else {
        hc_mod_css('.middle .primary > ul > li', 'border-top-right-radius', 'mmenu_item_border_top-right_radius', '', 'px');
    }

    if (hc_get_mod('mmenu_item_border_bottom-right_radius_last')) {
        hc_mod_css('.middle .primary > ul > li:last-child', 'border-bottom-right-radius', 'mmenu_item_border_bottom-right_radius', '', 'px');
    } else {
        hc_mod_css('.middle .primary > ul > li', 'border-bottom-right-radius', 'mmenu_item_border_bottom-right_radius', '', 'px');
    }

    hc_mod_css('.middle .primary > ul > li > a', 'border-radius', 'mmenu_link_border_radius', '', 'px');
}


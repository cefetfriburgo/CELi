<?php
function hc_general_css()
{
    echo '<style type="text/css" id="hc-main-css">';

    _hc_general_css();

    echo '</style>';
}

function _hc_general_css()
{
    $width = hc_get_mod('header_width');
    $width_stretch = hc_get_mod('header_width_stretch');

    if (!$width_stretch && $width !== '100%')
    {
        hc_mod_css('.inner', 'max-width', 'header_width', '', 'px');
    }
    elseif ($width_stretch && $width !== '100%')
    {
        hc_mod_css('.middle > .container', 'max-width', 'header_width', '', 'px');
        hc_mod_css('.top > .container', 'max-width', 'header_width', '', 'px');
        hc_mod_css('.bottom > .container', 'max-width', 'header_width', '', 'px');
    }

    if ($width === '100%')
    {
        echo '.hc-wrap .inner {max-width: 100%;}';
        echo '.hc-wrap .middle .container {max-width: 100%;}';
        echo '.hc-wrap .top .container {max-width: 100%;}';
        echo '.hc-wrap .bottom .container {max-width: 100%;}';
    }

    $left_pos = hc_get_mod('header_pos_left');
    if (!empty($left_pos)) {
        echo ".hc-wrap .inner{left: {$left_pos}px;margin-left:0;margin-right:0;}";
    }

    $margin_top    = hc_get_mod('header_margin_top');
    $margin_bottom = hc_get_mod('header_margin_bottom');
    $margin_left   = hc_get_mod('header_margin_left');
    $margin_right  = hc_get_mod('header_margin_right');

    echo ".hc-wrap {margin-top: {$margin_top}px;}";
    echo ".hc-wrap {margin-bottom: {$margin_bottom}px;}";
    echo ".hc-wrap {margin-left: {$margin_left}px;}";
    echo ".hc-wrap {margin-right: {$margin_right}px;}";

    $custom_css = hc_get_mod('hc_custom_css');
    if (!empty($custom_css)) {
        echo $custom_css;
    }

    echo '.hc-wrap {' . hc_set_font_css('header_font') . '}';
}


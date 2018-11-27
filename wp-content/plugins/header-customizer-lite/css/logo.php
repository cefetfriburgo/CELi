<?php
function hc_logo_css()
{
    echo '<style type="text/css" id="hc-logo-css">';

    _hc_logo_css();

    echo '</style>';
}


function _hc_logo_css()
{
    hc_mod_css_group(
        '.nav-wrap',
        array('padding-top', 'logo_padding', '', 'px'),
        array('padding-bottom', 'logo_padding', '', 'px')
    );

    hc_mod_css_group(
        '.nav-wrap .logo',
        array('color', 'site_title_color'),
        array('font-size', 'site_title_font_size', '', 'px')
    );

    echo '.hc-wrap .nav-wrap .logo {' . hc_set_font_css('logo_font_family') . '}';

    hc_mod_css_group(
        '.nav-wrap .description',
        array('color', 'site_description_color'),
        array('font-size', 'site_description_font_size', '', 'px')
    );

    echo '.hc-wrap .nav-wrap .description {' . hc_set_font_css('desc_font_family') . '}';

    hc_mod_css('.nav-wrap img', 'max-width', 'logo_max_width', '', 'px');
    hc_mod_css('.nav-wrap .logo:hover', 'color', 'site_title_hover_color');
}


<?php
global $hc_fonts_family_mapping, $hc_fonts_style_mapping, $hc_mods_font_families,
    $hc_loaded_fonts;

$hc_loaded_fonts = array();

$hc_fonts_family_mapping = array(
    'Open Sans 300' => 'Open+Sans:300',
    'Open Sans 300 Italic' => 'Open+Sans:300italic',
    'Open Sans 400' => 'Open+Sans:400',
    'Open Sans 400 Italic' => 'Open+Sans:400italic',
    'Open Sans 600' => 'Open+Sans:600',
    'Open Sans 600 Italic' => 'Open+Sans:600italic',
    'Open Sans 700' => 'Open+Sans:700',
    'Open Sans 700 Italic' => 'Open+Sans:700italic',
    'Open Sans 800' => 'Open+Sans:800',
    'Open Sans 800 Italic' => 'Open+Sans:800italic',

    'Roboto 100' => 'Roboto:100',
    'Roboto 100 Italic' => 'Roboto:100italic',
    'Roboto 300' => 'Roboto:300',
    'Roboto 300 Italic' => 'Roboto:300italic',
    'Roboto 400' => 'Roboto:400',
    'Roboto 400 Italic' => 'Roboto:400italic',
    'Roboto 500' => 'Roboto:500',
    'Roboto 500 Italic' => 'Roboto:500italic',
    'Roboto 700' => 'Roboto:700',
    'Roboto 700 Italic' => 'Roboto:700italic',
    'Roboto 900' => 'Roboto:900',
    'Roboto 900 Italic' => 'Roboto:900italic',

    'Lato 100' => 'Lato:100',
    'Lato 100 Italic' => 'Lato:100italic',
    'Lato 300' => 'Lato:300',
    'Lato 300 Italic' => 'Lato:300italic',
    'Lato 400' => 'Lato:400',
    'Lato 400 Italic' => 'Lato:400italic',
    'Lato 700' => 'Lato:700',
    'Lato 700 Italic' => 'Lato:700italic',
    'Lato 900' => 'Lato:900',
    'Lato 900 Italic' => 'Lato:900italic',

    'Slabo' => 'Slabo+27px',

    'Oswald 300' => 'Oswald:300',
    'Oswald 400' => 'Oswald:400',
    'Oswald 700' => 'Oswald:700',

    'Roboto Condensed 300' => 'Roboto+Condensed:300',
    'Roboto Condensed 300 Italic' => 'Roboto+Condensed:300italic',
    'Roboto Condensed 400' => 'Roboto+Condensed:400',
    'Roboto Condensed 400 Italic' => 'Roboto+Condensed:400italic',
    'Roboto Condensed 700' => 'Roboto+Condensed:700',
    'Roboto Condensed 700 Italic' => 'Roboto+Condensed:700italic',

    'PT Sans 400' => 'PT+Sans:400',
    'PT Sans 400 Italic' => 'PT+Sans:400italic',
    'PT Sans 700' => 'PT+Sans:700',
    'PT Sans 700 Italic' => 'PT+Sans:700italic'
);

$hc_fonts_style_mapping = array(
    'Open Sans 300' => "font-family:'Open Sans'; font-weight:300;",
    'Open Sans 300 Italic' => "font-family:'Open Sans'; font-weight:300; font-style:italic;",
    'Open Sans 400' => "font-family:'Open Sans'; font-weight:400;",
    'Open Sans 400 Italic' => "font-family:'Open Sans'; font-weight:400; font-style:italic;",
    'Open Sans 600' => "font-family:'Open Sans'; font-weight:600;",
    'Open Sans 600 Italic' => "font-family:'Open Sans'; font-weight:600; font-style:italic;",
    'Open Sans 700' => "font-family:'Open Sans'; font-weight:700;",
    'Open Sans 700 Italic' => "font-family:'Open Sans'; font-weight:700; font-style:italic;",
    'Open Sans 800' => "font-family:'Open Sans'; font-weight:800;",
    'Open Sans 800 Italic' => "font-family:'Open Sans'; font-weight:800; font-style:italic;",

    'Roboto 100' => "font-family:Roboto; font-weight:100;",
    'Roboto 100 Italic' => "font-family:Roboto; font-weight:100; font-style:italic;",
    'Roboto 300' => "font-family:Roboto; font-weight:300;",
    'Roboto 300 Italic' => "font-family:Roboto; font-weight:300; font-style:italic;",
    'Roboto 400' => "font-family:Roboto; font-weight:400;",
    'Roboto 400 Italic' => "font-family:Roboto; font-weight:400; font-style:italic;",
    'Roboto 500' => "font-family:Roboto; font-weight:500;",
    'Roboto 500 Italic' => "font-family:Roboto; font-weight:500; font-style:italic;",
    'Roboto 700' => "font-family:Roboto; font-weight:700;",
    'Roboto 700 Italic' => "font-family:Roboto; font-weight:700; font-style:italic;",
    'Roboto 900' => "font-family:Roboto; font-weight:900;",
    'Roboto 900 Italic' => "font-family:Roboto; font-weight:900; font-style:italic;",

    'Lato 100' => "font-family:Lato; font-weight:100;",
    'Lato 100 Italic' => "font-family:Lato; font-weight:100; font-style:italic;",
    'Lato 300' => "font-family:Lato; font-weight:300;",
    'Lato 300 Italic' => "font-family:Lato; font-weight:300; font-style:italic;",
    'Lato 400' => "font-family:Lato; font-weight:400;",
    'Lato 400 Italic' => "font-family:Lato; font-weight:400; font-style:italic;",
    'Lato 700' => "font-family:Lato; font-weight:700;",
    'Lato 700 Italic' => "font-family:Lato; font-weight:700; font-style:italic;",
    'Lato 900' => "font-family:Lato; font-weight:900;",
    'Lato 900 Italic' => "font-family:Lato; font-weight:900; font-style:italic;",

    'Slabo' => "font-family:'Slabo 27px', serif;",

    'Oswald 300' => "font-family:Oswald; font-weight:300;",
    'Oswald 400' => "font-family:Oswald; font-weight:400;",
    'Oswald 700' => "font-family:Oswald; font-weight:700;",

    'Roboto Condensed 300' => "font-family:'Roboto Condensed', sans-serif; font-weight:300;",
    'Roboto Condensed 300 Italic' => "font-family:'Roboto Condensed', sans-serif; font-weight:300; font-style:italic;",
    'Roboto Condensed 400' => "font-family:'Roboto Condensed', sans-serif; font-weight:400;",
    'Roboto Condensed 400 Italic' => "font-family:'Roboto Condensed', sans-serif; font-weight:400; font-style:italic;",
    'Roboto Condensed 700' => "font-family:'Roboto Condensed', sans-serif; font-weight:700;",
    'Roboto Condensed 700 Italic' => "font-family:'Roboto Condensed', sans-serif; font-weight:700; font-style:italic;",

    'PT Sans 400' => "font-family:'PT Sans', sans-serif; font-weight:400;",
    'PT Sans 400 Italic' => "font-family:'PT Sans', sans-serif; font-weight:400; font-style:italic;",
    'PT Sans 700' => "font-family:'PT Sans', sans-serif; font-weight:700;",
    'PT Sans 700 Italic' => "font-family:'PT Sans', sans-serif; font-weight:700; font-style:italic;"
);

$hc_mods_font_families = array('logo_font_family', 'desc_font_family',
    'bottom_font_family', 'bcrumbs_font_family', 'mmenu_font_family',
    'header_font', 'pt_font_family', 'sb_font_family', 'top_font_family');

function hc_set_font_css($mod_name) {
    global $hc_fonts_style_mapping, $hc_mods_font_families;
    $mod_val = hc_get_mod($mod_name);
    if (empty($mod_val)) {
        return '';
    }

    if (in_array($mod_name, $hc_mods_font_families)) {
        if (!empty($hc_fonts_style_mapping[$mod_val])) {
            return $hc_fonts_style_mapping[$mod_val];
        }
    }
}


function hc_print_font_css_in_header() {
    global $hc_fonts_family_mapping, $hc_mods_font_families, $hc_loaded_fonts;

    foreach ($hc_mods_font_families as $_f) {
        if (!in_array($_f, $hc_loaded_fonts)) {
            $hc_loaded_fonts[]= $_f;
        } else {
            continue;
        }

        $_f_mod = hc_get_mod($_f);
        if (!empty($_f_mod) &&
            isset($hc_fonts_family_mapping[hc_get_mod($_f)])) {
                echo '<link rel="stylesheet" href="//fonts.googleapis.com/css?family='
                    . $hc_fonts_family_mapping[hc_get_mod($_f)]
                    . '" type="text/css" media="all" />';
        }
    }
}


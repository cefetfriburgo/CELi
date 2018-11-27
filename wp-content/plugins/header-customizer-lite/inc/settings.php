<?php
function hc_get_mod($name, $default = null)
{
    $mod_prefix = 'hc_';

    if ('header_width' == $name)
    {
        $return = get_theme_mod($mod_prefix . $name);
        if ('' === $return)
            $return = '100%';
    }
    else
    {
        $return = get_theme_mod($mod_prefix . $name, HC_Defaults::get($name));
    }

    if ('' === $return)
    {
        return HC_Defaults::get($name);
    }

    return $return;
}


// selector is first arg and we don't need it for hc_mod_css_def - thus array_shift
function hc_mod_css_group()
{
    $numargs = func_num_args();
    $args = func_get_args();
    $result = '.hc-wrap ' . $args[0] . '{';
    array_shift($args);

    for ($i = 0; $i < $numargs - 1; $i++) {
        $result .= @hc_mod_css_def($args[$i][0], $args[$i][1], $args[$i][2], $args[$i][3]);
    }

    echo $result . '}';
}


function hc_mod_css_def($style, $mod_name, $prefix='', $postfix='')
{
    $return = '';
    $mod = '';

    $mod = hc_get_mod($mod_name);
    if ($style == 'display' && !hc_get_mod($mod_name)) {
        $mod = 'none';
    }

    if ($style == 'font-family') {
        $mod = "'$mod'";
    }

    if (!empty($mod) || $mod === '0' || $mod === 0)
    {
        $return = sprintf('%s:%s;',
            $style,
            $prefix.$mod.$postfix
        );
    }

    return $return;
}


function hc_mod_css($selector, $style, $mod_name, $prefix='', $postfix='', $echo=true, $fallback = '')
{
    $return = '';
    $mod = '';

    if (!empty($fallback)) $mod = hc_get_mod($fallback);
    if (empty($mod)) $mod = hc_get_mod($mod_name);
    if ($style == 'display' && !hc_get_mod($mod_name)) {
        $mod = 'none';
    } else if ($style == 'display') return '';

    if ($style == 'font-family') {
        $mod = "'$mod'";
    }

    if (!empty($mod) || $mod === '0' || $mod === 0)
    {
        $return = sprintf('%s { %s:%s; }',
            '.hc-wrap ' . $selector,
            $style,
            $prefix.$mod.$postfix
        );

        if ($echo)
        {
            echo $return;
        }
    }

    return $return;
}


function hc_css($selector, $style, $value, $prefix='', $postfix='', $echo=true)
{
    $return = '';

    if (!empty($value))
    {
        $return = sprintf('%s { %s:%s; }',
            '.hc-wrap ' . $selector,
            $style,
            $prefix.$value.$postfix
        );

        if ($echo)
        {
            echo $return;
        }
    }

    return $return;
}


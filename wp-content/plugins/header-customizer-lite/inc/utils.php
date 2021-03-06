<?php
function hc_root_relative_url($input) {
    $url = parse_url($input);

    if (!isset($url['host']) || !isset($url['path'])) {
        return $input;
    }

    $site_url = parse_url(network_site_url());  // falls back to site_url

    if (!isset($url['scheme'])) {
        $url['scheme'] = $site_url['scheme'];
    }

    $hosts_match = $site_url['host'] === $url['host'];
    $schemes_match = $site_url['scheme'] === $url['scheme'];
    $ports_exist = isset($site_url['port']) && isset($url['port']);
    $ports_match = ($ports_exist) ? $site_url['port'] === $url['port'] : true;

    if ($hosts_match && $schemes_match && $ports_match) {
        return wp_make_link_relative($input);
    }

    return $input;
}


function hc_url_compare($url, $rel) {
    $url = trailingslashit($url);
    $rel = trailingslashit($rel);
    return ((strcasecmp($url, $rel) === 0) || hc_root_relative_url($url) == $rel);
}


function hc_tr_string($str) {
    return __($str, HC_LANG);
}

<?php
function hc_responsive_css()
{

    echo '<style type="text/css" id="hc-responsive-css">';

    _hc_responsive_css();

    echo '</style>';
}

function _hc_responsive_css()
{
    hc_mod_css('.hc-icon-bar', 'background-color', 'rsp_hamburger_color');
    echo '@media (min-width: ' . hc_get_mod('rsp_max_width') . 'px) {
        .hc-wrap .middle .toggle-wrap {display: none;}
    }';
    echo '@media (max-width: ' . hc_get_mod('rsp_max_width') . 'px) {
        .hc-wrap .middle .primary {display:none;}
        .hc-wrap .middle .primary.open {display:block;}
        .hc-wrap .top,.hc-wrap .bottom {text-align:center;}
        .hc-wrap .top .hc-left,.hc-wrap .top .hc-right,.hc-wrap .bottom .hc-left,.hc-wrap .bottom .hc-right{float:none;}
        .hc-wrap .bottom .hc-left,.hc-wrap .bottom .hc-right{margin:5px auto;}
        .hc-wrap .top .hc-left,.hc-wrap .top .hc-right{margin:5px auto;}
        .hc-wrap .middle .primary > ul {margin-left:0;}
        .hc-wrap .middle > .container .nav-wrap,.hc-wrap .middle .primary > ul,.hc-wrap .middle .primary > ul > li {float: none;}
        .hc-wrap .logo-wrap {float: left;}
        .hc-wrap .middle .toggle-wrap {float: right;}
        .hc-wrap .middle .nav-wrap {overflow:hidden;}
        .hc-wrap .middle .primary > ul > li a {display:block !important;}
        .hc-wrap .primary > ul > li:hover > .sub-menu {display:none;}
        .hc-wrap .primary > ul > li:hover > .sub-menu > li > .sub-menu {display:none;}
        .hc-wrap .primary > ul > li:hover > .sub-menu > li > .sub-menu > li > .sub-menu {display:none;}
        .hc-wrap .primary > ul > li:hover > .sub-menu > li > .sub-menu > li > .sub-menu > li > .sub-menu {display:none;}
        .hc-wrap .middle .primary > ul ul,.hc-wrap .middle .primary > ul .sub-menu li {border-width: 0;}
        .hc-wrap .middle .primary > ul .sub-menu {margin-top:5px;margin-left:15px;}
        .hc-wrap .primary > ul > li.rsp-out > .sub-menu{margin-top:15px;margin-bottom:15px;}
        .hc-wrap .top .menu.hc-left > li:first-child > a {margin-left:'. hc_get_mod('top_link_margin_lr') .'px;}
        .hc-wrap .top .menu.hc-right > li:last-child > a {margin-right:'. hc_get_mod('top_link_margin_lr') .'px;}
        .hc-wrap .bottom > .container > ul > li:first-child {margin-left:'. hc_get_mod('bottom_menu_items_margin_lr') .'px;}
        .hc-wrap .bottom > .container > ul > li:last-child {margin-right:'. hc_get_mod('bottom_menu_items_margin_lr') .'px;}
        .hc-wrap.hc-sticky {position:relative;left:inherit;z-index:inherit;}
        .hc-sticky-ghost {display:none;}
        .hc-wrap .menu li.ar > a{position:relative;}
        .hc-wrap .menu li.ar > a > span:after {padding-left:10px;padding-right:10px;position:absolute;;right:0;}
        .hc-wrap .primary > ul > li > .sub-menu > li.rsp-out > .sub-menu {margin-top:10px;margin-bottom:10px;}
        .hc-wrap .primary > ul > li > .sub-menu > li.rsp-out > .sub-menu .sub-menu {margin-top:10px !important;margin-bottom:10px !important;}
        .hc-wrap .middle .primary > ul .sub-menu li:hover {background-color:transparent;}
        .hc-wrap .middle nav.primary > ul > li:hover {background-color:' . hc_get_mod('mmenu_item_bg_color') . ';}
        .hc-wrap .middle .primary > ul > li {padding-top:0;padding-bottom:0;margin-top:0;margin-bottom:0;}
    }';
}


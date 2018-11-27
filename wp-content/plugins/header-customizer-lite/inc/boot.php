<?php
class HC_Boot {
    public static function init()
    {
        register_nav_menu('hc-main-menu', hc_tr_string('HC Main Menu'));
    }


    public static function header_html($print = true)
    {
        $hc = new HC_Boot();
        $middle = $hc->get_middle_html();

        $result = <<<HTML
            <div class="hc-wrap">
                <div class="inner">
                    {$middle}
                </div>
            </div>
HTML;

        if ($print) {
            echo $result;
        } else {
            return $result;
        }
    }


    public function get_middle_html()
    {
        $main_menu = $this->get_main_menu_html();
        $menu_type_class = 'default' == hc_get_mod('middle_type') ? '' :
            ' ' . hc_get_mod('middle_type');

        $show_logo_area = hc_get_mod('show_logo_area');

        if (!is_customize_preview() && !$show_logo_area)
        {
            $nav_wrap_html = '';
        }
        else
        {
            $logo_html = $this->get_logo_html();

            if (is_customize_preview() && !$show_logo_area)
            {
                $show_logo_area_display = ' style="display:none;"';
            }
            else
            {
                $show_logo_area_display = '';
            }

            $nav_wrap_html = <<<HTML
                <div class="nav-wrap"{$show_logo_area_display}>
                    {$logo_html}
                </div>
HTML;
        }

        $result = <<<HTML
            <div class="middle{$menu_type_class}">
                <div class="container">
                    {$nav_wrap_html}
                    <nav class="primary" role="navigation">
                        {$main_menu}
                    </nav>
                </div>
            </div>
HTML;

        return $result;
    }


    public function get_logo_html()
    {
        $show_logo = hc_get_mod('show_logo');
        $logo_src = hc_get_mod('logo_src', '');
        $logo_type = hc_get_mod('logo_type');
        $url = get_home_url();

        $description = get_bloginfo('description');
        $description_html = '';
        $show_desc = hc_get_mod('show_description');

        if ($show_desc)
        {
            $description_html = '<p class="description">'
                . $description . '</p>';
        }

        if (is_customize_preview() && $show_desc)
        {
            $description_html = '<p class="description">'
                . $description . '</p>';

        } elseif (is_customize_preview() && !$show_desc) {
            $description_html = '<p style="display:none;" class="description">'
                . $description . '</p>';
        }

        if (!is_customize_preview() && !$show_logo)
        {
            $logo_html = '';
        }
        else
        {
            if (is_customize_preview() && !$show_logo)
            {
                $show_logo_display = ' style="display:none;"';
            }
            else
            {
                $show_logo_display = '';
            }

            switch ($logo_type)
            {
                case 'image':
                    $logo = '<img src="' . $logo_src . '"' .
                        ' alt="' . hc_get_mod('logo_text') . '">';
                    break;
                default:
                    $logo = hc_get_mod('logo_text');
            }

            $logo_html = <<<HTML
                <a class="logo" href="{$url}"{$show_logo_display}>{$logo}</a>
HTML;
        }

        $nav_toggle = <<<HTML
            <div class="toggle-wrap">
                <div class="hc-toggle">
                    <span class="hc-icon-bar"></span>
                    <span class="hc-icon-bar"></span>
                    <span class="hc-icon-bar"></span>
                    <span class="hc-icon-bar"></span>
                </div>
            </div>
HTML;

        return <<<HTML
            <div class="logo-wrap">
                {$logo_html}
                {$description_html}
            </div>
            {$nav_toggle}
HTML;
    }


    public function get_main_menu_html()
    {
        $depth = hc_get_mod('sm_depth');
        $depth += 1;

        $menu = wp_nav_menu(array(
            'theme_location' => 'hc-main-menu',
            'container'      => null,
            'depth'          => $depth,
            'walker'         => new HC_Nav_Walker(),
            'echo'           => false,
            'link_before'    => '<span>',
            'link_after'     => '</span>'
        ));

        return $menu;
    }
}


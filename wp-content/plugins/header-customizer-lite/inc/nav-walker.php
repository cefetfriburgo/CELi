<?php
class HC_Nav_Walker extends Walker_Nav_Menu
{
    private $cpt; // Boolean, is current post a custom post type
    private $archive; // Stores the archive page for current URL

    public function __construct() {
        add_filter('nav_menu_css_class', array($this, 'cssClasses'), 10, 2);
        add_filter('nav_menu_item_id', '__return_null');
        $cpt           = get_post_type();
        $this->cpt     = in_array($cpt, get_post_types(array('_builtin' => false)));
        $this->archive = get_post_type_archive_link($cpt);
    }


    public function checkCurrent($classes) {
        return preg_match('/(current[-_])|active/', $classes);
    }


    public function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) {
        $element->is_subitem = ((!empty($children_elements[$element->ID]) && (($depth + 1) < $max_depth || ($max_depth === 0))));

        if ($element->is_subitem) {
            foreach ($children_elements[$element->ID] as $child) {
                if ($child->current_item_parent || hc_url_compare($this->archive, $child->url)) {
                    $element->classes[] = 'active';
                }
            }
        }

        if (!empty($element->url)) {
            $element->is_active = strpos($this->archive, $element->url);
        }

        if ($element->is_active) {
            $element->classes[] = 'active';
        }

        if (hc_get_mod('menuicons_withtext') === false) {
            $element->classes[] = 'a';
        }

        @parent::display_element(
            $element, $children_elements, $max_depth, $depth, $args, $output
        );
    }


    public function cssClasses($classes, $item) {
        $slug = sanitize_title($item->title);

        if ($this->cpt) {
            $classes = str_replace('current_page_parent', '', $classes);

            if (hc_url_compare($this->archive, $item->url)) {
                $classes[] = 'active';
            }
        }

        $classes = preg_replace('/(current(-menu-|[-_]page[-_])(item|parent|ancestor))/', 'active', $classes);
        $classes = preg_replace('/^((menu|page)[-_\w+]+)+/', '', $classes);

        $classes[] = 'menu-' . $slug;

        $classes = array_unique($classes);

        return array_filter($classes, function ($element) {
            $element = trim($element);
            return !empty($element);
        });
    }
}

add_filter('nav_menu_item_id', '__return_null');


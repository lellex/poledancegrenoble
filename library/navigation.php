<?php

/**
 * Register Menus
 * http://codex.wordpress.org/Function_Reference/register_nav_menus#Examples
 */
// register_nav_menus(array(
//     'top-bar' => 'Fixed top bar', // registers the menu in the WordPress admin menu editor
// ));

/**
 * Main menu
 * http://codex.wordpress.org/Function_Reference/wp_nav_menu
 */
if ( ! function_exists( 'mainMenu' ) ) {
	function mainMenu() {
	    wp_nav_menu(array(
			'container'       => false,
			'menu_id'         => false,
			'echo'            => false,
			'items_wrap'      => '<ul>%3$s</ul>'
	    ));
	}
}

add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);

function discard_menu_classes($classes, $item) {
    return (array)get_post_meta( $item->ID, '_menu_item_classes', true );
}

add_filter('nav_menu_css_class', 'discard_menu_classes', 10, 2);

function my_css_attributes_filter($var) {
  return is_array($var) ? array() : '';
}

?>

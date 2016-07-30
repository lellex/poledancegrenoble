<?php
/*
Author: Ole Fredrik Lie
URL: http://olefredrik.com
*/

if (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1'))) {
  wp_register_script('livereload', 'http://localhost:35729/livereload.js?snipver=1', null, false, true);
  wp_enqueue_script('livereload');
}

// Various clean up functions
require_once('library/cleanup.php');

// Required for Foundation to work properly
require_once('library/foundation.php');

// Register all navigation menus
require_once('library/navigation.php');

// Add menu walker
require_once('library/menu-walker.php');

// Custom gallery
require_once('library/gallery.php');

// Create widget areas in sidebar and footer
require_once('library/widget-areas.php');

// Return entry meta information for posts
require_once('library/entry-meta.php');

// Enqueue scripts
require_once('library/enqueue-scripts.php');

// Add theme support
require_once('library/theme-support.php');



// Change colors Tiny MCE
function my_mce4_options( $init ) {
$custom_colours = '
    "000000", "Black", "ed1a5d", "Pink", "4f9961", "Green", "2f2e57", "Blue", "ff5615", "Orange", "c13e3e", "Red"
';
$init['textcolor_map'] = '['.$custom_colours.']'; // build colour grid default+custom colors
$init['textcolor_rows'] = 6; // enable 6th row for custom colours in grid
return $init;
}


function mce_mod( $init ) {
    $init['block_formats'] = 'Paragraph=p;Heading 1=h1;Heading 2=h2;Heading 3=h3;Heading 4=h4';

    $style_formats = array(
            array( 'title' => 'Horaire', 'inline' => 'span', 'classes' => 'horaire', 'wrapper' => true ),
            array( 'title' => 'Cours', 'inline' => 'span', 'classes' => 'cours', 'wrapper' => true ),
            array( 'title' => 'Niveau', 'inline' => 'span', 'classes' => 'niveau', 'wrapper' => true ),
            array( 'title' => 'Bouton', 'inline' => 'a', 'classes' => 'button', 'wrapper' => true )
    );

    $init['style_formats'] = json_encode( $style_formats );

    $init['style_formats_merge'] = false;
    return $init;
}


add_filter('tiny_mce_before_init', 'mce_mod');

// mce_add_buttons remplace le contenu du select "styleselect"
function mce_add_buttons( $buttons ){
    array_splice( $buttons, 1, 0, 'styleselect' );
    return $buttons;
}
// mce_buttons_2 est la deuxième ligne de bouton
add_filter( 'mce_buttons_2', 'mce_add_buttons' );

add_filter('tiny_mce_before_init', 'my_mce4_options', 'juiz_mce_buttons_2');

if ( !function_exists('juiz_init_editor_styles')) {
   add_action( 'after_setup_theme', 'juiz_init_editor_styles' );
   function juiz_init_editor_styles() {
    add_editor_style();
   }
}

function edit_admin_menus() {
    global $menu;

    remove_menu_page('edit-comments.php');
    add_menu_page( 'Page principale', 'Page principale', 'manage_options', 'edit.php?category_name=ecole,cours,tarifs,events,plannings', '', 'dashicons-admin-home', 90 );
    add_menu_page( 'Portfolio', 'Portfolio', 'manage_options', 'edit.php?category_name=portfolio', '', 'dashicons-format-gallery', 90 );
}
add_action( 'admin_menu', 'edit_admin_menus' );


?>

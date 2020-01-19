<?php
function simple_theme_setup(){
    // Featured Image Support
    add_theme_support('post-thumbnails');

    // Menus
    register_nav_menus(array(
        'primary' => __('Primary Menu')
    ));
}
add_action('after_setup_theme', 'simple_theme_setup');

//Widget Locations
function init_widgets($id){
    register_sidebar(array(
        'name' => 'Sidebar',
        'id' => 'sidebar',
        'before_widget' => '<div class="side-widget">','after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
} 

add_action('widgets_init', 'init_widgets'); 

function sr_dash_redirect() {
  if( is_admin() && !current_user_can('administrator') && !DOING_AJAX) {
    wp_redirect( home_url() );
  }
}
add_action('init', 'sr_dash_redirect' );
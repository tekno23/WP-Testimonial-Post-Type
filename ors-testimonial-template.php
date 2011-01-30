<?php
/*
Plugin Name: Testimonial Template
Plugin URI: http://www.orangeroomsoftware.com/website-plugin/
Version: 1.0
Author: <a href="http://www.orangeroomsoftware.com/">Orange Room Software</a>
Description: A template for Templates
*/

# Post Thumbnails
add_theme_support( ‘post-thumbnails’ );

# Testimonial Stylesheet
function ors_testimonial_template_stylesheets() {
  wp_enqueue_style('testimonial-template-style', '/wp-content/plugins/'.basename(dirname(__FILE__)).'/style.css', 'ors-testimonial', null, 'all');
}
add_action('wp_print_styles', 'ors_testimonial_template_stylesheets', 5);

# Custom post type
add_action( 'init', 'create_testimonial_post_type' );
function create_testimonial_post_type() {
  $labels = array(
    'name' => _x('Testimonials', 'post type general name'),
    'singular_name' => _x('Testimonial', 'post type singular name'),
    'add_new' => _x('Add New', 'testimonial'),
    'add_new_item' => __('Add New Testimonial'),
    'edit_item' => __('Edit Testimonial'),
    'new_item' => __('New Testimonial'),
    'view_item' => __('View Testimonial'),
    'search_items' => __('Search Testimonials'),
    'not_found' =>  __('No testimonials found'),
    'not_found_in_trash' => __('No testimonials found in Trash'),
    'parent_item_colon' => '',
    'menu_name' => 'Testimonials'

  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => 6,
    'supports' => array('title','editor','thumbnail'),
    'menu_icon' => '/wp-content/plugins/'.basename(dirname(__FILE__)).'/icon.png',
    'rewrite' => array(
      'slug' => 'testimonials',
      'with_front' => false
    )
  );

  register_post_type( 'testimonial', $args );
}

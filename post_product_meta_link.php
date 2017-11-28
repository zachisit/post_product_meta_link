<?php
/*
Plugin Name: Related Post Product
Plugin URI: https://www.zachis.it
Description: Allows admin to select a Product when editing a Post that will show on the Post's sidebar
Version: 1.0.1
Author: Zach Smith
Author URI: https://www.zachis.it
License: GPL2
*/

/**
 * Register meta box
 */
function post_product_link_register_meta_boxes() {
    add_meta_box( 'post_product_link_meta', __( 'Related Product', 'textdomain' ), 'post_product_link_display_callback', 'post', 'side', 'low' );
}
add_action( 'add_meta_boxes', 'post_product_link_register_meta_boxes' );

function post_product_link_display_callback($post) {
    echo '<p>Select from the below dropdown of Products to tie the Product to this Post. This will show the Product information on the sidebar of the Post on the frontend</p>';

    //returnAllWooCommProducts();
}

function returnAllWooCommProducts() {
    $args = [
        'post_type' => [
            'product',
            'product_variation'
            ],
        'posts_per_page' => -1,
        'order' => 'ASC'
    ];

    $wp_query = new WP_Query($args);

    while ($wp_query->have_posts()) {
        echo the_title();
    }
    //sort alpha
    //sort($full_product_list);

    //return $full_product_list;

}
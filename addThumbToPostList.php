<?php
// Add to functions.php file

// Setup Admin Thumbnail Size
if ( function_exists( 'add_theme_support' ) ) {
  add_image_size( 'admin-thumb', 100, 999999 ); // 100 pixels wide (and unlimited height)
  }

// Thumbnails to Admin Post View
add_filter('manage_posts_columns', 'posts_columns', 5);
add_action('manage_posts_custom_column', 'posts_custom_columns', 5, 2);

function posts_columns($defaults){
    $defaults['my_post_thumbs'] = __('Thumbs');
    return $defaults;
}

function posts_custom_columns($column_name, $id){
	if($column_name === 'my_post_thumbs'){
        echo the_post_thumbnail( 'admin-thumb' );
    }
}

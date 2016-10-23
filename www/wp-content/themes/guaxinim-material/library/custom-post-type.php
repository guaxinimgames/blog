<?php
/* Bones Custom Post Type Example
This page walks you through creating
a custom post type and taxonomies. You
can edit this one or copy the following code
to create another one.

I put this in a separate file so as to
keep it organized. I find it easier to edit
and change things if they are concentrated
in their own file.

Developed by: Eddie Machado
URL: http://themble.com/bones/
*/

// Flush rewrite rules for custom post types
add_action( 'after_switch_theme', 'bones_flush_rewrite_rules' );

// Flush your rewrite rules
function bones_flush_rewrite_rules() {
	flush_rewrite_rules();
}

/*
 * Replace Taxonomy slug with Post Type slug in url
 * Version: 1.1
 */
function taxonomy_slug_rewrite($wp_rewrite) {
    $rules = array();
    // get all custom taxonomies
    $taxonomies = get_taxonomies(array('_builtin' => false), 'objects');
    // get all custom post types
    $post_types = get_post_types(array(
        'public' => true,
        '_builtin' => false),
    'objects');

    foreach ($post_types as $post_type) {
    	$post_type_name = $post_type->name;
    	$post_type_slug = $post_type->name;
    	if ( $post_type->rewrite && $post_type->rewrite['slug'] ){
    		$post_type_slug = $post_type->rewrite['slug'];
    	}
        foreach ($taxonomies as $taxonomy)
        {
            // check if taxonomy is registered for this custom type
            if ($taxonomy->object_type[0] == $post_type_name) {

                // get all categories (terms)
                $categories = get_categories(array(
                    'type' => $post_type_name,
                    'taxonomy' => $taxonomy->name,
                    'hide_empty' => 0
                ));

                // make rules
                foreach ($categories as $category) {
                  $rules[$post_type_slug . '/' . $category->slug . '/?$'] =
                    'index.php?' . $category->taxonomy . '=' . $category->slug;
                }
            }
        }
    }

    // merge with global rules
    $wp_rewrite->rules = $rules + $wp_rewrite->rules;
}
add_filter('generate_rewrite_rules', 'taxonomy_slug_rewrite');

/*******************************
	CUSTOM POST TYPES
*******************************/
require_once('custom_posts/news.php');
?>

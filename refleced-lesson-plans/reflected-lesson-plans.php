<?php
/*
 Plugin Name: ReflectED lesson plans
Plugin URI: http://londonclc.org.uk
Description: Register custom post type - lesson plans for the ReflectED project website
Author: Joe Halloran
Version: 1.0
Author URI: http://londonclc.org.uk
*/

// add_action( 'init', 'create_posttype' );
// function create_posttype() {
//   register_post_type( 'reflected_lessons',
//     array(
//       'labels' => array(
//         'name' => __( 'Lesson Plans', 'reflected-lesson-plans'),
//         'singular_name' => __( 'Lesson Plan', 'reflected-lesson-plans' )

//       ),
//       'public' => true,
//       'has_archive' => true,
//       'rewrite' => array('slug' => 'lessons'),
//     )
//   );
// }

function custom_post_type() {

// Set UI labels for Custom Post Type
	$labels = array(
        'name' => _x( 'Lesson Plans', 'reflected-lesson-plans'),
        'singular_name' => _x( 'Lesson Plan', 'reflected-lesson-plans' ),
        'parent_item_colon'   => __( 'Parent Lesson Plan', 'reflected-lesson-plans' ),
        'all_items'           => __( 'All Lesson Plans', 'reflected-lesson-plans' ),
        'view_item'           => __( 'View Lesson Plan', 'reflected-lesson-plans' ),
        'add_new_item'        => __( 'Add New Lesson Plan', 'reflected-lesson-plans' ),
        'add_new'             => __( 'Add New', 'reflected-lesson-plans' ),
        'edit_item'           => __( 'Edit Lesson Plan', 'reflected-lesson-plans' ),
        'update_item'         => __( 'Update Lesson Plan', 'reflected-lesson-plans' ),
        'search_items'        => __( 'Search Lesson Plan', 'reflected-lesson-plans' ),
        'not_found'           => __( 'Not Found', 'reflected-lesson-plans' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'reflected-lesson-plans' ),
    );

// Set other options for Custom Post Type
    $args = array(
        'label'               => __( 'Lesson Plans', 'reflected-lesson-plans' ),
        'description'         => __( 'ReflectED Lesson Plans', 'reflected-lesson-plans' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy.
        'taxonomies'          => array( 'Lesson Plan Structure' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'rewrite' => array('slug' => 'lessons'),
        'capability_type'     => 'page',
    );
     
    // Registering your Custom Post Type
    register_post_type( 'Lesson Plans', $args );
}
/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/


add_action( 'init', 'custom_post_type', 0 );


function lesson_plan_structure_init() {
	// create a new taxonomy
	register_taxonomy(
		'Lesson Plan Structure',
		'lesson_plans',
		array(
			'label' => __( 'Lesson Plan Structure', 'reflected-lesson-plans' ),
			'rewrite' => array( 'slug' => 'lesson-plan-structure' ),
			'hierarchical' => true,
			'capabilities' => array(
				'assign_terms' => 'edit_guides',
				'edit_terms' => 'publish_guides'
			)
		)
	);
}
add_action( 'init', 'lesson_plan_structure_init' );
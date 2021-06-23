<?php

	class sliderbuilderelementor_custom_post_type {
		
		function __construct() {
            add_action('init', array(&$this, 'create_sliders_builder_cpt'));
            add_action('init', array(&$this, 'sliders_builder_taxonomy'), 0);

        }
        // Post Type
        function create_sliders_builder_cpt() {
            $labels = array(
                'name' => __('Slider Builder', 'sliderbuilderelementor'),
                'singular_name' => __('Slider', 'sliderbuilderelementor'),
                'add_new' => __('Add Slider', 'sliderbuilderelementor'),
                'add_new_item' => __('Add Slider', 'sliderbuilderelementor'),
                'edit_item' => __('Edit Slider', 'sliderbuilderelementor'),
                'new_item' => __('New Slider', 'sliderbuilderelementor'),
                'all_items' => __('All Slider', 'sliderbuilderelementor'),
                'view_item' => __('View Slider', 'sliderbuilderelementor'),
                'search_items' => __('Search Slider', 'sliderbuilderelementor'),
                'not_found' => __('No Slider found', 'sliderbuilderelementor'),
                'not_found_in_trash' => __('No Slider found in the trash', 'sliderbuilderelementor'),
                'parent_item_colon' => '',
                'menu_name' => __('Sliders Builder', 'sliderbuilderelementor')
            );
            $args = array(
                'labels' => $labels,
                'public' => true,
                'menu_position' => 4,
                'menu_icon' => 'dashicons-embed-photo',
                'taxonomies' => array('sliders_builder_category'),
                'supports' => array('title', 'editor', 'thumbnail', 'excerpt','elementor'),
                'has_archive' => true,
            );
            register_post_type('sliders_builder', $args);
        }

        function sliders_builder_taxonomy() {
            $labels = array(
                'name' => __('Category', 'sliderbuilderelementor'),
                'singular_name' => __('Category', 'sliderbuilderelementor'),
                'search_items' => __('Search categories', 'sliderbuilderelementor'),
                'all_items' => __('Categories', 'sliderbuilderelementor'),
                'parent_item' => __('Parent category', 'sliderbuilderelementor'),
                'parent_item_colon' => __('Parent category:', 'sliderbuilderelementor'),
                'edit_item' => __('Edit category', 'sliderbuilderelementor'),
                'update_item' => __('Update category', 'sliderbuilderelementor'),
                'add_new_item' => __('Add category', 'sliderbuilderelementor'),
                'new_item_name' => __('New category', 'sliderbuilderelementor'),
                'menu_name' => __('Category', 'sliderbuilderelementor'),
            );
            $args = array(
                'labels' => $labels,
                'hierarchical' => true,
                'show_ui' => true,
                'show_admin_column' => true,
                'rewrite' => array('slug' => 'sliders_builder_category'),
            );
            register_taxonomy('sliders_builder_category', 'sliders_builder', $args);
        }
					
	}  

    new sliderbuilderelementor_custom_post_type();


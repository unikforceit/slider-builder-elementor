<?php
// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

    //
    // Set a unique slug-like ID
    $prefix = '_sliderbuilderelementor';

    //
    // Create options
    CSF::createOptions( $prefix, array(
        'menu_title' => 'Tools',
        'menu_slug'  => 'tools',
        'framework_title'  => 'Slider Builder Elementor',
        'footer_credit'  => 'Developed by <a href="https://unikforce.com" target="_blank">UnikForce IT</a>',
        'menu_type'  => 'submenu',
        'nav'  => 'inline',
        'show_in_customizer'  => true,
        'menu_parent'  => 'edit.php?post_type=sliders_builder',
    ) );

    //
    // Create a section
    CSF::createSection( $prefix, array(
        'title'  => 'Sorter',
        'fields' => array(
            //
            array(
                'id'           => 'esb-sorter',
                'type'         => 'sorter',
                'title'        => 'Sorter',
                'default'      => array(
                    'enabled'    => array(
                        'image' => 'Image',
                        'title' => 'Title',
                        'info' => 'Info',
                        'meta' => 'Meta',
                        'button' => 'Button',
                    ),
                    'disabled'   => array(
                        'icon' => 'Icon',
                    ),
                ),
            ),

        )
    ) );
}
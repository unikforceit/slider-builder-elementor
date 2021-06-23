<?php if ( ! defined( 'ABSPATH' )  ) { die; }

$prefix_page_opts = '_slidermeta';


CSF::createMetabox( $prefix_page_opts, array(
  'title'        => 'Slider Options',
  'post_type'    => ['sliders_builder'],
  'show_restore' => false,
  'theme'=> 'light',
) );

//
// Create a section
//
CSF::createSection( $prefix_page_opts, array(
  'title'  => 'Slider Meta Fields',
  'icon'   => 'fas fa-rocket',
  'fields' => array(
      array(
          'id'    => 'slider_video',
          'type'  => 'media',
          'title' => 'Slider Video Upload',
      ),
      array(
          'id'    => 'slider_video_link',
          'type'  => 'link',
          'title' => 'Slider Video Link',
      ),
      array(
          'id'    => 'slider_icon',
          'type'  => 'icon',
          'title' => 'Slider Icon',
      ),
  )
) );

// Create a section
CSF::createSection( $prefix_page_opts, array(
    'title'  => 'Extra Fields',
    'icon'   => 'fas fa-align-justify',
    'fields' => array(

        // A textarea field
        array(
            'id'     => 'extra_field',
            'type'   => 'repeater',
            'title'  => 'Repeater',
            'fields' => array(

                array(
                    'id'    => 'e_text',
                    'type'  => 'text',
                    'title' => 'Heading'
                ),
                array(
                    'id'    => 'e_textarea',
                    'type'  => 'textarea',
                    'title' => 'Text'
                ),
                array(
                    'id'    => 'e_link',
                    'type'  => 'link',
                    'title' => 'Link',
                ),
                array(
                    'id'    => 'e_media',
                    'type'  => 'media',
                    'title' => 'Image',
                ),
                array(
                    'id'    => 'e_icon',
                    'type'  => 'icon',
                    'title' => 'Icon',
                ),

            ),
        ),

    )
) );


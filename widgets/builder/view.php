<?php
$per_page = $settings['total_slide']['size'];
$cat = $settings['cat_query'];
$id = $settings['id_query'];

if($settings['query_type'] == 'category'){
    $query_args = array(
        'post_type' => 'sliders_builder',
        'posts_per_page' => $per_page,
        'tax_query' => array(
            array(
                'taxonomy' => 'sliders_builder_category',
                'field' => 'term_id',
                'terms' => $cat,
            ) ,
        ) ,
    );
}

if($settings['query_type'] == 'individual'){
    $query_args = array(
        'post_type' => 'sliders_builder',
        'posts_per_page' => $per_page,
        'post__in' => $id,
        'orderby' => 'post__in'
    );
}

$wp_query = new \WP_Query($query_args);

$slider_options = [
    'm_item' => $settings['m_item']['size'],
    't_item' => $settings['t_item']['size'],
    'd_item' => $settings['d_item']['size'],
    'gap'    => $settings['gap']['size'],
    'speed'    => $settings['speed']['size'],
    'centered' => boolval($settings['centered']),
    'navs'    => boolval($settings['navs']),
    'dots'    => boolval($settings['dots']),
    'autoplay'    => boolval($settings['autoplay']),
    'autoplaypause'    => boolval($settings['autoplaypause']),
    'loop'    => boolval($settings['loop']),
];
?>
    <section class="slider-builder-sections" data-esb='<?php echo wp_kses_post(wp_json_encode($slider_options));?>'>
        <div class="sliders-wrapper">
            <div class="slider-carousel owl-carousel">
                <?php if( $wp_query->have_posts() ) { while( $wp_query->have_posts() ) { $wp_query->the_post(); ?>
                    <div class="slider-inner-box">
                        <?php
                        $video = sliderbuilderelementor_sliders_meta('slider_video');
                        $video_link = sliderbuilderelementor_sliders_meta('slider_video_link');
                        $post_link = get_the_permalink();
                        $meta_icon = sliderbuilderelementor_sliders_meta('slider_icon');
                        if (isset($video['url']) && !empty($video['url'])){
                            $url = $video['url'];
                            $popup = '';
                        } elseif(isset($video_link['url']) && !empty($video_link['url'])){
                            $url = $video_link['url'];
                            $popup = 'data-lity';
                        }else {
                            $url = $post_link;
                            $popup = '';
                        }
                        $loop = sliderbuilderelementor_sliders_meta('extra_field');
                        $sorter = sliderbuilderelementor_sliders_option('esb-sorter', 'enabled');
                        if ($sorter){
                            foreach ($sorter['enabled'] as $key=>$value) {
                                switch($key) {
                                    case  'image':
                                        include SLIDERBUILDERELMENETOR_DIR . 'template/image.php';
                                        break;

                                    case 'title':
                                        include SLIDERBUILDERELMENETOR_DIR . 'template/title.php';
                                        break;

                                    case 'info':
                                        include SLIDERBUILDERELMENETOR_DIR . 'template/info.php';
                                        break;

                                    case 'meta':
                                        include SLIDERBUILDERELMENETOR_DIR . 'template/meta.php';
                                        break;

                                    case 'button':
                                        include SLIDERBUILDERELMENETOR_DIR . 'template/button.php';
                                        break;
                                }
                            }
                        }else{
                            include SLIDERBUILDERELMENETOR_DIR . 'template/image.php';
                            include SLIDERBUILDERELMENETOR_DIR . 'template/title.php';
                            include SLIDERBUILDERELMENETOR_DIR . 'template/info.php';
                            include SLIDERBUILDERELMENETOR_DIR . 'template/meta.php';
                            include SLIDERBUILDERELMENETOR_DIR . 'template/button.php';
                        }
                        ?>
                    </div>
                <?php } wp_reset_postdata(); } ?>
            </div>
        </div>
    </section>
    <!-- Slider Builder End -->
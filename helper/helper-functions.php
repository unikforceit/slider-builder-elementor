<?php
function sliderbuilderelementor_image($source, $img_size='full'){
    if ($source){
        return wp_get_attachment_image($source['id'], $img_size);
    }
}
function sliderbuilderelementor_category_lists($tax='category') {

    $categories_obj = get_categories('taxonomy='.$tax.'');
    $categories = array();

    foreach ($categories_obj as $pn_cat) {
        $categories[$pn_cat->cat_ID] = $pn_cat->cat_name;
    }
    return $categories;
}
function sliderbuilderelementor_get_category_link($style, $taxonomy='category'){

    global $post;
    $output='';
    $ids=  $taxonomy;
    $terms = wp_get_post_terms($post->ID, $ids);
    $separator = $style;
    if($terms){
        foreach($terms as $term) {
            $term_link = get_term_link($term);
            $output .='<a href="' . esc_url($term_link) . '">'.$term->name.'</a>'.$separator;
        }
    }
    return trim($output, $separator);
}
function sliderbuilderelementor_post_lists($post_type='post'){
    $args = array(
        'numberposts' => -1,
        'post_type'   => $post_type
    );

    $posts = get_posts( $args );
    $list = array();
    foreach ($posts as $cpost){
        //  print_r($cform);
        $list[$cpost->ID] = $cpost->post_title;
    }
    return $list;
}
function sliderbuilderelementor_image_sizes() {
    $image_sizes = get_intermediate_image_sizes();

    $addsizes = array(
        'full' => 'full',
        'custom' => 'custom',
    );
    $newsizes = array_merge($image_sizes, $addsizes);

    return array_combine($newsizes, $newsizes);
}
function sliderbuilderelementor_post_class(){
    $post_class = get_post_class( 'post-layout', get_the_ID() );
    return esc_attr( implode( ' ', $post_class ) );
}
function sliderbuilderelementor_link($link){

    $url = $link['url'] ? 'href='.esc_url($link['url']). '' : '';
    $ext = $link['is_external'] ? 'target= _blank' : '';
    $link = $url.' '.$ext;
    return $link;
}
function sliderbuilderelementor_odd_even($data){
    if($data % 2 == 0){
        $data = "Even";
    }
    else{
        $data = "Odd";
    }
    return $data;
}
function sliderbuilderelementor_sliders_meta($meta = '', $default = null) {
    $options = get_post_meta(get_the_ID(), '_slidermeta', true);
    return ( isset( $options[$meta] ) ) ? $options[$meta] : $default;
}
function sliderbuilderelementor_sliders_option( $option = '', $default = null ) {
    $options = get_option( '_sliderbuilderelementor' ); // Attention: Set your unique id of the framework
    return ( isset( $options[$option] ) ) ? $options[$option] : $default;
}
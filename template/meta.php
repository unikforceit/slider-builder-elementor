<?php
if (isset($loop) && !empty($loop) && $settings['meta_show']) { ?>
    <div class="slider-meta">
        <ul>
            <?php foreach ($loop as $item) {
                if (isset($item['e_link']['target']) && !empty($item['e_link']['target'])) {
                    $target = '_blank';
                }else {
                    $target = '';
                }
                echo '<li>
                                                    <a href="' . esc_url($item['e_link']['url']) . '" target="'.$target.'">';
                if (isset($item['e_media']['id']) && !empty($item['e_media']['id'])) {
                    wp_get_attachment_image($item['e_media']['id'], 'full');
                }
                if (isset($item['e_icon']) && !empty($item['e_icon'])) {
                    echo '<i class="' . esc_attr__($item['e_icon'], 'sliderbuilderelementor') . '"></i>';
                }
                if (isset($item['e_text']) && !empty($item['e_text'])) {
                    echo '<h4>' . esc_html($item['e_text']) . '</h4>';
                }
                if (isset($item['e_textarea']) && !empty($item['e_textarea'])) {
                    echo '<p>' . esc_html($item['e_textarea']) . '</p>';
                }
                echo '</a>
                                                  </li>';
            } ?>
        </ul>
    </div>
<?php } ?>
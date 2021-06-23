<div class="slider-main-thumbnail position-relative">
    <a href="<?php echo esc_url($url);?>" <?php echo esc_attr($popup)?>>
        <?php if(isset($meta_icon) && !empty($meta_icon) && $settings['ficon_show']){?>
            <div class="icon-container">
                <i class="<?php echo esc_attr($meta_icon);?>"></i>
            </div>
        <?php } ?>
        <?php if (has_post_thumbnail()) { the_post_thumbnail('full'); } ?>
    </a>
</div>
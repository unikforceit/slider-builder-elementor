<?php if (isset($settings['btn']) && !empty($settings['btn']) && $settings['btn_show']) { ?>
    <div class="slider-btn">
        <a href="<?php echo esc_url($post_link);?>">
            <?php echo wp_kses_post($settings['btn']);?>
        </a>
    </div>
<?php } ?>
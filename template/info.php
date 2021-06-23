<?php if($settings['info_show']){?>
    <div class="main-text">
        <p><?php echo wp_trim_words(get_the_content(), wp_kses_post($settings['trim']['size'])); ?></p>
    </div>
<?php } ?>
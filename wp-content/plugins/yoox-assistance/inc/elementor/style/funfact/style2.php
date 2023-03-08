<div class="singlefunfact transparent_bg">
    <div class="factInner">
        <?php if($funfact_count != ''): ?>
            <h1 data-counter="<?php echo esc_attr($funfact_count) ?>" class="timer"><?php echo esc_html($funfact_count); ?></h1>
        <?php endif; ?>
        <?php if($funfact_title != ''): ?>
            <h3><?php echo esc_html($funfact_title); ?></h3>
        <?php endif; ?>
    </div>
</div>
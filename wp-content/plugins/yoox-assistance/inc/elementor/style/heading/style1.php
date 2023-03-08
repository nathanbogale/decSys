<div class="heading_title">
    <?php if(!empty($title)): ?>
    <h2 class="sec_title line_fix_height"><?php echo esc_html($title); ?></h2>
    <?php endif; ?>
    <?php if(!empty($sub_title)): ?>
    <p class="sec_des"><?php echo wp_kses_post($sub_title); ?></p>
    <?php endif; ?>
</div>
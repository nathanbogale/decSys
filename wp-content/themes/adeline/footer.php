<?php
/**
 * The template for displaying the footer.
 *
 * @package Adeline WordPress theme
 */
?>
</main>
<!-- #main -->

<?php do_action('adeline_after_main');?>
<?php do_action('adeline_before_footer');?>
<?php do_action('adeline_footer');?>
<?php do_action('adeline_after_footer');?>
</div>
<!-- #dpr-inner-wrapper -->

<?php do_action('adeline_after_wrap');?>
</div>
<!-- #dpr-outer-wrapper -->

<?php do_action('adeline_after_outer_wrap');?>
<?php
// If is not sticky footer
if (!class_exists('Adeline_Sticky_Footer')) {
    get_template_part('template-parts/scroll-top');
}
?>
<?php
// Magic Cursor
if (adeline_display_magic_cursor()) {
    get_template_part('template-parts/magic-cursor');
}
?>
<?php
// Right Click Blocker
if (adeline_display_right_click_blocker()) {
    get_template_part('template-parts/right-click-blocker');
}
?>
<?php
// Search fullscreen style
if ('full_screen' == adeline_menu_search_style()) {
    get_template_part('template-parts/header/search-fullscreen');
}
?>
<?php
// If sidebar mobile menu style
if ('sidebar' == adeline_mobile_menu_style()) {
    // Mobile panel close button
    if (true == adeline_get_option_value('mobile_menu_sidebar_close_button')) {
        get_template_part('template-parts/mobile/mobile-sidr-close');
    }
    ?>
<?php
// Mobile Menu (if defined)
    get_template_part('template-parts/mobile/mobile-nav');
    ?>
<?php
// Mobile search form
    if (adeline_get_option_value('adeline_mobile_menu_search', '', true)) {
        get_template_part('template-parts/mobile/mobile-search');
    }
}
?>
<?php
// If full screen mobile menu style
if ('fullscreen' == adeline_mobile_menu_style()) {
    get_template_part('template-parts/mobile/mobile-fullscreen');
}
?>
<?php wp_footer();?>

</body>
</html>
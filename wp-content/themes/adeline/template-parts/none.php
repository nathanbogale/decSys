<?php
/**
 * The template for displaying a "No posts found" message.
 *
 * @package Adeline WordPress theme
 */
?>

<div class="page-content">
  <?php if (is_home() && current_user_can('publish_posts')) {?>
  <p><?php echo sprintf(esc_html__('Ready to publish your first post? %1$sGet started here%2$s.', 'adeline'), '<a href="' . esc_url(admin_url('post-new.php')) . '" target="_blank">', '</a>'); ?></p>
  <?php
} elseif (is_search()) {?>
  <p>
    <?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with different keywords.', 'adeline');?>
  </p>
  <?php
} elseif (is_category()) {?>
  <p>
    <?php esc_html_e('There aren\'t any posts currently published in this category.', 'adeline');?>
  </p>
  <?php
} elseif (is_tax()) {?>
  <p>
    <?php esc_html_e('There aren\'t any posts currently published under this taxonomy.', 'adeline');?>
  </p>
  <?php
} elseif (is_tag()) {?>
  <p>
    <?php esc_html_e('There aren\'t any posts currently published under this tag.', 'adeline');?>
  </p>
  <?php
} else {?>
  <p>
    <?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for.', 'adeline');?>
  </p>
  <?php
}?>
</div>
<!-- .page-content -->
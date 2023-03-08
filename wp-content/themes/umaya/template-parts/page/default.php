<?php $umaya_options = get_option('umaya'); ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php if(get_post_meta($post->ID,'rnr_wr_pagetype_container',true)=='st2'){ ?>
<div id="down">
<?php the_content();
wp_link_pages( array(
'before'      => '<div class="page-links">',
'after'       => '</div>',
'link_before' => '<span>',
'link_after'  => '</span>',
'pagelink'    => '%',
'separator'   => '',
) );
?>
</div>
<?php } else if(get_post_meta($post->ID,'rnr_wr_pagetype_container',true)=='st3'){ ?>
<div class="clear no-vc-row">
<?php the_content();
wp_link_pages( array(
'before'      => '<div class="page-links">',
'after'       => '</div>',
'link_before' => '<span>',
'link_after'  => '</span>',
'pagelink'    => '%',
'separator'   => '',
) );
?>
</div>
<?php } else { ?>
<section id="down" class="lines-section pos-rel black-lines section-bg-white" data-midnight="black">
<div class="lines-container pos-rel no-lines">
<!-- container start -->
<div class="container">
<div class="flex-container body-text-s text-color-black padding-top-bottom-60">

<?php the_content();
wp_link_pages( array(
'before'      => '<div class="page-links">',
'after'       => '</div>',
'link_before' => '<span>',
'link_after'  => '</span>',
'pagelink'    => '%',
'separator'   => '',
) );
?>

</div>
</div>
</div>
</section>
<?php };?>
<?php endwhile; ?>
<?php wp_reset_postdata();?> 
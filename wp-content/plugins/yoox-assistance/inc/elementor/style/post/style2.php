<?php
$query = array(
    'post_type'         => 'post',
    'post_status'       => 'publish',
    'posts_per_page'    => $post_item,
    'orderby'           => $order_by,
    'order'             => $order
);

$post = new WP_Query($query);
if($post->have_posts()):
    ?>
    <div class="row">
        <div class="blog_slide">
            <?php 
                $i = 1;
                while($post->have_posts()):
                $post->the_post();
                
                $audio_src = '';
                $video_src = '';
                $gallery_images = array();
                if(defined('FW')){
                    $audio_src = fw_get_db_post_option(get_the_ID(), 'audio_src', '');
                    $video_src = fw_get_db_post_option(get_the_ID(), 'video_src', '');
                    $gallery_images = fw_get_db_post_option(get_the_ID(), 'gallery_images', array());
                }
            ?>
            <div class="latestBlogItem <?php if(!has_post_thumbnail()){ echo 'npt';} ?>">
                <?php if(get_post_format() == 'gallery' && (is_array($gallery_images) && count($gallery_images) > 0)): ?>
                    <div class="carousel slide postCarousel" id="pc_<?php echo get_the_ID(); ?>" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php 
                                $i = 1; 
                                foreach($gallery_images as $gal):
                                    $img = wp_get_attachment_image_src($gal['attachment_id'], 'yoox-blog-g');
                                    ?>
                                    <div class="item <?php if($i == 1){ echo 'active'; } ?>">
                                        <img src="<?php echo esc_url($img[0]) ?>" alt="">
                                    </div>
                                    <?php
                                    $i++;
                                endforeach;
                            ?>
                        </div>
                        <a class="left carousel-control" href="#pc_<?php echo get_the_ID(); ?>" role="button" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right carousel-control" href="#pc_<?php echo get_the_ID(); ?>" role="button" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                <?php else: ?>
                    <?php if(has_post_thumbnail()): ?>
                        <div class="lbi_thumb">
                            <?php echo get_the_post_thumbnail(get_the_ID(), 'yoox-blog-g'); ?>
                            <?php if(get_post_format() == 'audio' && $audio_src != ''): ?>
                                <a href="<?php echo esc_url($audio_src) ?>" class="iframePopup"><i class="fa fa-play"></i></a>
                            <?php elseif(get_post_format() == 'video' && $video_src != ''): ?>
                                <a href="<?php echo esc_url($video_src) ?>" class="iframePopup"><i class="fa fa-play"></i></a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
                <div class="lbi_details">
                    <a href="<?php echo get_the_permalink(); ?>" class="lbid_date"><?php echo get_the_time('F d, Y'); ?></a>
                    <h2><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
                    <p class="lbid_meta"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' )); ?>"><?php echo esc_html__('By ', 'yoox').  get_the_author(); ?></a><?php if(yoox_plugin_active('yoox-assistance')){echo do_shortcode('[post_like pid="'.get_the_ID().'"]');} ?>-<a href="<?php echo get_the_permalink(); ?>"><?php echo comments_number( '0 '.esc_html__('Comment', 'yoox'), '1 '.esc_html__('Comment', 'yoox'), '% '.esc_html__('Comments', 'yoox') ); ?></a></p>
                    <div class="lbid_det">
                        <?php echo substr(trim(strip_tags(get_the_content())), 0, 108); ?>
                    </div>
                </div>
            </div>
            <?php
            $i++;
            endwhile;
            ?>     
        </div> 
    </div>
    <?php
endif;
wp_reset_postdata();
?>   
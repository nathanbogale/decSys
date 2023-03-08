<?php
$fargs = array(
    'post_type'         => 'folios',
    'post_status'       => 'publish',
    'posts_per_page'    => $portfolio_item,
    'orderby'           => $order_by,
    'order'             => $order
);

$folio = new WP_Query($fargs);
if($folio->have_posts()):
    ?>
    <div id="workCarousel">
        <?php

            while($folio->have_posts()):
                $folio->the_post();

                $terms = get_the_terms(get_the_ID(), 'folio_cat');
                $cats = '';
                if (is_array($terms) && count($terms) > 0) 
                {
                    $p = 1;
                    $c = count($terms);
                    foreach ($terms as $term) 
                    {
                        if($p == $c)
                        {
                            $cats .= '<a class="cate" href="'.  get_category_link($term->term_id).'">'.$term->name.'</a>';
                        }
                        else
                        {
                            $cats .= '<a class="cate" href="'.  get_category_link($term->term_id).'">'.$term->name.'</a> / ';
                        }
                        $p++;
                    }
                }

                ?>
                <div class="singleWork">
                    <?php if(has_post_thumbnail()): ?>
                        <?php echo get_the_post_thumbnail(get_the_ID(), 'yoox-folio-slide'); ?>
                    <?php else: ?>
                        <img src="https://via.placeholder.com/1295x803.jpg" alt="<?php echo get_the_title(); ?>">
                    <?php endif; ?>
                    <div class="singleWorkContent">
                        <h2><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
                        <div class="workTag">
                            <p><?php echo wp_kses_post($cats); ?></p>
                        </div>
                    </div>
                </div>
                <?php
            endwhile;
        ?>
        </div>
    <?php
endif;
wp_reset_postdata();
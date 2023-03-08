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
    <?php if($is_filter == 'yes'): ?>
    <div class="row">
        <div class="col-lg-12">
            <?php 
                $filter_cat = array(
                    'orderby'       => 'ID',
                    'order'         => 'DESC', 
                    'hide_empty'    => 1,
                    'hierarchical'  => 1,
                    'taxonomy'      => 'folio_cat'
                );
                $categories = get_categories( $filter_cat );
                if(is_array($categories) && !empty($categories))
                {
                    echo '<ul class="folioNav shuffleNav text-center">';
                        echo '<li class="active" data-group="all">'.  esc_html__('All', 'yoox').'</li>';
                        foreach($categories as $cat)
                        {
                            echo '<li data-group="'.esc_attr($cat->slug).'">'.esc_html($cat->name).'</li>';
                        }
                    echo '</ul>';
                }
            ?>
        </div>
    </div>
    <?php endif; ?>
    <div class="row shuffle_container">
    <?php
        $filterClass = '';
        $filterClass = 'shuffle_item ';
        
        while($folio->have_posts()):
            $folio->the_post();
        
            $terms = get_the_terms(get_the_ID(), 'folio_cat');
            $cats = '';
            $classes = '[';
            if (is_array($terms) && count($terms) > 0) 
            {
                $p = 1;
                $c = count($terms);
                foreach ($terms as $term) 
                {
                    if($p == $c)
                    {
                        $cats .= '<a  class="cate" href="'.  get_category_link($term->term_id).'">'.$term->name.'</a>';
                        $classes .= '"'.$term->slug.'"';
                    }
                    else
                    {
                        $cats .= '<a  class="cate" href="'.  get_category_link($term->term_id).'">'.$term->name.'</a>, ';
                        $classes .= '"'.$term->slug.'",';
                    }
                    
                    $p++;
                }
            }
            $classes .= ']';
            ?>
            <div class="col-lg-4 col-sm-6 col-md-4 <?php echo esc_attr($filterClass); ?>" data-groups="<?php echo esc_attr($classes); ?>">
                <div class="singlefolio">
                    <?php if(has_post_thumbnail()): ?>
                        <?php echo get_the_post_thumbnail(get_the_ID(), 'yoox-folio-mas'); ?>
                    <?php else: ?>
                        <img src="https://via.placeholder.com/370.x426.jpg" alt="<?php echo get_the_title(); ?>">
                    <?php endif; ?>
                    <div class="folioHover">
                        <a class="btn_folio popupEnabler" href="<?php echo get_the_ID(); ?>"><img src="<?php echo YOOX_ASSETS_IMAGES_URL; ?>/home_1/chroven_right.png" alt=""></a>
                        <div class="foliodesc">
                            <p><?php echo wp_kses_post($cats); ?></p>
                            <h4><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        endwhile;
    ?>
    </div>
    <section class="portfolioPopUp animated">
        <div class="center_align" id="popupContentHolder">
            <div class="folioLoader text-center">
                <span class="let1">l</span>  
                <span class="let2">o</span>  
                <span class="let3">a</span>  
                <span class="let4">d</span>  
                <span class="let5">i</span>  
                <span class="let6">n</span>  
                <span class="let7">g</span>  
            </div>
        </div>
    </section>
    <?php
endif;
wp_reset_postdata();
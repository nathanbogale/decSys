<?php

get_header(); 
        
    //custom header
    if ( class_exists('ReduxFrameworkPlugin') ) { 
        do_action('avo-custom-header','avo_header_start') ;        
    } else { ?>
        <!--Fall back if no reduxoptions instalavo-->
        <div class="default-header clearfix">
            <?php get_template_part( 'inc/menu','normal'); ?>
        </div><!--/home end-->        
    <?php } ?>
        
    <div class="content blog-wrapper">  
        <div class="container clearfix">
            <div class="row clearfix">
                <div class="<?php if (is_active_sidebar( 'default-sidebar' )){ echo 'col-md-8';} 
                    else { echo 'col-md-12';}?> blog-content">
                    <?php while (have_posts()) : the_post(); 
                        get_template_part( 'inc/loop', 'post' ); 
                        endwhile ?>
                    <ul class="pagination clearfix">
                        <li><?php  previous_posts_link( esc_html__( 'Previous Page', 'avo' ) ); ?></li>
                        <li><?php next_posts_link( esc_html__( 'Next Page', 'avo' ) ); ?> </li>
                    </ul>
                    <div class="spc-40 clearfix"></div>
                </div><!--/.blog-content-->
                
                <?php get_sidebar(); ?>
                
            </div><!--/.row-->
        </div><!--/.container-->
    </div><!--/.blog-wrapper-->
    
<?php //custom footer
    if ( class_exists('ReduxFrameworkPlugin') ) { 
        do_action('avo-custom-footer','avo_footer_start');
    } else {
        //Fall back if no reduxoptions instalavo 
        get_template_part( 'inc/bottom','footer'); 
    }
        
get_footer(); ?>
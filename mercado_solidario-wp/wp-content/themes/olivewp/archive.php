<?php
/**
 * The template for displaying archive pages
 *
 * @package OliveWP Theme
 */

get_header();
if ( ! function_exists( 'olivewp_plus_activate' ) ) {
        do_action( 'olivewp_breadcrumbs_hook' );
}
else {
    do_action( 'olivewp_plus_breadcrumbs_hook' );
}
$olivewp_page_sidebar=get_post_meta(get_option('page_for_posts', true),'olivewp_page_sidebar', true );
if($olivewp_page_sidebar =='') { $olivewp_page_sidebar = 'sidebar-1'; } 
if((get_theme_mod('olivewp_plus_blog_layout_feature','default')=='grid') && (get_theme_mod('olivewp_plus_grid_style_feature','default')=='masonry')) { ?>
<section class="page-section-space blog blg-masonry bg-default" id="content"> 
<?php } else { ?> 
<section class="page-section-space blog bg-default <?php if(get_theme_mod('olivewp_plus_blog_layout_feature','default')=='grid') { echo esc_attr('grid-view '); echo esc_attr('grid_col_'.get_theme_mod('olivewp_plus_blog_col_feature',2)); } else if(get_theme_mod('olivewp_plus_blog_layout_feature','default')=='list'){ echo esc_attr('list-view');} ?>" id="content">
<?php }?> 
    <div class="spice-container<?php echo esc_html(olivewp_container_width_post_layout());?>">
        <div class="spice-row">
            <?php
            if(get_theme_mod('bredcrumb_position','page_header')=='content_area'):
                echo '<div class="spice-col-1">';
                do_action('olivewp_breadcrumbs_page_title_hook');
                echo '</div>';
            endif;

            if(get_theme_mod('blog_sidebar_layout','right')=='left'): 
                echo '<div class="spice-col-4"><div class="sidebar"><div class="left-sidebar">';
                    dynamic_sidebar($olivewp_page_sidebar); 
                    echo '</div></div></div>';
                 endif;
            if(get_theme_mod('blog_sidebar_layout','right')=='right' || get_theme_mod('blog_sidebar_layout','right')=='left'):        
                echo '<div class="spice-col-2">';
            else:
                echo '<div class="spice-col-1">';   
            endif;

            if (have_posts()): 
                if((get_theme_mod('olivewp_plus_blog_layout_feature','default')=='grid') && (get_theme_mod('olivewp_plus_grid_style_feature','default')=='masonry')) {
                     echo '<div class="common-class waterfall" id="ajax-content">';
                }
                if((get_theme_mod('olivewp_plus_blog_layout_feature','default')=='grid') && (get_theme_mod('olivewp_plus_grid_style_feature','default')=='default')) {
                     echo '<div id="ajax-content">';
                }
                while (have_posts()): the_post();

                    if(! function_exists( 'olivewp_plus_activate' ) ) {
                        get_template_part( 'template-parts/content');
                    }
                    else {
                        if((get_theme_mod('olivewp_plus_blog_col_feature',2)==2))
                            {
                                $olivewp_ms_col=3;
                            }
                            else if((get_theme_mod('olivewp_plus_blog_col_feature',2)==3))
                            {
                                $olivewp_ms_col=4;
                            }
                            else
                            {
                                $olivewp_ms_col=5;
                            }
            
                        if((get_theme_mod('olivewp_plus_blog_layout_feature','default')=='grid') && (get_theme_mod('olivewp_plus_grid_style_feature','default')=='masonry')) {
                        echo '<div class="item spice-col-'.esc_attr($olivewp_ms_col).'">';
                    }

                    if(get_theme_mod('olivewp_plus_blog_layout_feature','default')=='list')
                    {
                        include(OLIVEWP_PLUGIN_DIR.'/inc/template-parts/content-list.php' );
                    }
                    else
                    {
                        if((get_theme_mod('olivewp_plus_blog_layout_feature','default')=='grid') && (get_theme_mod('olivewp_plus_grid_style_feature','default')=='default')) {
                             echo '<div class="olive-grid-column">'; }
                        include(OLIVEWP_PLUGIN_DIR.'/inc/template-parts/content.php' );
                        if((get_theme_mod('olivewp_plus_blog_layout_feature','default')=='grid') && (get_theme_mod('olivewp_plus_grid_style_feature','default')=='default')) {
                             echo '</div>'; }
                    }

                        if((get_theme_mod('olivewp_plus_blog_layout_feature','default')=='grid') && (get_theme_mod('olivewp_plus_grid_style_feature','default')=='masonry')) {
                        echo '</div>';
                    }
                       
                    }


                endwhile;
                if(((get_theme_mod('olivewp_plus_blog_layout_feature','default')=='grid') && (get_theme_mod('olivewp_plus_grid_style_feature','default')=='masonry')) || ((get_theme_mod('olivewp_plus_blog_layout_feature','default')=='grid') && (get_theme_mod('olivewp_plus_grid_style_feature','default')=='default'))): echo '</div>'; endif;
            else:
                get_template_part('template-parts/content', 'none');
            endif;

            echo '<div class="clrfix"></div>';
            // pagination
            do_action('olivewp_page_navigation');
            ?>      
            </div>  
            <?php if(get_theme_mod('blog_sidebar_layout','right')=='right'):
                echo '<div class="spice-col-4"><div class="sidebar"><div class="right-sidebar">';
                    dynamic_sidebar($olivewp_page_sidebar);
                echo '</div></div></div>';
            endif;?>
        </div>
    </div>
</section> 

<?php
get_footer();
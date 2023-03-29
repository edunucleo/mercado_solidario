<?php
/**
 * The template for displaying all single posts
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
if((get_post_meta(get_the_ID(),'olivewp_site_layout', true )=='olivewp_site_layout_stretched') || (get_theme_mod('single_blog_sidebar_layout','right')=='stretched')) 
    {
        $olivewp_page_class='stretched';   
    }
else 
    {
        $olivewp_page_class='';
    }

$olivewp_page_sidebar = get_post_meta(get_the_ID(),'olivewp_page_sidebar', true );
if($olivewp_page_sidebar =='') { $olivewp_page_sidebar ='sidebar-1';} ?>
<section class="page-section-space blog bg-default <?php echo esc_attr($olivewp_page_class);?>" id="content">
    <div class="spice-container<?php echo esc_html(olivewp_container_width_single_post_layout());?>">
        <div class="spice-row"> 
        <?php 
        if(get_theme_mod('bredcrumb_position','page_header')=='content_area'):
            echo '<div class="spice-col-1">';
            do_action('olivewp_breadcrumbs_page_title_hook');
            echo '</div>';
        endif;
        if(get_post_meta(get_the_ID(),'olivewp_site_layout', true ) == '' )
        {
         if(get_theme_mod('single_blog_sidebar_layout','right')=='left'):
            echo '<div class="spice-col-4"><div class="sidebar"><div class="left-sidebar">';
                  dynamic_sidebar($olivewp_page_sidebar); 
            echo '</div></div></div>';
         endif;  
         if(get_theme_mod('single_blog_sidebar_layout','right')=='right'|| get_theme_mod('single_blog_sidebar_layout','right')=='left'):        
             echo '<div class="spice-col-2">';
         else:
             echo '<div class="spice-col-1">';   
         endif;
        }
        else if(get_post_meta(get_the_ID(),'olivewp_site_layout', true ) == 'olivewp_site_layout_left')
        {   
            echo '<div class="spice-col-4"><div class="sidebar"><div class="left-sidebar">';
                    dynamic_sidebar($olivewp_page_sidebar); 
            echo '</div></div></div>';
            echo '<div class="spice-col-2">';
        } 
        else if(get_post_meta(get_the_ID(),'olivewp_site_layout', true ) == 'olivewp_site_layout_right')
        {
            echo '<div class="spice-col-2">';
        } 
        else if(get_post_meta(get_the_ID(),'olivewp_site_layout', true ) == 'olivewp_site_layout_without_sidebar')
        {
            echo '<div class="spice-col-1">'; 
        }
        else
        {
            echo '<div class="spice-col-1">'; 
        }
            
        while (have_posts()): the_post();            
            get_template_part('template-parts/content', 'single');
        endwhile; 

        // Related Posts
        if(function_exists( 'olivewp_plus_activate' )):
            if(get_theme_mod('olivewp_plus_enable_related_post', true ) === true ):
                include(OLIVEWP_PLUGIN_DIR.'/inc/template-parts/related-posts.php');
            endif;
        endif;

        // Author Details
        if (get_theme_mod('olivewp_enable_single_post_admin_details', true) === true):
            do_action( 'olivewp_single_post_auth_detail' );
        endif;

        if (comments_open() || get_comments_number()) : comments_template();
        endif;
        ?>
        </div>
        <!-- Sidebar --> 
        <?php if(((get_theme_mod('single_blog_sidebar_layout','right')=='right') && get_post_meta(get_the_ID(),'olivewp_site_layout', true )=='') ||  get_post_meta(get_the_ID(),'olivewp_site_layout', true )=='olivewp_site_layout_right'):
                echo '<div class="spice-col-4"><div class="sidebar"><div class="right-sidebar">';
                    dynamic_sidebar($olivewp_page_sidebar); 
                echo '</div></div></div>';
        endif;?>
        </div>
    </div>
</section>
<?php
get_footer();
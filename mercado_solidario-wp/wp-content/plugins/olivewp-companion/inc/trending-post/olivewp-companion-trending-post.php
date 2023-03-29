<?php
/**
 * Template part for displaying trending posts
 *
 * @package OliveWP Plus
 */

if (!function_exists('olivewp_companion_trending_posts')) {

    function olivewp_companion_trending_posts() {
        wp_reset_postdata();
        $olivewp_companion_post_type = get_theme_mod('customizer_trending_post_type','post');
        $olivewp_companion_source = get_theme_mod('customizer_trending_post_source','taxonomies');
        $olivewp_companion_post_select_id = array();

        $olivewp_companion_post_from = get_theme_mod('customizer_trending_post_from','Uncategorized');
        $olivewp_companion_post_select_category = array();

        if (!is_array(get_theme_mod('customizer_trending_post_id'))) {
            $olivewp_companion_post_select_id = explode(',', get_theme_mod('customizer_trending_post_id'));
        } else {
            $olivewp_companion_post_select_id = get_theme_mod('customizer_trending_post_id');
        }

        if (!is_array(get_theme_mod('customizer_trending_post_category'))) {
            $olivewp_companion_post_select_category = explode(',', get_theme_mod('customizer_trending_post_category'));
        } else {
            $olivewp_companion_post_select_category = get_theme_mod('customizer_trending_post_category');
        }
     
        $olivewp_companion_product_select_taxonomies = array();
        if (!is_array(get_theme_mod('customizer_trending_post_taxonomy'))) {
            $olivewp_companion_product_select_taxonomies = explode(',', get_theme_mod('customizer_trending_post_taxonomy'));
        } else {
            $olivewp_companion_product_select_taxonomies = get_theme_mod('customizer_trending_post_taxonomy');
        }
        // Define shared post arguments
        $olivewp_companion_args = array(
            'post_type' => $olivewp_companion_post_type,
            'no_found_rows'             => true,
            'update_post_meta_cache'    => false,
            'update_post_term_cache'    => false,
            'ignore_sticky_posts'       => 1,
            'orderby'                   => 'comment_count',
            'order'                     => 'DESC',
            'posts_per_page'            => 10,
        
        );
        if(($olivewp_companion_post_type=='post' || $olivewp_companion_post_type=='product') && ($olivewp_companion_source=='custom_query')){
            if(!empty($olivewp_companion_post_select_id)){
               $olivewp_companion_args['post__in'] = $olivewp_companion_post_select_id;
            }
        }elseif($olivewp_companion_post_type=='post' && $olivewp_companion_source=='taxonomies' ){ 
            if($olivewp_companion_post_select_category[0] != 'Uncategorized'){ 
                if(!in_array( "" ,$olivewp_companion_post_select_category )){       
                    $olivewp_companion_args['category__in'] = $olivewp_companion_post_select_category;  
               }
            }         
        }
       
        elseif( $olivewp_companion_post_type=='product' && $olivewp_companion_source=='taxonomies') {
            if($olivewp_companion_product_select_taxonomies[0] != 'Uncategorized'){
                if(!in_array( "" ,$olivewp_companion_product_select_taxonomies )){ 
                    $olivewp_companion_args['tax_query'] = [
                            [
                                'taxonomy' => 'product_cat',
                                'field'    => 'term_id',
                                'terms'    => $olivewp_companion_product_select_taxonomies,
                                
                            ]
                    ]; 
                }
            }    
        }    
        
        if ($olivewp_companion_post_from=='day24'){
            
           $olivewp_companion_args['date_query'] = array(
                                     array(
                                           'after' => '24 hours ago'
                                           )
                                );  
        } 
        elseif ($olivewp_companion_post_from=='day7'){
            $olivewp_companion_args['date_query'] = array(
                                     array(
                                           'after' => '1 week ago'
                                           )
                                );  
        } 
        if ($olivewp_companion_post_from=='month'){
           $olivewp_companion_args['date_query'] = array(
                                     array(
                                           'after' => '1 month ago'
                                           )
                                ); 
        } 
        
        $olivewp_companion_query = !isset($break) ? new WP_Query($olivewp_companion_args) : new WP_Query;
        return $olivewp_companion_query;
    }

}


add_action('olivewp_companion_trending_posts_hook','olivewp_companion_trending_posts_fn');

if(!function_exists('olivewp_companion_trending_posts_fn')){

    function olivewp_companion_trending_posts_fn(){        

        $isRTL = (is_rtl()) ? (bool) true : (bool) false;
        wp_register_script('olivewp-companion-trending-posts', OWC_PLUGIN_URL . 'assets/js/custom.js', array('jquery'));
        wp_localize_script('olivewp-companion-trending-posts', 'trending_posts_settings', array('rtl' => $isRTL));
        wp_enqueue_script('olivewp-companion-trending-posts');

        $olivewp_companion_related_post         =   olivewp_companion_trending_posts(); 
        $olivewp_companion_related_title        =   get_theme_mod('customizer_trending_post_title',__('Trending Now','olivewp-companion'));
        $olivewp_companion_related_tag        =   get_theme_mod('customizer_trending_post_tag','h4');
        if($olivewp_companion_related_post->have_posts() ):?>
            <!--Blog related post-->
             <section class="page-section-space blog trending-post bg-default">
                <article class="trending-posts">
                    <div class="spice-container">
                        <?php
                        if(!empty($olivewp_companion_related_title)):?>
                            <div class="heading-title">
                                <?php echo '<'.esc_attr($olivewp_companion_related_tag).'>'.esc_html($olivewp_companion_related_title).'</'.esc_attr($olivewp_companion_related_tag).'>';?>
                            </div>
                        <?php endif; ?>
                        <div class="spice-row">
                            <div id="trending-posts-carousel" class="owl-carousel owl-theme">
                            <?php while ($olivewp_companion_related_post->have_posts()) : $olivewp_companion_related_post->the_post();?>
                                <div class="item">
                                    <article class="post <?php if(!has_post_thumbnail()): echo esc_attr('removed-image','olivewp-companion'); endif;?>">
                                        <?php if(has_post_thumbnail()): ?>
                                            <figure class="post-thumbnail">                     
                                                <a href="<?php the_permalink(); ?>" >
                                                    <?php the_post_thumbnail('full', array('class'=>'img-fluid', 'loading' => false )); ?>
                                                </a>
                                             </figure>
                                        <?php endif;?>
                                         <div class="post-content"> 
                                            <header class="entry-header">
                                                <span class="entry-title">
                                                    <a href="<?php the_permalink();?>" alt="<?php echo esc_attr('blog-title','olivewp-companion');?>"><?php the_title();?></a>
                                                </span> 
                                            </header>
                                        </div>
                                    </article>
                                </div>
                            <?php endwhile; wp_reset_query(); ?>
                            </div>
                        </div>
                    </div>
                </article>
            </section>
        <?php 
        endif;
    } 
}
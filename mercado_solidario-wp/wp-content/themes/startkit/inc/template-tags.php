<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package startkit
 */
if ( ! function_exists( 'startkit_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function startkit_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', 'startkit' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'startkit' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);
	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
}
endif;

if ( ! function_exists( 'startkit_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function startkit_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'startkit' ) );
		if ( $categories_list && startkit_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'startkit' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'startkit' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'startkit' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'startkit' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'startkit' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function startkit_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'startkit_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'startkit_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so startkit_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so startkit_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in startkit_categorized_blog.
 */
function startkit_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'startkit_categories' );
}
add_action( 'edit_category', 'startkit_category_transient_flusher' );
add_action( 'save_post',     'startkit_category_transient_flusher' );

/**
 * This Function Check whether Sidebar active or Not
 */
if(!function_exists( 'startkit_post_layout' )) :
function startkit_post_layout(){
	if(is_active_sidebar('sidebar-primary'))
		{ echo 'col-lg-9 col-md-12'; } 
	else 
		{ echo 'col-lg-12 col-md-12'; }  
} endif; 


/**
 * Function that returns if the menu is sticky
 */
if (!function_exists('startkit_sticky_menu')):
    function startkit_sticky_menu()
    {
        $is_sticky = get_theme_mod('sticky_header_setting','1');

        if ($is_sticky == '1'):
            return 'sticky-nav';
        else:
            return false;
        endif;
    }
endif;

/**
 * Register Google fonts for startkit.
 */
function startkit_google_font() {
	
    $get_fonts_url = '';
		
    $font_families = array();
 
	$font_families = array('Open Sans:300,400,600,700,800', 'Raleway:400,700');
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $get_fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

    return $get_fonts_url;
}

function startkit_scripts_styles() {
    wp_enqueue_style( 'startkit-fonts', startkit_google_font(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'startkit_scripts_styles' );

/**
 * Register Breadcrumb for Multiple Variation
 */
function startkit_breadcrumbs_style() {
	get_template_part('./sections/startkit','breadcrumb');	
}


// Nav Walker
if ( ! function_exists( 'startkit_navigation' ) ) :
function startkit_navigation() {
	wp_nav_menu( 
		array(  
			'theme_location' => 'primary_menu',
			'container'  => '',
			'menu_class' => '',
			'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
			'walker' => new WP_Bootstrap_Navwalker()
			 ) 
		);
} 
endif;


// Logo, Title, Description
if ( ! function_exists( 'startkit_logo_title_description' ) ) :
function startkit_logo_title_description() {
		if(has_custom_logo())
		{	
			the_custom_logo();
		}
		else { 
	?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<h2 class="site-title"><?php echo esc_html(get_bloginfo('name')); ?></h2>
		</a>
	<?php 		
		}
		$startkit_description = get_bloginfo( 'description');
		if ($startkit_description) : ?>
			<p class="site-description"><?php echo esc_html($startkit_description); ?></p>
	<?php endif;
} 
endif;
?>
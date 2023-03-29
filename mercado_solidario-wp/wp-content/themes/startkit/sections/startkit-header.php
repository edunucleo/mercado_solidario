<!-- Start: Header
============================= -->
<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="custom-header" rel="home">
		<img src="<?php esc_url(header_image()); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr(get_bloginfo( 'title' )); ?>">
	</a>
<?php endif;  
$startkit_cart_header_setting		= get_theme_mod('cart_header_setting','1'); 
$startkit_booknow_setting			= get_theme_mod('booknow_setting','1'); 
$startkit_header_btn_icon			= get_theme_mod('header_btn_icon','fa-book');
$startkit_header_btn_lbl			= get_theme_mod('header_btn_lbl'); 
$startkit_header_btn_link			= get_theme_mod('header_btn_link'); 
if ( is_active_sidebar( 'top-left-header' ) || is_active_sidebar( 'top-right-header' )) {
?>
<div id="header-top" class="startkit">
   <div class="container">
      <div class="row">
         <div class="col-lg-6 col-md-12 text-lg-left text-center startkit-top-left">
			<?php if ( is_active_sidebar( 'top-left-header' ) ) { dynamic_sidebar( 'top-left-header' ); } ?>
         </div>
         <div class="col-lg-6 col-md-12 text-lg-right text-center startkit-top-right">
           <?php if ( is_active_sidebar( 'top-right-header' ) ) { dynamic_sidebar( 'top-right-header' ); } ?>
         </div>
      </div>
   </div>
</div>
<?php } ?>
<header id="header" role="banner">
	<!-- Navigation Starts -->
	<div class="navbar-area normal-h <?php echo esc_attr(startkit_sticky_menu()); ?>">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-6 my-auto">
					<div class="logo main">
						<?php if ( function_exists( 'startkit_logo_title_description' ) ) :	startkit_logo_title_description(); endif; ?>
					</div>
				</div>
				<!-- Nav -->
				<div class="col-lg-6 d-none d-lg-block my-auto">
					<nav class="text-right main-menu">
						<?php startkit_navigation(); ?>
					</nav>
				</div>
				<!-- Nav End -->
				<div class="col-lg-3 col-6 my-auto">
					<div class="header-right-bar">					
						<ul>
							<?php if($startkit_cart_header_setting == '1') { ?>
								<li class="search-button search-cart-se" id="searchss">
									<button class="searchBtn search-toggle" type="button"><i class="fa fa-search"></i></button>
									<!-- Start: Search
									============================= -->
									<div id="search" class="search-area">
										<div class="search-overlay">
											<form method="get" id="searchform" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
												<input id="searchbox" class="search-field sb-field" type="search" value="" name="s" id="s" placeholder="<?php esc_attr_e('type here','startkit'); ?>" />
												<button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
											</form>
											<button type="button" id="close-btn" class="searchBtn">
												<i class="fa fa-times"></i>
											</button>
										</div>
									</div>
									<!-- End: Search
									============================= -->
								</li>
							<?php } ?>
							<?php if($startkit_booknow_setting == '1') { ?>
								<li class="book-now-btn">
									<?php if ( ! empty( $startkit_header_btn_lbl ) ) : ?>
										<a class="book-now" href="<?php echo esc_url( $startkit_header_btn_link ); ?>"><?php echo esc_html( $startkit_header_btn_lbl ); ?><i class="fa <?php echo esc_attr( $startkit_header_btn_icon ); ?>"></i></a>
									<?php endif; ?>		
								</li>
							<?php } ?>	
						</ul>
					</div>
				</div>
				<!-- Start Mobile Menu -->
				<div class="mobile-menu-area d-lg-none">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="mobile-menu">
									<nav class="mobile-menu-active">
									<?php startkit_navigation(); ?>
									</nav>                                
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End Mobile Menu -->
			</div>
		</div>
	</div>
	<!-- Navigation End -->
</header>
<?php 
if ( !is_page_template( 'templates/template-homepage.php' ) ) {
		startkit_breadcrumbs_style(); 
	}
?>
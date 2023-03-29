<!-- Start: Header
============================= -->
<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="custom-header" rel="home">
		<img src="<?php esc_url(header_image()); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr(get_bloginfo( 'title' )); ?>">
	</a>	
<?php endif;  ?>
<?php
	$cart_header_setting			= get_theme_mod('cart_header_setting','1');
	$hantus_header_search			= get_theme_mod('header_search');
	$hantus_search_hdr_setting		= get_theme_mod('search_header_setting');

	$hantus_menu_contact_hs			= get_theme_mod('menu_contact_hs');
	$hantus_menu_contact_icon		= get_theme_mod('menu_contact_icon'); 
	$hantus_menu_contact_title		= get_theme_mod('menu_contact_title');
	$hantus_menu_contact_subtitle	= get_theme_mod('menu_contact_subtitle');
	$hantus_menu_contact_link		= get_theme_mod('menu_contact_link');
?>
    <!-- Start: Navigation
    ============================= -->
    <section class="navbar-wrapper">
        <div class="navbar-area <?php echo esc_attr(hantus_sticky_menu()); ?>">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-7 my-auto">
                        <div class="logo main">
                          <?php
							if(has_custom_logo())
							{	
								the_custom_logo();
							}
							else { 
							?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
								<h4 class="site-title">
									<?php 
										echo esc_html(get_bloginfo('name'));
									?>
								</h4>
							</a>			
						<?php 						
							}
						?>
						<?php
							$hantus_site_desc = get_bloginfo( 'description');
							if ($hantus_site_desc) : ?>
								<p class="site-description"><?php echo esc_html($hantus_site_desc); ?></p>
						<?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-9 col-4 d-none d-lg-inline-block text-right my-auto">
                    	<div class="navigation">
	                        <nav class="main-menu">
	                            <?php 
									wp_nav_menu( 
										array(  
											'theme_location' => 'primary_menu',
											'container'  => '',
											'menu_class' => '',
											'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
											'walker' => new WP_Bootstrap_Navwalker()
											 ) 
										);
									?>
	                        </nav>
							<div class="mbl-right">
								<ul class="mbl">
									<?php if($hantus_menu_contact_hs == '1') { ?>
									<li class="header-info-bg">
										<div class="header-info-text">
											<div class="icons-info">
												<div class="icons"><i class="fa <?php echo esc_attr( $hantus_menu_contact_icon ); ?>"></i></div>
												<div class="info">
													<span class="info-title"><?php echo esc_html( $hantus_menu_contact_title ); ?></span>
													<span class="info-subtitle"><a class="dot" href="<?php echo esc_url( $hantus_menu_contact_link ); ?>"><?php echo esc_html( $hantus_menu_contact_subtitle ); ?></a></span>
												</div>
											</div>
										</div>
									</li>
									<?php } ?>
									<?php 
										if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
												$count = WC()->cart->cart_contents_count;
												$cart_url = wc_get_cart_url();
												?>
												<li class="cart-icon">
													<button type="button" class="cart-icon-wrapper cart--open">
														<i class="fa fa-shopping-bag"></i>
														<?php if ( $count > 0 ) { ?>
															<span class="cart-count"><?php echo esc_html($count); ?></span>
														<?php }else{ ?>	
															<span class="cart-count"><?php esc_html_e('0','hantus'); ?></span>
														<?php } ?>	
													</button>
												</li>
									<?php } ?>
									<?php if($hantus_search_hdr_setting == '1') { ?>
									<li class="search-button">
										<div class="sb-search">
											<button type="button" id='search-clicker' class="sb-icon-search sb-search-toggle"><i class="fa <?php echo esc_attr( $hantus_header_search ); ?>"></i></button>
										</div>
									</li>
									<?php } ?>
								</ul>
							</div>
                        </div>
                    </div>
                    <div class="col-5 text-right d-block d-lg-none my-auto">
						<div class="mbl-right">
							<ul class="mbl">
								<?php if($cart_header_setting == '1') {
										if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
											$count = WC()->cart->cart_contents_count;
											$cart_url = wc_get_cart_url();
											?>
											<li class="cart-icon">
												<button type="button" class="cart-icon-wrapper cart--open">
													<i class="fa fa-shopping-bag"></i>
													<?php if ( $count > 0 ) { ?>
														<span class="cart-count"><?php echo esc_html($count); ?></span>
													<?php }else{ ?>	
														<span class="cart-count"><?php esc_html_e('0','hantus'); ?></span>
													<?php } ?>	
												</button>
											</li>
								<?php } } ?>
								<?php if($hantus_search_hdr_setting == '1') { ?>
								<li class="search-button">
									<div class="sb-search">
										<button type="button" id='search-clicker' class="sb-icon-search sb-search-toggle"><i class="fa <?php echo esc_attr( $hantus_header_search ); ?>"></i></button>
									</div>
								</li>
								<?php } ?>
							</ul>
						</div>
                    </div>
					<div class="sb-search sb-search-popup">
						<div class="sb-search-pop">
							<form action="<?php echo esc_url( home_url( '/' ) ); ?>">
								<input class="sb-search-input" placeholder="<?php esc_attr_e('Search','hantus'); ?>"  type="search" value="" name="s" id="s">
								<button type="button" id='search-clicker' class="sb-icon-search"><i class="fa fa-close"></i></button>
							</form>
						</div>
					</div>
                </div>
            </div>
            <!-- Start Mobile Menu -->
            <div class="mobile-menu-area d-lg-none">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mobile-menu">
                                <nav class="mobile-menu-active">
                                   <?php 
										wp_nav_menu( 
											array(  
												'theme_location' => 'primary_menu',
												'container'  => '',
												'menu_class' => '',
												'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
												'walker' => new WP_Bootstrap_Navwalker()
												 ) 
											);
									?>
                                </nav>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Mobile Menu -->
        </div>        
    </section>
    <!-- End: Navigation
    ============================= -->
<?php if ( class_exists( 'woocommerce' ) ) { ?>
<div class="sidenav cart ">
	<div class="sidenav-div">
		<div class="sidenav-header">
			<button type="button" class="fa fa-times close-sidenav"></button>
			<h3><?php esc_html_e('Your cart','hantus'); ?></h3>
		</div>
		<div class="cart-content">
			<?php get_template_part('woocommerce/cart/mini','cart');	 ?>
		</div>
	</div>
</div>
<span class="cart-overlay"></span>
<?php } ?>
<?php 
	if ( !is_page_template( array( 'templates/template-homepage.php', 'templates/template-homepage-two.php' ) ) ) {	
		hantus_breadcrumbs_style();  
	}
<?php
/**
 * Main Header Layout
 *
 * @package OliveWP Theme
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<header class="header-sidebar">
	<nav class="spice spice-custom <?php if(get_theme_mod('sticky_header_enable',false)===true):?>header-sticky<?php endif;?> trsprnt-menu" role="navigation">
		<div class="spice-container">
			<div class="spice-header">
			    <?php the_custom_logo(); ?>
			    <div class="custom-logo-link-url">  
					<h2 class="site-title">
						<a class="site-title-name" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" style="outline: none;"><?php bloginfo( 'name' ); ?></a>
					</h2>
					<?php
					$olivewp_description = get_bloginfo( 'description', 'display' );
					if ( $olivewp_description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo $olivewp_description; ?></p>
					<?php endif;?>
				</div>
			    <button id="spice-toggle" class="spice-toggle" data-toggle="collapse" type="button" aria-controls="menu" aria-expanded="false">
			    	<i class="fas fa-bars"></i>
			    </button>
			</div>


			<div class="collapse spice-collapse" id="custom-collapse">
				<div class="ml-auto">
					<?php 
					$olivewp_shop_button = '<ul class="nav spice-nav spice-right">%3$s';
				    if(get_theme_mod('after_menu_btn_new_tabl',false)==true) { 
				    	$olivewp_target="_blank";
				    }
				 	else { 
				 		$olivewp_target="_self"; 
				 	}
				 	if((get_theme_mod('after_menu_btn_txt')!='') && (get_theme_mod('after_menu_multiple_option')=='menu_btn')):
			 			$olivewp_shop_button .= '<li class="menu-item header-button"><a target='.$olivewp_target.' class="theme-btn btn-style-one" href='.get_theme_mod('after_menu_btn_link','').'><span class="txt">'.get_theme_mod('after_menu_btn_txt').'</span></a></li>';
					endif;
					if((get_theme_mod('after_menu_html')!='') && (get_theme_mod('after_menu_multiple_option')=='html')):
						$olivewp_shop_button .= '<li class="nav-item html menu-item lite-html">'.get_theme_mod('after_menu_html').'</li>';

					endif;
					if(get_theme_mod('search_btn_enable',false)==true) { 
						$olivewp_shop_button .= '<li class="menu-item dropdown search_exists">'; 
					}
				   
				   //Hence This condition only work when woocommerce plugin will be activate
					if(get_theme_mod('search_btn_enable',false)==true)
					{
				    	$olivewp_shop_button .= 
				    							'<a href="#" title="'.esc_attr__('Search','olivewp').'" class="search-icon dropdown" aria-haspopup="true" aria-expanded="false">
	   											<i class="fas fa-search"></i></a>
	     										<ul class="dropdown-menu pull-right search-panel"  role="menu">
	                     							<li>
	                     								<div class="form-spice-container">
	                       									<form id="searchform" autocomplete="off" role="'.esc_attr('Search','olivewp').'" method="get" class="search-form" action="'.esc_url( home_url( '/' )).'">
	              												<input type="search" class="search-field" placeholder="'.esc_attr__('Search','olivewp').'" value="" name="s">
	                         									<input type="submit" class="search-submit" value="'.esc_attr__('Search','olivewp').'">
	                    								 	</form>           
	                       								</div>
	                     							</li>
	                   							</ul>
	                   						</li>';
	       			}
					if ( class_exists( 'WooCommerce' ) ) {
						if(get_theme_mod('cart_btn_enable',false)==true ){	
							if(get_theme_mod('search_btn_enable',false)==true) { 
								$olivewp_shop_button .='<li class="menu-item cart-item"><div class="cart-header ">';
							}
							else {
								$olivewp_shop_button .='<li class="menu-item cart-item shop_exists"><div class="cart-header ">';
							}	   	  
					      	global $woocommerce; 
					      	$olivewp_link = function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : $woocommerce->cart->get_cart_url();
					      	$olivewp_shop_button .= '<a class="cart-icon" href="'.esc_url($olivewp_link).'" >';
						      
					      	if ($woocommerce->cart->cart_contents_count == 0){
				          		$olivewp_shop_button .= '<i class="fas fa-shopping-cart" aria-hidden="true"></i>';
					        }
					        else
					        {
					          	$olivewp_shop_button .= '<i class="fas fa-cart-plus" aria-hidden="true"></i>';
					        }
						           
					        $olivewp_shop_button .= '</a>';
						    
						    /* translators: %d: count for number of products in cart */
					        $olivewp_shop_button .= '<a class="total" href="'.esc_url($olivewp_link).'" ><span class="cart-total">'.sprintf(_n('%d <span>item</span>', '%d <span>items</span>', $woocommerce->cart->cart_contents_count, 'olivewp' ), $woocommerce->cart->cart_contents_count).'</span></a>';
					       $olivewp_shop_button .='</div></li>';
					    }
					}
					$olivewp_shop_button .= '</li>';
				   	$olivewp_shop_button .= '</ul>'; 
				   	$olivewp_menu_class='';
				    wp_nav_menu( array (
						'theme_location'	=>	'primary', 
						'menu_class'    	=>	'nav spice-nav spice-right '.$olivewp_menu_class.'',
						'items_wrap'    	=>	$olivewp_shop_button,
						'fallback_cb'   	=>	'olivewp_fallback_page_menu',
						'walker'        	=>	new Olivewp_Nav_Walker()
					)); ?>
				</div>
			</div>
		</div>
	</nav>
</header>
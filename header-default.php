<?php global $yith_wcwl, $woocommerce; ?>

<?php
    $header_alignment = $shopkeeper_theme_options['main_header_layout'] == 1 ? 'align_left' : 'align_right';
?>

<?php

  $isWooCommercePage = false;

  if (function_exists ( 'is_woocommerce' ) && is_woocommerce()) {
      $isWooCommercePage = true;
  }

  $woocommerce_keys = array ('woocommerce_shop_page_id',
                             'woocommerce_terms_page_id',
                             'woocommerce_cart_page_id',
                             'woocommerce_checkout_page_id',
                             'woocommerce_pay_page_id',
                             'woocommerce_thanks_page_id',
                             'woocommerce_myaccount_page_id',
                             'woocommerce_edit_address_page_id',
                             'woocommerce_view_order_page_id',
                             'woocommerce_change_password_page_id',
                             'woocommerce_logout_page_id',
                             'woocommerce_lost_password_page_id');

  foreach ($woocommerce_keys as $wc_page_id) {
      if (get_the_ID () == get_option ($wc_page_id, 0)) {
          $isWooCommercePage = true ;
      }
  }

?>

<header id="masthead" class="site-header <?php if(!$isWooCommercePage) { echo 'default-ev-header'; } ?>" role="banner">

    <?php if ( (isset($shopkeeper_theme_options['header_width'])) && ($shopkeeper_theme_options['header_width'] == "custom") ) : ?>
    <div class="row">
        <div class="columns">
    <?php endif; ?>

            <div class="site-header-wrapper" style="max-width:<?php echo esc_html($header_max_width_style); ?>">

                <?php
				$site_tools_padding_class = "";
				if ( (isset($shopkeeper_theme_options['main_header_off_canvas'])) && ($shopkeeper_theme_options['main_header_off_canvas'] == "1") ) {
					if ( (!isset($shopkeeper_theme_options['main_header_off_canvas_icon'])) || ($shopkeeper_theme_options['main_header_off_canvas_icon']) == "" ) {
                		$site_tools_padding_class = "offset";
					}
				}
				elseif ( (isset($shopkeeper_theme_options['main_header_search_bar'])) && ($shopkeeper_theme_options['main_header_search_bar'] == "1") ) {
                	if ( (!isset($shopkeeper_theme_options['main_header_search_bar_icon'])) || ($shopkeeper_theme_options['main_header_search_bar_icon']) == "" ) {
						$site_tools_padding_class = "offset";
					}
				}
                ?>

                <div class="site-tools <?php echo esc_html($site_tools_padding_class); ?> <?php if ( (isset($header_alignment)) ) echo esc_html($header_alignment); ?>">
                    <ul>

                        <?php if (class_exists('YITH_WCWL')) : ?>
                        <?php if ( (isset($shopkeeper_theme_options['main_header_wishlist'])) && ($shopkeeper_theme_options['main_header_wishlist'] == "1") ) : ?>
                        <li class="wishlist-button">
                            <a href="<?php echo esc_url($yith_wcwl->get_wishlist_url()); ?>" class="tools_button">
                                <span class="tools_button_icon">
                                    <?php if ( (isset($shopkeeper_theme_options['main_header_wishlist_icon'])) && ($shopkeeper_theme_options['main_header_wishlist_icon'] != "") ) : ?>
                                    <img src="<?php echo esc_url($shopkeeper_theme_options['main_header_wishlist_icon']); ?>">
                                    <?php else : ?>
                                    <i class="spk-icon spk-icon-heart"></i>
									<?php endif; ?>
                                </span>
                                <span class="wishlist_items_number"><?php echo yith_wcwl_count_products(); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php endif; ?>

                        <?php if (class_exists('WooCommerce')) : ?>
                        <?php if ( (isset($shopkeeper_theme_options['main_header_shopping_bag'])) && ($shopkeeper_theme_options['main_header_shopping_bag'] == "1") ) : ?>
                        <?php if ( (isset($shopkeeper_theme_options['catalog_mode'])) && ($shopkeeper_theme_options['catalog_mode'] == 1) ) : ?>
                        <?php else : ?>
                        <li class="shopping-bag-button">
                            <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="tools_button">
                                <span class="tools_button_icon">
                                	<?php if ( (isset($shopkeeper_theme_options['main_header_shopping_bag_icon'])) && ($shopkeeper_theme_options['main_header_shopping_bag_icon'] != "") ) : ?>
                                    <img src="<?php echo esc_url($shopkeeper_theme_options['main_header_shopping_bag_icon']); ?>">
                                    <?php else : ?>
                                    <i class="spk-icon spk-icon-cart-shopkeeper"></i>
									<?php endif; ?>
                                </span>
                                <span class="shopping_bag_items_number"><?php echo esc_html(WC()->cart->get_cart_contents_count()); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php endif; ?>
                        <?php endif; ?>

                        <?php if ( (isset($shopkeeper_theme_options['my_account_icon_state'])) && ($shopkeeper_theme_options['my_account_icon_state'] == "1") ) : ?>
                        <li class="my_account_icon">
                            <a class="tools_button" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">
                                <span class="tools_button_icon">
                                    <?php if ( (isset($shopkeeper_theme_options['custom_my_account_icon'])) && ($shopkeeper_theme_options['custom_my_account_icon'] != "") ) : ?>
                                    <img src="<?php echo esc_url($shopkeeper_theme_options['custom_my_account_icon']); ?>">
                                    <?php else : ?>
                                    <i class="spk-icon spk-icon-user-account"></i>
                                    <?php endif; ?>
                                </span>
                            </a>
                        </li>
                        <?php endif; ?>


                        <?php if ( (isset($shopkeeper_theme_options['main_header_search_bar'])) && ($shopkeeper_theme_options['main_header_search_bar'] == "1") ) : ?>
                        <li class="offcanvas-menu-button search-button">
                            <a class="tools_button" data-toggle="offCanvasTop1">
                                <span class="tools_button_icon">
                                	<?php if ( (isset($shopkeeper_theme_options['main_header_search_bar_icon'])) && ($shopkeeper_theme_options['main_header_search_bar_icon'] != "") ) : ?>
                                    <img src="<?php echo esc_url($shopkeeper_theme_options['main_header_search_bar_icon']); ?>">
                                    <?php else : ?>
                                    <i class="spk-icon spk-icon-search"></i>
									<?php endif; ?>
                                </span>
                            </a>
                        </li>
                        <?php endif; ?>

                    </ul>
                </div>

            </div><!--.site-header-wrapper-->

    <?php if ( (isset($shopkeeper_theme_options['header_width'])) && ($shopkeeper_theme_options['header_width'] == "custom") ) : ?>
        </div><!-- .columns -->
    </div><!-- .row -->
    <?php endif; ?>

</header><!-- #masthead -->



<script>

	jQuery(document).ready(function($) {

    "use strict";

    var original_logo = $('.site-logo').attr('src');

		$(window).scroll(function() {

			if ($(window).scrollTop() > 0) {

				<?php if ( (isset($shopkeeper_theme_options['sticky_header'])) && (trim($shopkeeper_theme_options['sticky_header']) == "1" ) ) { ?>
					$('#site-top-bar').addClass("hidden");
					$('.site-header').addClass("sticky");
					<?php if ( (isset($shopkeeper_theme_options['sticky_header_logo'])) && (trim($shopkeeper_theme_options['sticky_header_logo']) != "" ) ) { ?>
						$('.site-logo').attr('src', '<?php echo esc_url($shopkeeper_theme_options['sticky_header_logo']); ?>');
					<?php } ?>
				<?php } ?>

			} else {

				<?php if ( (isset($shopkeeper_theme_options['sticky_header'])) && (trim($shopkeeper_theme_options['sticky_header']) == "1" ) ) { ?>
					$('#site-top-bar').removeClass("hidden");
					$('.site-header').removeClass("sticky");
					<?php if ( (isset($shopkeeper_theme_options['sticky_header_logo'])) && (trim($shopkeeper_theme_options['sticky_header_logo']) != "" ) ) { ?>
						$('.site-logo').attr('src', original_logo);
					<?php } ?>
				<?php } ?>

			}

		});

	});

</script>
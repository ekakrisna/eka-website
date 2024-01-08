<?php
/**
 * WooCommerce compatibility functions.
 *
 * @package Authentic
 */

if ( class_exists( 'WooCommerce' ) ) {

	/**
	 * -------------------------------------------------------------------------
	 * [ Set Settings of Customizer ]
	 * -------------------------------------------------------------------------
	 */

	add_filter( 'csco_border_radius', function( $rules ) {
		array_push( $rules, array(
			'element'  => '.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce.widget_product_search button, .wc-block-featured-category .wp-block-button__link, .wc-block-featured-product .wp-block-button__link, .wc-block-grid .wp-block-button__link',
			'property' => 'border-radius',
		) );
		return $rules;
	} );

	/**
	 * -------------------------------------------------------------------------
	 * [ Set Colors of Customizer ]
	 * -------------------------------------------------------------------------
	 */

	add_filter( 'csco_color_body_bg', function( $rules ) {
		array_push( $rules, array(
			'element'  => '.woocommerce.widget_product_search input[type="search"].search-field, .select2-container--default .select2-selection--single, .select2-dropdown',
			'property' => 'background-color',
		) );
		return $rules;
	} );

	add_filter( 'csco_color_body_bg', function( $rules ) {
		array_push( $rules, array(
			'element'  => '.woocommerce div.product .woocommerce-tabs ul.tabs li.active a',
			'property' => 'border-bottom-color',
		) );
		return $rules;
	} );

	add_filter( 'csco_color_text', function( $rules ) {
		array_push( $rules, array(
			'element'  => '.woocommerce.widget_product_search input[type="search"].search-field, .select2-container--default .select2-selection--single .select2-selection__rendered',
			'property' => 'color',
		) );
		return $rules;
	} );

	add_filter( 'csco_color_text_secondary', function( $rules ) {
		array_push( $rules, array(
			'element'  => '.woocommerce ul.products li.product .price, .woocommerce .widget_price_filter .price_slider_amount, .woocommerce ul.cart_list li .reviewer, .woocommerce ul.product_list_widget li .reviewer, .woocommerce .woocommerce-result-count, .woocommerce .product_meta, .woocommerce div.product p.price del,.woocommerce div.product span.price del, .woocommerce .woocommerce-review-link, .woocommerce-review__published-date, .woocommerce table.shop_table th, .woocommerce table.shop_table_responsive tr td::before, .woocommerce-page table.shop_table_responsive tr td::before, .select2-container--default .select2-results__option[aria-selected=true], .select2-container--default .select2-results__option[data-selected=true]',
			'property' => 'color',
		) );
		return $rules;
	} );

	add_filter( 'csco_color_links', function( $rules ) {
		array_push( $rules, array(
			'element'  => '.woocommerce ul.products li.product .price ins, .woocommerce .widget_layered_nav ul li.chosen a:before, .woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce .quantity-controls input, .woocommerce .woocommerce-review-link:hover, .woocommerce div.product .woocommerce-tabs ul.tabs li a, .woocommerce p.stars a:hover, .woocommerce .order-total .amount',
			'property' => 'color',
		) );
		array_push( $rules, array(
			'element'  => '.woocommerce a.remove',
			'property' => 'color',
			'suffix'   => '!important',
		) );
		return $rules;
	} );

	add_filter( 'csco_color_links_hover', function( $rules ) {
		array_push( $rules, array(
			'element'  => '.woocommerce .widget_layered_nav ul li.chosen a:hover:before, .woocommerce p.stars a, .woocommerce .woocommerce-MyAccount-navigation-link.is-active a',
			'property' => 'color',
		) );
		return $rules;
	} );

	add_filter( 'csco_colors_borders', function( $rules ) {
		array_push( $rules, array(
			'element'  => '.woocommerce.widget_product_search input[type="search"].search-field, .woocommerce .cart-collaterals .cart_totals, .woocommerce form.checkout_coupon, .woocommerce form.login, .woocommerce form.register, .select2-container--default .select2-selection--single, .select2-dropdown, .woocommerce form .form-row.woocommerce-validated .select2-container, .woocommerce form .form-row.woocommerce-validated input.input-text, .woocommerce form .form-row.woocommerce-validated select, .woocommerce table.woocommerce-checkout-review-order-table, #add_payment_method #payment, .woocommerce-cart #payment, .woocommerce-checkout #payment, #add_payment_method table.cart td.actions .coupon .input-text, .woocommerce-cart table.cart td.actions .coupon .input-text, .woocommerce-checkout table.cart td.actions .coupon .input-text, .woocommerce table.woocommerce-table--order-details, .woocommerce .woocommerce-MyAccount-navigation ul',
			'property' => 'border-color',
		) );
		array_push( $rules, array(
			'element'  => ' .woocommerce .widget_shopping_cart .total, .woocommerce.widget_shopping_cart .total, .wc-block-product-categories > ul > li:not(:first-child), .widget_product_categories > ul > li:not(:first-child), .woocommerce .widget_layered_nav > ul > li:not(:first-child), .woocommerce .product_meta, .pk-nav-tabs .pk-nav-link.pk-active, .woocommerce div.product .woocommerce-tabs ul.tabs li.active a, .woocommerce #review_form, .woocommerce table.shop_table td, #add_payment_method .cart-collaterals .cart_totals tr td, #add_payment_method .cart-collaterals .cart_totals tr th, .woocommerce-cart .cart-collaterals .cart_totals tr td, .woocommerce-cart .cart-collaterals .cart_totals tr th, .woocommerce-checkout .cart-collaterals .cart_totals tr td, .woocommerce-checkout .cart-collaterals .cart_totals tr th, .woocommerce table.shop_table tbody th, .woocommerce table.shop_table tfoot td, .woocommerce table.shop_table tfoot th',
			'property' => 'border-top-color',
		) );
		array_push( $rules, array(
			'element'  => '.woocommerce div.product .woocommerce-tabs ul.tabs',
			'property' => 'border-bottom-color',
		) );
		array_push( $rules, array(
			'element'  => '.woocommerce div.product .woocommerce-tabs ul.tabs li.active a',
			'property' => 'border-left-color',
		) );
		array_push( $rules, array(
			'element'  => '.woocommerce div.product .woocommerce-tabs ul.tabs li.active a',
			'property' => 'border-right-color',
		) );
		array_push( $rules, array(
			'element'  => '.woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content',
			'property' => 'background-color',
		) );
		array_push( $rules, array(
			'element'  => '.woocommerce .star-rating:before',
			'property' => 'color',
		) );
		return $rules;
	} );

	add_filter( 'csco_colors_borders', function( $rules ) {
		array_push( $rules, array(
			'element'  => '.wc-block-product-categories > ul > li:not(:first-child)',
			'property' => 'border-top-color',
			'context'  => array( 'editor' ),
		) );
		return $rules;
	} );

	add_filter( 'csco_colors_accent', function( $rules ) {
		array_push( $rules, array(
			'element'  => 'div.quantity input, .woocommerce-error, .woocommerce-info, .woocommerce-message, .progress, .woocommerce div.product .woocommerce-tabs ul.tabs li:not(.active) a:hover, .woocommerce table.shop_attributes tr:nth-child(even) td, .woocommerce table.shop_attributes tr:nth-child(even) th, .woocommerce .woocommerce-Reviews #comments, .woocommerce #review_form_wrapper, #add_payment_method #payment div.form-row, .woocommerce-cart #payment div.form-row, .woocommerce-checkout #payment div.form-row, .woocommerce ul.order_details',
			'property' => 'background-color',
		) );
		return $rules;
	} );

	add_filter( 'csco_color_headings', function( $rules ) {
		array_push( $rules, array(
			'element'  => '.woocommerce .widget_shopping_cart .total strong, .woocommerce.widget_shopping_cart .total strong, .woocommerce .widget_shopping_cart .total .amount, .woocommerce.widget_shopping_cart .total .amount, .woocommerce-review__author, .comment-reply-title, #ship-to-different-address > label',
			'property' => 'color',
		) );
		return $rules;
	} );

	add_filter( 'csco_color_btn_primary_text', function( $rules ) {
		array_push( $rules, array(
			'element'  => '.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce span.onsale, .header-cart .cart-quantity, .woocommerce.widget_product_search input[type=submit], .product-thumbnail .added_to_cart, .woocommerce a.remove:hover, .select2-container--default .select2-results__option--highlighted[aria-selected], .woocommerce.widget_product_search button',
			'property' => 'color',
		) );
		return $rules;
	} );

	add_filter( 'csco_color_btn_primary_text_hover', function( $rules ) {
		array_push( $rules, array(
			'element'  => '.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,  .header-cart:hover .cart-quantity, .post-tags a:focus, .post-tags a:hover, .woocommerce.widget_product_search input[type=submit]:hover, .product-thumbnail .added_to_cart:hover, .woocommerce.widget_product_search button:hover',
			'property' => 'color',
		) );
		return $rules;
	} );

	add_filter( 'csco_color_btn_primary_bg', function( $rules ) {
		array_push( $rules, array(
			'element'  => '.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce span.onsale, .header-cart .cart-quantity, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle, .woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce.widget_product_search input[type=submit], .product-thumbnail .added_to_cart, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce a.remove:hover, .select2-container--default .select2-results__option--highlighted[aria-selected], .woocommerce.widget_product_search button',
			'property' => 'background-color',
		) );
		array_push( $rules, array(
			'element'  => '.woocommerce .star-rating span:before',
			'property' => 'color',
		) );
		return $rules;
	} );

	add_filter( 'csco_color_btn_primary_bg_hover', function( $rules ) {
		array_push( $rules, array(
			'element'  => '.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,  .header-cart:hover .cart-quantity, .woocommerce.widget_product_search input[type=submit]:hover, .product-thumbnail .added_to_cart:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce.widget_product_search button:hover',
			'property' => 'background-color',
		) );
		return $rules;
	} );

	add_filter( 'csco_color_btn_secondary_text', function( $rules ) {
		array_push( $rules, array(
			'element'  => '.woocommerce #respond input#submit.disabled, .woocommerce #respond input#submit:disabled, .woocommerce a.button.disabled, .woocommerce a.button:disabled, .woocommerce button.button.disabled, .woocommerce button.button:disabled, .woocommerce input.button.disabled, .woocommerce input.button:disabled, .woocommerce.widget_product_search input[type=submit].disabled, .woocommerce.widget_product_search input[type=submit]:disabled, .woocommerce .added_to_cart.disabled, .woocommerce .added_to_cart:disabled, .woocommerce #respond input#submit.alt.disabled, .woocommerce #respond input#submit.alt.disabled:hover, .woocommerce #respond input#submit.alt:disabled, .woocommerce #respond input#submit.alt:disabled:hover, .woocommerce #respond input#submit.alt:disabled[disabled], .woocommerce #respond input#submit.alt:disabled[disabled]:hover, .woocommerce a.button.alt.disabled, .woocommerce a.button.alt.disabled:hover, .woocommerce a.button.alt:disabled, .woocommerce a.button.alt:disabled:hover, .woocommerce a.button.alt:disabled[disabled], .woocommerce a.button.alt:disabled[disabled]:hover, .woocommerce button.button.alt.disabled, .woocommerce button.button.alt.disabled:hover, .woocommerce button.button.alt:disabled, .woocommerce button.button.alt:disabled:hover, .woocommerce button.button.alt:disabled[disabled], .woocommerce button.button.alt:disabled[disabled]:hover, .woocommerce input.button.alt.disabled, .woocommerce input.button.alt.disabled:hover, .woocommerce input.button.alt:disabled, .woocommerce input.button.alt:disabled:hover, .woocommerce input.button.alt:disabled[disabled], .woocommerce input.button.alt:disabled[disabled]:hover',
			'property' => 'color',
			'suffix'   => '!important',
		) );
		return $rules;
	} );

	add_filter( 'csco_color_btn_secondary_bg', function( $rules ) {
		array_push( $rules, array(
			'element'  => '.woocommerce #respond input#submit.disabled, .woocommerce #respond input#submit:disabled, .woocommerce a.button.disabled, .woocommerce a.button:disabled, .woocommerce button.button.disabled, .woocommerce button.button:disabled, .woocommerce input.button.disabled, .woocommerce input.button:disabled, .woocommerce.widget_product_search input[type=submit].disabled, .woocommerce.widget_product_search input[type=submit]:disabled, .woocommerce .added_to_cart.disabled, .woocommerce .added_to_cart:disabled, .woocommerce #respond input#submit.alt.disabled, .woocommerce #respond input#submit.alt.disabled:hover, .woocommerce #respond input#submit.alt:disabled, .woocommerce #respond input#submit.alt:disabled:hover, .woocommerce #respond input#submit.alt:disabled[disabled], .woocommerce #respond input#submit.alt:disabled[disabled]:hover, .woocommerce a.button.alt.disabled, .woocommerce a.button.alt.disabled:hover, .woocommerce a.button.alt:disabled, .woocommerce a.button.alt:disabled:hover, .woocommerce a.button.alt:disabled[disabled], .woocommerce a.button.alt:disabled[disabled]:hover, .woocommerce button.button.alt.disabled, .woocommerce button.button.alt.disabled:hover, .woocommerce button.button.alt:disabled, .woocommerce button.button.alt:disabled:hover, .woocommerce button.button.alt:disabled[disabled], .woocommerce button.button.alt:disabled[disabled]:hover, .woocommerce input.button.alt.disabled, .woocommerce input.button.alt.disabled:hover, .woocommerce input.button.alt:disabled, .woocommerce input.button.alt:disabled:hover, .woocommerce input.button.alt:disabled[disabled], .woocommerce input.button.alt:disabled[disabled]:hover',
			'property' => 'background-color',
		) );
		return $rules;
	} );

	add_filter( 'csco_color_footer_text', function( $rules ) {
		array_push( $rules, array(
			'element'  => '.site-footer .widget_price_filter .ui-slider .ui-slider-handle',
			'property' => 'background-color',
		) );
		return $rules;
	} );

	add_filter( 'csco_color_footer_link', function( $rules ) {
		array_push( $rules, array(
			'element'  => '.woocommerce .site-footer .widget_shopping_cart .total strong, .site-footer .woocommerce.widget_shopping_cart .total strong, .woocommerce .site-footer .widget_shopping_cart .total .amount, .site-footer .woocommerce.widget_shopping_cart .total .amount, .woocommerce .site-footer .star-rating span::before',
			'property' => 'color',
		) );
		array_push( $rules, array(
			'element'  => '.woocommerce .site-footer a.remove',
			'property' => 'color',
			'suffix'   => '!important',
		) );
		return $rules;
	} );

	add_filter( 'csco_color_footer_border', function( $rules ) {
		array_push( $rules, array(
			'element'  => '.woocommerce .site-footer .widget_price_filter .ui-slider .ui-slider-range, .woocommerce .site-footer .widget_price_filter .price_slider_wrapper .ui-widget-content',
			'property' => 'background-color',
		) );
		array_push( $rules, array(
			'element'  => '.site-footer .widget_product_categories > ul > li:not(:first-child), .site-footer .widget_layered_nav > ul > li:not(:first-child), .woocommerce .site-footer .widget_shopping_cart .total, .site-footer .woocommerce.widget_shopping_cart .total',
			'property' => 'border-top-color',
		) );
		array_push( $rules, array(
			'element'  => '.woocommerce .site-footer .star-rating::before',
			'property' => 'color',
		) );
		return $rules;
	} );

	add_filter( 'csco_color_footer_btn_text', function( $rules ) {
		array_push( $rules, array(
			'element'  => '.woocommerce .site-footer a.button, .woocommerce .site-footer button.button, .site-footer .pk-subscribe-submit, .woocommerce .site-footer input.button',
			'property' => 'color',
		) );
		return $rules;
	} );

	add_filter( 'csco_color_footer_btn_text_hover', function( $rules ) {
		array_push( $rules, array(
			'element'  => '.woocommerce .site-footer a.button:hover, .woocommerce .site-footer button.button:hover, .woocommerce .site-footer input.button:hover',
			'property' => 'color',
		) );
		return $rules;
	} );

	add_filter( 'csco_color_footer_btn_bg', function( $rules ) {
		array_push( $rules, array(
			'element'  => '.woocommerce .site-footer a.button, .woocommerce .site-footer button.button, .woocommerce .site-footer input.button',
			'property' => 'background-color',
		) );
		return $rules;
	} );

	add_filter( 'csco_color_footer_btn_bg_hover', function( $rules ) {
		array_push( $rules, array(
			'element'  => '.woocommerce .site-footer a.button:hover, .woocommerce .site-footer button.button:hover, .woocommerce .site-footer input.button:hover',
			'property' => 'background-color',
		) );
		return $rules;
	} );

	/**
	 * -------------------------------------------------------------------------
	 * [ Set Typography of Customizer ]
	 * -------------------------------------------------------------------------
	 */
	add_filter( 'csco_section_heading_font', function( $rules ) {
		array_push( $rules, array(
			'element' => '.woocommerce .cart_totals > h2, .woocommerce-billing-fields > h3, #ship-to-different-address > label, #order_review_heading, .woocommerce .woocommerce-order-details__title, .woocommerce .woocommerce-customer-details > h2, .woocommerce .woocommerce-column__title, .woocommerce .woocommerce-Address-title h3',
		) );
		return $rules;
	} );

	add_filter( 'csco_typography_base', function( $rules ) {
		array_push( $rules, array(
			'element' => '.woocommerce.widget_product_search input[type="search"].search-field',
		) );
		return $rules;
	} );

	add_filter( 'csco_typography_text_small', function( $rules ) {
		array_push( $rules, array(
			'element' => '.woocommerce .widget_price_filter .price_slider_amount, .woocommerce ul.cart_list li .reviewer, .woocommerce ul.product_list_widget li .reviewer, .woocommerce .woocommerce-result-count, .woocommerce .product_meta,  .woocommerce-error, .woocommerce-info, .woocommerce-message, .woocommerce .woocommerce-review-link, .woocommerce-review__published-date, .woocommerce table.shop_table th, .woocommerce table.shop_table_responsive tr td::before, .woocommerce-page table.shop_table_responsive tr td::before, .header-cart .cart-quantity',
		) );
		return $rules;
	} );

	add_filter( 'csco_typography_buttons', function( $rules ) {
		array_push( $rules, array(
			'element' => '.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce .widget_price_filter .price_slider_amount .button, body .woocommerce.widget_product_search input[type=submit], .woocommerce span.onsale, .product-thumbnail .added_to_cart, .woocommerce div.product form.cart .reset_variations, .woocommerce div.product .woocommerce-tabs ul.tabs li a, #add_payment_method .wc-proceed-to-checkout a.checkout-button, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button, .woocommerce-checkout .wc-proceed-to-checkout a.checkout-button, .woocommerce.widget_product_search button',
		) );
		return $rules;
	} );

	add_filter( 'csco_typography_headings', function( $rules ) {
		array_push( $rules, array(
			'element' => '.woocommerce ul.cart_list li a, .woocommerce ul.product_list_widget li a, .woocommerce .widget_shopping_cart .total strong, .woocommerce.widget_shopping_cart .total strong, .woocommerce .widget_shopping_cart .total .amount, .woocommerce.widget_shopping_cart .total .amount, .woocommerce-review__author, .woocommerce .cart_item .product-name a, #ship-to-different-address > label',
		) );
		return $rules;
	} );

	add_filter( 'csco_typography_h5', function( $rules ) {
		array_push( $rules, array(
			'element' => '.woocommerce ul.cart_list li a, .woocommerce ul.product_list_widget li a, .woocommerce .widget_shopping_cart .total strong, .woocommerce.widget_shopping_cart .total strong, .woocommerce-loop-product__title, .woocommerce .cart_item .product-name a',
		) );
		return $rules;
	} );

	add_filter( 'csco_typography_h6', function( $rules ) {
		array_push( $rules, array(
			'element' => '.woocommerce-review__author',
		) );
		return $rules;
	} );

	add_filter( 'csco_typography_menus', function( $rules ) {
		array_push( $rules, array(
			'element' => '.wc-block-product-categories li, .woocommerce.widget_product_categories li, .woocommerce .widget_layered_nav li, .woocommerce .woocommerce-MyAccount-navigation-link a',
		) );
		return $rules;
	} );

	add_filter( 'csco_typography_submenus', function( $rules ) {
		array_push( $rules, array(
			'element' => '.wc-block-product-categories ul ul li a, .widget_product_categories .children li a',
		) );
		return $rules;
	} );

	add_filter( 'csco_typography_menus', function( $rules ) {
		array_push( $rules, array(
			'element' => '.wc-block-product-categories li',
			'context' => array( 'editor' ),
		) );
		return $rules;
	} );

	add_filter( 'csco_typography_submenus', function( $rules ) {
		array_push( $rules, array(
			'element' => '.wc-block-product-categories ul ul li a',
			'context' => array( 'editor' ),
		) );
		return $rules;
	} );

	/**
	 * -------------------------------------------------------------------------
	 * [ General ]
	 * -------------------------------------------------------------------------
	 */

	/**
	 * Declare WooCommerce Support
	 */
	function csco_woocommerce_support() {
		add_theme_support( 'woocommerce', array(
			'gallery_thumbnail_image_width' => 560,
			'thumbnail_image_width'         => 560,
			'single_image_width'            => 560,
		) );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
	}

	add_action( 'after_setup_theme', 'csco_woocommerce_support' );

	/**
	 * Enqueues WooCommerce assets.
	 */
	function csco_wc_enqueue_scripts() {

		$theme   = wp_get_theme();
		$version = $theme->get( 'Version' );

		// Register WooCommerce styles.
		wp_register_style( 'csco_css_wc', csco_style( get_template_directory_uri() . '/css/woocommerce.css' ), array(), $version );

		// Enqueue WooCommerce styles.
		wp_enqueue_style( 'csco_css_wc' );

		// Add RTL support.
		wp_style_add_data( 'csco_css_wc', 'rtl', 'replace' );
	}

	add_action( 'wp_enqueue_scripts', 'csco_wc_enqueue_scripts' );

	/**
	 * PinIt exclude selectors
	 *
	 * @param string $selectors List selectors.
	 */
	function csco_wc_pinit_exclude_selectors( $selectors ) {
		$selectors[] = '.woocommerce .products img';
		$selectors[] = '.woocommerce-product-gallery img';
		$selectors[] = '.woocommerce-cart-form .product-thumbnail img';
		$selectors[] = '.wc-block-featured-category';
		$selectors[] = '.wc-block-featured-product';
		$selectors[] = '.wp-block-handpicked-products';
		$selectors[] = '.wc-block-grid';

		return $selectors;
	}
	add_filter( 'powerkit_pinit_exclude_selectors', 'csco_wc_pinit_exclude_selectors' );

	/**
	 * Define WooCommerce image sizes
	 */
	function csco_wc_after_switch_theme() {

		if ( get_option( 'csco_authentic_wc_image_sizes_set' ) ) {
			return;
		}

		$catalog   = array(
			'width'  => '560',
			'height' => '560',
			'crop'   => true,
		);
		$single    = array(
			'width'  => '560',
			'height' => '560',
			'crop'   => true,
		);
		$thumbnail = array(
			'width'  => '90',
			'height' => '90',
			'crop'   => true,
		);

		update_option( 'shop_catalog_image_size', $catalog );
		update_option( 'shop_single_image_size', $single );
		update_option( 'shop_thumbnail_image_size', $thumbnail );

		update_option( 'csco_authentic_wc_image_sizes_set', true );
	}

	add_action( 'after_switch_theme', 'csco_wc_after_switch_theme' );

	/**
	 * -------------------------------------------------------------------------
	 * [ Layout ]
	 * -------------------------------------------------------------------------
	 */

	// Remove default wrappers.
	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

	/**
	 * Wrapper Start
	 */
	function csco_wc_wrapper_start() {
		?><div id="primary" class="content-area">
		<?php
	}

	/**
	 * Wrapper End
	 */
	function csco_wc_wrapper_end() {
		?>
		</div>
		<?php
	}

	add_action( 'woocommerce_before_main_content', 'csco_wc_wrapper_start', 10 );
	add_action( 'woocommerce_after_main_content', 'csco_wc_wrapper_end', 10 );

	/**
	 * Check if Wide Container
	 *
	 * @param bool $status Th status.
	 */
	function csco_wc_is_wide_container( $status ) {

		if ( is_shop() || is_woocommerce() ) {
			$status = false;
		}

		return $status;
	}

	add_filter( 'csco_is_wide_container', 'csco_wc_is_wide_container' );

	/**
	 * Get Page Layout
	 *
	 * @param string $layout Page layout.
	 */
	function csco_wc_get_page_layout( $layout ) {

		if ( is_woocommerce() && ! ( is_cart() || is_checkout() || is_account_page() ) ) {

			if ( is_shop() || is_product_category() || is_product_tag() ) {

				$page_id = get_option( 'woocommerce_shop_page_id' );
				$layout  = get_post_meta( $page_id, 'csco_singular_layout', true );

				if ( ! $layout || 'default' === $layout ) {

					if ( get_theme_mod( 'page_layout_default', true ) ) {

						// Get Layout, specified in Layout > General.
						$layout = get_theme_mod( 'layout', 'layout-sidebar-right' );

					} else {

						// Get Layout for pages.
						$layout = get_theme_mod( 'page_layout', 'layout-sidebar-right' );

					}
				}
			} else {

				$layout = 'layout-fullwidth';

			}
		}

		return $layout;

	}

	add_filter( 'csco_page_layout', 'csco_wc_get_page_layout' );

	/**
	 * Get Page Header Type
	 *
	 * @param string $page_header_type Page header type.
	 */
	function csco_wc_get_page_header_type( $page_header_type ) {

		if ( is_shop() ) {

			global $paged;

			if ( $paged < 1 ) {

				$page_id = get_option( 'woocommerce_shop_page_id' );

				// Get Page Header Type for current post or page.
				$page_header_type = get_post_meta( $page_id, 'csco_page_header_type', true );

				if ( ! $page_header_type || 'default' === $page_header_type ) {

					if ( ! get_theme_mod( 'page_page_header_default', true ) ) {

						// Get Page Header Type, specified in Page > Layout.
						$page_header_type = get_theme_mod( 'page_page_header', 'simple' );

					} else {

						// Get Page Header Type, specified in Layout > General.
						$page_header_type = get_theme_mod( 'page_header', 'simple' );

					}
				}
			} else {

				// Don't show page header except for the first page.
				$page_header_type = 'none';

			}
		} elseif ( is_product_category() ) {

			$cat = get_queried_object();
			$id  = $cat->term_id;

			// Get Page Header Type for current category.
			$page_header_type = get_term_meta( $id, 'csco_page_header_type', true );

			if ( ! $page_header_type || 'default' === $page_header_type ) {
				// Get default page header.
				$page_header_type = get_theme_mod( 'page_header', 'simple' );

			}
		}

		return $page_header_type;

	}
	add_filter( 'csco_page_header_type', 'csco_wc_get_page_header_type' );

	/**
	 * Page Header Post Thumbnail Size
	 *
	 * @param string $thumbnail_size Post Thumbnail Size.
	 */
	function csco_wc_shop_page_thumbnail_size( $thumbnail_size ) {

		if ( is_shop() || is_product_category() ) {

			$type = csco_get_page_header_type();

			if ( 'wide' === $type || 'large' === $type ) {
				$thumbnail_size = 'csco-1920';
			} else {
				if ( 'layout-fullwidth' === csco_get_page_layout() ) {
					$thumbnail_size = 'csco-1160';
				} else {
					$thumbnail_size = 'csco-800';
				}
			}
		}

		return $thumbnail_size;
	}
	add_filter( 'csco_page_header_thumbnail_size', 'csco_wc_shop_page_thumbnail_size' );

	/**
	 * Page Header Post Thumbnail ID
	 *
	 * @param string $thumbnail_id Post Thumbnail ID.
	 */
	function csco_wc_shop_page_thumbnail_id( $thumbnail_id ) {

		if ( is_shop() ) {

			$thumbnail_id = get_post_thumbnail_id( get_option( 'woocommerce_shop_page_id' ) );

		} elseif ( is_product_category() ) {

			$cat = get_queried_object();
			$id  = $cat->term_id;

			$thumbnail_id = get_term_meta( $id, 'thumbnail_id', true );
		}

		return $thumbnail_id;
	}
	add_filter( 'csco_page_header_thumbnail_id', 'csco_wc_shop_page_thumbnail_id' );

	/**
	 * Add Small and Simple Page Headers
	 */
	function csco_wc_get_page_header() {
		if ( ! is_product() ) {
			csco_get_page_header();
		}
	}
	add_action( 'woocommerce_before_main_content', 'csco_wc_get_page_header' );

	/**
	 * WC Breadcrumbs
	 *
	 * @param bool $echo Output type.
	 */
	function csco_wc_breadcrumbs( $echo = true ) {
		$display_options = get_option( 'wpseo_titles' );

		if ( ! isset( $display_options['breadcrumbs-enable'] ) ) {
			$display_options['breadcrumbs-enable'] = false;
		}

		ob_start();
		if ( function_exists( 'yoast_breadcrumb' ) && $display_options['breadcrumbs-enable'] ) {
			yoast_breadcrumb( '<div class="cs-breadcrumbs" id="breadcrumbs">', '</div>' );
		} else {
			woocommerce_breadcrumb();
		}

		// Check the number of levels in breadcrumbs.
		preg_match_all( '/<\/a>/', ob_get_contents(), $matches );

		if ( ! isset( $matches[0] ) || count( $matches[0] ) <= 1 ) {
			ob_end_clean();

			return;
		}

		if ( $echo ) {
			return ob_end_flush();
		}

		return ob_get_clean();
	}

	/**
	 * WC Change Theme Breadcrumbs
	 *
	 * @param bool $enabled The enabled breadcrumbs.
	 */
	function csco_wc_theme_breadcrumbs( $enabled ) {
		if ( is_product_taxonomy() || is_product() || is_cart() || is_checkout() || is_account_page() ) {
			csco_wc_breadcrumbs();
			return false;
		}
		return $enabled;
	}
	add_filter( 'csco_breadcrumbs', 'csco_wc_theme_breadcrumbs' );

	/**
	 * Reassign default breadcrumbs
	 */
	function csco_wc_reassign_breadcrumbs() {
		remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );

		if ( is_product() ) {
			add_action( 'woocommerce_before_main_content', 'csco_wc_breadcrumbs', 20, 0 );
		}
	}
	add_action( 'template_redirect', 'csco_wc_reassign_breadcrumbs' );

	/**
	 * Add Shop Options on Shop Page
	 */
	function csco_wc_custom_meta_boxes() {
		$function = sprintf( 'add_meta_%s', 'box' );

		if ( (int) get_the_ID() === (int) get_option( 'woocommerce_shop_page_id' ) ) {
			$function( 'csco_mb_shop_options', esc_html__( 'Shop Options', 'authentic' ), 'csco_mb_shop_options_markup', array( 'page' ), 'side' );
		}
	}
	add_action( sprintf( 'add_meta_%s', 'boxes' ), 'csco_wc_custom_meta_boxes' );

	/**
	 * Options Shop markup
	 *
	 * @param object $post The post object.
	 */
	function csco_mb_shop_options_markup( $post ) {
		wp_nonce_field( 'shop_options', 'csco_wc_shop_options' );

		$products_per_row  = get_post_meta( $post->ID, 'csco_products_per_row', true );
		$products_per_page = get_post_meta( $post->ID, 'csco_products_per_page', true );

		// Set Default.
		$products_per_row  = $products_per_row ? (int) $products_per_row : 3;
		$products_per_page = $products_per_page ? (int) $products_per_page : 9;
		?>
			<p><strong><label for="csco_products_per_row"><?php esc_html_e( 'Products per Row', 'authentic' ); ?>:</label></strong>
			<input class="small-text" type="number" max="4" id="csco_products_per_row" name="csco_products_per_row" value="<?php echo esc_attr( $products_per_row ); ?>"></p>

			<p><strong><label for="csco_products_per_page"><?php esc_html_e( 'Products per Page', 'authentic' ); ?>:</label></strong>
			<input class="small-text" type="number" id="csco_products_per_page" name="csco_products_per_page" value="<?php echo esc_attr( $products_per_page ); ?>"></p>
		<?php
	}

	/**
	 * Save meta box
	 *
	 * @param int $post_id The post id.
	 */
	function csco_wc_save_meta_boxes( $post_id ) {

		// Bail if we're doing an auto save.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		// if our nonce isn't there, or we can't verify it, bail.
		if ( isset( $_POST['csco_wc_shop_options'] ) && wp_verify_nonce( $_POST['csco_wc_shop_options'], 'shop_options' ) ) { // Input var ok; sanitization ok.

			if ( isset( $_POST['csco_products_per_row'] ) ) { // Input var ok; sanitization ok.
				$products_per_row = intval( $_POST['csco_products_per_row'] ); // Input var ok; sanitization ok.

				update_post_meta( $post_id, 'csco_products_per_row', $products_per_row );
			}

			if ( isset( $_POST['csco_products_per_page'] ) ) { // Input var ok; sanitization ok.
				$products_per_page = intval( $_POST['csco_products_per_page'] ); // Input var ok; sanitization ok.

				update_post_meta( $post_id, 'csco_products_per_page', $products_per_page );
			}
		}
	}
	add_action( 'save_post', 'csco_wc_save_meta_boxes' );

	/**
	 * Override Shop Home Page Title
	 *
	 * @param string $title Page Title.
	 */
	function csco_wc_the_title( $title ) {

		if ( is_shop() ) {
			$title = get_the_title( get_option( 'woocommerce_shop_page_id' ) );
		} elseif ( is_product_category() || is_product_tag() ) {
			$title = single_term_title( '', false );
		}
		return $title;
	}
	add_filter( 'get_the_archive_title', 'csco_wc_the_title' );

	/**
	 * Remove Default WooCommerce Page Title
	 */
	function csco_wc_show_page_title() {
		if ( is_shop() ) {
			return false;
		}
	}
	add_filter( 'woocommerce_show_page_title', 'csco_wc_show_page_title' );

	/**
	 * Product Count Template
	 */
	function csco_wc_archive_product_count() {
		if ( is_archive() ) {
			global $wp_query;
			$found_posts = $wp_query->found_posts;
			?>
			<div class="product-count">
				<?php
					/* translators: 1: number of products */
					printf( esc_html( _n( '%s product', '%s products', $found_posts, 'authentic' ) ), intval( $found_posts ) );
				?>
			</div>
		<?php
		}
	}

	/**
	 * Add Product Count
	 */
	function csco_wc_add_product_count() {
		if ( is_shop() || is_product_category() || is_product_tag() ) {
			remove_action( 'csco_page_header_end', 'csco_archive_post_count' );
			add_action( 'csco_page_header_end', 'csco_wc_archive_product_count' );
		}
	}
	add_action( 'wp', 'csco_wc_add_product_count' );

	/**
	 * Register WooCommerce Sidebar
	 */
	function csco_wc_widgets_init() {

		register_sidebar(
			array(
				'name'          => esc_html__( 'WooCommerce', 'authentic' ),
				'id'            => 'sidebar-woocommerce',
				'before_widget' => '<div class="widget %1$s %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => csco_section_heading( null, 'before', false, $class = 'title-widget' ),
				'after_title'   => csco_section_heading( null, 'after', false, $class = 'title-widget' ),
			)
		);
	}

	add_action( 'widgets_init', 'csco_wc_widgets_init' );

	/**
	 * Overwrite Default Sidebar
	 *
	 * @param string $sidebar Sidebar slug.
	 */
	function csco_wc_sidebar( $sidebar ) {
		if ( is_woocommerce() ) {
			return 'sidebar-woocommerce';
		}
		return $sidebar;
	}

	add_filter( 'csco_sidebar', 'csco_wc_sidebar' );

	/**
	 * Display Cart in Header
	 *
	 * @param array $fragments Cart fragments.
	 */
	function csco_wc_header_add_to_cart_fragment( $fragments ) {

		$quantity = intval( WC()->cart->get_cart_contents_count() );
		ob_start();
		?>

		<a class="header-cart" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_html_e( 'View your shopping cart', 'authentic' ); ?>">
			<i class="cs-icon cs-icon-cart"></i>
			<span class="cart-quantity"><?php echo intval( $quantity ); ?></span>
		</a>

		<?php

		$fragments['a.header-cart'] = ob_get_clean();

		return $fragments;

	}
	add_filter( 'woocommerce_add_to_cart_fragments', 'csco_wc_header_add_to_cart_fragment' );

	/**
	 * Add Cart Checkbox To Navbar Customizer
	 */
	function csco_wc_add_fields_customizer() {
		CSCO_Customizer::add_field(
			 array(
				'type'     => 'collapsible',
				'settings' => 'navbar_collapsible_cart',
				'section'  => 'navbar',
				'label'  => esc_html__( 'Cart', 'authentic' ),
				'priority' => 10,
			)
		);

		CSCO_Customizer::add_field(
			 array(
				'type'     => 'checkbox',
				'settings' => 'navbar_cart',
				'label'    => esc_html__( 'Cart', 'authentic' ),
				'section'  => 'navbar',
				'default'  => false,
				'priority' => 10,
			)
		);
	}
	add_filter( 'init', 'csco_wc_add_fields_customizer' );

	/**
	 * Loop
	 */
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

	/**
	 * Open Thumbnail Wrap
	 */
	function csco_wc_before_shop_loop_item() {
		?>
			<div class="product-thumbnail">
		<?php
	}
	add_action( 'woocommerce_before_shop_loop_item', 'csco_wc_before_shop_loop_item', 5 );

	/**
	 * Close Link
	 */
	add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 15 );

	/**
	 * Add To Cart Button
	 */
	add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 20 );

	/**
	 * Close Thumbnail Wrap
	 */
	function csco_wc_before_shop_loop_item_title() {
		?>
		</div>
	<?php
	}
	add_action( 'woocommerce_before_shop_loop_item_title', 'csco_wc_before_shop_loop_item_title', 25 );

	/**
	 * Open Link
	 */
	add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_open', 30 );

	/**
	 * Override number of products per row
	 */
	function csco_wc_loop_columns() {
		$products_per_row = get_post_meta( get_option( 'woocommerce_shop_page_id' ), 'csco_products_per_row', true );

		// Set default products_per_row.
		if ( ! $products_per_row ) {
			$products_per_row = 3;
		}

		return $products_per_row;
	}
	add_filter( 'loop_shop_columns', 'csco_wc_loop_columns' );

	/**
	 * Override number of products per row
	 */
	function csco_wc_loop_shop_per_page() {
		$products_per_page = get_post_meta( get_option( 'woocommerce_shop_page_id' ), 'csco_products_per_page', true );

		// Set default products_per_page.
		if ( ! $products_per_page ) {
			$products_per_page = 9;
		}

		return $products_per_page;
	}
	add_filter( 'loop_shop_per_page', 'csco_wc_loop_shop_per_page', 20 );

	/**
	 * Adds classes to <body> tag
	 *
	 * @param array $classes is an array of all body classes.
	 */
	function csco_wc_body_class( $classes ) {
		if ( is_shop() || is_product_category() || is_product_tag() ) {
			$csco_products_per_row = get_post_meta( get_option( 'woocommerce_shop_page_id' ), 'csco_products_per_row', true );

			// Set default csco_products_per_row.
			if ( ! $csco_products_per_row ) {
				$csco_products_per_row = 3;
			}

			$classes[] = 'wc-col-' . intval( $csco_products_per_row );
		}
		if ( is_product() ) {
			$classes[] = 'wc-col-4';
		}
		return $classes;
	}
	add_filter( 'body_class', 'csco_wc_body_class' );

	/**
	 * Override pagination
	 */
	function csco_wc_woocommerce_pagination() {

		global $wp_query;

		if ( $wp_query->max_num_pages <= 1 ) {
			return;
		}

		?>

		<div class="archive-pagination">

		<?php
		the_posts_pagination(
			apply_filters(
				'woocommerce_pagination_args', array(
					'base'      => esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) ),
					'format'    => '',
					'add_args'  => false,
					'current'   => max( 1, get_query_var( 'paged' ) ),
					'total'     => $wp_query->max_num_pages,
					'prev_text' => esc_html__( 'Previous', 'authentic' ),
					'next_text' => esc_html__( 'Next', 'authentic' ),
					'end_size'  => 3,
					'mid_size'  => 3,
				)
			)
		);
		?>

		</div>

		<?php
	}

	remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
	add_action( 'woocommerce_after_shop_loop', 'csco_wc_woocommerce_pagination', 10 );

	/**
	 * Single Product
	 */

	/**
	 * Open Gallery Wrapper
	 */
	function csco_wc_open_gallery_image_wrapper() {
		?>
		<div class="slider-container product-gallery-wrapper">
			<div class="owl-carousel">
		<?php
	}
	add_action( 'woocommerce_product_thumbnails', 'csco_wc_open_gallery_image_wrapper', 15 );

	/**
	 * Close Gallery Wrapper
	 */
	function csco_wc_close_gallery_image_wrapper() {
		?>
			</div>
			<div class="owl-dots"></div>
		</div>
		<?php
	}
	add_action( 'woocommerce_product_thumbnails', 'csco_wc_close_gallery_image_wrapper', 25 );

	/**
	 * Remove Product Description Title
	 */
	add_filter( 'woocommerce_product_description_heading', '__return_null' );
}

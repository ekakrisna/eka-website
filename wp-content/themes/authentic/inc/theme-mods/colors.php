<?php
/**
 * Colors
 *
 * @package Authentic
 */

CSCO_Customizer::add_panel(
	'colors',
	array(
		'title' => esc_html__( 'Colors', 'authentic' ),
	)
);

/**
 * -------------------------------------------------------------------------
 * |- [ Colors > Presets ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_section(
	'colors_presets',
	array(
		'title' => esc_html__( 'Presets', 'authentic' ),
		'panel' => 'colors',
	)
);

CSCO_Customizer::add_field(
	array(
		'type'        => 'preset',
		'settings'    => 'color_presets',
		'label'       => esc_html__( 'Color Presets', 'authentic' ),
		'description' => esc_html__( 'Please note: selecting a pre-defined color preset will reset all current color settings.', 'authentic' ),
		'section'     => 'colors_presets',
		'default'     => 'monochrome',
		'choices'     => apply_filters( 'csco_color_palettes', array() ),
	)
);

/**
 * -------------------------------------------------------------------------
 * |- [ Colors > Base Colors ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_section(
	'colors_base',
	array(
		'title' => esc_html__( 'Base', 'authentic' ),
		'panel' => 'colors',

	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'color_body_bg',
		'label'        => esc_html__( 'Body Background', 'authentic' ),
		'section'      => 'colors_base',
		'default'      => '#FFFFFF',
		'default_dark' => '#232323',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_color_body_bg',
			array(
				array(
					'element'  => 'body, .offcanvas, #search, .searchwp-live-search-results, select, input[type=search], input[type=text], input[type=number], input[type=email], input[type=tel], input[type=password], textarea, .form-control, .pk-card, .pagination-content, .adp-popup-type-content .adp-popup-container',
					'property' => 'background-color',
				),
				array(
					'element'  => '.entry-content .pk-block-bg-inverse, .pk-dropcap-bg-inverse:first-letter, .entry-content .has-drop-cap.is-cnvs-dropcap-bg-dark:first-letter',
					'property' => 'color',
					'suffix'   => '!important',
				),
				array(
					'element'     => '.pk-tabs-horizontal .pk-nav-link.pk-active',
					'property'    => 'border-bottom-color',
					'media_query' => '@media ( min-width: 768px )',
				),
				array(
					'element'     => '.pk-tabs-vertical .pk-nav-tabs .pk-nav-link.pk-active',
					'property'    => 'border-right-color',
					'media_query' => '@media ( min-width: 768px )',
				),
				array(
					'element'  => '.adp-popup .adp-popup-container',
					'property' => '--adp-popup-container-background',
				),
				array(
					'element'  => '.mfp-bg, .mfp-wrap',
					'property' => '--mfp-overlay-color',
				),
				array(
					'element'  => '.mfp-bg, .mfp-wrap',
					'property' => '--mfp-controls-border-color',
				),
				array(
					'element'  => '.mfp-bg, .mfp-wrap',
					'property' => '--mfp-inner-close-icon-color',
				),
				array(
					'element'  => '.mfp-bg, .mfp-wrap',
					'property' => '--mfp-iframe-background',
				),
				array(
					'element'  => '.mfp-bg, .mfp-wrap',
					'property' => '--mfp-image-background',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'color_text',
		'label'        => esc_html__( 'Main Text', 'authentic' ),
		'section'      => 'colors_base',
		'default'      => '#777777',
		'default_dark' => '#dbdbdb',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_color_text',
			array(
				array(
					'element'  => 'body, select, input[type=search], input[type=text], input[type=number], input[type=email], input[type=tel], input[type=password], textarea, .abr-reviews-posts .abr-review-meta',
					'property' => 'color',
				),
				array(
					'element'  => '.adp-popup .adp-popup-container',
					'property' => '--adp-popup-type-notification-text-color',
				),
				array(
					'element'  => '.mfp-bg, .mfp-wrap',
					'property' => '--mfp-controls-color',
				),
				array(
					'element'  => '.mfp-bg, .mfp-wrap',
					'property' => '--mfp-controls-text-color-hover',
				),
				array(
					'element'  => '.mfp-bg, .mfp-wrap',
					'property' => '--mfp-caption-title-color',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'color_text_secondary',
		'label'        => esc_html__( 'Secondary Text', 'authentic' ),
		'section'      => 'colors_base',
		'default'      => '#c9c9c9',
		'default_dark' => '#595959',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_color_text_secondary',
			array(
				array(
					'element'  => 'blockquote cite, figcaption, .wp-caption-text, .wp-block-gallery .blocks-gallery-item figcaption, .wp-block-image figcaption, .wp-block-audio figcaption, .wp-block-embed figcaption, .wp-block-pullquote cite, .wp-block-pullquote footer, .wp-block-pullquote .wp-block-pullquote__citation, .wp-block-quote cite, label, .text-small, .comment-metadata, .logged-in-as, .post-categories, .post-count, .product-count, .post-meta, .entry-content figcaption, .post-media figcaption, .post-tags, .sub-title, .tagcloud, .timestamp, #wp-calendar caption, .comment-metadata a, .comment-metadata, .widget_rss ul li cite, .widget_rss ul li .rss-date, .pk-widget-about .pk-about-small, .pk-share-buttons-total .pk-share-buttons-count, .pk-share-buttons-post-loop .pk-share-buttons-count, .pk-share-buttons-block-posts .pk-share-buttons-count, .pk-share-buttons-post-sidebar .pk-share-buttons-count, .pk-share-buttons-post-loop .pk-share-buttons-link:hover .pk-share-buttons-count, .pk-share-buttons-block-posts .pk-share-buttons-link:hover .pk-share-buttons-count, .pk-share-buttons-post-sidebar .pk-share-buttons-link:hover .pk-share-buttons-count, .title-share, .pk-social-links-template-default .pk-social-links-label, .pk-social-links-wrap .pk-social-links-label, .pk-color-secondary, .pk-twitter-default .pk-twitter-tweet:before, .cs-meet-team .pk-social-links-link, .abr-post-review .abr-review-score .abr-review-subtext .abr-data-label, .sight-portfolio-area-filter__list-item a',
					'property' => 'color',
				),
				array(
					'element'  => '.owl-dot span, .abr-post-review .abr-review-score .abr-review-subtext .abr-data-info',
					'property' => 'background-color',
				),
				array(
					'element'  => '.mfp-bg, .mfp-wrap',
					'property' => '--mfp-controls-text-color',
				),
				array(
					'element'  => '.mfp-bg, .mfp-wrap',
					'property' => '--mfp-caption-subtitle-color',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'color_links',
		'label'        => esc_html__( 'Links', 'authentic' ),
		'section'      => 'colors_base',
		'default'      => '#000000',
		'default_dark' => '#CCCCCC',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_color_links',
			array(
				array(
					'element'  => '.entry-content p > code, a, #search .close, .button-link, .pk-share-buttons-total .pk-share-buttons-label, .pk-share-buttons-total .pk-share-buttons-title, .pk-social-links-wrap .pk-social-links-count, .pk-nav-tabs .pk-nav-link, .pk-nav-tabs .pk-nav-link.pk-active, .pk-tabs .pk-nav-pills .pk-nav-link, .pk-block-social-links .pk-social-links-link, .pk-block-social-links .pk-social-links-title, .pk-social-links-scheme-light .pk-social-links-link, .pk-social-links-scheme-light .pk-social-links-title, .pk-social-links-scheme-bold .pk-social-links-title, .pk-social-links-scheme-bold-rounded .pk-social-links-title, .pk-share-buttons-scheme-default .pk-share-buttons-link, .pk-share-buttons-after-post.pk-share-buttons-scheme-default .pk-share-buttons-link:not(:hover), .pk-share-buttons-before-post.pk-share-buttons-scheme-default .pk-share-buttons-link:not(:hover), .pk-toc ol > li:before, ol.pk-list-styled > li:before, h2.pk-heading-numbered:before, .pk-card-header a, .pk-twitter-info a, .pk-instagram-username a, .pk-social-links-template-default .pk-social-links-link, .pk-widget-contributors .pk-social-links-link, .cs-list-articles > li > a, .pk-block-contributors .author-name a, .editor-styles-wrapper.cs-editor-styles-wrapper .pk-author-posts-single a, .pk-twitter-content a, .pk-block-author .pk-widget-author-container:not(.pk-bg-overlay) .pk-author-title a, .pk-share-buttons-scheme-simple-light .pk-share-buttons-link, .pk-share-buttons-scheme-simple-light .pk-share-buttons-count, .is-style-pk-share-buttons-simple-light .pk-share-buttons-link, .is-style-pk-share-buttons-simple-light .pk-share-buttons-link .pk-share-buttons-count, .is-style-pk-share-buttons-default .pk-share-buttons-link:not(hover), ol.is-style-cnvs-list-styled > li:before, h2.is-style-cnvs-heading-numbered:before, .cnvs-block-collapsible .cnvs-block-collapsible-title h6 a, header .offcanvas-toggle, .navbar-scheme-toggle',
					'property' => 'color',
				),
				array(
					'element'  => '.owl-dot.active span',
					'property' => 'background-color',
				),
				array(
					'element'  => '.cnvs-block-tabs',
					'property' => '--cnvs-tabs-button-color',
				),
				array(
					'element'  => '.adp-popup .adp-popup-container',
					'property' => '--adp-popup-type-notification-text-link-color',
				),
				array(
					'element'  => '.adp-popup .adp-popup-container',
					'property' => '--adp-popup-close-color',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'color_links_hover',
		'label'        => esc_html__( 'Links Hover', 'authentic' ),
		'section'      => 'colors_base',
		'default'      => '#A0A0A0',
		'default_dark' => '#FFFFFF',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_color_links_hover',
			array(
				array(
					'element'  => 'a:hover, .button-link:hover, #search .close:hover, .pk-social-links-scheme-light:not(.pk-social-links-scheme-light-bg) .pk-social-links-link:hover .pk-social-links-title, .is-style-pk-social-links-bold .pk-social-links-link:hover .pk-social-links-title, .pk-social-links-scheme-bold .pk-social-links-link:hover .pk-social-links-title, .is-style-pk-social-links-bold-rounded .pk-social-links-link:hover .pk-social-links-title, .pk-social-links-scheme-bold-rounded .pk-social-links-link:hover .pk-social-links-title, .pk-nav-tabs .pk-nav-link:not(.pk-active):focus, .pk-nav-tabs .pk-nav-link:not(.pk-active):hover, .pk-card-header a:hover, .pk-twitter-info a:hover, .pk-instagram-username a:hover, .pk-widget-contributors .pk-social-links-link:hover, .cs-list-articles > li > a:hover, .pk-block-contributors .author-name a:hover, .editor-styles-wrapper.cs-editor-styles-wrapper .pk-author-posts-single a:hover, .pk-twitter-content a:hover, .pk-block-author .pk-widget-author-container:not(.pk-bg-overlay) .pk-author-title a:hover, .cnvs-block-collapsible .cnvs-block-collapsible-title h6 a:hover, .navbar-scheme-toggle:hover',
					'property' => 'color',
				),
				array(
					'element'  => '.cnvs-block-tabs',
					'property' => '--cnvs-tabs-button-hover-color',
				),
				array(
					'element'  => '.adp-popup .adp-popup-container',
					'property' => '--adp-popup-close-hover-color',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'colors_borders',
		'label'        => esc_html__( 'Borders', 'authentic' ),
		'section'      => 'colors_base',
		'default'      => '#EEEEEE',
		'default_dark' => '#2B2B2B',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_colors_borders',
			array(
				array(
					'element'  => '.wp-block-separator',
					'property' => 'color',
				),
				array(
					'element'  => 'hr, .wp-block-separator:not(.is-style-dots), .wp-block-pullquote:not([style*="border-color"]), .entry-content .table-bordered th, .entry-content .table-bordered td, section.widget .widget-wrap, .form-control, input[type=search], input[type=text], input[type=number], input[type=email], input[type=tel], input[type=password], textarea, select, .pk-collapsibles .pk-card, .post-archive .archive-compact .post-masonry, .post-archive .archive-compact .post-grid, .post-archive .archive-compact.archive-masonry section.widget, .post-archive .archive-compact.archive-grid section.widget, .archive-list section.widget .widget-wrap, .archive-standard section.widget .widget-wrap, .sidebar-offcanvas .widget, .pk-nav-tabs .pk-nav-link, .pk-collapsibles .pk-card + .pk-card, .cnvs-block-tabs .cnvs-block-tabs-buttons .cnvs-block-tabs-button a, .cnvs-block-collapsibles .cnvs-block-collapsible, .abr-reviews-posts .abr-post-item',
					'property' => 'border-color',
				),
				array(
					'element'  => 'hr, .entry-content table th, .entry-content table td, .entry-content table tbody + tbody, .header-enabled .navbar-primary:not(.sticky-nav-slide) .navbar, .navigation.comment-navigation, .site-main > article > .post-author, .post-main .post-author, .comment-body + .comment-respond, .comment-list + .comment-respond, .comment-list article, .comment-list .pingback, .comment-list .trackback, .post-standard:not(.post-featured) + .post-standard:not(.post-featured), .archive-first + .archive-list, .single .section-carousel, .widget_nav_menu .menu > .menu-item:not(:first-child), .widget_pages li:not(:first-child) a, .widget_meta li:not(:first-child) a, .widget_categories > ul > li:not(:first-child), .widget_archive > ul > li:not(:first-child), .widget_categories .widget-wrap > ul > li:not(:first-child), .widget_archive .widget-wrap > ul > li:not(:first-child), .widget_recent_comments li:not(:first-child), .widget_recent_entries li:not(:first-child), #wp-calendar tbody td, .navigation.pagination, .navigation.pagination + .post-tags, .fb-comments, .post-tags, .page-header-simple .page-header + .post-archive, .section-grid + .site-content > .cs-container:before, .archive-pagination:not(:empty), .post-list:not(.post-featured) + .post-list:not(.post-featured), .post-list + .post, .post + .post-list, .cs-meet-team .cs-author .cs-author-posts, .pk-widget-contributors .pk-author-item, .pk-toc:not(:first-child), .pk-inline-posts:not(:first-child), .cnvs-block-toc:not(:first-child)',
					'property' => 'border-top-color',
				),
				array(
					'element'  => '.entry-content thead th, .navbar-primary:not(.sticky-nav-slide) .navbar, .sticky-nav-slide, .topbar, .navbar-offcanvas, .navigation.comment-navigation, .widget_rss ul li, .searchwp-live-search-results.searchwp-live-search-results-showing .searchwp-live-search-result:not(:last-child) a, .pk-separator, .pk-toc:not(:last-child), .pk-inline-posts:not(:last-child), .cnvs-block-tabs.cnvs-block-tabs-vertical .cnvs-block-tabs-buttons .cnvs-block-tabs-button-active a, .cnvs-block-toc:not(:last-child)',
					'property' => 'border-bottom-color',
				),
				array(
					'element'     => '.layout-sidebar .content-area',
					'property'    => 'border-bottom-color',
					'media_query' => '@media (max-width: 1019px)',
				),
				array(
					'element'     => '.sidebar-area .sidebar-2',
					'property'    => 'border-left-color',
					'media_query' => '@media (min-width: 760px)',
				),
				array(
					'element'     => '.pk-tabs-horizontal .pk-nav-tabs, .cnvs-block-tabs .cnvs-block-tabs-buttons',
					'property'    => 'border-bottom-color',
					'media_query' => '@media ( min-width: 768px )',
				),
				array(
					'element'     => '.pk-tabs-vertical .pk-nav-tabs, .cnvs-block-tabs.cnvs-block-tabs-vertical .cnvs-block-tabs-buttons',
					'property'    => 'border-right-color',
					'media_query' => '@media ( min-width: 768px )',
				),
				array(
					'element'  => '.pk-nav-tabs .pk-nav-link:not(.pk-active):focus, .pk-nav-tabs .pk-nav-link:not(.pk-active):hover',
					'property' => 'background-color',
				),
				array(
					'element'  => '.wp-block-separator.is-style-dots:before',
					'property' => 'color',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'colors_accent',
		'label'        => esc_html__( 'Accent', 'authentic' ),
		'section'      => 'colors_base',
		'default'      => '#F8F8F8',
		'default_dark' => '#1E1E1E',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_colors_accent',
			array(
				array(
					'element'  => '.entry-content p > code, .table-striped tbody tr:nth-of-type(odd), .wp-block-table.is-style-stripes tbody tr:nth-child(odd), .site-main .pk-subscribe-form-wrap, .post-comments, .archive-list .pk-subscribe-form-wrap, .archive-full .pk-subscribe-form-wrap, .entry-content .pk-dropcap-bg-inverse:first-letter, .entry-content .pk-dropcap-bg-light:first-letter, .entry-content .pk-block-bg-inverse, .entry-content .pk-block-bg-light, .basic_mailchimp_widget, .pk-twitter-slider, .pk-card-header, .pk-share-buttons-after-post.pk-share-buttons-scheme-default .pk-share-buttons-link, .pk-share-buttons-before-post.pk-share-buttons-scheme-default .pk-share-buttons-link, .pk-toc ol > li:before, ol.pk-list-styled > li:before, .pk-social-links-scheme-light-bg .pk-social-links-link, .is-style-pk-social-links-light-bg .pk-social-links-link, h2.pk-heading-numbered:before, .entry-content .table-bordered th, .entry-content .table-striped tbody tr:nth-of-type(odd), .wp-block-code, .wp-block-verse, .wp-block-preformatted, .is-style-pk-share-buttons-default .pk-share-buttons-link:not(hover), .is-style-pk-share-buttons-bold .pk-share-buttons-link, .cnvs-block-twitter-layout-slider, .entry-content .has-drop-cap.is-cnvs-dropcap-bg-light:first-letter, ol.is-style-cnvs-list-styled > li:before, h2.is-style-cnvs-heading-numbered:before, .wp-block-group.is-style-cnvs-block-bg-light',
					'property' => 'background-color',
				),
				array(
					'element'  => '.pk-share-buttons-wrap',
					'property' => '--pk-share-link-background',
				),
				array(
					'element'  => '.pk-share-buttons-wrap',
					'property' => '--pk-mobile-share-horizontal-background',
				),
				array(
					'element'  => '.cnvs-block-collapsible-title',
					'property' => 'background-color',
				),
				array(
					'element'  => '.cnvs-block-alert',
					'property' => '--cnvs-alert-background',
				),
				array(
					'element'  => '.cnvs-badge',
					'property' => '--cnvs-badge-background',
				),
			)
		),
	)
);

/**
 * -------------------------------------------------------------------------
 * |- [ Colors > Headings ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_section(
	'colors_headings',
	array(
		'title' => esc_html__( 'Headings', 'authentic' ),
		'panel' => 'colors',

	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'color_headings',
		'label'        => esc_html__( 'Heading', 'authentic' ),
		'section'      => 'colors_headings',
		'default'      => '#000000',
		'default_dark' => '#FFFFFF',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_color_headings',
			array(
				array(
					'element'  => 'h1, h2, h3, h4, h5, h6, .comment .fn, #search input[type="search"], .entry-content .table-bordered th, .wp-block-table td strong, .abr-post-review .abr-review-name, .abr-post-review .abr-review-text, .abr-reviews-posts .abr-review-number, .sight-portfolio-area-filter__title, .sight-portfolio-area-filter__list-item.sight-filter-active a',
					'property' => 'color',
				),
				array(
					'element'  => '.cnvs-block-alert, .cnvs-block-alert h1, .cnvs-block-alert h2, .cnvs-block-alert h3, .cnvs-block-alert h4, .cnvs-block-alert h5, .cnvs-block-alert h6, .cnvs-block-alert .cnvs-title, .cnvs-block-alert a, .entry-content .cnvs-block-alert p',
					'property' => 'color',
				),
				array(
					'element'  => '#search input[type="search"]:-ms-input-placeholder',
					'property' => 'color',
				),
				array(
					'element'  => '#search input[type="search"]:-moz-placeholder',
					'property' => 'color',
				),
				array(
					'element'  => '#search input[type="search"]::-webkit-input-placeholder',
					'property' => 'color',
				),
				array(
					'element'  => '.pk-social-links-wrap',
					'property' => '--pk-social-link-color',
				),
				array(
					'element'  => '.pk-social-links-wrap',
					'property' => '--pk-social-light-bg-title-color',
				),
				array(
					'element'  => '.pk-social-links-wrap',
					'property' => '--pk-social-light-rounded-title-color',
				),
				array(
					'element'  => '.pk-social-links-wrap',
					'property' => '--pk-social-light-bg-color',
				),
				array(
					'element'  => '.pk-social-links-wrap .pk-font-heading',
					'property' => '--pk-heading-font-color',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'color_headings_links',
		'label'        => esc_html__( 'Heading Links', 'authentic' ),
		'section'      => 'colors_headings',
		'default'      => '#000000',
		'default_dark' => '#FFFFFF',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_color_headings_links',
			array(
				array(
					'element'  => 'h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .comment .fn a, .cnvs-block-posts-sidebar:not(.cnvs-block-posts-sidebar-slider) .entry-title a, .pk-widget-posts:not(.pk-widget-posts-template-slider) .entry-title a',
					'property' => 'color',
				),
				array(
					'element'  => '.abr-posts-template-reviews-1 .entry-title a, .abr-posts-template-reviews-2 .entry-title a, .abr-posts-template-reviews-3 .entry-title a, .abr-posts-template-reviews-4 .entry-title a, .abr-posts-template-reviews-5 .entry-title a',
					'property' => 'color',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'color_headings_links_hover',
		'label'        => esc_html__( 'Heading Links Hover', 'authentic' ),
		'section'      => 'colors_headings',
		'default'      => '#A0A0A0',
		'default_dark' => '#CCCCCC',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_color_headings_links_hover',
			array(
				array(
					'element'  => 'h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover, .comment .fn a:hover, .cnvs-block-posts-sidebar:not(.cnvs-block-posts-sidebar-slider) .entry-title a:hover, .pk-widget-posts:not(.pk-widget-posts-template-slider) .entry-title a:hover',
					'property' => 'color',
				),
				array(
					'element'  => '.abr-posts-template-reviews-1 .entry-title a:hover, .abr-posts-template-reviews-2 .entry-title a:hover, .abr-posts-template-reviews-3 .entry-title a:hover, .abr-posts-template-reviews-4 .entry-title a:hover, .abr-posts-template-reviews-5 .entry-title a:hover',
					'property' => 'color',
				),
			)
		),
	)
);

/**
 * -------------------------------------------------------------------------
 * |- [ Colors > Buttons ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_section(
	'colors_buttons',
	array(
		'title' => esc_html__( 'Buttons', 'authentic' ),
		'panel' => 'colors',

	)
);

/**
 * -------------------------------------------------------------------------
 * |-- [ Colors > Buttons > Primary Buttons ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_field(
	array(
		'type'     => 'collapsible',
		'settings' => 'colors_collapsible_buttons_primary',
		'section'  => 'colors_buttons',
		'label'    => esc_html__( 'Primary Buttons', 'chloe' ),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'color_btn_primary_text',
		'label'        => esc_html__( 'Text', 'authentic' ),
		'section'      => 'colors_buttons',
		'default'      => '#EEEEEE',
		'default_dark' => '#EEEEEE',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_color_btn_primary_text',
			array(
				array(
					'element'  => '.wp-block-button .wp-block-button__link:not(.has-background), .button-primary, .overlay-inner a.button-primary, .header-light .button-primary, .wp-block-search .wp-block-search__button, .post-number, .post-pagination .post-more .button, .pk-button-primary, .pk-author-button, .pk-about-button, .pk-instagram-follow, .pk-twitter-follow, .pk-subscribe-submit, .pk-badge-primary, .pk-featured-categories-vertical-list .pk-featured-count, .adp-button-primary, .sight-portfolio-area__pagination .sight-portfolio-load-more',
					'property' => 'color',
				),
				array(
					'element'  => '.pk-pin-it',
					'property' => 'color',
					'suffix'   => '!important',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'color_btn_primary_text_hover',
		'label'        => esc_html__( 'Text Hover', 'authentic' ),
		'section'      => 'colors_buttons',
		'default'      => '#FFFFFF',
		'default_dark' => '#FFFFFF',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_color_btn_primary_text_hover',
			array(
				array(
					'element'  => '.wp-block-button .wp-block-button__link:not(.has-background):hover, .button-primary:hover, .button-primary:active, .button-primary:focus, .button-primary:not([disabled]):not(.disabled).active, .button-primary:not([disabled]):not(.disabled):active, .overlay-inner a.button-primary:hover, .overlay-inner a.button-primary:active, .overlay-inner a.button-primary:focus, .overlay-inner a.button-primary:not([disabled]):not(.disabled).active, .overlay-inner a.button-primary:not([disabled]):not(.disabled):active, .header-light .button-primary:hover, .header-light .button-primary:active, .header-light .button-primary:focus, .header-light .button-primary:not([disabled]):not(.disabled).active, .header-light .button-primary:not([disabled]):not(.disabled):active, .wp-block-search .wp-block-search__button:hover, .post-pagination .post-more .button:hover, .pk-button-primary:not(:disabled):not(.disabled):active, .pk-button-primary:focus, .pk-button-primary:hover, .pk-button-primary:focus, .pk-button-primary:active, .pk-author-button:hover, .pk-about-button:hover, .pk-instagram-follow:hover, .pk-twitter-follow:hover, .pk-subscribe-submit:hover, .adp-button-primary:hover, .adp-button-primary:focus, .sight-portfolio-area__pagination .sight-portfolio-load-more:hover, .sight-portfolio-area__pagination .sight-portfolio-load-more:focus',
					'property' => 'color',
				),
				array(
					'element'  => '.pk-pin-it:hover',
					'property' => 'color',
					'suffix'   => '!important',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'color_btn_primary_bg',
		'label'        => esc_html__( 'Background', 'authentic' ),
		'section'      => 'colors_buttons',
		'default'      => '#282828',
		'default_dark' => '#474747',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_color_btn_primary_bg',
			array(
				array(
					'element'  => '.wp-block-button .wp-block-button__link:not(.has-background), .button-primary, .overlay-inner a.button-primary, .header-light .button-primary, .wp-block-search .wp-block-search__button, .post-number, .pk-tabs .pk-nav-pills .pk-nav-link.pk-active, .pk-tabs .pk-nav-pills .pk-nav-link.pk-active:focus, .pk-tabs  .pk-nav-pills .pk-tabs .pk-nav-pills .pk-nav-link.pk-active:hover, .pk-button-primary, .pk-author-button, .pk-about-button, .pk-instagram-follow, .pk-twitter-follow, .pk-subscribe-submit, .pk-badge-primary, .pk-featured-categories-vertical-list .pk-featured-count, .cnvs-block-tabs.is-style-cnvs-block-tabs-pills .cnvs-block-tabs-buttons .cnvs-block-tabs-button.cnvs-block-tabs-button-active a, .cnvs-block-tabs.is-style-cnvs-block-tabs-pills .cnvs-block-tabs-buttons .cnvs-block-tabs-button.cnvs-block-tabs-button-active a:focus, .cnvs-block-tabs.is-style-cnvs-block-tabs-pills .cnvs-block-tabs-buttons .cnvs-block-tabs-button.cnvs-block-tabs-button-active a:hover, .adp-button-primary, .sight-portfolio-area__pagination .sight-portfolio-load-more',
					'property' => 'background-color',
				),
				array(
					'element'  => '.pk-bg-primary, .pk-pin-it',
					'property' => 'background-color',
					'suffix'   => '!important',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'color_btn_primary_bg_hover',
		'label'        => esc_html__( 'Background Hover', 'authentic' ),
		'section'      => 'colors_buttons',
		'default'      => '#000000',
		'default_dark' => '#282828',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_color_btn_primary_bg_hover',
			array(
				array(
					'element'  => '.post-tags a:focus, .post-tags a:hover, .tagcloud a:focus, .tagcloud a:hover, .wp-block-button .wp-block-button__link:not(.has-background):hover, .button-primary:hover, .button-primary:active, .button-primary:focus, .button-primary:not([disabled]):not(.disabled).active, .button-primary:not([disabled]):not(.disabled):active, .overlay-inner a.button-primary:hover, .overlay-inner a.button-primary:active, .overlay-inner a.button-primary:focus, .overlay-inner a.button-primary:not([disabled]):not(.disabled).active, .overlay-inner a.button-primary:not([disabled]):not(.disabled):active, .header-light .button-primary:hover, .header-light .button-primary:active, .header-light .button-primary:focus, .header-light .button-primary:not([disabled]):not(.disabled).active, .header-light .button-primary:not([disabled]):not(.disabled):active, .wp-block-search .wp-block-search__button:hover, .pk-button-primary:not(:disabled):not(.disabled):active, .pk-button-primary:hover, .pk-button-primary:active, .pk-button-primary:focus, .pk-author-button:hover, .pk-about-button:hover, .pk-instagram-follow:hover, .pk-twitter-follow:hover, .pk-subscribe-submit:hover, .adp-button-primary:hover, .adp-button-primary:focus, .sight-portfolio-area__pagination .sight-portfolio-load-more:hover, .sight-portfolio-area__pagination .sight-portfolio-load-more:focus',
					'property' => 'background-color',
				),
				array(
					'element'  => '.pk-pin-it:hover',
					'property' => 'background-color',
					'suffix'   => '!important',
				),
			)
		),
	)
);

/**
 * -------------------------------------------------------------------------
 * |-- [ Colors > Buttons > Secondary Buttons ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_field(
	array(
		'type'     => 'collapsible',
		'settings' => 'colors_collapsible_buttons_secondary',
		'section'  => 'colors_buttons',
		'label'    => esc_html__( 'Secondary Buttons', 'authentic' ),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'color_btn_secondary_text',
		'label'        => esc_html__( 'Text', 'authentic' ),
		'section'      => 'colors_buttons',
		'default'      => '#A0A0A0',
		'default_dark' => '#A0A0A0',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_color_btn_secondary_text',
			array(
				array(
					'element'  => '.button-secondary, .pk-button-secondary',
					'property' => 'color',
					'suffix'   => '!important',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'color_btn_secondary_text_hover',
		'label'        => esc_html__( 'Text Hover', 'authentic' ),
		'section'      => 'colors_buttons',
		'default'      => '#000000',
		'default_dark' => '#000000',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_color_btn_secondary_text_hover',
			array(
				array(
					'element'  => '.button-secondary:hover, .button-secondary:active, .button-secondary:focus, .pk-button-secondary:hover, .pk-button-secondary:active, .pk-button-secondary:focus',
					'property' => 'color',
					'suffix'   => '!important',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'color_btn_secondary_bg',
		'label'        => esc_html__( 'Background', 'authentic' ),
		'section'      => 'colors_buttons',
		'default'      => '#EEEEEE',
		'default_dark' => '#EEEEEE',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_color_btn_secondary_bg',
			array(
				array(
					'element'  => '.button-secondary, .pk-button-secondary',
					'property' => 'background-color',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'color_btn_secondary_bg_hover',
		'label'        => esc_html__( 'Background Hover', 'authentic' ),
		'section'      => 'colors_buttons',
		'default'      => '#F8F8F8',
		'default_dark' => '#F8F8F8',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_color_btn_secondary_bg_hover',
			array(
				array(
					'element'  => '.button-secondary:hover, .button-secondary:active, .button-secondary:focus, .pk-button-secondary:hover, .pk-button-secondary:active, .pk-button-secondary:focus',
					'property' => 'background-color',
				),
			)
		),
	)
);

/**
 * -------------------------------------------------------------------------
 * |- [ Colors > Logo ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_section(
	'colors_logo',
	array(
		'title' => esc_html__( 'Logo', 'authentic' ),
		'panel' => 'colors',

	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'colors_logo_text',
		'label'        => esc_html__( 'Title', 'authentic' ),
		'section'      => 'colors_logo',
		'default'      => '#000000',
		'default_dark' => '#FFFFFF',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_colors_logo_text',
			array(
				array(
					'element'  => '.site-title',
					'property' => 'color',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'colors_logo_text_hover',
		'label'        => esc_html__( 'Title Hover', 'authentic' ),
		'section'      => 'colors_logo',
		'default'      => '#A0A0A0',
		'default_dark' => '#EEEEEE',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_colors_logo_text_hover',
			array(
				array(
					'element'  => '.site-title:hover',
					'property' => 'color',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'colors_logo_description',
		'label'        => esc_html__( 'Description', 'authentic' ),
		'section'      => 'colors_logo',
		'default'      => '#A0A0A0',
		'default_dark' => '#888888',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_colors_logo_description',
			array(
				array(
					'element'  => '.site-description',
					'property' => 'color',
				),
			)
		),
	)
);

/**
 * -------------------------------------------------------------------------
 * |- [ Colors > Navigation Bar ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_section(
	'colors_navbar',
	array(
		'title' => esc_html__( 'Navigation Bar', 'authentic' ),
		'panel' => 'colors',

	)
);

/**
 * -------------------------------------------------------------------------
 * |-- [ Colors > Navigation Bar > General ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_field(
	array(
		'type'     => 'collapsible',
		'settings' => 'colors_collapsible_navbar',
		'section'  => 'colors_navbar',
		'label'    => esc_html__( 'General', 'authentic' ),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'      => 'checkbox',
		'settings'  => 'colors_navbar_bg_toggle_next',
		'label'     => esc_html__( 'Background', 'authentic' ),
		'section'   => 'colors_navbar',
		'default'   => true,
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'color-alpha',
		'settings'        => 'colors_navbar_bg',
		'label'           => esc_html__( 'Background', 'authentic' ),
		'section'         => 'colors_navbar',
		'default'         => 'rgba(255,255,255,0.97)',
		'default_dark'    => '#232323',
		'support_dark'    => true,
		'alpha'           => true,
		'output'          => apply_filters(
			'csco_colors_navbar_bg',
			array(
				array(
					'element'  => '.navbar-primary',
					'property' => 'background-color',
				),
			)
		),
		'active_callback' => array(
			array(
				'setting'  => 'colors_navbar_bg_toggle_next',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'checkbox',
		'settings' => 'colors_navbar_borders',
		'label'    => esc_html__( 'Borders', 'authentic' ),
		'section'  => 'colors_navbar',
		'default'  => true,
		'output'   => apply_filters(
			'csco_colors_navbar_borders',
			array(
				array(
					'element'       => '.header-enabled .navbar-primary:not(.sticky-nav-slide) .navbar',
					'property'      => 'border-top-width',
					'value_pattern' => '1px',
					'media_query'   => '@media ( min-width: 970px )',
					'exclude'       => array( false ),
				),
				array(
					'element'       => '.header-enabled .navbar-primary:not(.sticky-nav-slide) .navbar',
					'property'      => 'border-top-style',
					'value_pattern' => 'solid',
					'media_query'   => '@media ( min-width: 970px )',
					'exclude'       => array( false ),
				),
				array(
					'element'       => '.navbar-primary:not(.sticky-nav-slide) .navbar, .sticky-nav-slide',
					'property'      => 'border-bottom-width',
					'value_pattern' => '1px',
					'exclude'       => array( false ),
				),
				array(
					'element'       => '.navbar-primary:not(.sticky-nav-slide) .navbar, .sticky-nav-slide',
					'property'      => 'border-bottom-style',
					'value_pattern' => 'solid',
					'exclude'       => array( false ),
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'colors_navbar_main_links',
		'label'        => esc_html__( 'Links', 'authentic' ),
		'section'      => 'colors_navbar',
		'default'      => '#000000',
		'default_dark' => '#EEEEEE',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_colors_navbar_main_links',
			array(
				array(
					'element'  => '.navbar-primary a, .navbar-primary button, .navbar-primary .navbar-nav > li > a, .navbar-primary .navbar-scheme-toggle',
					'property' => 'color',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'colors_navbar_main_links_hover',
		'label'        => esc_html__( 'Links Hover', 'authentic' ),
		'section'      => 'colors_navbar',
		'default'      => '#A0A0A0',
		'default_dark' => '#FFFFFF',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_colors_navbar_main_links_hover',
			array(
				array(
					'element'  => '.navbar-primary a:hover, .navbar-primary button:hover, .navbar-primary .navbar-nav > li > a:focus, .navbar-primary .navbar-nav > li > a:hover, .navbar-primary .navbar-nav > li.current-menu-parent > a, .navbar-primary .navbar-nav > li.current-nav-item > a, .site-submenu:hover .navbar-widgets-btn',
					'property' => 'color',
				),
			)
		),
	)
);

/**
 * -------------------------------------------------------------------------
 * |-- [ Colors > Navigation Bar > Sub-Menus ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_field(
	array(
		'type'     => 'collapsible',
		'settings' => 'colors_collapsible_navbar_submenu',
		'section'  => 'colors_navbar',
		'label'    => esc_html__( 'Sub-Menus', 'authentic' ),

	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'colors_navbar_submenu_bg',
		'label'        => esc_html__( 'Background', 'authentic' ),
		'section'      => 'colors_navbar',
		'default'      => '#FFFFFF',
		'default_dark' => '#1E1E1E',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_colors_navbar_submenu_bg',
			array(
				array(
					'element'  => '.navbar-nav .sub-menu',
					'property' => 'background-color',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'checkbox',
		'settings' => 'colors_navbar_submenu_borders_toggle_next',
		'label'    => esc_html__( 'Borders', 'authentic' ),
		'section'  => 'colors_navbar',
		'default'  => true,

	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'color',
		'settings'        => 'colors_navbar_submenu_borders',
		'label'           => esc_html__( 'Borders', 'authentic' ),
		'section'         => 'colors_navbar',
		'default'         => '#EEEEEE',
		'default_dark'    => '#1E1E1E',
		'support_dark'    => true,
		'output'          => apply_filters(
			'csco_colors_navbar_submenu_borders',
			array(
				array(
					'element'       => '.navbar-nav .sub-menu',
					'property'      => 'border',
					'value_pattern' => '1px $ solid',
				),
				array(
					'element'       => '.navbar-nav .sub-menu .sub-menu',
					'property'      => 'margin-top',
					'value_pattern' => '-1px',
				),
			)
		),
		'active_callback' => array(
			array(
				'setting'  => 'colors_navbar_submenu_borders_toggle_next',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'checkbox',
		'settings' => 'colors_navbar_submenu_inverse_badges',
		'label'    => esc_html__( 'Inverse Badges', 'authentic' ),
		'section'  => 'colors_navbar',
		'default'  => false,

	)
);

/**
 * -------------------------------------------------------------------------
 * |-- [ Colors > Navigation Bar > Sub-Menu Items ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_field(
	array(
		'type'     => 'collapsible',
		'settings' => 'colors_collapsible_navbar_submenu_items',
		'section'  => 'colors_navbar',
		'label'    => esc_html__( 'Sub-Menu Items', 'authentic' ),

	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'colors_navbar_submenu_items_links',
		'label'        => esc_html__( 'Links', 'authentic' ),
		'section'      => 'colors_navbar',
		'default'      => '#000000',
		'default_dark' => '#EEEEEE',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_colors_navbar_submenu_items_links',
			array(
				array(
					'element'  => '.navbar-nav .sub-menu > li > a, .navbar-nav .cs-mm-categories > li > a, .navbar-nav .menu-columns > .sub-menu > li > a:hover, .mega-menu-item .entry-title a',
					'property' => 'color',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'colors_navbar_submenu_items_links_hover',
		'label'        => esc_html__( 'Links Hover', 'authentic' ),
		'section'      => 'colors_navbar',
		'default'      => '#A0A0A0',
		'default_dark' => '#FFFFFF',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_colors_navbar_submenu_items_links_hover',
			array(
				array(
					'element'  => '.navbar-nav .sub-menu > li > a:hover, .navbar-nav .sub-menu > li > a:focus, .navbar-nav .sub-menu > li > a:active, .navbar-nav .cs-mm-categories > li > a:hover, .navbar-nav .cs-mm-categories > li > a:focus, .navbar-nav .cs-mm-categories > li > a:active, .mega-menu-item .entry-title a:hover',
					'property' => 'color',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'colors_navbar_submenu_items_links_active',
		'label'        => esc_html__( 'Links Active', 'authentic' ),
		'section'      => 'colors_navbar',
		'default'      => '#A0A0A0',
		'default_dark' => '#FFFFFF',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_colors_navbar_submenu_items_links_active',
			array(
				array(
					'element'  => '.navbar-nav .sub-menu .current-menu-item > a, .navbar-nav .sub-menu .current-menu-ancestor > a, .navbar-nav .sub-menu .current-menu-parent > a',
					'property' => 'color',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'checkbox',
		'settings' => 'colors_navbar_submenu_items_borders_toggle_next',
		'label'    => esc_html__( 'Borders', 'authentic' ),
		'section'  => 'colors_navbar',
		'default'  => true,

	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'color',
		'settings'        => 'colors_navbar_submenu_items_borders',
		'label'           => esc_html__( 'Borders', 'authentic' ),
		'section'         => 'colors_navbar',
		'default'         => '#EEEEEE',
		'default_dark'    => '#2B2B2B',
		'support_dark'    => true,
		'output'          => apply_filters(
			'csco_colors_navbar_submenu_items_borders',
			array(
				array(
					'element'       => '.navbar-nav .sub-menu > li + li > a, .navbar-nav .cs-mm-categories > li + li > a',
					'property'      => 'border-top',
					'value_pattern' => '1px $ solid',
				),
			)
		),
		'active_callback' => array(
			array(
				'setting'  => 'colors_navbar_submenu_items_borders_toggle_next',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

/**
 * -------------------------------------------------------------------------
 * |-- [ Colors > Navigation Bar > Social Icons ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_field(
	array(
		'type'     => 'collapsible',
		'settings' => 'colors_collapsible_navbar_social',
		'section'  => 'colors_navbar',
		'label'    => esc_html__( 'Social Icons', 'authentic' ),

	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'colors_navbar_social_icons',
		'label'        => esc_html__( 'Icons', 'authentic' ),
		'section'      => 'colors_navbar',
		'default'      => '#000000',
		'default_dark' => '#FFFFFF',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_colors_navbar_social_icons',
			array(
				array(
					'element'  => '.navbar-primary .pk-social-links-template-nav .pk-social-links-icon',
					'property' => 'color',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'colors_navbar_social_icons_hover',
		'label'        => esc_html__( 'Icons Hover', 'authentic' ),
		'section'      => 'colors_navbar',
		'default'      => '#000000',
		'default_dark' => '#FFFFFF',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_colors_navbar_social_icons_hover',
			array(
				array(
					'element'  => '.navbar-primary .pk-social-links-template-nav .pk-social-links-item .pk-social-links-link:hover .pk-social-links-icon',
					'property' => 'color',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'colors_navbar_social_text',
		'label'        => esc_html__( 'Text', 'authentic' ),
		'section'      => 'colors_navbar',
		'default'      => '#A0A0A0',
		'default_dark' => '#dbdbdb',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_colors_navbar_social_text',
			array(
				array(
					'element'  => '.navbar-primary .pk-social-links-template-nav .pk-social-links-title, .navbar-primary .pk-social-links-template-nav .pk-social-links-count, .navbar-primary .pk-social-links-template-nav .pk-social-links-label',
					'property' => 'color',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'colors_navbar_social_text_hover',
		'label'        => esc_html__( 'Text Hover', 'authentic' ),
		'section'      => 'colors_navbar',
		'default'      => '#000000',
		'default_dark' => '#FFFFFF',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_colors_navbar_social_text_hover',
			array(
				array(
					'element'  => '.navbar-primary .pk-social-links-template-nav .pk-social-links-item .pk-social-links-link:hover .pk-social-links-title, .navbar-primary .pk-social-links-template-nav .pk-social-links-item .pk-social-links-link:hover .pk-social-links-count, .navbar-primary .pk-social-links-template-nav .pk-social-links-item .pk-social-links-link:hover .pk-social-links-label',
					'property' => 'color',
				),
			)
		),
	)
);

/**
 * -------------------------------------------------------------------------
 * |-- [ Colors > Navigation Bar > Widgetized Sub-Menus ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_field(
	array(
		'type'     => 'collapsible',
		'settings' => 'colors_collapsible_navbar_widgetized_submenu',
		'section'  => 'colors_navbar',
		'label'    => esc_html__( 'Widgetized Sub-Menus', 'authentic' ),

	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'checkbox',
		'settings' => 'colors_navbar_widgetized_submenu_borders_toggle',
		'label'    => esc_html__( 'Sub-Menu Border', 'authentic' ),
		'section'  => 'colors_navbar',
		'default'  => true,

	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'color',
		'settings'        => 'colors_navbar_widgetized_submenu_borders',
		'label'           => esc_html__( 'Borders', 'authentic' ),
		'section'         => 'colors_navbar',
		'default'         => '#EEEEEE',
		'default_dark'    => '#1e1e1e',
		'support_dark'    => true,
		'output'          => apply_filters(
			'csco_colors_navbar_widgetized_submenu_borders',
			array(
				array(
					'element'       => '.navbar-primary .navbar-multi-column-widgets .navbar-widgets-container, .navbar-primary .navbar-single-column-widgets .widget-area',
					'property'      => 'border',
					'value_pattern' => '1px $ solid',
				),
				array(
					'element'       => '.navbar-primary .navbar-multi-column-widgets .navbar-widgets-container, .navbar-primary .navbar-single-column-widgets .navbar-widgets-container',
					'property'      => 'margin-top',
					'value_pattern' => '0px',
				),
			)
		),
		'active_callback' => array(
			array(
				'setting'  => 'colors_navbar_widgetized_submenu_borders_toggle',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'color_widgetized_submenu_bg',
		'label'        => esc_html__( 'Background', 'authentic' ),
		'section'      => 'colors_navbar',
		'default'      => '#FFFFFF',
		'default_dark' => '#1e1e1e',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_color_widgetized_submenu_bg',
			array(
				array(
					'element'  => '.site-submenu .navbar-widgets-container, .site-submenu .pk-social-links-scheme-light-bg .pk-social-links-link',
					'property' => 'background-color',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'color_widgetized_submenu_text',
		'label'        => esc_html__( 'Text', 'authentic' ),
		'section'      => 'colors_navbar',
		'default'      => '#777777',
		'default_dark' => '#FFFFFFF',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_color_widgetized_submenu_text',
			array(
				array(
					'element'  => '.site-submenu',
					'property' => 'color',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'color_widgetized_submenu_text_secondary',
		'label'        => esc_html__( 'Secondary Text', 'authentic' ),
		'section'      => 'colors_navbar',
		'default'      => '#c9c9c9',
		'default_dark' => '#c9c9c9',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_color_widgetized_submenu_text_secondary',
			array(
				array(
					'element'  => '.site-submenu label, .site-submenu figcaption, .site-submenu blockquote cite, .site-submenu .wp-caption-text, .site-submenu .wp-block-gallery .blocks-gallery-item figcaption, .site-submenu .wp-block-image figcaption, .site-submenu .wp-block-audio figcaption, .site-submenu .wp-block-embed figcaption, .site-submenu .wp-block-pullquote cite, .site-submenu .wp-block-pullquote footer, .site-submenu .wp-block-pullquote .wp-block-pullquote__citation, .site-submenu .wp-block-quote cite, .site-submenu .text-small, .site-submenu .comment-metadata, .site-submenu .logged-in-as, .site-submenu .post-categories, .site-submenu .post-count, .site-submenu .product-count, .site-submenu .post-meta, .site-submenu .entry-content figcaption, .site-submenu .post-media figcaption, .site-submenu .post-tags, .site-submenu .sub-title, .site-submenu .tagcloud, .site-submenu .timestamp, .site-submenu #wp-calendar caption, .site-submenu .comment-metadata a, .site-submenu .comment-metadata, .site-submenu .widget_rss ul li cite, .site-submenu .widget_rss ul li .rss-date, .site-submenu .title-share, .site-submenu .pk-widget-about .pk-about-small, .site-submenu .pk-share-buttons-total .pk-share-buttons-count, .site-submenu .pk-share-buttons-post-loop .pk-share-buttons-count, .site-submenu .pk-share-buttons-block-posts .pk-share-buttons-count, .site-submenu .pk-share-buttons-post-sidebar .pk-share-buttons-count, .site-submenu .pk-share-buttons-post-loop .pk-share-buttons-link:hover .pk-share-buttons-count, .site-submenu .pk-share-buttons-block-posts .pk-share-buttons-link:hover .pk-share-buttons-count, .site-submenu .pk-share-buttons-post-sidebar .pk-share-buttons-link:hover .pk-share-buttons-count, .site-submenu .pk-social-links-template-default .pk-social-links-label, .site-submenu .pk-social-links-wrap .pk-social-links-label, .site-submenu .pk-color-secondary, .site-submenu .pk-twitter-default .pk-twitter-tweet:before',
					'property' => 'color',
				),
				array(
					'element'  => '.site-submenu .owl-dot span',
					'property' => 'background-color',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'color_widgetized_submenu_title',
		'label'        => esc_html__( 'Titles', 'authentic' ),
		'section'      => 'colors_navbar',
		'default'      => '#000000',
		'default_dark' => '#FFFFFF',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_color_widgetized_submenu_title',
			array(
				array(
					'element'  => '.site-submenu .title-widget',
					'property' => 'color',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'color_widgetized_submenu_link',
		'label'        => esc_html__( 'Links', 'authentic' ),
		'section'      => 'colors_navbar',
		'default'      => '#000000',
		'default_dark' => '#FFFFFF',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_color_widgetized_submenu_link',
			array(
				array(
					'element'  => '.site-submenu a, .site-submenu .post-meta, .site-submenu #wp-calendar thead th, .site-submenu h2, .site-submenu .pk-social-links-wrap .pk-social-links-count, .site-submenu .pk-social-links-scheme-light .pk-social-links-icon, .site-submenu .pk-social-links-wrap .pk-social-links-title, .site-submenu .pk-subscribe-form-wrap .pk-title, .site-submenu .pk-social-links-template-default .pk-social-links-link, .site-submenu .pk-widget-contributors .pk-social-links-link, .site-submenu .cnvs-block-posts-sidebar:not(.cnvs-block-posts-sidebar-slider) .entry-title a, .site-submenu .pk-widget-posts:not(.pk-widget-posts-template-slider) .entry-title a',
					'property' => 'color',
				),
				array(
					'element'  => '.site-submenu .owl-dot.active span',
					'property' => 'background-color',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'color_widgetized_submenu_link_hover',
		'label'        => esc_html__( 'Links Hover', 'authentic' ),
		'section'      => 'colors_navbar',
		'default'      => '#A0A0A0',
		'default_dark' => '#CCCCCC',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_color_widgetized_submenu_link_hover',
			array(
				array(
					'element'  => '.site-submenu a:hover,.site-submenu a:hover:active, .site-submenu a:focus:active, .site-submenu .pk-social-links-template-default .pk-social-links-link:hover, .site-submenu .pk-widget-contributors .pk-social-links-link:hover, .site-submenu .cnvs-block-posts-sidebar:not(.cnvs-block-posts-sidebar-slider) .entry-title a:hover, .site-submenu .cnvs-block-posts-sidebar:not(.cnvs-block-posts-sidebar-slider) .entry-title a:focus, .site-submenu .pk-widget-posts:not(.pk-widget-posts-template-slider) .entry-title a:hover, .site-submenu .pk-widget-posts:not(.pk-widget-posts-template-slider) .entry-title a:focus',
					'property' => 'color',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'color_widgetized_submenu_border',
		'label'        => esc_html__( 'Borders', 'authentic' ),
		'section'      => 'colors_navbar',
		'default'      => '#EEEEEE',
		'default_dark' => '#1E1E1E',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_color_widgetized_submenu_border',
			array(
				array(
					'element'  => '.site-submenu #wp-calendar tfoot tr #prev + .pad:after, .site-submenu #wp-calendar tbody td a, .sidebar-footer .basic_mailchimp_widget, .sidebar-footer .pk-social-links-template-vertical .pk-social-links-link',
					'property' => 'background-color',
				),
				array(
					'element'  => '.site-submenu .navbar-widgets-container .widget-col',
					'property' => 'border-color',
				),
				array(
					'element'  => '.site-submenu .widget, .site-submenu .widget_nav_menu .menu > .menu-item:not(:first-child), .site-submenu .widget_categories > ul > li:not(:first-child), .site-submenu .widget_archive > ul > li:not(:first-child), .site-submenu .widget_categories .widget-wrap > ul > li:not(:first-child), .widget_archive .site-submenu .widget-wrap > ul > li:not(:first-child), .site-submenu #wp-calendar tbody td, .site-submenu .widget_pages li:not(:first-child) a, .site-submenu .widget_meta li:not(:first-child) a, .site-submenu .widget_recent_comments li:not(:first-child), .site-submenu .widget_recent_entries li:not(:first-child), .site-submenu #wp-calendar tbody td#today:after, .footer-section + .footer-section > .cs-container > *, .sidebar-footer .widget + .widget, .site-submenu .pk-widget-contributors .pk-author-item',
					'property' => 'border-top-color',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'color_widgetized_submenu_btn_text',
		'label'        => esc_html__( 'Buttons Text', 'authentic' ),
		'section'      => 'colors_navbar',
		'default'      => '#EEEEEE',
		'default_dark' => '#A0A0A0',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_color_widgetized_submenu_btn_text',
			array(
				array(
					'element'  => '.site-submenu .button, .site-submenu .post-number, .site-submenu .pk-author-button, .site-submenu .pk-about-button, .site-submenu .pk-instagram-follow, .site-submenu .pk-twitter-follow, .site-submenu .pk-subscribe-submit, .site-submenu .pk-badge-primary',
					'property' => 'color',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'color_widgetized_submenu_btn_text_hover',
		'label'        => esc_html__( 'Buttons Text Hover', 'authentic' ),
		'section'      => 'colors_navbar',
		'default'      => '#FFFFFF',
		'default_dark' => '#FFFFFF',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_color_widgetized_submenu_btn_text_hover',
			array(
				array(
					'element'  => '.site-submenu .button:hover, .site-submenu .button:active, .site-submenu .pk-author-button:hover, .site-submenu .pk-about-button:hover, .site-submenu .pk-instagram-follow:hover, .site-submenu .pk-twitter-follow:hover, .site-submenu .pk-subscribe-submit:hover, .site-submenu .pk-badge-primary:hover',
					'property' => 'color',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'color_widgetized_submenu_btn_bg',
		'label'        => esc_html__( 'Buttons Background', 'authentic' ),
		'section'      => 'colors_navbar',
		'default'      => '#282828',
		'default_dark' => '#242424',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_color_widgetized_submenu_btn_bg',
			array(
				array(
					'element'  => '.site-submenu .button, .site-submenu select, .site-submenu .post-number, .site-submenu .pk-author-button, .site-submenu .pk-about-button, .site-submenu .pk-instagram-follow, .site-submenu .pk-twitter-follow, .site-submenu .pk-subscribe-submit, .site-submenu .pk-badge-primary',
					'property' => 'background-color',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'color_widgetized_submenu_btn_bg_hover',
		'label'        => esc_html__( 'Buttons Background Hover', 'authentic' ),
		'section'      => 'colors_navbar',
		'default'      => '#000000',
		'default_dark' => '#141414',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_color_widgetized_submenu_btn_bg_hover',
			array(
				array(
					'element'  => '.site-submenu .button:hover, .site-submenu .button:active, .site-submenu .button:focus, .site-submenu .button:active, .site-submenu .pk-author-button:hover, .site-submenu .pk-about-button:hover, .site-submenu .pk-instagram-follow:hover, .site-submenu .pk-twitter-follow:hover, .site-submenu .pk-subscribe-submit:hover, .site-submenu .pk-badge-primary:hover',
					'property' => 'background-color',
				),
			)
		),
	)
);

/**
 * -------------------------------------------------------------------------
 * |- [ Colors > Top Bar ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_section(
	'colors_topbar',
	array(
		'title' => esc_html__( 'Top Bar', 'authentic' ),
		'panel' => 'colors',
	)
);

/**
 * -------------------------------------------------------------------------
 * |-- [ Colors > Top Bar > General ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_field(
	array(
		'type'     => 'collapsible',
		'settings' => 'colors_collapsible_topbar_general',
		'section'  => 'colors_topbar',
		'label'    => esc_html__( 'General', 'authentic' ),

	)
);

CSCO_Customizer::add_field(
	array(
		'type'      => 'checkbox',
		'settings'  => 'colors_topbar_bg_toggle_next',
		'label'     => esc_html__( 'Background', 'authentic' ),
		'section'   => 'colors_topbar',
		'default'   => false,
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'color',
		'settings'        => 'colors_topbar_bg',
		'label'           => esc_html__( 'Background', 'authentic' ),
		'section'         => 'colors_topbar',
		'default'         => '#FFFFFF',
		'default_dark'    => '#232323',
		'support_dark'    => true,
		'output'          => apply_filters(
			'csco_colors_topbar_bg',
			array(
				array(
					'element'  => '.topbar',
					'property' => 'background-color',
				),
			)
		),
		'active_callback' => array(
			array(
				'setting'  => 'colors_topbar_bg_toggle_next',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'checkbox',
		'settings' => 'colors_topbar_borders',
		'label'    => esc_html__( 'Borders', 'authentic' ),
		'section'  => 'colors_topbar',
		'default'  => true,
		'output'   => apply_filters(
			'csco_colors_topbar_borders',
			array(
				array(
					'element'       => '.topbar',
					'property'      => 'border-bottom-width',
					'value_pattern' => '1px',
					'exclude'       => array( false ),
				),
				array(
					'element'       => '.topbar',
					'property'      => 'border-bottom-style',
					'value_pattern' => 'solid',
					'exclude'       => array( false ),
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'colors_topbar_main_links',
		'label'        => esc_html__( 'Links', 'authentic' ),
		'section'      => 'colors_topbar',
		'default'      => '#A0A0A0',
		'default_dark' => '#dbdbdb',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_colors_topbar_main_links',
			array(
				array(
					'element'  => '.topbar a, .topbar .navbar-nav > li > a, .topbar .pk-social-links-template-nav .pk-social-links-icon, .topbar .pk-social-links-template-nav .pk-social-links-label, .topbar .pk-social-links-template-nav .pk-social-links-title',
					'property' => 'color',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'colors_topbar_main_links_hover',
		'label'        => esc_html__( 'Links Hover', 'authentic' ),
		'section'      => 'colors_topbar',
		'default'      => '#000000',
		'default_dark' => '#FFFFFF',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_colors_topbar_main_links_hover',
			array(
				array(
					'element'  => '.topbar a:hover, .topbar .navbar-nav > li > a:focus, .topbar .navbar-nav > li > a:hover, .topbar .navbar-nav > li.current-menu-item > a, .topbar .pk-social-links-template-nav .pk-social-links-item .pk-social-links-link:hover .pk-social-links-icon, .topbar .pk-social-links-template-nav .pk-social-links-item .pk-social-links-link:hover pk-social-links-title, .topbar .pk-social-links-template-nav .pk-social-links-count',
					'property' => 'color',
				),
			)
		),
	)
);

/**
 * -------------------------------------------------------------------------
 * |-- [ Colors > Top Bar > Social Icons ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_field(
	array(
		'type'     => 'collapsible',
		'settings' => 'colors_collapsible_topbar_social',
		'section'  => 'colors_topbar',
		'label'    => esc_html__( 'Social Icons', 'authentic' ),

	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'colors_topbar_social_icons',
		'label'        => esc_html__( 'Icons', 'authentic' ),
		'section'      => 'colors_topbar',
		'default'      => '#000000',
		'default_dark' => '#FFFFFF',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_colors_topbar_social_icons',
			array(
				array(
					'element'  => '.topbar .pk-social-links-template-nav .pk-social-links-icon',
					'property' => 'color',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'colors_topbar_social_icons_hover',
		'label'        => esc_html__( 'Icons Hover', 'authentic' ),
		'section'      => 'colors_topbar',
		'default'      => '#000000',
		'default_dark' => '#FFFFFF',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_colors_topbar_social_icons_hover',
			array(
				array(
					'element'  => '.topbar .pk-social-links-template-nav .pk-social-links-item .pk-social-links-link:hover .pk-social-links-icon',
					'property' => 'color',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'colors_topbar_social_text',
		'label'        => esc_html__( 'Text', 'authentic' ),
		'section'      => 'colors_topbar',
		'default'      => '#A0A0A0',
		'default_dark' => '#dbdbdb',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_colors_topbar_social_text',
			array(
				array(
					'element'  => '.topbar .pk-social-links-template-nav .pk-social-links-title, .topbar .pk-social-links-template-nav .pk-social-links-count, .topbar .pk-social-links-template-nav .pk-social-links-label',
					'property' => 'color',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'colors_topbar_social_text_hover',
		'label'        => esc_html__( 'Text Hover', 'authentic' ),
		'section'      => 'colors_topbar',
		'default'      => '#000000',
		'default_dark' => '#FFFFFF',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_colors_topbar_social_text_hover',
			array(
				array(
					'element'  => '.topbar .pk-social-links-template-nav .pk-social-links-item .pk-social-links-link:hover .pk-social-links-title, .topbar .pk-social-links-template-nav .pk-social-links-item .pk-social-links-link:hover .pk-social-links-count, .topbar .pk-social-links-template-nav .pk-social-links-item .pk-social-links-link:hover .pk-social-links-label',
					'property' => 'color',
				),
			)
		),
	)
);

/**
 * -------------------------------------------------------------------------
 * |- [ Colors > Off-canvas ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_section(
	'colors_offcanvas',
	array(
		'title' => esc_html__( 'Off-Canvas Area', 'authentic' ),
		'panel' => 'colors',

	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'colors_offcanvas_navbar_links',
		'label'        => esc_html__( 'Links', 'authentic' ),
		'section'      => 'colors_offcanvas',
		'default'      => '#000000',
		'default_dark' => '#EEEEEE',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_colors_offcanvas_navbar_links',
			array(
				array(
					'element'  => '.offcanvas-header .navbar-brand, .offcanvas-header .navbar-toggle',
					'property' => 'color',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'colors_offcanvas_navbar_links_hover',
		'label'        => esc_html__( 'Links Hover', 'authentic' ),
		'section'      => 'colors_offcanvas',
		'default'      => '#A0A0A0',
		'default_dark' => '#FFFFFF',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_colors_offcanvas_navbar_links_hover',
			array(
				array(
					'element'  => '.offcanvas-header .navbar-brand:hover, .offcanvas-header .navbar-brand:focus, .offcanvas-header .navbar-toggle:hover, .offcanvas-header .navbar-toggle:focus',
					'property' => 'color',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'colors_offcanvas_navbar_bg',
		'label'        => esc_html__( 'Background', 'authentic' ),
		'section'      => 'colors_offcanvas',
		'default'      => '#FFFFFF',
		'default_dark' => '#232323',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_colors_offcanvas_navbar_bg',
			array(
				array(
					'element'  => '.offcanvas-header .navbar',
					'property' => 'background-color',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'checkbox',
		'settings' => 'colors_offcanvas_borders',
		'label'    => esc_html__( 'Borders', 'authentic' ),
		'section'  => 'colors_offcanvas',
		'default'  => true,
		'output'   => apply_filters(
			'csco_colors_offcanvas_borders',
			array(
				array(
					'element'       => '.navbar-offcanvas',
					'property'      => 'border-bottom-width',
					'value_pattern' => '1px',
					'exclude'       => array( false ),
				),
				array(
					'element'       => '.navbar-offcanvas',
					'property'      => 'border-bottom-style',
					'value_pattern' => 'solid',
					'exclude'       => array( false ),
				),
			)
		),
	)
);

/**
 * -------------------------------------------------------------------------
 * |- [ Colors > Post Content ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_section(
	'colors_content',
	array(
		'title' => esc_html__( 'Post Content', 'authentic' ),
		'panel' => 'colors',

	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'color_post_paragraph',
		'label'        => esc_html__( 'Paragraph', 'authentic' ),
		'section'      => 'colors_content',
		'default'      => '#A0A0A0',
		'default_dark' => '#A0A0A0',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_color_post_paragraph',
			array(
				array(
					'element'  => '.entry-content p',
					'property' => 'color',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'color_post_links',
		'label'        => esc_html__( 'Links', 'authentic' ),
		'section'      => 'colors_content',
		'default'      => '#000000',
		'default_dark' => '#CCCCCC',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_color_post_links',
			array(
				array(
					'element'  => '.entry-content p > a:not(.button):not(.pk-button), .entry-content > ul a, .entry-content ol a, .entry-content .wp-block-column ol a, .entry-content .wp-block-column a, .entry-content table ol a, .entry-content table ul a, .taxonomy-description a, .entry-content .cnvs-block-section-content-inner > ol a, .entry-content .cnvs-block-section-content-inner > ul a',
					'property' => 'color',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'color_post_links_hover',
		'label'        => esc_html__( 'Links Hover', 'authentic' ),
		'section'      => 'colors_content',
		'default'      => '#A0A0A0',
		'default_dark' => '#FFFFFF',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_color_post_links_hover',
			array(
				array(
					'element'  => '.entry-content p > a:not(.button):not(.pk-button):hover, .entry-content ul a:hover, .entry-content ol a:hover, .taxonomy-description a:hover',
					'property' => 'color',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'color_category',
		'label'        => esc_html__( 'Category', 'authentic' ),
		'section'      => 'colors_content',
		'default'      => '#000000',
		'default_dark' => '#FFFFFF',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_color_category',
			array(
				array(
					'element'  => '.post-categories a, .cs-block-archive-posts article:not(.post-featured) .entry-header .post-categories a, .cs-block-narrow .layout-variation-simple .entry-header .post-categories a, .cs-block-wide .layout-variation-simple .entry-header .post-categories a, .cs-block-carousel .post-categories a, .cnvs-block-posts-sidebar:not(.cnvs-block-posts-sidebar-slider) .post-categories a, .pk-widget-posts .post-categories a',
					'property' => 'color',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'color_category_hover',
		'label'        => esc_html__( 'Category Hover', 'authentic' ),
		'section'      => 'colors_content',
		'default'      => '#A0A0A0',
		'default_dark' => '#CCCCCC',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_color_category_hover',
			array(
				array(
					'element'  => '.post-categories a:hover, .post-categories a:focus, .cs-block-archive-posts article:not(.post-featured) .entry-header .post-categories a:hover, .cs-block-archive-posts article:not(.post-featured) .entry-header .post-categories a:focus, .cs-block-narrow .layout-variation-simple .entry-header .post-categories a:hover, .cs-block-narrow .layout-variation-simple .entry-header .post-categories a:focus, .cs-block-wide .layout-variation-simple .entry-header .post-categories a:hover, .cs-block-wide .layout-variation-simple .entry-header .post-categories a:focus, .cs-block-carousel .post-categories a:hover, .cs-block-carousel .post-categories a:focus, .cnvs-block-posts-sidebar:not(.cnvs-block-posts-sidebar-slider) .post-categories a:hover, .cnvs-block-posts-sidebar:not(.cnvs-block-posts-sidebar-slider) .post-categories a:focus, .pk-widget-posts .post-categories a:hover, .pk-widget-posts .post-categories a:focus',
					'property' => 'color',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'color_selection_text',
		'label'        => esc_html__( 'Selection Text', 'authentic' ),
		'section'      => 'colors_content',
		'default'      => '#FFFFFF',
		'default_dark' => '#000000',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_color_selection_text',
			array(
				array(
					'element'  => '::selection',
					'property' => 'color',
				),
				array(
					'element'  => '::-moz-selection',
					'property' => 'color',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'color_selection_background',
		'label'        => esc_html__( 'Selection Background', 'authentic' ),
		'section'      => 'colors_content',
		'default'      => '#000000',
		'default_dark' => '#EEEEEE',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_color_selection_background',
			array(
				array(
					'element'  => '::selection',
					'property' => 'background',
				),
				array(
					'element'  => '::-moz-selection',
					'property' => 'background',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'color_blockquote',
		'label'        => esc_html__( 'Blockquote', 'authentic' ),
		'section'      => 'colors_content',
		'default'      => '#000000',
		'default_dark' => '#FFFFFF',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_color_blockquote',
			array(
				array(
					'element'  => '.entry-content blockquote, .entry-content blockquote p',
					'property' => 'color',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'color_leadin_dropcap',
		'label'        => esc_html__( 'Lead-Ins & Dropcaps', 'authentic' ),
		'section'      => 'colors_content',
		'default'      => '#000000',
		'default_dark' => '#FFFFFF',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_color_leadin_dropcap',
			array(
				array(
					'element'  => '.entry-content .pk-dropcap:first-letter, .entry-content .pk-content-block, .entry-content .pk-callout, .entry-content .has-drop-cap:not(:focus):first-letter, .entry-content .has-drop-cap.is-cnvs-dropcap-bordered:not(:focus):first-letter, .entry-content .has-drop-cap:not(:focus).is-cnvs-dropcap-border-right:not(:focus):first-letter',
					'property' => 'color',
				),
				array(
					'element'  => '.entry-content .pk-dropcap-bg-inverse:first-letter, .entry-content .pk-dropcap-bg-inverse:first-letter, .entry-content .pk-block-border-top:before, .entry-content .pk-block-border-bottom:after, .entry-content .pk-block-bg-inverse, .entry-content .has-drop-cap.is-cnvs-dropcap-bg-dark:first-letter, .wp-block-group.is-style-cnvs-block-single-border:before, .wp-block-group.is-style-cnvs-block-single-border:after, .wp-block-group.is-style-cnvs-block-bg-inverse',
					'property' => 'background-color',
				),
				array(
					'element'  => '.entry-content .pk-dropcap-borders:first-letter, .entry-content .pk-block-border-all, .entry-content .has-drop-cap.is-cnvs-dropcap-bordered:first-letter, .wp-block-group.is-style-cnvs-block-bordered',
					'property' => 'border-color',
				),
				array(
					'element'  => '.entry-content .pk-dropcap-border-right:first-letter, .entry-content .pk-block-border-right, .entry-content .has-drop-cap.is-cnvs-dropcap-border-right:first-letter',
					'property' => 'border-right-color',
				),
				array(
					'element'  => '.entry-content .pk-block-border-left',
					'property' => 'border-left-color',
				),
			)
		),
	)
);

/**
 * -------------------------------------------------------------------------
 * |- [ Colors > Footer ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_section(
	'colors_footer',
	array(
		'title' => esc_html__( 'Footer', 'authentic' ),
		'panel' => 'colors',

	)
);

/**
 * -------------------------------------------------------------------------
 * |-- [ Colors > Footer > Base ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_field(
	array(
		'type'     => 'collapsible',
		'settings' => 'colors_collapsible_footer_base',
		'section'  => 'colors_footer',
		'label'    => esc_html__( 'Base', 'authentic' ),

	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'color_footer_bg',
		'label'        => esc_html__( 'Background', 'authentic' ),
		'section'      => 'colors_footer',
		'default'      => '#000000',
		'default_dark' => '#111111',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_color_footer_bg',
			array(
				array(
					'element'  => '.site-footer, .site-footer .pk-social-links-scheme-light-bg .pk-social-links-link',
					'property' => 'background-color',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'color_footer_text',
		'label'        => esc_html__( 'Text', 'authentic' ),
		'section'      => 'colors_footer',
		'default'      => '#A0A0A0',
		'default_dark' => '#A0A0A0',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_color_footer_text',
			array(
				array(
					'element'  => '.site-footer',
					'property' => 'color',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'color_footer_text_secondary',
		'label'        => esc_html__( 'Secondary Text', 'authentic' ),
		'section'      => 'colors_footer',
		'default'      => '#c9c9c9',
		'default_dark' => '#c9c9c9',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_color_footer_text_secondary',
			array(
				array(
					'element'  => '.site-footer label, .site-footer figcaption, .site-footer blockquote cite, .site-footer .wp-caption-text, .site-footer .wp-block-gallery .blocks-gallery-item figcaption, .site-footer .wp-block-image figcaption, .site-footer .wp-block-audio figcaption, .site-footer .wp-block-embed figcaption, .site-footer .wp-block-pullquote cite, .site-footer .wp-block-pullquote footer, .site-footer .wp-block-pullquote .wp-block-pullquote__citation, .site-footer .wp-block-quote cite, .site-footer .text-small, .site-footer .comment-metadata, .site-footer .logged-in-as, .site-footer .post-categories, .site-footer .post-count, .site-footer .product-count, .site-footer .post-meta, .site-footer .entry-content figcaption, .site-footer .post-media figcaption, .site-footer .post-tags, .site-footer .sub-title, .site-footer .tagcloud, .site-footer .timestamp, .site-footer #wp-calendar caption, .site-footer .comment-metadata a, .site-footer .comment-metadata, .site-footer .widget_rss ul li cite, .site-footer .widget_rss ul li .rss-date, .site-footer .title-share, .site-footer .pk-widget-about .pk-about-small, .site-footer .pk-share-buttons-total .pk-share-buttons-count, .site-footer .pk-share-buttons-post-loop .pk-share-buttons-count, .site-footer .pk-share-buttons-block-posts .pk-share-buttons-count, .site-footer .pk-share-buttons-post-sidebar .pk-share-buttons-count, .site-footer .pk-share-buttons-post-loop .pk-share-buttons-link:hover .pk-share-buttons-count, .site-footer .pk-share-buttons-block-posts .pk-share-buttons-link:hover .pk-share-buttons-count, .site-footer .pk-share-buttons-post-sidebar .pk-share-buttons-link:hover .pk-share-buttons-count, .site-footer .pk-social-links-template-default .pk-social-links-label, .site-footer .pk-social-links-wrap .pk-social-links-label, .site-footer .pk-color-secondary, .site-footer .pk-twitter-default .pk-twitter-tweet:before, .site-footer .footer-subscribe .pk-privacy label',
					'property' => 'color',
				),
				array(
					'element'  => '.site-footer .owl-dot span',
					'property' => 'background-color',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'color_footer_title',
		'label'        => esc_html__( 'Titles', 'authentic' ),
		'section'      => 'colors_footer',
		'default'      => '#777777',
		'default_dark' => '#777777',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_color_footer_title',
			array(
				array(
					'element'  => '.site-footer .title-widget',
					'property' => 'color',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'color_footer_link',
		'label'        => esc_html__( 'Links', 'authentic' ),
		'section'      => 'colors_footer',
		'default'      => '#FFFFFF',
		'default_dark' => '#FFFFFF',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_color_footer_link',
			array(
				array(
					'element'  => '.site-footer a, .site-footer .post-meta, .site-footer .post-categories a, .site-footer #wp-calendar thead th, .site-footer h2, .site-footer .pk-social-links-wrap .pk-social-links-count, .site-footer .pk-social-links-scheme-light .pk-social-links-icon, .site-footer .pk-social-links-wrap .pk-social-links-title, .site-footer .pk-subscribe-form-wrap .pk-title, .site-footer .pk-social-links-template-default .pk-social-links-link, .site-footer .pk-widget-contributors .pk-social-links-link, .site-footer .cnvs-block-posts-sidebar:not(.cnvs-block-posts-sidebar-slider) .entry-title a, .site-footer .pk-widget-posts:not(.pk-widget-posts-template-slider) .entry-title a',
					'property' => 'color',
				),
				array(
					'element'  => '.site-footer .owl-dot.active span',
					'property' => 'background-color',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'color_footer_link_hover',
		'label'        => esc_html__( 'Links Hover', 'authentic' ),
		'section'      => 'colors_footer',
		'default'      => '#A0A0A0',
		'default_dark' => '#A0A0A0',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_color_footer_link_hover',
			array(
				array(
					'element'  => '.site-footer a:hover, site-footer a:hover:active, .site-footer a:focus:active, .site-footer .post-categories a:hover, .site-footer .pk-social-links-template-default .pk-social-links-link:hover, .site-footer .pk-widget-contributors .pk-social-links-link:hover, .site-footer .cnvs-block-posts-sidebar:not(.cnvs-block-posts-sidebar-slider) .entry-title a:hover, .site-footer .cnvs-block-posts-sidebar:not(.cnvs-block-posts-sidebar-slider) .entry-title a:focus, .site-footer .pk-widget-posts:not(.pk-widget-posts-template-slider) .entry-title a:hover, .site-footer .pk-widget-posts:not(.pk-widget-posts-template-slider) .entry-title a:focus',
					'property' => 'color',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'color_footer_border',
		'label'        => esc_html__( 'Borders', 'authentic' ),
		'section'      => 'colors_footer',
		'default'      => '#242424',
		'default_dark' => '#242424',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_color_footer_border',
			array(
				array(
					'element'  => '.site-footer #wp-calendar tfoot tr #prev + .pad:after, .site-footer #wp-calendar tbody td a, .sidebar-footer .basic_mailchimp_widget, .sidebar-footer .pk-social-links-template-vertical .pk-social-links-link',
					'property' => 'background-color',
				),
				array(
					'element'  => '.site-footer .widget, .site-footer .widget_nav_menu .menu > .menu-item:not(:first-child), .site-footer .widget_categories > ul > li:not(:first-child), .site-footer .widget_archive > ul > li:not(:first-child), .site-footer .widget_categories .widget-wrap > ul > li:not(:first-child), .widget_archive .site-footer .widget-wrap > ul > li:not(:first-child), .site-footer #wp-calendar tbody td, .site-footer .widget_pages li:not(:first-child) a, .site-footer .widget_meta li:not(:first-child) a, .site-footer .widget_recent_comments li:not(:first-child), .site-footer .widget_recent_entries li:not(:first-child), .site-footer #wp-calendar tbody td#today:after, .footer-section + .footer-section > .cs-container > *, .sidebar-footer .widget + .widget, .site-footer .pk-widget-contributors .pk-author-item',
					'property' => 'border-top-color',
				),
			)
		),
	)
);

/**
 * -------------------------------------------------------------------------
 * |-- [ Colors > Footer > Buttons ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_field(
	array(
		'type'     => 'collapsible',
		'settings' => 'colors_collapsible_footer_buttons',
		'section'  => 'colors_footer',
		'label'    => esc_html__( 'Buttons', 'authentic' ),

	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'color_footer_btn_text',
		'label'        => esc_html__( 'Text', 'authentic' ),
		'section'      => 'colors_footer',
		'default'      => '#A0A0A0',
		'default_dark' => '#A0A0A0',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_color_footer_btn_text',
			array(
				array(
					'element'  => '.site-footer .button, .site-footer .post-number, .site-footer .pk-author-button, .site-footer .pk-about-button, .site-footer .pk-instagram-follow, .site-footer .pk-twitter-follow, .site-footer .pk-subscribe-submit, .site-footer .pk-badge-primary',
					'property' => 'color',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'color_footer_btn_text_hover',
		'label'        => esc_html__( 'Text Hover', 'authentic' ),
		'section'      => 'colors_footer',
		'default'      => '#FFFFFF',
		'default_dark' => '#FFFFFF',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_color_footer_btn_text_hover',
			array(
				array(
					'element'  => '.site-footer .button:hover, .site-footer .button:active, .site-footer .pk-author-button:hover, .site-footer .pk-about-button:hover, .site-footer .pk-instagram-follow:hover, .site-footer .pk-twitter-follow:hover, .site-footer .pk-subscribe-submit:hover, .site-footer .pk-badge-primary:hover',
					'property' => 'color',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'color_footer_btn_bg',
		'label'        => esc_html__( 'Background', 'authentic' ),
		'section'      => 'colors_footer',
		'default'      => '#242424',
		'default_dark' => '#242424',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_color_footer_btn_bg',
			array(
				array(
					'element'  => '.site-footer .button, .site-footer select, .site-footer .post-number, .site-footer .pk-author-button, .site-footer .pk-about-button, .site-footer .pk-instagram-follow, .site-footer .pk-twitter-follow, .site-footer .pk-subscribe-submit, .site-footer .pk-badge-primary',
					'property' => 'background-color',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'color_footer_btn_bg_hover',
		'label'        => esc_html__( 'Background Hover', 'authentic' ),
		'section'      => 'colors_footer',
		'default'      => '#141414',
		'default_dark' => '#141414',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_color_footer_btn_bg_hover',
			array(
				array(
					'element'  => '.site-footer .button:hover, .site-footer .button:active, .site-footer .button:focus, .site-footer .button:active, .site-footer .pk-author-button:hover, .site-footer .pk-about-button:hover, .site-footer .pk-instagram-follow:hover, .site-footer .pk-twitter-follow:hover, .site-footer .pk-subscribe-submit:hover, .site-footer .pk-badge-primary:hover',
					'property' => 'background-color',
				),
			)
		),
	)
);

/**
 * -------------------------------------------------------------------------
 * |- [ Colors > Miscellaneous ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_section(
	'colors_misc',
	array(
		'title' => esc_html__( 'Miscellaneous', 'authentic' ),
		'panel' => 'colors',

	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color-alpha',
		'settings'     => 'color_misc_overlay',
		'label'        => esc_html__( 'Overlay', 'authentic' ),
		'section'      => 'colors_misc',
		'default'      => 'rgba(40,40,40,0.125)',
		'default_dark' => 'rgba(44,47,48,0.25)',
		'support_dark' => true,
		'alpha'        => true,
		'output'       => apply_filters(
			'csco_color_misc_overlay',
			array(
				array(
					'element'  => '.overlay-media:before, .page-header.overlay:hover .overlay-media:before, .pk-bg-overlay, .pk-instagram-link:before',
					'property' => 'background-color',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'         => 'color-alpha',
		'settings'     => 'color_misc_overlay_hover',
		'label'        => esc_html__( 'Overlay Hover', 'authentic' ),
		'section'      => 'colors_misc',
		'default'      => 'rgba(40,40,40,0.25)',
		'default_dark' => 'rgba(44,47,48,0.5)',
		'support_dark' => true,
		'alpha'        => true,
		'output'       => apply_filters(
			'csco_color_misc_overlay_hover',
			array(
				array(
					'element'  => '.overlay:hover .overlay-media:before, .post-thumbnail:hover:before, .pagination-visible:hover .pagination-title',
					'property' => 'background-color',
				),
			)
		),
	)
);

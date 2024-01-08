<?php
/**
 * Typography
 *
 * @package Authentic
 */

CSCO_Customizer::add_panel(
	'typography',
	array(
		'title' => esc_html__( 'Typography', 'authentic' ),
	)
);

/**
 * -------------------------------------------------------------------------
 * |- [ Typography > General ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_section(
	'typography_general',
	array(
		'title' => esc_html__( 'General', 'authentic' ),
		'panel' => 'typography',
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'typography',
		'settings' => 'typography_base',
		'label'    => esc_html__( 'Base', 'authentic' ),
		'section'  => 'typography_general',
		'default'  => array(
			'font-size'      => '1rem',
			'font-family'    => 'Lato',
			'variant'        => 'regular',
			'subsets'        => array( 'latin' ),
			'letter-spacing' => '0',
		),
		'choices'  => array(
			'variant' => array(
				'regular',
				'italic',
				'700',
				'700italic',
			),
		),
		'output'   => apply_filters(
			'csco_typography_base',
			array(
				array(
					'element' => 'body, button, input[type=search], input[type=text], input[type=number], input[type=email], input[type=tel], input[type=password], optgroup, select, textarea',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'typography',
		'settings' => 'typography_text_small',
		'label'    => esc_html__( 'Small Text', 'authentic' ),
		'section'  => 'typography_general',
		'default'  => array(
			'font-family'    => 'Montserrat',
			'subsets'        => array( 'latin' ),
			'variant'        => '400',
			'font-size'      => '0.625rem',
			'letter-spacing' => '0.025em',
			'text-transform' => 'uppercase',
		),
		'choices'  => array(),
		'output'   => apply_filters(
			'csco_typography_text_small',
			array(
				array(
					'element' => '.cs-separator, .wp-caption-text, blockquote cite, figcaption, .wp-block-image figcaption, .wp-block-audio figcaption, .wp-block-embed figcaption, .wp-block-gallery .blocks-gallery-item figcaption, .wp-block-pullquote cite, .wp-block-pullquote footer, .wp-block-pullquote .wp-block-pullquote__citation, .wp-block-quote cite, label, .text-small, .comment-metadata, .logged-in-as, .post-categories, .post-count, .product-count, .post-meta, .post-tags, .sub-title, .tagcloud, .timestamp, #wp-calendar caption, .widget_rss ul li cite, .widget_rss ul li .rss-date, .pk-badge, .pk-about-small, .pk-instagram-meta, .pk-instagram-counters, .pk-instagram-name, .pk-twitter-username, .pk-twitter-counters, .pk-alert, .pk-share-buttons-total .pk-share-buttons-count, .pk-social-links-count, .pk-social-links-label, .pk-share-buttons-count, .pk-block-alert, .abr-post-review .abr-review-subtext .pk-data-label, .pk-featured-categories-tiles .pk-featured-count, .abr-badge, .abr-post-review .abr-review-name, .abr-review-caption, .cnvs-block-alert, .sight-portfolio-entry__meta',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'typography',
		'settings' => 'typography_text_large',
		'label'    => esc_html__( 'Large Text', 'authentic' ),
		'section'  => 'typography_general',
		'default'  => array(
			'font-family'    => 'Lato',
			'subsets'        => array( 'latin' ),
			'variant'        => '400',
			'font-size'      => '1.25rem',
			'letter-spacing' => '0',
			'text-transform' => 'none',
		),
		'choices'  => array(),
		'output'   => apply_filters(
			'csco_typography_text_large',
			array(
				array(
					'element' => '.pk-callout, .text-large, .pk-subscribe-form-wrap .pk-subscribe-message',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'typography',
		'settings' => 'typography_buttons',
		'label'    => esc_html__( 'Buttons', 'authentic' ),
		'section'  => 'typography_general',
		'default'  => array(
			'font-family'    => 'Montserrat',
			'variant'        => '700',
			'subsets'        => array( 'latin' ),
			'font-size'      => '0.6875rem',
			'letter-spacing' => '0.0125em',
			'text-transform' => 'uppercase',
		),
		'choices'  => array(),
		'output'   => apply_filters(
			'csco_typography_buttons',
			array(
				array(
					'element' => '.button, .button-link, .wp-block-search .wp-block-search__button, .pagination-title, .comment-reply-link, .post-number span:first-child, .pk-button, .pk-nav-tabs .pk-nav-link, .pk-nav-tabs .pk-nav-link, .pk-nav-pills .pk-nav-link, .pk-share-buttons-total .pk-share-buttons-label, .pk-share-buttons-total .pk-share-buttons-title, .title-share, .pk-font-heading, .pk-twitter-label, .pk-card-title a, .pk-font-primary, .pk-author-button span:first-child, .pk-about-button span:first-child, .pk-instagram-follow span:first-child, .pk-twitter-follow span:first-child, .pk-subscribe-submit span:first-child, .pk-pin-it span:first-child, .wp-block-button__link, .pk-social-links-title, .pk-featured-categories-tiles .pk-featured-name, .pk-featured-categories-tiles .pk-featured-link, .pk-featured-categories-vertical-list .pk-featured-name, .pk-featured-categories-vertical-list .pk-featured-count .pk-featured-number, .adp-button, .sight-portfolio-view-more, .sight-portfolio-area__pagination .sight-portfolio-load-more',
				),
				array(
					'element' => '.cnvs-block-tabs .cnvs-block-tabs-buttons .cnvs-block-tabs-button a, .cnvs-block-collapsible-title a',
				),
			)
		),
	)
);

/**
 * -------------------------------------------------------------------------
 * |- [ Typography > Headings ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_section(
	'typography_headings',
	array(
		'title' => esc_html__( 'Headings', 'authentic' ),
		'panel' => 'typography',

	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'typography',
		'settings' => 'typography_headings',
		'label'    => esc_html__( 'Heading', 'authentic' ),
		'section'  => 'typography_headings',
		'default'  => array(
			'font-family' => 'Montserrat',
			'variant'     => '600',
			'subsets'     => array( 'latin' ),
		),
		'choices'  => array(),
		'output'   => apply_filters(
			'csco_typography_headings',
			array(
				array(
					'element' => 'h1, h2, h3, h4, h5, h6, .wp-block-cover .wp-block-cover-image-text, .wp-block-cover .wp-block-cover-text, .wp-block-cover h2, .wp-block-cover-image .wp-block-cover-image-text, .wp-block-cover-image .wp-block-cover-text, .wp-block-cover-image h2, .comment .fn, .archive-standard section.basic_mailchimp_widget .title-widget, .archive-list section.basic_mailchimp_widget .title-widget, .abr-reviews-posts .abr-review-number, .sight-portfolio-area-filter__title, .sight-portfolio-area-filter__list-item a',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'typography',
		'settings' => 'typography_h1',
		'label'    => esc_html__( 'Heading 1', 'authentic' ),
		'section'  => 'typography_headings',
		'default'  => array(
			'font-size'      => '3rem',
			'letter-spacing' => '-0.05em',
			'text-transform' => 'none',
		),
		'output'   => apply_filters(
			'csco_typography_h1',
			array(
				array(
					'element' => 'h1, .post-standard .entry-title, .archive-list .post-featured .entry-title, .archive-standard .post-featured .entry-title',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'checkbox',
		'settings' => 'typography_h1_override',
		'label'    => esc_html__( 'Override default heading font family', 'authentic' ),
		'section'  => 'typography_headings',
		'default'  => false,

	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'typography',
		'settings'        => 'typography_h1_override_font',
		'label'           => esc_html__( 'Heading 1 Font', 'authentic' ),
		'section'         => 'typography_headings',
		'default'         => array(
			'font-family' => 'initial',
			'variant'     => 'initial',
		),
		'active_callback' => array(
			array(
				'setting'  => 'typography_h1_override',
				'operator' => '==',
				'value'    => true,
			),
		),
		'choices'         => array(),
		'output'          => apply_filters(
			'csco_typography_h1_override_font',
			array(
				array(
					'element' => 'h1, .post-standard .entry-title, .archive-list .post-featured .entry-title, .archive-standard .post-featured .entry-title',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'typography',
		'settings' => 'typography_h2',
		'label'    => esc_html__( 'Heading 2', 'authentic' ),
		'section'  => 'typography_headings',
		'default'  => array(
			'font-size'      => '2rem',
			'letter-spacing' => '-0.05em',
			'text-transform' => 'none',
		),
		'output'   => apply_filters(
			'csco_typography_h2',
			array(
				array(
					'element' => 'h2, .post-archive > div:not(.columns-3):not(.columns-4) .post-featured h2, .pk-subscribe-form-wrap .pk-title, .archive-standard section.basic_mailchimp_widget .title-widget, .archive-list section.basic_mailchimp_widget .title-widget',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'checkbox',
		'settings' => 'typography_h2_override',
		'label'    => esc_html__( 'Override default heading font family', 'authentic' ),
		'section'  => 'typography_headings',
		'default'  => false,
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'typography',
		'settings'        => 'typography_h2_override_font',
		'label'           => esc_html__( 'Heading 2 Font', 'authentic' ),
		'section'         => 'typography_headings',
		'default'         => array(
			'font-family' => 'initial',
			'variant'     => 'initial',
		),
		'active_callback' => array(
			array(
				'setting'  => 'typography_h2_override',
				'operator' => '==',
				'value'    => true,
			),
		),
		'choices'         => array(),
		'output'          => apply_filters(
			'csco_typography_h2_override_font',
			array(
				array(
					'element' => 'h2, .post-archive > div:not(.columns-3):not(.columns-4) .post-featured h2, .pk-subscribe-form-wrap .pk-title, .archive-standard section.basic_mailchimp_widget .title-widget, .archive-list section.basic_mailchimp_widget .title-widget',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'typography',
		'settings' => 'typography_h3',
		'label'    => esc_html__( 'Heading 3', 'authentic' ),
		'section'  => 'typography_headings',
		'default'  => array(
			'font-size'      => '1.5rem',
			'letter-spacing' => '-0.05em',
			'text-transform' => 'none',
		),
		'output'   => apply_filters(
			'csco_typography_h3',
			array(
				array(
					'element' => 'h3, .archive-grid h2, .archive-masonry h2, .archive-list h2',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'checkbox',
		'settings' => 'typography_h3_override',
		'label'    => esc_html__( 'Override default heading font family', 'authentic' ),
		'section'  => 'typography_headings',
		'default'  => false,
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'typography',
		'settings'        => 'typography_h3_override_font',
		'label'           => esc_html__( 'Heading 3 Font', 'authentic' ),
		'section'         => 'typography_headings',
		'default'         => array(
			'font-family' => 'initial',
			'variant'     => 'initial',
		),
		'active_callback' => array(
			array(
				'setting'  => 'typography_h3_override',
				'operator' => '==',
				'value'    => true,
			),
		),
		'choices'         => array(),
		'output'          => apply_filters(
			'csco_typography_h3_override_font',
			array(
				array(
					'element' => 'h3, .archive-grid h2, .archive-masonry h2, .archive-list h2',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'typography',
		'settings' => 'typography_h4',
		'label'    => esc_html__( 'Heading 4', 'authentic' ),
		'section'  => 'typography_headings',
		'default'  => array(
			'font-size'      => '1.25rem',
			'letter-spacing' => '-.0375em',
			'text-transform' => 'none',
		),
		'output'   => apply_filters(
			'csco_typography_h4',
			array(
				array(
					'element' => 'h4',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'checkbox',
		'settings' => 'typography_h4_override',
		'label'    => esc_html__( 'Override default heading font family', 'authentic' ),
		'section'  => 'typography_headings',
		'default'  => false,
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'typography',
		'settings'        => 'typography_h4_override_font',
		'label'           => esc_html__( 'Heading 4 Font', 'authentic' ),
		'section'         => 'typography_headings',
		'default'         => array(
			'font-family' => 'initial',
			'variant'     => 'initial',
		),
		'active_callback' => array(
			array(
				'setting'  => 'typography_h4_override',
				'operator' => '==',
				'value'    => true,
			),
		),
		'choices'         => array(),
		'output'          => apply_filters(
			'csco_typography_h4_override_font',
			array(
				array(
					'element' => 'h4',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'typography',
		'settings' => 'typography_h5',
		'label'    => esc_html__( 'Heading 5', 'authentic' ),
		'section'  => 'typography_headings',
		'default'  => array(
			'font-size'      => '1rem',
			'letter-spacing' => '-.0375em',
			'text-transform' => 'none',
		),
		'output'   => apply_filters(
			'csco_typography_h5',
			array(
				array(
					'element' => 'h5',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'checkbox',
		'settings' => 'typography_h5_override',
		'label'    => esc_html__( 'Override default heading font family', 'authentic' ),
		'section'  => 'typography_headings',
		'default'  => false,
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'typography',
		'settings'        => 'typography_h5_override_font',
		'label'           => esc_html__( 'Heading 5 Font', 'authentic' ),
		'section'         => 'typography_headings',
		'default'         => array(
			'font-family' => 'initial',
			'variant'     => 'initial',
		),
		'active_callback' => array(
			array(
				'setting'  => 'typography_h5_override',
				'operator' => '==',
				'value'    => true,
			),
		),
		'choices'         => array(),
		'output'          => apply_filters(
			'csco_typography_h5_override_font',
			array(
				array(
					'element' => 'h5',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'typography',
		'settings' => 'typography_h6',
		'label'    => esc_html__( 'Heading 6', 'authentic' ),
		'section'  => 'typography_headings',
		'default'  => array(
			'font-size'      => '0.9375rem',
			'letter-spacing' => '-.0375em',
			'text-transform' => 'none',
		),
		'output'   => apply_filters(
			'csco_typography_h6',
			array(
				array(
					'element' => 'h6, .comment .fn',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'checkbox',
		'settings' => 'typography_h6_override',
		'label'    => esc_html__( 'Override default heading font family', 'authentic' ),
		'section'  => 'typography_headings',
		'default'  => false,
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'typography',
		'settings'        => 'typography_h6_override_font',
		'label'           => esc_html__( 'Heading 6 Font', 'authentic' ),
		'section'         => 'typography_headings',
		'default'         => array(
			'font-family' => 'initial',
			'variant'     => 'initial',
		),
		'active_callback' => array(
			array(
				'setting'  => 'typography_h6_override',
				'operator' => '==',
				'value'    => true,
			),
		),
		'choices'         => array(),
		'output'          => apply_filters(
			'csco_typography_h6_override_font',
			array(
				array(
					'element' => 'h6, .comment .fn',
				),
			)
		),
	)
);

/**
 * -------------------------------------------------------------------------
 * |- [ Typography > Section Headings ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_section(
	'typography_section_headings',
	array(
		'title' => esc_html__( 'Section Headings', 'authentic' ),
		'panel' => 'typography',
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'collapsible',
		'settings' => 'section_heading_collapsible_common',
		'section'  => 'typography_section_headings',
		'label'    => esc_html__( 'Common', 'authentic' ),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'typography',
		'settings' => 'section_heading_font',
		'label'    => esc_html__( 'Default Font', 'authentic' ),
		'section'  => 'typography_section_headings',
		'default'  => array(
			'font-family'    => 'Montserrat',
			'variant'        => '700',
			'subsets'        => array( 'latin' ),
			'font-size'      => '0.8125rem',
			'letter-spacing' => '0.0125em',
			'text-transform' => 'uppercase',
		),
		'choices'  => array(),
		'output'   => apply_filters(
			'csco_section_heading_font',
			array(
				array(
					'element' => '.comment-reply-title, .nav-links, .title-block, .section-heading, .cnvs-block-section-heading, section.related.products > h2, .pk-inline-posts-title, .pk-toc-title, .pk-block-contributors .pk-author-posts > h6',
				),
			)
		),
	)
);

if ( function_exists( 'cnvs' ) ) {

	CSCO_Customizer::add_field(
		array(
			'type'     => 'select',
			'settings' => 'section_heading',
			'label'    => esc_html__( 'Default Style', 'authentic' ),
			'section'  => 'typography_section_headings',
			'default'  => 'style-1',
			'choices'  => array(
				'style-1'  => esc_html__( 'Plain', 'authentic' ),
				'style-2'  => esc_html__( 'Thin Bottom Line', 'authentic' ),
				'style-3'  => esc_html__( 'Thick Bottom Line', 'authentic' ),
				'style-4'  => esc_html__( 'Thin Side Line', 'authentic' ),
				'style-5'  => esc_html__( 'Thick Side Line', 'authentic' ),
				'style-6'  => esc_html__( 'Top Line', 'authentic' ),
				'style-7'  => esc_html__( 'Bottom Line, Medium Length', 'authentic' ),
				'style-8'  => esc_html__( 'Side Line with Angle', 'authentic' ),
				'style-9'  => esc_html__( 'Cross Icon', 'authentic' ),
				'style-10' => esc_html__( 'Scewed Background', 'authentic' ),
				'style-11' => esc_html__( 'Scewed Background, Side Line', 'authentic' ),
				'style-12' => esc_html__( 'Solid Background', 'authentic' ),
				'style-13' => esc_html__( 'Bordered', 'authentic' ),
				'style-14' => esc_html__( 'Solid Background, Fullwidth', 'authentic' ),
				'style-15' => esc_html__( 'Bordered, Fullwidth', 'authentic' ),
				'style-16' => esc_html__( 'Double Line with Angle', 'authentic' ),
				'style-17' => esc_html__( 'Bottom Line, Short Length', 'authentic' ),
			),
		)
	);
}

CSCO_Customizer::add_field(
	array(
		'type'     => 'select',
		'settings' => 'section_heading_align',
		'label'    => esc_html__( 'Default Align', 'authentic' ),
		'section'  => 'typography_section_headings',
		'default'  => 'halignleft',
		'choices'  => array(
			'halignleft'   => esc_html__( 'Align Text Left', 'authentic' ),
			'haligncenter' => esc_html__( 'Align Text Center', 'authentic' ),
			'halignright'  => esc_html__( 'Align Text Right', 'authentic' ),
		),
	)
);

if ( function_exists( 'cnvs' ) ) {

	CSCO_Customizer::add_field(
		array(
			'type'     => 'select',
			'settings' => 'section_heading_tag',
			'label'    => esc_html__( 'Default Tag', 'authentic' ),
			'section'  => 'typography_section_headings',
			'default'  => 'h5',
			'choices'  => array(
				'h1'  => esc_html__( 'H1', 'authentic' ),
				'h2'  => esc_html__( 'H2', 'authentic' ),
				'h3'  => esc_html__( 'H3', 'authentic' ),
				'h4'  => esc_html__( 'H4', 'authentic' ),
				'h5'  => esc_html__( 'H5', 'authentic' ),
				'h6'  => esc_html__( 'H6', 'authentic' ),
				'p'   => esc_html__( 'P', 'authentic' ),
				'div' => esc_html__( 'DIV', 'authentic' ),
			),
		)
	);

	CSCO_Customizer::add_field(
		array(
			'type'         => 'color',
			'settings'     => 'section_heading_color_border',
			'label'        => esc_html__( 'Border Color', 'authentic' ),
			'section'      => 'typography_section_headings',
			'default'      => '#e9ecef',
			'default_dark' => '#2b2b2b',
			'support_dark' => true,
			'output'       => apply_filters(
				'csco_section_heading_color_border',
				array(
					array(
						'element'  => '.cnvs-block-section-heading, .cnvs-block-section-heading .cnvs-section-title, .cnvs-block-section-heading:before, .cnvs-block-section-heading:after, .cnvs-block-section-heading .cnvs-section-title:before, .cnvs-block-section-heading .cnvs-section-title:after, .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default, .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default .cnvs-section-title, .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default:before, .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default:after, .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default .cnvs-section-title:before, .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default .cnvs-section-title:after, .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default.haligncenter, .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default.haligncenter .cnvs-section-title, .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default.haligncenter:before, .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default.haligncenter:after, .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default.haligncenter .cnvs-section-title:before, .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default.haligncenter .cnvs-section-title:after, .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default.halignright, .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default.halignright .cnvs-section-title, .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default.halignright:before, .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default.halignright:after, .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default.halignright .cnvs-section-title:before, .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default.halignright .cnvs-section-title:after',
						'property' => 'border-color',
					),
					array(
						'element'  => '.cnvs-block-section-heading',
						'property' => '--cnvs-section-heading-border-color',
					),
				)
			),
		)
	);

	CSCO_Customizer::add_field(
		array(
			'type'         => 'color',
			'settings'     => 'section_heading_color_accent',
			'label'        => esc_html__( 'Accent Color', 'authentic' ),
			'section'      => 'typography_section_headings',
			'default'      => '#000000',
			'default_dark' => '#FFFFFF',
			'support_dark' => true,
			'output'       => apply_filters(
				'csco_section_heading_color_accent',
				array(
					array(
						'element'  => '.cnvs-block-section-heading.is-style-cnvs-block-section-heading-11 .cnvs-section-title:before, .cnvs-block-section-heading.is-style-cnvs-block-section-heading-9 .cnvs-section-title:before, .cnvs-block-section-heading.is-style-cnvs-block-section-heading-9 .cnvs-section-title:after, .cnvs-block-section-heading.is-style-cnvs-block-section-heading-10 .cnvs-section-title:before, .cnvs-block-section-heading.is-style-cnvs-block-section-heading-12 .cnvs-section-title, .cnvs-block-section-heading.is-style-cnvs-block-section-heading-14, .section-heading-default-style-11 .is-style-cnvs-block-section-heading-default .cnvs-section-title:before, .section-heading-default-style-9 .is-style-cnvs-block-section-heading-default .cnvs-section-title:before, .section-heading-default-style-9 .is-style-cnvs-block-section-heading-default .cnvs-section-title:after, .section-heading-default-style-10 .is-style-cnvs-block-section-heading-default .cnvs-section-title:before, .section-heading-default-style-12 .is-style-cnvs-block-section-heading-default .cnvs-section-title, .section-heading-default-style-14 .is-style-cnvs-block-section-heading-default',
						'property' => 'background-color',
					),
				)
			),
		)
	);

	CSCO_Customizer::add_field(
		array(
			'type'         => 'color',
			'settings'     => 'section_heading_color_accent_text',
			'label'        => esc_html__( 'Accent Text Color', 'authentic' ),
			'section'      => 'typography_section_headings',
			'default'      => '#FFFFFF',
			'default_dark' => '#000000',
			'support_dark' => true,
			'output'       => apply_filters(
				'csco_section_heading_color_accent_text',
				array(
					array(
						'element'  => '.cnvs-block-section-heading.is-style-cnvs-block-section-heading-11 .cnvs-section-title, .cnvs-block-section-heading.is-style-cnvs-block-section-heading-10 .cnvs-section-title, .cnvs-block-section-heading.is-style-cnvs-block-section-heading-12 .cnvs-section-title, .cnvs-block-section-heading.is-style-cnvs-block-section-heading-14 .cnvs-section-title, .section-heading-default-style-11 .is-style-cnvs-block-section-heading-default .cnvs-section-title, .section-heading-default-style-10 .is-style-cnvs-block-section-heading-default .cnvs-section-title, .section-heading-default-style-12 .is-style-cnvs-block-section-heading-default .cnvs-section-title, .section-heading-default-style-14 .is-style-cnvs-block-section-heading-default .cnvs-section-title',
						'property' => 'color',
					),
				)
			),
		)
	);
}

CSCO_Customizer::add_field(
	array(
		'type'         => 'color',
		'settings'     => 'section_heading_color_text',
		'label'        => esc_html__( 'Text Color', 'authentic' ),
		'section'      => 'typography_section_headings',
		'default'      => '#000000',
		'default_dark' => '#FFFFFF',
		'support_dark' => true,
		'output'       => apply_filters(
			'csco_section_heading_color_text',
			array(
				array(
					'element'  => '.section-heading, .cnvs-block-section-heading, .cnvs-block-section-heading .cnvs-section-title',
					'property' => 'color',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'collapsible',
		'settings' => 'section_heading_collapsible_submenu',
		'section'  => 'typography_section_headings',
		'label'    => esc_html__( 'Widgetized Sub-Menus', 'authentic' ),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'        => 'checkbox',
		'settings'    => 'section_heading_submenu_default',
		'label'       => esc_html__( 'Default Settings', 'authentic' ),
		'description' => esc_html__( 'You may change the default settings in Common Settings', 'authentic' ),
		'section'     => 'typography_section_headings',
		'default'     => true,
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'typography',
		'settings'        => 'section_heading_submenu_font',
		'label'           => esc_html__( 'Default Font', 'authentic' ),
		'section'         => 'typography_section_headings',
		'default'         => array(
			'font-family'    => 'Montserrat',
			'variant'        => '700',
			'subsets'        => array( 'latin' ),
			'font-size'      => '0.8125rem',
			'letter-spacing' => '0.0125em',
			'text-transform' => 'uppercase',
		),
		'choices'         => array(),
		'output'          => apply_filters(
			'csco_section_heading_submenu_font',
			array(
				array(
					'element' => '.site-submenu .section-heading, .site-submenu .cnvs-block-section-heading',
				),
			)
		),
		'active_callback' => array(
			array(
				'setting'  => 'section_heading_submenu_default',
				'operator' => '!=',
				'value'    => true,
			),
		),
	)
);

if ( function_exists( 'cnvs' ) ) {

	CSCO_Customizer::add_field(
		array(
			'type'            => 'select',
			'settings'        => 'section_heading_submenu',
			'label'           => esc_html__( 'Default Style', 'authentic' ),
			'section'         => 'typography_section_headings',
			'default'         => 'style-1',
			'choices'         => array(
				'style-1'  => esc_html__( 'Plain', 'authentic' ),
				'style-2'  => esc_html__( 'Thin Bottom Line', 'authentic' ),
				'style-3'  => esc_html__( 'Thick Bottom Line', 'authentic' ),
				'style-4'  => esc_html__( 'Thin Side Line', 'authentic' ),
				'style-5'  => esc_html__( 'Thick Side Line', 'authentic' ),
				'style-6'  => esc_html__( 'Top Line', 'authentic' ),
				'style-7'  => esc_html__( 'Bottom Line, Medium Length', 'authentic' ),
				'style-8'  => esc_html__( 'Side Line with Angle', 'authentic' ),
				'style-9'  => esc_html__( 'Cross Icon', 'authentic' ),
				'style-10' => esc_html__( 'Scewed Background', 'authentic' ),
				'style-11' => esc_html__( 'Scewed Background, Side Line', 'authentic' ),
				'style-12' => esc_html__( 'Solid Background', 'authentic' ),
				'style-13' => esc_html__( 'Bordered', 'authentic' ),
				'style-14' => esc_html__( 'Solid Background, Fullwidth', 'authentic' ),
				'style-15' => esc_html__( 'Bordered, Fullwidth', 'authentic' ),
				'style-16' => esc_html__( 'Double Line with Angle', 'authentic' ),
				'style-17' => esc_html__( 'Bottom Line, Short Length', 'authentic' ),
			),
			'active_callback' => array(
				array(
					'setting'  => 'section_heading_submenu_default',
					'operator' => '!=',
					'value'    => true,
				),
			),
		)
	);
}

CSCO_Customizer::add_field(
	array(
		'type'            => 'select',
		'settings'        => 'section_heading_submenu_align',
		'label'           => esc_html__( 'Default Align', 'authentic' ),
		'section'         => 'typography_section_headings',
		'default'         => 'halignleft',
		'choices'         => array(
			'halignleft'   => esc_html__( 'Align Text Left', 'authentic' ),
			'haligncenter' => esc_html__( 'Align Text Center', 'authentic' ),
			'halignright'  => esc_html__( 'Align Text Right', 'authentic' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'section_heading_submenu_default',
				'operator' => '!=',
				'value'    => true,
			),
		),
	)
);

if ( function_exists( 'cnvs' ) ) {

	CSCO_Customizer::add_field(
		array(
			'type'            => 'select',
			'settings'        => 'section_heading_submenu_tag',
			'label'           => esc_html__( 'Default Tag', 'authentic' ),
			'section'         => 'typography_section_headings',
			'default'         => 'h5',
			'choices'         => array(
				'h1'  => esc_html__( 'H1', 'authentic' ),
				'h2'  => esc_html__( 'H2', 'authentic' ),
				'h3'  => esc_html__( 'H3', 'authentic' ),
				'h4'  => esc_html__( 'H4', 'authentic' ),
				'h5'  => esc_html__( 'H5', 'authentic' ),
				'h6'  => esc_html__( 'H6', 'authentic' ),
				'p'   => esc_html__( 'P', 'authentic' ),
				'div' => esc_html__( 'DIV', 'authentic' ),
			),
			'active_callback' => array(
				array(
					'setting'  => 'section_heading_submenu_default',
					'operator' => '!=',
					'value'    => true,
				),
			),
		)
	);

	CSCO_Customizer::add_field(
		array(
			'type'            => 'color',
			'settings'        => 'section_heading_submenu_color_border',
			'label'           => esc_html__( 'Border Color', 'authentic' ),
			'section'         => 'typography_section_headings',
			'default'         => '#e9ecef',
			'default_dark'    => '#2b2b2b',
			'support_dark'    => true,
			'output'          => apply_filters(
				'csco_section_heading_submenu_color_border',
				array(
					array(
						'element'  => '.site-submenu .cnvs-block-section-heading, .site-submenu .cnvs-block-section-heading .cnvs-section-title, .site-submenu .cnvs-block-section-heading:before, .site-submenu .cnvs-block-section-heading:after, .site-submenu .cnvs-block-section-heading .cnvs-section-title:before, .site-submenu .cnvs-block-section-heading .cnvs-section-title:after, .site-submenu .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default, .site-submenu .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default .cnvs-section-title, .site-submenu .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default:before, .site-submenu .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default:after, .site-submenu .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default .cnvs-section-title:before, .site-submenu .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default .cnvs-section-title:after, .site-submenu .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default.haligncenter, .site-submenu .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default.haligncenter .cnvs-section-title, .site-submenu .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default.haligncenter:before, .site-submenu .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default.haligncenter:after, .site-submenu .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default.haligncenter .cnvs-section-title:before, .site-submenu .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default.haligncenter .cnvs-section-title:after, .site-submenu .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default.halignright, .site-submenu .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default.halignright .cnvs-section-title, .site-submenu .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default.halignright:before, .site-submenu .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default.halignright:after, .site-submenu .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default.halignright .cnvs-section-title:before, .site-submenu .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default.halignright .cnvs-section-title:after',
						'property' => 'border-color',
					),
				)
			),
			'active_callback' => array(
				array(
					'setting'  => 'section_heading_submenu_default',
					'operator' => '!=',
					'value'    => true,
				),
			),
		)
	);

	CSCO_Customizer::add_field(
		array(
			'type'            => 'color',
			'settings'        => 'section_heading_submenu_color_accent',
			'label'           => esc_html__( 'Accent Color', 'authentic' ),
			'section'         => 'typography_section_headings',
			'default'         => '#000000',
			'default_dark'    => '#FFFFFF',
			'support_dark'    => true,
			'output'          => apply_filters(
				'csco_section_heading_submenu_color_accent',
				array(
					array(
						'element'  => '.site-submenu .cnvs-block-section-heading.is-style-cnvs-block-section-heading-11 .cnvs-section-title:before, .site-submenu .cnvs-block-section-heading.is-style-cnvs-block-section-heading-9 .cnvs-section-title:before, .site-submenu .cnvs-block-section-heading.is-style-cnvs-block-section-heading-9 .cnvs-section-title:after, .site-submenu .cnvs-block-section-heading.is-style-cnvs-block-section-heading-10 .cnvs-section-title:before, .site-submenu .cnvs-block-section-heading.is-style-cnvs-block-section-heading-12 .cnvs-section-title, .site-submenu .cnvs-block-section-heading.is-style-cnvs-block-section-heading-14, .site-submenu.section-heading-default-style-11 .is-style-cnvs-block-section-heading-default .cnvs-section-title:before, .site-submenu.section-heading-default-style-9 .is-style-cnvs-block-section-heading-default .cnvs-section-title:before, .site-submenu.section-heading-default-style-9 .is-style-cnvs-block-section-heading-default .cnvs-section-title:after, .site-submenu.section-heading-default-style-10 .is-style-cnvs-block-section-heading-default .cnvs-section-title:before, .site-submenu.section-heading-default-style-12 .is-style-cnvs-block-section-heading-default .cnvs-section-title, .site-submenu.section-heading-default-style-14 .is-style-cnvs-block-section-heading-default',
						'property' => 'background-color',
					),
				)
			),
			'active_callback' => array(
				array(
					'setting'  => 'section_heading_submenu_default',
					'operator' => '!=',
					'value'    => true,
				),
			),
		)
	);

	CSCO_Customizer::add_field(
		array(
			'type'            => 'color',
			'settings'        => 'section_heading_submenu_color_accent_text',
			'label'           => esc_html__( 'Accent Text Color', 'authentic' ),
			'section'         => 'typography_section_headings',
			'default'         => '#FFFFFF',
			'default_dark'    => '#000000',
			'support_dark'    => true,
			'output'          => apply_filters(
				'csco_section_heading_submenu_color_accent_text',
				array(
					array(
						'element'  => '.site-submenu .cnvs-block-section-heading.is-style-cnvs-block-section-heading-11 .cnvs-section-title, .site-submenu .cnvs-block-section-heading.is-style-cnvs-block-section-heading-10 .cnvs-section-title, .site-submenu .cnvs-block-section-heading.is-style-cnvs-block-section-heading-12 .cnvs-section-title, .site-submenu .cnvs-block-section-heading.is-style-cnvs-block-section-heading-14 .cnvs-section-title, .site-submenu.section-heading-default-style-11 .is-style-cnvs-block-section-heading-default .cnvs-section-title, .site-submenu.section-heading-default-style-10 .is-style-cnvs-block-section-heading-default .cnvs-section-title, .site-submenu.section-heading-default-style-12 .is-style-cnvs-block-section-heading-default .cnvs-section-title, .site-submenu.section-heading-default-style-14 .is-style-cnvs-block-section-heading-default .cnvs-section-title',
						'property' => 'color',
					),
				)
			),
			'active_callback' => array(
				array(
					'setting'  => 'section_heading_submenu_default',
					'operator' => '!=',
					'value'    => true,
				),
			),
		)
	);
}

CSCO_Customizer::add_field(
	array(
		'type'            => 'color',
		'settings'        => 'section_heading_submenu_color_text',
		'label'           => esc_html__( 'Text Color', 'authentic' ),
		'section'         => 'typography_section_headings',
		'default'         => '#000000',
		'default_dark'    => '#FFFFFF',
		'support_dark'    => true,
		'output'          => apply_filters(
			'csco_section_heading_submenu_color_text',
			array(
				array(
					'element'  => '.site-submenu .section-heading, .site-submenu .cnvs-block-section-heading, .site-submenu .cnvs-block-section-heading .cnvs-section-title',
					'property' => 'color',
				),
			)
		),
		'active_callback' => array(
			array(
				'setting'  => 'section_heading_submenu_default',
				'operator' => '!=',
				'value'    => true,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'collapsible',
		'settings' => 'section_heading_collapsible_footer',
		'section'  => 'typography_section_headings',
		'label'    => esc_html__( 'Footer', 'authentic' ),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'        => 'checkbox',
		'settings'    => 'section_heading_footer_default',
		'label'       => esc_html__( 'Default Settings', 'authentic' ),
		'description' => esc_html__( 'You may change the default settings in Common Settings', 'authentic' ),
		'section'     => 'typography_section_headings',
		'default'     => true,
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'typography',
		'settings'        => 'section_heading_footer_font',
		'label'           => esc_html__( 'Default Font', 'authentic' ),
		'section'         => 'typography_section_headings',
		'default'         => array(
			'font-family'    => 'Montserrat',
			'variant'        => '700',
			'subsets'        => array( 'latin' ),
			'font-size'      => '0.8125rem',
			'letter-spacing' => '0.0125em',
			'text-transform' => 'uppercase',
		),
		'choices'         => array(),
		'output'          => apply_filters(
			'csco_section_heading_footer_font',
			array(
				array(
					'element' => '.site-footer .section-heading, .site-footer .cnvs-block-section-heading',
				),
			)
		),
		'active_callback' => array(
			array(
				'setting'  => 'section_heading_footer_default',
				'operator' => '!=',
				'value'    => true,
			),
		),
	)
);

if ( function_exists( 'cnvs' ) ) {

	CSCO_Customizer::add_field(
		array(
			'type'            => 'select',
			'settings'        => 'section_heading_footer',
			'label'           => esc_html__( 'Default Style', 'authentic' ),
			'section'         => 'typography_section_headings',
			'default'         => 'style-1',
			'choices'         => array(
				'style-1'  => esc_html__( 'Plain', 'authentic' ),
				'style-2'  => esc_html__( 'Thin Bottom Line', 'authentic' ),
				'style-3'  => esc_html__( 'Thick Bottom Line', 'authentic' ),
				'style-4'  => esc_html__( 'Thin Side Line', 'authentic' ),
				'style-5'  => esc_html__( 'Thick Side Line', 'authentic' ),
				'style-6'  => esc_html__( 'Top Line', 'authentic' ),
				'style-7'  => esc_html__( 'Bottom Line, Medium Length', 'authentic' ),
				'style-8'  => esc_html__( 'Side Line with Angle', 'authentic' ),
				'style-9'  => esc_html__( 'Cross Icon', 'authentic' ),
				'style-10' => esc_html__( 'Scewed Background', 'authentic' ),
				'style-11' => esc_html__( 'Scewed Background, Side Line', 'authentic' ),
				'style-12' => esc_html__( 'Solid Background', 'authentic' ),
				'style-13' => esc_html__( 'Bordered', 'authentic' ),
				'style-14' => esc_html__( 'Solid Background, Fullwidth', 'authentic' ),
				'style-15' => esc_html__( 'Bordered, Fullwidth', 'authentic' ),
				'style-16' => esc_html__( 'Double Line with Angle', 'authentic' ),
				'style-17' => esc_html__( 'Bottom Line, Short Length', 'authentic' ),
			),
			'active_callback' => array(
				array(
					'setting'  => 'section_heading_footer_default',
					'operator' => '!=',
					'value'    => true,
				),
			),
		)
	);
}

CSCO_Customizer::add_field(
	array(
		'type'            => 'select',
		'settings'        => 'section_heading_footer_align',
		'label'           => esc_html__( 'Default Align', 'authentic' ),
		'section'         => 'typography_section_headings',
		'default'         => 'halignleft',
		'choices'         => array(
			'halignleft'   => esc_html__( 'Align Text Left', 'authentic' ),
			'haligncenter' => esc_html__( 'Align Text Center', 'authentic' ),
			'halignright'  => esc_html__( 'Align Text Right', 'authentic' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'section_heading_footer_default',
				'operator' => '!=',
				'value'    => true,
			),
		),
	)
);

if ( function_exists( 'cnvs' ) ) {

	CSCO_Customizer::add_field(
		array(
			'type'            => 'select',
			'settings'        => 'section_heading_footer_tag',
			'label'           => esc_html__( 'Default Tag', 'authentic' ),
			'section'         => 'typography_section_headings',
			'default'         => 'h5',
			'choices'         => array(
				'h1'  => esc_html__( 'H1', 'authentic' ),
				'h2'  => esc_html__( 'H2', 'authentic' ),
				'h3'  => esc_html__( 'H3', 'authentic' ),
				'h4'  => esc_html__( 'H4', 'authentic' ),
				'h5'  => esc_html__( 'H5', 'authentic' ),
				'h6'  => esc_html__( 'H6', 'authentic' ),
				'p'   => esc_html__( 'P', 'authentic' ),
				'div' => esc_html__( 'DIV', 'authentic' ),
			),
			'active_callback' => array(
				array(
					'setting'  => 'section_heading_footer_default',
					'operator' => '!=',
					'value'    => true,
				),
			),
		)
	);

	CSCO_Customizer::add_field(
		array(
			'type'            => 'color',
			'settings'        => 'section_heading_footer_color_border',
			'label'           => esc_html__( 'Border Color', 'authentic' ),
			'section'         => 'typography_section_headings',
			'default'         => '#242424',
			'default_dark'    => '#2b2b2b',
			'support_dark'    => true,
			'output'          => apply_filters(
				'csco_section_heading_footer_color_border',
				array(
					array(
						'element'  => '.site-footer .cnvs-block-section-heading, .site-footer .cnvs-block-section-heading .cnvs-section-title, .site-footer .cnvs-block-section-heading:before, .site-footer .cnvs-block-section-heading:after, .site-footer .cnvs-block-section-heading .cnvs-section-title:before, .site-footer .cnvs-block-section-heading .cnvs-section-title:after, .site-footer .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default, .site-footer .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default .cnvs-section-title, .site-footer .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default:before, .site-footer .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default:after, .site-footer .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default .cnvs-section-title:before, .site-footer .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default .cnvs-section-title:after, .site-footer .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default.haligncenter, .site-footer .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default.haligncenter .cnvs-section-title, .site-footer .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default.haligncenter:before, .site-footer .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default.haligncenter:after, .site-footer .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default.haligncenter .cnvs-section-title:before, .site-footer .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default.haligncenter .cnvs-section-title:after, .site-footer .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default.halignright, .site-footer .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default.halignright .cnvs-section-title, .site-footer .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default.halignright:before, .site-footer .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default.halignright:after, .site-footer .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default.halignright .cnvs-section-title:before, .site-footer .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default.halignright .cnvs-section-title:after',
						'property' => 'border-color',
					),
				)
			),
			'active_callback' => array(
				array(
					'setting'  => 'section_heading_footer_default',
					'operator' => '!=',
					'value'    => true,
				),
			),
		)
	);

	CSCO_Customizer::add_field(
		array(
			'type'            => 'color',
			'settings'        => 'section_heading_footer_color_accent',
			'label'           => esc_html__( 'Accent Color', 'authentic' ),
			'section'         => 'typography_section_headings',
			'default'         => '#242424',
			'default_dark'    => '#242424',
			'support_dark'    => true,
			'output'          => apply_filters(
				'csco_section_heading_footer_color_accent',
				array(
					array(
						'element'  => '.site-footer .cnvs-block-section-heading.is-style-cnvs-block-section-heading-11 .cnvs-section-title:before, .site-footer .cnvs-block-section-heading.is-style-cnvs-block-section-heading-9 .cnvs-section-title:before, .site-footer .cnvs-block-section-heading.is-style-cnvs-block-section-heading-9 .cnvs-section-title:after, .site-footer .cnvs-block-section-heading.is-style-cnvs-block-section-heading-10 .cnvs-section-title:before, .site-footer .cnvs-block-section-heading.is-style-cnvs-block-section-heading-12 .cnvs-section-title, .site-footer .cnvs-block-section-heading.is-style-cnvs-block-section-heading-14, .site-footer.section-heading-default-style-11 .is-style-cnvs-block-section-heading-default .cnvs-section-title:before, .site-footer.section-heading-default-style-9 .is-style-cnvs-block-section-heading-default .cnvs-section-title:before, .site-footer.section-heading-default-style-9 .is-style-cnvs-block-section-heading-default .cnvs-section-title:after, .site-footer.section-heading-default-style-10 .is-style-cnvs-block-section-heading-default .cnvs-section-title:before, .site-footer.section-heading-default-style-12 .is-style-cnvs-block-section-heading-default .cnvs-section-title, .site-footer.section-heading-default-style-14 .is-style-cnvs-block-section-heading-default',
						'property' => 'background-color',
					),
				)
			),
			'active_callback' => array(
				array(
					'setting'  => 'section_heading_footer_default',
					'operator' => '!=',
					'value'    => true,
				),
			),
		)
	);

	CSCO_Customizer::add_field(
		array(
			'type'            => 'color',
			'settings'        => 'section_heading_footer_color_accent_text',
			'label'           => esc_html__( 'Accent Text Color', 'authentic' ),
			'section'         => 'typography_section_headings',
			'default'         => '#FFFFFF',
			'default_dark'    => '#000000',
			'support_dark'    => true,
			'output'          => apply_filters(
				'csco_section_heading_footer_color_accent_text',
				array(
					array(
						'element'  => '.site-footer .cnvs-block-section-heading.is-style-cnvs-block-section-heading-11 .cnvs-section-title, .site-footer .cnvs-block-section-heading.is-style-cnvs-block-section-heading-10 .cnvs-section-title, .site-footer .cnvs-block-section-heading.is-style-cnvs-block-section-heading-12 .cnvs-section-title, .site-footer .cnvs-block-section-heading.is-style-cnvs-block-section-heading-14 .cnvs-section-title, .site-footer.section-heading-default-style-11 .is-style-cnvs-block-section-heading-default .cnvs-section-title, .site-footer.section-heading-default-style-10 .is-style-cnvs-block-section-heading-default .cnvs-section-title, .site-footer.section-heading-default-style-12 .is-style-cnvs-block-section-heading-default .cnvs-section-title, .site-footer.section-heading-default-style-14 .is-style-cnvs-block-section-heading-default .cnvs-section-title',
						'property' => 'color',
					),
				)
			),
			'active_callback' => array(
				array(
					'setting'  => 'section_heading_footer_default',
					'operator' => '!=',
					'value'    => true,
				),
			),
		)
	);
}

CSCO_Customizer::add_field(
	array(
		'type'            => 'color',
		'settings'        => 'section_heading_footer_color_text',
		'label'           => esc_html__( 'Text Color', 'authentic' ),
		'section'         => 'typography_section_headings',
		'default'         => '#FFFFFF',
		'default_dark'    => '#FFFFFF',
		'support_dark'    => true,
		'output'          => apply_filters(
			'csco_section_heading_footer_color_text',
			array(
				array(
					'element'  => '.site-footer .section-heading, .site-footer .cnvs-block-section-heading, .site-footer .cnvs-block-section-heading .cnvs-section-title',
					'property' => 'color',
				),
			)
		),
		'active_callback' => array(
			array(
				'setting'  => 'section_heading_footer_default',
				'operator' => '!=',
				'value'    => true,
			),
		),
	)
);

/**
 * -------------------------------------------------------------------------
 * |- [ Typography > Menus ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_section(
	'typography_menus',
	array(
		'title' => esc_html__( 'Menus', 'authentic' ),
		'panel' => 'typography',

	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'typography',
		'settings' => 'typography_menus',
		'label'    => esc_html__( 'Menu Font', 'authentic' ),
		'section'  => 'typography_menus',
		'default'  => array(
			'font-family'    => 'Montserrat',
			'subsets'        => array( 'latin' ),
			'variant'        => '600',
			'font-size'      => '0.8125rem',
			'letter-spacing' => '0.0125em',
			'text-transform' => 'uppercase',
		),
		'choices'  => array(),
		'output'   => apply_filters(
			'csco_typography_menus',
			array(
				array(
					'element' => '.navbar-nav > li > a, .navbar-nav .menu-columns > .sub-menu > li > a, .widget_archive li, .widget_categories li, .widget_meta li a, .widget_nav_menu .menu > li > a, .widget_pages .page_item a, .navbar-widgets-btn',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'typography',
		'settings' => 'typography_submenus',
		'label'    => esc_html__( 'Submenu Font', 'authentic' ),
		'section'  => 'typography_menus',
		'default'  => array(
			'font-family'    => 'Montserrat',
			'variant'        => 'regular',
			'subsets'        => array( 'latin' ),
			'font-size'      => '0.8125rem',
			'letter-spacing' => '-0.0125em',
			'text-transform' => 'none',
		),
		'choices'  => array(),
		'output'   => apply_filters(
			'csco_typography_submenus',
			array(
				array(
					'element' => '.topbar .navbar-nav > li > a, .nav .sub-menu > li > a, .navbar-nav .cs-mm-categories > li > a, .widget_categories .children li a, .widget_nav_menu .sub-menu > li > a',
				),
			)
		),
	)
);

/**
 * -------------------------------------------------------------------------
 * |- [ Typography > Post Content ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_section(
	'typography_post_content',
	array(
		'title' => esc_html__( 'Post Content', 'authentic' ),
		'panel' => 'typography',
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'typography',
		'settings' => 'typography_post_lead',
		'label'    => esc_html__( 'Lead', 'authentic' ),
		'section'  => 'typography_post_content',
		'default'  => array(
			'font-family'    => 'Montserrat',
			'variant'        => '700',
			'subsets'        => array( 'latin' ),
			'font-size'      => '2rem',
			'letter-spacing' => '-0.05em',
			'text-transform' => 'none',
		),
		'choices'  => array(),
		'output'   => apply_filters(
			'csco_typography_post_lead',
			array(
				array(
					'element' => '.entry-content .pk-callout, .entry-content .is-style-cnvs-paragraph-callout',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'typography',
		'settings' => 'typography_post_dropcap',
		'label'    => esc_html__( 'Drop Cap', 'authentic' ),
		'section'  => 'typography_post_content',
		'default'  => array(
			'font-family'    => 'Montserrat',
			'variant'        => '500',
			'subsets'        => array( 'latin' ),
			'font-size'      => '2.5rem',
			'text-transform' => 'uppercase',
		),
		'choices'  => array(),
		'output'   => apply_filters(
			'csco_typography_post_dropcap',
			array(
				array(
					'element' => '.entry-content .pk-dropcap:first-letter, p.has-drop-cap:not(:focus):first-letter',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'typography',
		'settings' => 'typography_post_blockquote',
		'label'    => esc_html__( 'Blockquote', 'authentic' ),
		'section'  => 'typography_post_content',
		'default'  => array(
			'font-family'    => 'Montserrat',
			'variant'        => '700',
			'subsets'        => array( 'latin' ),
			'font-size'      => '2rem',
			'letter-spacing' => '-0.05em',
			'text-transform' => 'none',
		),
		'choices'  => array(),
		'output'   => apply_filters(
			'csco_typography_post_blockquote',
			array(
				array(
					'element' => '.entry-content blockquote, .wp-block-quote, .wp-block-pullquote p',
				),
			)
		),
	)
);

/**
 * -------------------------------------------------------------------------
 * |- [ Typography > Miscellaneous ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_section(
	'typography_misc',
	array(
		'title' => esc_html__( 'Miscellaneous', 'authentic' ),
		'panel' => 'typography',
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'typography',
		'settings' => 'typography_search',
		'label'    => esc_html__( 'Search Form', 'authentic' ),
		'section'  => 'typography_misc',
		'default'  => array(
			'font-family'    => 'Montserrat',
			'subsets'        => array( 'latin' ),
			'variant'        => '600',
			'font-size'      => '3rem',
			'letter-spacing' => '-0.05em',
			'text-transform' => 'none',
		),
		'choices'  => array(),
		'output'   => apply_filters(
			'csco_typography_search',
			array(
				array(
					'element' => '#search input[type="search"]',
					'suffix'  => '!important',
				),
			)
		),
	)
);

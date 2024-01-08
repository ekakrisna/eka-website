<?php
/**
 * Theme mods.
 *
 * @package Authentic
 */

/**
 * Add css selectors to output of Customizer.
 */
add_filter(
	'csco_color_btn_primary_text',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper .button-primary',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .overlay-inner a.button-primary',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-search .wp-block-search__button',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-button .wp-block-button__link:not(.has-background)',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-subscribe-submit',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .post-number',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-about-button',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-author-button',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-instagram-follow',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-twitter-follow',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-featured-categories-vertical-list .pk-featured-count',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .sight-portfolio-area__pagination .sight-portfolio-load-more',
					)
				),
				'property' => 'color',
				'context'  => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_color_btn_primary_text_hover',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper .button-primary:hover',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .overlay-inner a.button-primary:hover',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-search .wp-block-search__button:hover',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-button .wp-block-button__link:not(.has-background):hover',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-subscribe-submit:hover',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-about-button:hover',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-author-button:hover',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-instagram-follow:hover',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-twitter-follow:hover',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .tagcloud:hover',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .tagcloud:focus',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .sight-portfolio-area__pagination .sight-portfolio-load-more:hover',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .sight-portfolio-area__pagination .sight-portfolio-load-more:focus',
					)
				),
				'property' => 'color',
				'context'  => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_color_btn_primary_bg',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper .button-primary',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .overlay-inner a.button-primary',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-search .wp-block-search__button',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-button .wp-block-button__link:not(.has-background)',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-subscribe-submit',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .post-number',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-about-button',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-author-button',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-instagram-follow',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-twitter-follow',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-featured-categories-vertical-list .pk-featured-count',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-block-tabs.is-style-cnvs-block-tabs-pills .cnvs-block-tabs-buttons .cnvs-block-tabs-button.cnvs-block-tabs-button-active',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .sight-portfolio-area__pagination .sight-portfolio-load-more',
					)
				),
				'property' => 'background-color',
				'context'  => array( 'editor' ),
			)
		);
		return $rules;
	}
);


add_filter(
	'csco_color_btn_primary_bg_hover',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper .button-primary:hover',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .overlay-inner a.button-primary:hover',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-search .wp-block-search__button:hover',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-button .wp-block-button__link:not(.has-background):hover',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-subscribe-submit:hover',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-about-button:hover',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-author-button:hover',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-instagram-follow:hover',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-twitter-follow:hover',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .sight-portfolio-area__pagination .sight-portfolio-load-more:hover',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .sight-portfolio-area__pagination .sight-portfolio-load-more:focus',
					)
				),
				'property' => 'background-color',
				'context'  => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_color_body_bg',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-gallery .blocks-gallery-item figcaption',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-component-server-side-render input[type=search]',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-component-server-side-render input[type=text]',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-component-server-side-render input[type=number]',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-component-server-side-render input[type=email]',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-component-server-side-render input[type=tel]',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-component-server-side-render input[type=password]',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-component-server-side-render textarea',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-component-server-side-render .form-control',
					)
				),
				'property' => 'background-color',
				'context'  => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_color_body_bg',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper .has-drop-cap.is-cnvs-dropcap-bg-dark:not(:focus):first-letter',
					)
				),
				'property' => 'color',
				'suffix'   => '!important',
				'context'  => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_color_text_secondary',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper .tagcloud',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-caption-text',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-quote cite',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-quote__citation',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-image figcaption',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-audio figcaption',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-embed figcaption',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-gallery figcaption',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-pullquote cite',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-pullquote footer',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-pullquote .wp-block-pullquote__citation',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .timestamp',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-twitter-counters',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-instagram-name',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-instagram-name a',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-instagram-counters',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-social-links-template-default .pk-social-links-label',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-share-buttons-total .pk-share-buttons-count',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .abr-post-review .abr-review-score .abr-review-subtext .abr-data-label',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .title-share',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .sight-portfolio-area-filter__list-item a',
					)
				),
				'property' => 'color',
				'context'  => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_color_text_secondary',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper .abr-post-review .abr-review-score .abr-review-subtext .abr-data-info',
					)
				),
				'property' => 'background-color',
				'context'  => array( 'editor' ),
			)
		);
		return $rules;
	}
);


add_filter(
	'csco_color_links',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper .tagcloud a',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-toc ol > li:before',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-block-contributors .author-name a',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-author-posts-single a',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-twitter-content a',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-twitter-info a',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-block-author .pk-widget-author-container:not(.pk-bg-overlay) .pk-author-title a',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-social-links-wrap .pk-social-links-count',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-block-social-links .pk-social-links-link',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-block-social-links .pk-social-links-title',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-widget-contributors .pk-social-links-link',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-share-buttons-total .pk-share-buttons-label',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-share-buttons-scheme-default .pk-share-buttons-link',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-share-buttons-scheme-simple-light .pk-share-buttons-link',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-share-buttons-scheme-simple-light .pk-share-buttons-count',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .is-style-pk-share-buttons-simple-light .pk-share-buttons-link',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .is-style-pk-share-buttons-simple-light .pk-share-buttons-link .pk-share-buttons-count',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .is-style-pk-share-buttons-default .pk-share-buttons-link:not(hover)',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-social-links-scheme-light .pk-social-links-link',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-social-links-template-default .pk-social-links-link',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-social-links-scheme-light .pk-social-links-title',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-social-links-scheme-bold .pk-social-links-title',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-social-links-scheme-bold-rounded .pk-social-links-title',
						'.editor-styles-wrapper.cs-editor-styles-wrapper ol.is-style-cnvs-list-styled > li:before',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block[data-heading="cnvs-heading-numbered-2"] .is-style-cnvs-heading-numbered:before',
						'.editor-styles-wrapper.cs-editor-styles-wrapper h2.is-style-cnvs-heading-numbered:before',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-block-collapsible-title',
					)
				),
				'property' => 'color',
				'context'  => array( 'editor' ),
			)
		);
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-block-tabs',
					)
				),
				'property' => '--cnvs-tabs-button-color',
				'context'  => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_color_links_hover',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-block-contributors .author-name a:hover',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-author-posts-single a:hover',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-twitter-content a:hover',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-twitter-info a:hover',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-block-author .pk-widget-author-container:not(.pk-bg-overlay) .pk-author-title a:hover',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .is-style-pk-social-links-bold .pk-social-links-link:hover .pk-social-links-title',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .is-style-pk-social-links-bold-rounded .pk-social-links-link:hover .pk-social-links-title',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-widget-contributors .pk-social-links-link:hover',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-block-collapsible-title:hover',
					)
				),
				'property' => 'color',
				'context'  => array( 'editor' ),
			)
		);
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-block-tabs',
					)
				),
				'property' => '--cnvs-tabs-button-hover-color',
				'context'  => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_color_text',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-component-server-side-render input[type=search]',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-component-server-side-render input[type=text]',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-component-server-side-render input[type=number]',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-component-server-side-render input[type=email]',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-component-server-side-render input[type=tel]',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-component-server-side-render input[type=password]',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-component-server-side-render textarea',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-component-server-side-render .form-control',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-component-server-side-render .abr-reviews-posts .abr-review-meta',
					)
				),
				'property' => 'color',
				'context'  => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_color_post_paragraph',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-paragraph',
						'.editor-styles-wrapper.cs-editor-styles-wrapper p.wp-block-subhead',
					)
				),
				'property' => 'color',
				'context'  => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_color_blockquote',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper blockquote',
						'.editor-styles-wrapper.cs-editor-styles-wrapper blockquote p',
					)
				),
				'property' => 'color',
				'context'  => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_color_leadin_dropcap',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper .has-drop-cap:not(:focus):first-letter',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .has-drop-cap.is-cnvs-dropcap-bordered:not(:focus):first-letter',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .has-drop-cap.is-cnvs-dropcap-border-right:not(:focus):first-letter',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .has-drop-cap.is-cnvs-dropcap-bg-light:not(:focus):first-letter',
					)
				),
				'property' => 'color',
				'context'  => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_color_leadin_dropcap',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper .has-drop-cap.is-cnvs-dropcap-bg-dark:not(:focus):first-letter',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-group.is-style-cnvs-block-single-border:before',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-group.is-style-cnvs-block-single-border:after',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-group.is-style-cnvs-block-bg-inverse',
					)
				),
				'property' => 'background-color',
				'context'  => array( 'editor' ),
			)
		);
		return $rules;
	}
);


add_filter(
	'csco_color_leadin_dropcap',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper .has-drop-cap.is-cnvs-dropcap-bordered:not(:focus):first-letter',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-group.is-style-cnvs-block-bordered',
					)
				),
				'property' => 'border-color',
				'context'  => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_color_leadin_dropcap',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper .has-drop-cap.is-cnvs-dropcap-border-right:first-letter',
					)
				),
				'property' => 'border-right-color',
				'context'  => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_color_post_links',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper p > code',
						'.editor-styles-wrapper.cs-editor-styles-wrapper p > a:not(.button):not(.button)',
						'.editor-styles-wrapper.cs-editor-styles-wrapper ul a',
						'.editor-styles-wrapper.cs-editor-styles-wrapper ol a',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-latest-posts > li > a',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-categories-list > li > a',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-categories__list > li > a',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-archives-list > li > a',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .navigation.pagination .nav-links > a',
					)
				),
				'property' => 'color',
				'context'  => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_color_post_links_hover',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper p > a:not(.button):not(.button):hover',
						'.editor-styles-wrapper.cs-editor-styles-wrapper ul a:hover',
						'.editor-styles-wrapper.cs-editor-styles-wrapper ol a:hover',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-latest-posts > li > a:hover',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-categories-list > li > a:hover',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-categories__list > li > a:hover',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-archives-list > li > a:hover',
					)
				),
				'property' => 'color',
				'context'  => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_color_category',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cs-block-archive-posts article:not(.post-featured) .entry-header .post-categories a',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cs-block-narrow .layout-variation-simple .entry-header .post-categories a',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cs-block-wide .layout-variation-simple .entry-header .post-categories a',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cs-block-carousel .post-categories a',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-block-posts-sidebar:not(.cnvs-block-posts-sidebar-slider) .post-categories a',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-widget-posts .post-categories a',
					)
				),
				'property' => 'color',
				'context'  => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_color_category_hover',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cs-block-archive-posts article:not(.post-featured) .entry-header .post-categories a:hover',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cs-block-archive-posts article:not(.post-featured) .entry-header .post-categories a:focus',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cs-block-narrow .layout-variation-simple .entry-header .post-categories a:hover',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cs-block-narrow .layout-variation-simple .entry-header .post-categories a:focus',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cs-block-wide .layout-variation-simple .entry-header .post-categories a:hover',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cs-block-wide .layout-variation-simple .entry-header .post-categories a:focus',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cs-block-carousel .post-categories a:hover',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cs-block-carousel .post-categories a:focus',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-block-posts-sidebar:not(.cnvs-block-posts-sidebar-slider) .post-categories a:hover',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-block-posts-sidebar:not(.cnvs-block-posts-sidebar-slider) .post-categories a:focus',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-widget-posts .post-categories a:hover',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-widget-posts .post-categories a:focus',
					)
				),
				'property' => 'color',
				'context'  => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_colors_accent',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper p > code',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .table-striped tbody tr:nth-of-type(odd)',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-table.is-style-stripes tbody tr:nth-child(odd)',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-code',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-verse',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-preformatted',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .table-bordered th',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .table-striped tbody tr:nth-of-type(odd)',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-toc ol > li:before',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .is-style-pk-social-links-light-bg .pk-social-links-link',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .is-style-pk-share-buttons-default .pk-share-buttons-link:not(hover)',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .is-style-pk-share-buttons-bold .pk-share-buttons-link',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .post-archive .pk-subscribe-form-wrap',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-social-links-scheme-light-bg .pk-social-links-link',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-twitter-slider',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-block-twitter-layout-slider',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .has-drop-cap.is-cnvs-dropcap-bg-light:not(:focus):first-letter',
						'.editor-styles-wrapper.cs-editor-styles-wrapper ol.is-style-cnvs-list-styled > li:before',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-group.is-style-cnvs-block-bg-light',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block[data-heading="cnvs-heading-numbered-2"] .is-style-cnvs-heading-numbered:before',
						'.editor-styles-wrapper.cs-editor-styles-wrapper h2.is-style-cnvs-heading-numbered:before',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-block-collapsible-title',
					)
				),
				'property' => 'background-color',
				'context'  => array( 'editor' ),
			)
		);
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-share-buttons-wrap',
					)
				),
				'property' => '--pk-share-link-background',
				'context'  => array( 'editor' ),
			)
		);
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-block-alert',
					)
				),
				'property' => '--cnvs-alert-background',
				'context'  => array( 'editor' ),
			)
		);
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-badge',
					)
				),
				'property' => '--cnvs-badge-background',
				'context'  => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_color_headings_links',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-block-posts-layout-carousel .entry-title a',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-block-posts-sidebar:not(.cnvs-block-posts-sidebar-slider) .entry-title a',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-widget-posts:not(.pk-widget-posts-template-slider) .entry-title a',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .abr-posts-template-reviews-1 .entry-title a',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .abr-posts-template-reviews-2 .entry-title a',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .abr-posts-template-reviews-3 .entry-title a',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .abr-posts-template-reviews-4 .entry-title a',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .abr-posts-template-reviews-5 .entry-title a',
					)
				),
				'property' => 'color',
				'context'  => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_color_headings_links_hover',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-block-posts-layout-carousel .entry-title a:hover',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-block-posts-sidebar:not(.cnvs-block-posts-sidebar-slider) .entry-title a:hover',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-widget-posts:not(.pk-widget-posts-template-slider) .entry-title a:hover',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .abr-posts-template-reviews-1 .entry-title a:hover',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .abr-posts-template-reviews-2 .entry-title a:hover',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .abr-posts-template-reviews-3 .entry-title a:hover',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .abr-posts-template-reviews-4 .entry-title a:hover',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .abr-posts-template-reviews-5 .entry-title a:hover',
					)
				),
				'property' => 'color',
				'context'  => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_section_heading_color_border',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-block-section-heading',
						'.editor-styles-wrapper.cs-editor-styles-wrapper	.cnvs-block-section-heading .cnvs-section-title',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-block-section-heading:before',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-block-section-heading:after',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-block-section-heading .cnvs-section-title:before',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-block-section-heading .cnvs-section-title:after',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default .cnvs-section-title',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default:before',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default:after',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default .cnvs-section-title:before',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-block-section-heading.is-style-cnvs-block-section-heading-default .cnvs-section-title:after',
					)
				),
				'property' => 'border-color',
				'context'  => array( 'editor' ),
			)
		);
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-block-section-heading',
					)
				),
				'property' => '--cnvs-section-heading-border-color',
				'context'  => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_section_heading_color_accent',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-block-section-heading.is-style-cnvs-block-section-heading-11 .cnvs-section-title:before',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-block-section-heading.is-style-cnvs-block-section-heading-9 .cnvs-section-title:before',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-block-section-heading.is-style-cnvs-block-section-heading-9 .cnvs-section-title:after',
						'.editor-styles-wrapper.cs-editor-styles-wrapper	.cnvs-block-section-heading.is-style-cnvs-block-section-heading-10 .cnvs-section-title:before',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-block-section-heading.is-style-cnvs-block-section-heading-12 .cnvs-section-title',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-block-section-heading.is-style-cnvs-block-section-heading-14',
						'.editor-styles-wrapper.cs-editor-styles-wrapper.section-heading-default-style-11 .is-style-cnvs-block-section-heading-default .cnvs-section-title:before',
						'.editor-styles-wrapper.cs-editor-styles-wrapper.section-heading-default-style-9 .is-style-cnvs-block-section-heading-default .cnvs-section-title:before',
						'.editor-styles-wrapper.cs-editor-styles-wrapper.section-heading-default-style-9 .is-style-cnvs-block-section-heading-default .cnvs-section-title:after',
						'.editor-styles-wrapper.cs-editor-styles-wrapper.section-heading-default-style-10 .is-style-cnvs-block-section-heading-default .cnvs-section-title:before',
						'.editor-styles-wrapper.cs-editor-styles-wrapper.section-heading-default-style-12 .is-style-cnvs-block-section-heading-default .cnvs-section-title',
						'.editor-styles-wrapper.cs-editor-styles-wrapper.section-heading-default-style-14 .is-style-cnvs-block-section-heading-default',
					)
				),
				'property' => 'background-color',
				'context'  => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_section_heading_color_accent_text',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-block-section-heading.is-style-cnvs-block-section-heading-11 .cnvs-section-title',
						'.editor-styles-wrapper.cs-editor-styles-wrapper	.cnvs-block-section-heading.is-style-cnvs-block-section-heading-10 .cnvs-section-title',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-block-section-heading.is-style-cnvs-block-section-heading-12 .cnvs-section-title',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-block-section-heading.is-style-cnvs-block-section-heading-14 .cnvs-section-title',
						'.editor-styles-wrapper.cs-editor-styles-wrapper.section-heading-default-style-11 .is-style-cnvs-block-section-heading-default .cnvs-section-title',
						'.editor-styles-wrapper.cs-editor-styles-wrapper.section-heading-default-style-10 .is-style-cnvs-block-section-heading-default .cnvs-section-title',
						'.editor-styles-wrapper.cs-editor-styles-wrapper.section-heading-default-style-12 .is-style-cnvs-block-section-heading-default .cnvs-section-title',
						'.editor-styles-wrapper.cs-editor-styles-wrapper.section-heading-default-style-14 .is-style-cnvs-block-section-heading-default .cnvs-section-title',
					)
				),
				'property' => 'color',
				'context'  => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_section_heading_color_text',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper .section-heading',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-block-section-heading',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-block-section-heading .cnvs-section-title',
					)
				),
				'property' => 'color',
				'context'  => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_color_headings',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper h1',
						'.editor-styles-wrapper.cs-editor-styles-wrapper h2',
						'.editor-styles-wrapper.cs-editor-styles-wrapper h3',
						'.editor-styles-wrapper.cs-editor-styles-wrapper h4',
						'.editor-styles-wrapper.cs-editor-styles-wrapper h5',
						'.editor-styles-wrapper.cs-editor-styles-wrapper h6',
						'.editor-styles-wrapper.cs-editor-styles-wrapper h1 a',
						'.editor-styles-wrapper.cs-editor-styles-wrapper h2 a',
						'.editor-styles-wrapper.cs-editor-styles-wrapper h3 a',
						'.editor-styles-wrapper.cs-editor-styles-wrapper h4 a',
						'.editor-styles-wrapper.cs-editor-styles-wrapper h5 a',
						'.editor-styles-wrapper.cs-editor-styles-wrapper h6 a',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .table-bordered th',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-table td strong',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .editor-post-title__block .editor-post-title__input',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .abr-post-review .abr-review-name',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .abr-post-review .abr-review-text',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .abr-post-review .abr-review-text',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .abr-reviews-posts .abr-review-number',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .sight-portfolio-area-filter__title',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .sight-portfolio-area-filter__list-item.sight-filter-active a',
					)
				),
				'property' => 'color',
				'context'  => array( 'editor' ),
			)
		);
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-block-alert',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-block-alert h1',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-block-alert h2',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-block-alert h3',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-block-alert h4',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-block-alert h5',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-block-alert h6',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-block-alert .cnvs-title',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-block-alert a',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .entry-content .cnvs-block-alert p',

					)
				),
				'property' => 'color',
				'context'  => array( 'editor' ),
			)
		);
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-social-links-wrap',

					)
				),
				'property' => '--pk-social-link-color',
				'context'  => array( 'editor' ),
			)
		);
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-social-links-wrap',

					)
				),
				'property' => '--pk-social-light-bg-title-color',
				'context'  => array( 'editor' ),
			)
		);
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-social-links-wrap',

					)
				),
				'property' => '--pk-social-light-rounded-title-color',
				'context'  => array( 'editor' ),
			)
		);
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-social-links-wrap',

					)
				),
				'property' => '--pk-social-light-bg-color',
				'context'  => array( 'editor' ),
			)
		);
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-social-links-wrap .pk-font-heading',

					)
				),
				'property' => '--pk-heading-font-color',
				'context'  => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_colors_borders',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-separator',
					)
				),
				'property' => 'color',
				'context'  => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_colors_borders',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper .table-bordered th',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .table-bordered td',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-pullquote:not([style*="border-color"])',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-separator:not(.is-style-dots)',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-component-server-side-render .form-control',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-component-server-side-render input[type=search]',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-component-server-side-render input[type=text]',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-component-server-side-render input[type=number]',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-component-server-side-render input[type=email]',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-component-server-side-render input[type=tel]',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-component-server-side-render input[type=password]',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-component-server-side-render textarea',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-component-server-side-render select',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-block-collapsibles .cnvs-block-collapsible',
						'.cnvs-block-collapsibles > .block-editor-inner-blocks > .block-editor-block-list__layout > [data-type="canvas/collapsible"] + [data-type="canvas/collapsible"] > .editor-block-list__block-edit > div .cnvs-block-collapsible',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .post-archive .archive-compact .post-grid',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .post-archive .archive-compact .post-masonry',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .post-archive .archive-compact.archive-grid section.widget',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .post-archive .archive-compact.archive-masonry section.widget',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .abr-reviews-posts .abr-post-item',
					)
				),
				'property' => 'border-color',
				'context'  => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_colors_borders',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper table th',
						'.editor-styles-wrapper.cs-editor-styles-wrapper table td',
						'.editor-styles-wrapper.cs-editor-styles-wrapper table tbody + tbody',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block[data-type="canvas/toc"]:not(:last-child)',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .post-list:not(.post-featured) + .post-list:not(.post-featured)',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .post-standard:not(.post-featured) + .post-standard:not(.post-featured)',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .post-list + .post',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .post + .post-list',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .widget_nav_menu .menu > .menu-item:not(:first-child)',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .widget_pages li:not(:first-child) a',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .widget_meta li:not(:first-child) a',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .widget_categories > ul > li:not(:first-child)',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .widget_archive > ul > li:not(:first-child)',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .widget_categories .widget-wrap > ul > li:not(:first-child)',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .widget_archive .widget-wrap > ul > li:not(:first-child)',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .widget_recent_comments li:not(:first-child)',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .widget_recent_entries li:not(:first-child)',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-widget-contributors .pk-author-item',
						'.editor-styles-wrapper.cs-editor-styles-wrapper #wp-calendar tbody td',
					)
				),
				'property' => 'border-top-color',
				'context'  => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_colors_borders',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block[data-type="canvas/toc"]:not(:first-child)',
					)
				),
				'property' => 'border-bottom-color',
				'context'  => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_color_misc_overlay',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper .overlay-media:before',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .post-thumbnail:before',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-bg-overlay',
					)
				),
				'property' => 'background-color',
				'context'  => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_typography_base',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element' => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-component-server-side-render input[type=search]',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-component-server-side-render input[type=text]',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-component-server-side-render input[type=number]',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-component-server-side-render input[type=email]',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-component-server-side-render input[type=tel]',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-component-server-side-render input[type=password]',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-component-server-side-render optgroup',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-component-server-side-render select',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-component-server-side-render textarea',
					)
				),
				'context' => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_typography_buttons',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element' => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper .title-share',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .button-primary',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-search .wp-block-search__button',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-button__link',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-button',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-twitter-label',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-block-instagram .pk-instagram-username',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-social-links-title',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-share-buttons-title',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-share-buttons-label',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-subscribe-submit',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .post-number span:first-child',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-about-button span:first-child',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-author-button span:first-child',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-instagram-follow span:first-child',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-twitter-follow span:first-child',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-featured-categories .pk-featured-name',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-featured-categories-tiles .pk-featured-link',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-featured-categories-vertical-list .pk-featured-count .pk-featured-number',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-block-collapsible-title h6',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-block-tabs .cnvs-block-tabs-buttons .cnvs-block-tabs-button',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .sight-portfolio-area__pagination .sight-portfolio-load-more',
					)
				),
				'context' => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_typography_text_small',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element' => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper .tagcloud',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .post-categories',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .post-meta',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-quote cite',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-quote__citation',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-image figcaption',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-audio figcaption',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-embed figcaption',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-gallery .blocks-gallery-item figcaption',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-caption-text',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-pullquote cite',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-pullquote footer',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-pullquote .wp-block-pullquote__citation',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .timestamp',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-block-alert',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-badge',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-twitter-username',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-twitter-counters',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-instagram-name',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-instagram-counters',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-social-links-count',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-social-links-label',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-share-buttons-count',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-subscribe-form-wrap .pk-privacy label',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-featured-categories-tiles .pk-featured-count',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-block-alert',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .abr-badge',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .abr-post-review .abr-review-subtext .pk-data-label',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .abr-post-review .abr-review-name',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .abr-review-caption',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .sight-portfolio-entry__meta',
					)
				),
				'context' => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_typography_post_lead',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element' => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper .is-style-cnvs-paragraph-callout',
					)
				),
				'context' => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_typography_post_dropcap',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element' => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper p.has-drop-cap:not(:focus):first-letter',
					)
				),
				'context' => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_typography_post_blockquote',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element' => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-quote',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-quote p',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-pullquote p',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-freeform blockquote p:first-child',
					)
				),
				'context' => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_typography_headings',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element' => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper h1',
						'.editor-styles-wrapper.cs-editor-styles-wrapper h2',
						'.editor-styles-wrapper.cs-editor-styles-wrapper h3',
						'.editor-styles-wrapper.cs-editor-styles-wrapper h4',
						'.editor-styles-wrapper.cs-editor-styles-wrapper h5',
						'.editor-styles-wrapper.cs-editor-styles-wrapper h6',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .h1',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .h2',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .h3',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .h4',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .h5',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .h6',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .editor-post-title__input',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-cover .wp-block-cover-image-text',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-cover .wp-block-cover-text',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-cover-image .wp-block-cover-image-text',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-cover-image .wp-block-cover-text',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-cover-image h2',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-cover h2',
						'.editor-styles-wrapper.cs-editor-styles-wrapper p.has-drop-cap:not(:focus):first-letter',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .abr-reviews-posts .abr-review-number',
					)
				),
				'context' => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_section_heading_font',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element' => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper .navigation.pagination .nav-links',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .section-heading',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .cnvs-block-section-heading',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-block-contributors .pk-author-posts > h6',
					)
				),
				'context' => array( 'editor' ),
			)
		);
		return $rules;
	}
);


add_filter(
	'csco_typography_h1',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element' => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper h1',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .h1',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .editor-post-title__input',
					)
				),
				'context' => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_typography_h1_override_font',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element' => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper h1',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .h1',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .editor-post-title__input',
					)
				),
				'context' => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_typography_h2',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element' => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper h2',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .h2',
					)
				),
				'context' => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_typography_h2_override_font',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element' => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper h2',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .h2',
					)
				),
				'context' => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_typography_h3',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element' => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper h3',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .h3',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .archive-grid h2',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .archive-masonry h2',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .archive-list h2',
					)
				),
				'context' => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_typography_h3_override_font',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element' => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper h3',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .h3',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .archive-grid h2',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .archive-masonry h2',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .archive-list h2',
					)
				),
				'context' => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_typography_h4',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element' => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper h4',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .h4',
					)
				),
				'context' => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_typography_h4_override_font',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element' => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper h4',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .h4',
					)
				),
				'context' => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_typography_h5',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element' => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper h5',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .h5',
					)
				),
				'context' => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_typography_h5_override_font',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element' => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper h5',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .h5',
					)
				),
				'context' => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_typography_h6',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element' => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper h6',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .h6',
					)
				),
				'context' => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_typography_h6_override_font',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element' => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper h6',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .h6',
					)
				),
				'context' => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_typography_menus',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element' => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper .widget_archive li',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .widget_categories li',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .widget_meta li a',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .widget_nav_menu .menu > li > a',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .widget_pages .page_item a',
					)
				),
				'context' => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_typography_submenus',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element' => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper .widget_categories .children li a',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .widget_nav_menu .sub-menu > li > a',
					)
				),
				'context' => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_border_radius',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper .button-primary',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-search .wp-block-search__button',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .wp-block-button:not(.is-style-squared) .wp-block-button__link',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .widget-area .pk-subscribe-with-name input[type="text"]',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .widget-area .pk-subscribe-with-name button',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .widget-area .pk-subscribe-with-bg input[type="text"]',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .widget-area .pk-subscribe-with-bg button',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-about-button',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-author-button',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-instagram-follow',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-twitter-follow',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .adp-button',
					)
				),
				'property' => 'border-radius',
				'context'  => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_border_radius',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element'     => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-subscribe-with-name input[type="text"]',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-subscribe-with-name button',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-subscribe-with-bg input[type="text"]',
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-subscribe-with-bg button',
					)
				),
				'property'    => 'border-radius',
				'context'     => array( 'editor' ),
				'media_query' => '@media (max-width: 719px)',
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_border_radius',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-subscribe-form-wrap button',
					)
				),
				'property' => 'border-top-right-radius',
				'context'  => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_border_radius',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.editor-styles-wrapper.cs-editor-styles-wrapper .pk-subscribe-form-wrap button',
					)
				),
				'property' => 'border-bottom-right-radius',
				'context'  => array( 'editor' ),
			)
		);
		return $rules;
	}
);

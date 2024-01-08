<?php
/**
 * Style template.
 *
 * @package AMP
 */

/**
 * Context.
 *
 * @var AMP_Post_Template $this
 */

$content_max_width = absint( $this->get( 'content_max_width' ) );

// Theme Settings.
$color_body_bg                = get_theme_mod( 'color_body_bg', '#FFFFFF' );
$color_text                   = get_theme_mod( 'color_text', '#777777' );
$color_logo                   = get_theme_mod( 'colors_logo_text', '#000000' );
$color_logo_hover             = get_theme_mod( 'colors_logo_text_hover', '#A0A0A0' );
$color_logo_desc              = get_theme_mod( 'colors_logo_description', '#A0A0A0' );
$color_headings               = get_theme_mod( 'color_headings', '#000000' );
$color_borders                = get_theme_mod( 'colors_borders', '#EEEEEE' );
$color_links                  = get_theme_mod( 'color_links', '#000000' );
$color_links_hover            = get_theme_mod( 'color_links_hover', '#A0A0A0' );
$color_secondary              = get_theme_mod( 'color_text_secondary', '#c9c9c9' );
$color_btn_primary_text       = get_theme_mod( 'color_btn_primary_text', '#EEEEEE' );
$color_btn_primary_text_hover = get_theme_mod( 'color_btn_primary_text_hover', '#FFFFFF' );
$color_btn_primary_bg         = get_theme_mod( 'color_btn_primary_bg', '#282828' );
$color_btn_primary_bg_hover   = get_theme_mod( 'color_btn_primary_bg_hover', '#000000' );
$color_footer_bg              = get_theme_mod( 'color_footer_bg', '#000000' );
$color_footer_text            = get_theme_mod( 'color_footer_text', '#A0A0A0' );
$color_footer_link            = get_theme_mod( 'color_footer_link', '#FFFFFF' );
$color_footer_link_hover      = get_theme_mod( 'color_footer_link_hover', '#A0A0A0' );
$color_footer_border          = get_theme_mod( 'color_footer_border', '#242424' );
$border_radius                = get_theme_mod( 'border_radius', '0' );

$font_base        = get_theme_mod( 'typography_base' );
$font_buttons     = get_theme_mod( 'typography_buttons' );
$font_text_small  = get_theme_mod( 'typography_text_small' );
$font_headings    = get_theme_mod( 'typography_headings' );
$font_h1          = get_theme_mod( 'typography_h1' );
$font_h2          = get_theme_mod( 'typography_h2' );
$font_h3          = get_theme_mod( 'typography_h3' );
$font_h4          = get_theme_mod( 'typography_h4' );
$font_h5          = get_theme_mod( 'typography_h5' );
$font_h6          = get_theme_mod( 'typography_h6' );
$font_header_logo = get_theme_mod( 'header_logo_font' );
$font_header_desc = get_theme_mod( 'header_description_font' );
$font_footer_logo = get_theme_mod( 'footer_logo_font' );

if ( get_theme_mod( 'header_background', false ) ) {
	$header_bg_object = get_theme_mod( 'header_background_object' );
}

$font_family = '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol"';
?>
/* Generic WP styling */
html {
	line-height: 1.15;
	margin-top: 0;
}

.alignright {
	float: right;
}

.alignleft {
	float: left;
}

.aligncenter {
	display: block;
	margin-left: auto;
	margin-right: auto;
}

button,
button,
input[type="button"],
input[type="reset"],
input[type="submit"],
.amp-wp-comments-link a {
	background: <?php echo esc_html( sanitize_hex_color( $color_btn_primary_bg ) ); ?>;
	color: <?php echo esc_html( sanitize_hex_color( $color_btn_primary_text ) ); ?>;
	font-family: <?php echo wp_kses( $font_family, 'post' ); ?>;
	font-size: <?php echo ( isset( $font_buttons['font-size'] ) && $font_buttons['font-size'] ) ? esc_attr( $font_buttons['font-size'] ) : '11px'; ?>;
	font-weight: <?php echo ( isset( $font_buttons['font-weight'] ) && $font_buttons['font-weight'] ) ? esc_attr( $font_buttons['font-weight'] ) : '700'; ?>;
	letter-spacing: <?php echo ( isset( $font_buttons['letter-spacing'] ) && $font_buttons['letter-spacing'] ) ? esc_attr( $font_buttons['letter-spacing'] ) : '1px'; ?>;
	text-transform: <?php echo ( isset( $font_buttons['text-transform'] ) && $font_buttons['text-transform'] ) ? esc_attr( $font_buttons['text-transform'] ) : 'uppercase'; ?>;
	border-radius: <?php echo esc_html( $border_radius ); ?>;
	transition: 0.2s;
}

button:hover,
.button:hover,
input[type="button"]:hover,
input[type="reset"]:hover,
input[type="submit"]:hover,
.amp-wp-comments-link a:hover {
	background: <?php echo esc_html( sanitize_hex_color( $color_btn_primary_bg_hover ) ); ?>;
	color: <?php echo esc_html( sanitize_hex_color( $color_btn_primary_text_hover ) ); ?>;
}

label,
figcaption,
blockquote cite,
.wp-caption-text {
	font-family: <?php echo wp_kses( $font_family, 'post' ); ?>;
	font-size: <?php echo ( isset( $font_text_small['font-size'] ) && $font_text_small['font-size'] ) ? esc_attr( $font_text_small['font-size'] ) : '10px'; ?>;
	font-weight: <?php echo ( isset( $font_text_small['font-weight'] ) && $font_text_small['font-weight'] ) ? esc_attr( $font_text_small['font-weight'] ) : '400'; ?>;
	letter-spacing: <?php echo ( isset( $font_text_small['letter-spacing'] ) && $font_text_small['letter-spacing'] ) ? esc_attr( $font_text_small['letter-spacing'] ) : '.2px'; ?>;
	text-transform: <?php echo ( isset( $font_text_small['text-transform'] ) && $font_text_small['text-transform'] ) ? esc_attr( $font_buttons['text-transform'] ) : 'uppercase'; ?>;
}

blockquote cite {
	display: block;
	width: 100%;
}

h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
	font-family: <?php echo wp_kses( $font_family, 'post' ); ?>;
	font-weight: <?php echo ( isset( $font_headings['font-weight'] ) && $font_headings['font-weight'] ) ? esc_attr( $font_headings['font-weight'] ) : '600'; ?>;
	color: <?php echo esc_html( sanitize_hex_color( $color_headings ) ); ?>;
	line-height: 1.15;
}

h1, .h1 {
	font-size: <?php echo ( isset( $font_h1['font-size'] ) && $font_h1['font-size'] ) ? esc_attr( $font_h1['font-size'] ) : '3rem'; ?>;
	letter-spacing: <?php echo ( isset( $font_h1['letter-spacing'] ) && $font_h1['letter-spacing'] ) ? esc_attr( $font_h1['letter-spacing'] ) : '-.15rem'; ?>;
	text-transform: <?php echo ( isset( $font_h1['text-transform'] ) && $font_h1['text-transform'] ) ? esc_attr( $font_h1['text-transform'] ) : 'none'; ?>;
}

h2, .h2 {
	font-size: <?php echo ( isset( $font_h2['font-size'] ) && $font_h2['font-size'] ) ? esc_attr( $font_h2['font-size'] ) : '2rem'; ?>;
	letter-spacing: <?php echo ( isset( $font_h2['letter-spacing'] ) && $font_h2['letter-spacing'] ) ? esc_attr( $font_h2['letter-spacing'] ) : '-.1rem'; ?>;
	text-transform: <?php echo ( isset( $font_h2['text-transform'] ) && $font_h2['text-transform'] ) ? esc_attr( $font_h2['text-transform'] ) : 'none'; ?>;
}

h3, .h3 {
	font-size: <?php echo ( isset( $font_h3['font-size'] ) && $font_h3['font-size'] ) ? esc_attr( $font_h3['font-size'] ) : '1.5rem'; ?>;
	letter-spacing: <?php echo ( isset( $font_h3['letter-spacing'] ) && $font_h3['letter-spacing'] ) ? esc_attr( $font_h3['letter-spacing'] ) : '-.1rem'; ?>;
	text-transform: <?php echo ( isset( $font_h3['text-transform'] ) && $font_h3['text-transform'] ) ? esc_attr( $font_h3['text-transform'] ) : 'none'; ?>;
}

h4, .h4 {
	font-size: <?php echo ( isset( $font_h4['font-size'] ) && $font_h4['font-size'] ) ? esc_attr( $font_h4['font-size'] ) : '1.25rem'; ?>;
	letter-spacing: <?php echo ( isset( $font_h4['letter-spacing'] ) && $font_h4['letter-spacing'] ) ? esc_attr( $font_h4['letter-spacing'] ) : '-.05rem'; ?>;
	text-transform: <?php echo ( isset( $font_h4['text-transform'] ) && $font_h4['text-transform'] ) ? esc_attr( $font_h4['text-transform'] ) : 'none'; ?>;
}

h5, .h5 {
	font-size: <?php echo ( isset( $font_h5['font-size'] ) && $font_h5['font-size'] ) ? esc_attr( $font_h5['font-size'] ) : '1rem'; ?>;
	letter-spacing: <?php echo ( isset( $font_h5['letter-spacing'] ) && $font_h5['letter-spacing'] ) ? esc_attr( $font_h5['letter-spacing'] ) : '-.025rem'; ?>;
	text-transform: <?php echo ( isset( $font_h5['text-transform'] ) && $font_h5['text-transform'] ) ? esc_attr( $font_h5['text-transform'] ) : 'none'; ?>;
}

h6, .h6 {
	font-size: <?php echo ( isset( $font_h6['font-size'] ) && $font_h6['font-size'] ) ? esc_attr( $font_h6['font-size'] ) : '15px'; ?>;
	letter-spacing: <?php echo ( isset( $font_h6['letter-spacing'] ) && $font_h6['letter-spacing'] ) ? esc_attr( $font_h6['letter-spacing'] ) : '-1px'; ?>;
	text-transform: <?php echo ( isset( $font_h6['text-transform'] ) && $font_h6['text-transform'] ) ? esc_attr( $font_h6['text-transform'] ) : 'none'; ?>;
}

.amp-wp-article-content {
	counter-reset: h2;
}

.amp-wp-article-content h2 {
	counter-reset: h3;
}

.amp-wp-article-content h3 {
	counter-reset: h4;
}

.amp-wp-article-content h4 {
	counter-reset: h5;
}

.amp-wp-article-content h5 {
	counter-reset: h6;
}

.amp-wp-article-featured {
	position: relative;
	display: block;
	width: 100%;
	margin-bottom: 1rem;
}

.amp-wp-article-featured amp-carousel,
.amp-wp-article-featured .amp-embed-responsive,
.amp-wp-article-featured .amp-wp-article-featured-image {
	margin: 0 16px;
}

.amp-wp-enforced-sizes {
	/** Our sizes fallback is 100vw, and we have a padding on the container; the max-width here prevents the element from overflowing. **/
	max-width: 100%;
	margin: 0 auto;
}

.amp-wp-unknown-size img {
	/** Worst case scenario when we can't figure out dimensions for an image. **/
	/** Force the image into a box of fixed dimensions and use object-fit to scale. **/
	object-fit: contain;
}

/* Template Styles */

.amp-wp-content,
.amp-wp-title-bar div {
	<?php if ( $content_max_width > 0 ) : ?>
	margin: 0 auto;
	max-width: <?php echo esc_html( sprintf( '%dpx', $content_max_width ) ); ?>;
	<?php endif; ?>
}

body {
	background: <?php echo esc_html( sanitize_hex_color( $color_body_bg ) ); ?>;
	color: <?php echo esc_html( sanitize_hex_color( $color_text ) ); ?>;
	font-family: <?php echo wp_kses( $font_family, 'post' ); ?>;
	font-size: <?php echo ( isset( $font_base['font-size'] ) && $font_base['font-size'] ) ? esc_attr( $font_base['font-size'] ) : '16px'; ?>;
	font-weight: <?php echo ( isset( $font_base['font-weight'] ) && $font_base['font-weight'] ) ? esc_attr( $font_base['font-weight'] ) : 'regular'; ?>;
	letter-spacing: <?php echo ( isset( $font_base['letter-spacing'] ) && $font_base['letter-spacing'] ) ? esc_attr( $font_base['letter-spacing'] ) : '0'; ?>;
	line-height: 1.75em;
}

p,
ol,
ul,
figure {
	margin: 0 0 1em;
	padding: 0;
}

a,
a:visited {
	color: <?php echo esc_html( sanitize_hex_color( $color_links ) ); ?>;
	transition: 0.2s;
}


a:hover,
a:active,
a:focus {
	color: <?php echo esc_html( sanitize_hex_color( $color_links_hover ) ); ?>;
}

/* Quotes */

blockquote {
	color: <?php echo esc_html( sanitize_hex_color( $color_text ) ); ?>;
	background: rgba(127,127,127,.125);
	border-left: 2px solid <?php echo esc_html( sanitize_hex_color( $color_links ) ); ?>;
	margin: 8px 0 24px 0;
	padding: 16px;
}

blockquote p:last-child {
	margin-bottom: 0;
}

.site-title,
a.site-title {
	color: <?php echo esc_html( sanitize_hex_color( $color_logo ) ); ?>;
	transition: 0.2s;
}

.site-title:hover,
a.site-title:hover {
	color: <?php echo esc_html( sanitize_hex_color( $color_logo_hover ) ); ?>;
}

.site-description {
	color: <?php echo esc_html( sanitize_hex_color( $color_logo_desc ) ); ?>;
}

/* Header */
.amp-wp-header {
	background-color: <?php echo ( isset( $header_bg_object['background-color'] ) && $header_bg_object['background-color'] ) ? esc_attr( $header_bg_object['background-color'] ) : ( get_theme_mod( 'header_background', false ) ? '#FFFFFF' : 'transparent' ); ?>;
	background-image: <?php echo ( isset( $header_bg_object['background-image'] ) && $header_bg_object['background-image'] ) ? esc_attr( sprintf( 'url(%s)', $header_bg_object['background-image'] ) ) : 'none'; ?>;
	background-position: <?php echo ( isset( $header_bg_object['background-position'] ) && $header_bg_object['background-position'] ) ? esc_attr( $header_bg_object['background-position'] ) : 'center center'; ?>;
	background-repeat: <?php echo ( isset( $header_bg_object['background-repeat'] ) && $header_bg_object['background-repeat'] ) ? esc_attr( $header_bg_object['background-repeat'] ) : 'no-repeat'; ?>;
	background-size: <?php echo ( isset( $header_bg_object['background-size'] ) && $header_bg_object['background-size'] ) ? esc_attr( $header_bg_object['background-size'] ) : 'cover'; ?>;
	background-attachment: <?php echo ( isset( $header_bg_object['background-attachment'] ) && $header_bg_object['background-attachment'] ) ? esc_attr( $header_bg_object['background-attachment'] ) : 'scroll'; ?>;
	padding: 0 20px;
}

.amp-wp-header .navbar-content {
	border-bottom: 1px solid <?php echo esc_html( sanitize_hex_color( $color_borders ) ); ?>;
	margin: 0 auto;
	max-width: calc(840px - 32px);
	position: relative;
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	-webkit-box-align: center;
	-ms-flex-align: center;
	align-items: center;
	position: relative;
	padding: 20px 0;
}

.amp-wp-header .navbar-brand {
	display: inline-block;
	margin-bottom: 0;
	line-height: inherit;
	white-space: nowrap;
	margin-left: auto;
	margin-right: auto;
}

.amp-wp-header .navbar-brand{
	text-decoration: none;
	transition: 0.2s;
}

@media (min-width: 760px) {
	.amp-wp-header .navbar-brand {
		margin-left: 0;
		margin-right: 1rem;
	}
}

.amp-wp-header .site-title {
	font-family: <?php echo wp_kses( $font_family, 'post' ); ?>;
	font-weight: <?php echo ( isset( $font_header_logo['font-weight'] ) && $font_header_logo['font-weight'] ) ? esc_attr( $font_header_logo['font-weight'] ) : '600'; ?>;
	font-size: <?php echo ( isset( $font_header_logo['font-size'] ) && $font_header_logo['font-size'] ) ? esc_attr( $font_header_logo['font-size'] ) : '2rem'; ?>;
	letter-spacing: <?php echo ( isset( $font_header_logo['letter-spacing'] ) && $font_header_logo['letter-spacing'] ) ? esc_attr( $font_header_logo['letter-spacing'] ) : '-0.1rem'; ?>;
	text-transform: <?php echo ( isset( $font_header_logo['text-transform'] ) && $font_header_logo['text-transform'] ) ? esc_attr( $font_header_logo['text-transform'] ) : 'none'; ?>;
	line-height: <?php echo ( isset( $font_header_logo['line-height'] ) && $font_header_logo['line-height'] ) ? esc_attr( $font_header_logo['line-height'] ) : '1'; ?>;
	text-decoration: none;
}

.amp-wp-header .navbar-text {
	display: inline-block;
	margin-bottom: 0;
}

.amp-wp-header .site-description {
	display: none;
	padding-left: 1.5rem;
	font-weight: <?php echo ( isset( $font_header_desc['font-weight'] ) && $font_header_desc['font-weight'] ) ? esc_attr( $font_header_desc['font-weight'] ) : '300'; ?>;
	font-size: <?php echo ( isset( $font_header_desc['font-size'] ) && $font_header_desc['font-size'] ) ? esc_attr( $font_header_desc['font-size'] ) : '14px'; ?>;
	letter-spacing: <?php echo ( isset( $font_header_desc['letter-spacing'] ) && $font_header_desc['letter-spacing'] ) ? esc_attr( $font_header_desc['letter-spacing'] ) : '-.2px'; ?>;
	text-transform: <?php echo ( isset( $font_header_desc['text-transform'] ) && $font_header_desc['text-transform'] ) ? esc_attr( $font_header_desc['text-transform'] ) : 'none'; ?>;
	margin: 0;
}

@media (min-width: 760px) {
	.amp-wp-header .site-description {
		display: inline-block;
	}
}

/* Article */

.amp-wp-article {
	color: <?php echo esc_html( sanitize_hex_color( $color_text ) ); ?>;
	font-weight: 400;
	margin: 3em auto;
	max-width: 840px;
	list-style: none;
	overflow-wrap: break-word;
	word-wrap: break-word;
}

/* Article Header */

.amp-wp-article-header {
	align-items: center;
	align-content: stretch;
	display: flex;
	flex-wrap: wrap;
	margin: 1.5em 16px;
}

.amp-wp-title {
	color: <?php echo esc_html( sanitize_hex_color( $color_headings ) ); ?>;
	display: block;
	flex: 1 0 100%;
	font-weight: 600;
	margin: 0 0 .625em;
	width: 100%;
}

/* Article Meta */

.amp-wp-meta {
	color: <?php echo esc_html( sanitize_hex_color( $color_secondary ) ); ?>;
	display: inline-block;
	font-size: .875em;
	line-height: 1.5em;
	padding: 0;
}

.amp-wp-article-header .amp-wp-meta:last-of-type {
	margin-left: 16px;
	text-align: right;
}

.amp-wp-article-header .amp-wp-meta:first-of-type {
	text-align: left;
}

.amp-wp-byline amp-img,
.amp-wp-byline .amp-wp-author {
	display: inline-block;
	vertical-align: middle;
}

.amp-wp-byline amp-img {
	border: 1px solid <?php echo esc_html( sanitize_hex_color( $color_links ) ); ?>;
	border-radius: 50%;
	position: relative;
	margin-right: 6px;
}

.amp-wp-posted-on {
	text-align: right;
}

/* Featured image */

.amp-wp-article-featured-image amp-img {
	margin: 0 auto;
}


/* Article Content */

.amp-wp-article-content {
	margin: 0 16px;
}

.amp-wp-article-content figure {
	max-width: 100%;
}

.amp-wp-article-content ul,
.amp-wp-article-content ol {
	margin-left: 1em;
}

.amp-wp-article-content amp-img {
	margin: 0 auto;
}

.amp-wp-article-content amp-img.alignright {
	margin: 0 0 1em 16px;
}

.amp-wp-article-content amp-img.alignleft {
	margin: 0 16px 1em 0;
}

/* Captions */

.wp-caption {
	padding: 0;
}

.wp-caption.alignleft {
	margin-right: 16px;
}

.wp-caption.alignright {
	margin-left: 16px;
}

.wp-caption .wp-caption-text {
	border-bottom: 1px solid <?php echo esc_html( sanitize_hex_color( $color_borders ) ); ?>;
	color: <?php echo esc_html( sanitize_hex_color( $color_secondary ) ); ?>;
	font-size: .875em;
	line-height: 1.5em;
	margin: 0;
	padding: .66em 10px .75em;
}

/* AMP Media */

amp-carousel {
	background: <?php echo esc_html( sanitize_hex_color( $color_borders ) ); ?>;
	margin: 0 0 1.5em;
}
amp-iframe,
amp-youtube,
amp-instagram,
amp-vine {
	background: <?php echo esc_html( sanitize_hex_color( $color_borders ) ); ?>;
	margin: 0 0 1.5em;
}

.amp-wp-article-content amp-carousel amp-img {
	border: none;
}

amp-carousel > amp-img > img {
	object-fit: contain;
}

.amp-wp-iframe-placeholder {
	background: <?php echo esc_html( sanitize_hex_color( $color_borders ) ); ?> url( <?php echo esc_url( $this->get( 'placeholder_image_url' ) ); ?> ) no-repeat center 40%;
	background-size: 48px 48px;
	min-height: 48px;
}

/* Article Footer Meta */

.amp-wp-article-footer .amp-wp-meta {
	display: block;
}

.amp-wp-tax-category,
.amp-wp-tax-tag {
	color: <?php echo esc_html( sanitize_hex_color( $color_headings ) ); ?>;
	font-size: .875em;
	line-height: 1.5em;
	margin: 1.5em 16px;
}

.amp-wp-comments-link {
	text-align: center;
	margin: 3em 0;
}

.amp-wp-comments-link a {
	display: inline-block;
	border: none;
	font-weight: 700;
	text-align: center;
	white-space: nowrap;
	vertical-align: middle;
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
	cursor: pointer;
	border: 1px solid transparent;
	padding: 0.85rem 1.5rem;
	line-height: 1.5;
	text-decoration: none;
	font-size: 10px;
	letter-spacing: 2px;
	text-transform: uppercase;
	transition: 0.2s;
}

.pk-share-buttons-wrap .pk-share-buttons-link {
	border-radius: 0;
}

/* AMP Footer */

.amp-wp-footer {
	background: <?php echo esc_html( sanitize_hex_color( $color_footer_bg ) ); ?>;
	color: <?php echo esc_html( sanitize_hex_color( $color_footer_text ) ); ?>;
	border-top: 1px solid <?php echo esc_html( sanitize_hex_color( $color_footer_border ) ); ?>;
	margin-top: 3rem;
	padding: 3rem 0;
}

.amp-wp-footer .site-info {
	position: relative;
	padding-right: 20px;
	padding-left: 20px;
	margin-right: auto;
	margin-left: auto;
	max-width: calc(840px - 32px);
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	flex-direction: column;
	-webkit-box-pack: justify;
	-ms-flex-pack: justify;
	justify-content: space-between;
}

.amp-wp-footer .site-title {
	font-family: <?php echo wp_kses( $font_family, 'post' ); ?>;
	font-weight: <?php echo ( isset( $font_footer_logo['font-weight'] ) && $font_footer_logo['font-weight'] ) ? esc_attr( $font_footer_logo['font-weight'] ) : '600'; ?>;
	font-size: <?php echo ( isset( $font_footer_logo['font-size'] ) && $font_footer_logo['font-size'] ) ? esc_attr( $font_footer_logo['font-size'] ) : '1.75rem'; ?>;
	letter-spacing: <?php echo ( isset( $font_footer_logo['letter-spacing'] ) && $font_footer_logo['letter-spacing'] ) ? esc_attr( $font_footer_logo['letter-spacing'] ) : '-0.05rem'; ?>;
	text-transform: <?php echo ( isset( $font_footer_logo['text-transform'] ) && $font_footer_logo['text-transform'] ) ? esc_attr( $font_footer_logo['text-transform'] ) : 'none'; ?>;
	line-height: <?php echo ( isset( $font_footer_logo['line-height'] ) && $font_footer_logo['line-height'] ) ? esc_attr( $font_footer_logo['line-height'] ) : '1'; ?>;
	text-decoration: none;
	margin-bottom: 1rem;
}

.amp-wp-footer p {
	font-size: .8em;
	margin: 0;
}

.amp-wp-footer a {
	color: <?php echo esc_html( sanitize_hex_color( $color_footer_link ) ); ?>;
}

.amp-wp-footer a:hover {
	color: <?php echo esc_html( sanitize_hex_color( $color_footer_link_hover ) ); ?>;
	text-decoration: none;
}

.back-to-top {
	bottom: 1.275em;
	font-size: .8em;
	font-weight: 600;
	line-height: 2em;
	position: absolute;
	right: 16px;
}

/* Header light */

.header-light .site-title {
	color: white;
}

.header-light .site-title:hover {
	color: rgba(255,255,255,0.75);
}

.header-light .site-description {
	color: rgba(255,255,255,0.75);
}

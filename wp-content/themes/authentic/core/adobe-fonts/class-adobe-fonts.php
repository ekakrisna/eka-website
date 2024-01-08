<?php
/**
 * Adobe Fonts
 *
 * @package Authentic
 */

if ( ! class_exists( 'CSCO_Adobe_Fonts' ) ) {
	/**
	 * Adobe Fonts Class
	 */
	class CSCO_Adobe_Fonts {

		/**
		 * Font base.
		 *
		 * This is used in case of Elementor's Font param
		 *
		 * @var string
		 */
		private static $font_base = 'csco-adobe-fonts';

		/**
		 * The class constructor
		 */
		public function __construct() {
			/** Include files */
			require_once get_theme_file_path( '/core/adobe-fonts/class-adobe-fonts-helper.php' );

			/** Initialize actions */
			add_action( 'csco_theme_dashboard_tabs', array( $this, 'register_settings' ) );
			add_filter( 'csco_customizer_output_styles', array( $this, 'change_font_family_stack' ), 999 );
			add_filter( 'csco_customizer_fonts_choices', array( $this, 'customizer_fonts_choices' ), 20 );
			add_filter( 'language_attributes', array( $this, 'html_attributes' ), 10, 2 );
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_adobe_fonts' ), 999 );
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_adobe_fonts' ), 999 );
		}

		/**
		 * Add settings to dashboard
		 *
		 * @param array $tabs The tabs.
		 */
		public function register_settings( $tabs ) {

			$tabs[] = array(
				'slug'     => 'adobe-fonts',
				'label'    => esc_html__( 'Adobe Fonts', 'authentic' ),
				'priority' => 10,
				'content'  => $this->render_settings(),
			);

			return $tabs;
		}

		/**
		 * Render settings
		 */
		public function render_settings() {
			ob_start();

			$this->save_options_page();
			$this->synchronization();
			?>
			<div class="form-wrap">
				<form class="wrap" method="post">
					<!-- Instructions -->
					<p>
						<h2><?php esc_html_e( 'Instructions', 'authentic' ); ?></h2>
						<ol>
							<li><?php esc_html_e( 'Log in to your', 'authentic' ); ?> <?php echo sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( 'https://fonts.adobe.com/' ), esc_html__( 'Adobe Fonts account', 'authentic' ) ); ?></li>
							<li><?php esc_html_e( 'To get your API key, go to link', 'authentic' ); ?> <?php echo sprintf( '<a href="%1$s" target="_blank">%1$s</a>', esc_url( 'https://fonts.adobe.com/account/tokens' ) ); ?></li>
							<li><?php esc_html_e( 'Copy your "Token" under the "Your API tokens" label.', 'authentic' ); ?></li>
						</ol>
					</p>
					<!-- Token -->
					<p>
						<label for="csco_adobe_fonts_token"><?php esc_html_e( 'Token', 'authentic' ); ?></label>
						<input class="regular-text" name="csco_adobe_fonts_token" id="csco_adobe_fonts_token" type="text" value="<?php echo esc_attr( get_option( 'csco_adobe_fonts_token' ) ); ?>">
					</p>
					<!-- Kits -->
					<?php
					$token = get_option( 'csco_adobe_fonts_token' );

					if ( $token ) {
						?>
						<p>
							<?php
							$adobe_fonts_data = CSCO_Adobe_Fonts_Helper::get( null, $token );

							if ( $adobe_fonts_data && isset( $adobe_fonts_data['kits'] ) && $adobe_fonts_data['kits'] ) {
								?>
								<label for="csco_adobe_fonts_kit"><?php esc_html_e( 'Kits', 'authentic' ); ?></label>
								<select class="regular-text" name="csco_adobe_fonts_kit" id="csco_adobe_fonts_kit">
									<option value=""><?php esc_html_e( '- not selected -', 'authentic' ); ?></option>
									<?php
									foreach ( $adobe_fonts_data['kits'] as $item ) :

										$data_kit = CSCO_Adobe_Fonts_Helper::get( $item['id'], $token );
										?>
										<option <?php selected( $item['id'], get_option( 'csco_adobe_fonts_kit' ) ); ?> value="<?php echo esc_attr( $item['id'] ); ?>"><?php echo esc_html( $data_kit['kit']['name'] ); ?></option>
									<?php endforeach; ?>
								</select>
							<?php } else { ?>
								<code><?php esc_html_e( 'Invalid token or no font kits created.', 'authentic' ); ?></code>
							<?php } ?>
						</p>
					<?php } ?>

					<?php wp_nonce_field(); ?>

					<p class="submit"><input class="button button-primary" name="adobe_fonts_save_settings" type="submit" value="<?php esc_html_e( 'Save Changes', 'authentic' ); ?>" /></p>
				</form>

				<?php if ( isset( $adobe_fonts_data['kits'] ) && $adobe_fonts_data['kits'] ) { ?>
					<form method="post" class="form-reset">
						<?php wp_nonce_field(); ?>

						<p class="submit"><input class="button" name="adobe_fonts_reset_cache" type="submit" value="<?php esc_html_e( 'Synchronize', 'authentic' ); ?>" /></p>
					</form>
				<?php } ?>
			</div>
			<?php
			return ob_get_clean();
		}

		/**
		 * Settings save
		 */
		protected function save_options_page() {
			if ( ! isset( $_POST['_wpnonce'] ) || ! wp_verify_nonce( $_POST['_wpnonce'] ) ) { // Input var ok; sanitization ok.
				return;
			}

			if ( isset( $_POST['adobe_fonts_save_settings'] ) ) { // Input var ok.

				if ( isset( $_POST['csco_adobe_fonts_token'] ) ) { // Input var ok.
					$adobe_fonts_token = sanitize_text_field( wp_unslash( $_POST['csco_adobe_fonts_token'] ) ); // Input var ok.
				}

				if ( isset( $_POST['csco_adobe_fonts_kit'] ) ) { // Input var ok.
					$adobe_fonts_kit = sanitize_text_field( wp_unslash( $_POST['csco_adobe_fonts_kit'] ) ); // Input var ok.
				}

				if ( isset( $adobe_fonts_token ) && get_option( 'csco_adobe_fonts_token' ) !== $adobe_fonts_token ) {
					$this->synchronization( true );
				}

				if ( isset( $adobe_fonts_token ) ) {
					update_option( 'csco_adobe_fonts_token', $adobe_fonts_token );
				}

				if ( isset( $adobe_fonts_kit ) ) {
					update_option( 'csco_adobe_fonts_kit', $adobe_fonts_kit );
				}

				printf( '<div id="message" class="updated fade"><p><strong>%s</strong></p></div>', esc_html__( 'Settings saved successfully.', 'authentic' ) );
			}
		}

		/**
		 * Synchronization
		 *
		 * @param boool $forcibly Forcibly Synchronization.
		 */
		protected function synchronization( $forcibly = false ) {
			if ( ! isset( $_POST['_wpnonce'] ) || ! wp_verify_nonce( $_POST['_wpnonce'] ) ) { // Input var ok; sanitization ok.
				return;
			}

			if ( isset( $_POST['adobe_fonts_reset_cache'] ) || $forcibly ) { // Input var ok.
				global $wpdb;

				$wpdb->query( "DELETE FROM $wpdb->options WHERE option_name LIKE 'csco_adobe_fonts_data_%%'" ); // db call ok; no-cache ok.

				printf( '<div id="message" class="updated fade"><p><strong>%s</strong></p></div>', esc_html__( 'Font kits synchronized.', 'authentic' ) );
			}
		}

		/**
		 * Get fonts output.
		 */
		public function get_fonts_output() {

			$fonts = array();

			$token = get_option( 'csco_adobe_fonts_token' );
			$kit   = get_option( 'csco_adobe_fonts_kit' );

			if ( $token && $kit ) {

				$data = wp_cache_get( 'csco_adobe_fonts_kit_cache' );

				if ( ! $data ) {
					$data = CSCO_Adobe_Fonts_Helper::get( $kit, $token );

					wp_cache_set( 'csco_adobe_fonts_kit_cache', $data, 'authentic', 1 );
				}

				if ( $data && isset( $data['kit']['families'] ) && $data['kit']['families'] ) {

					foreach ( $data['kit']['families'] as $item ) {
						$id = $item['slug'];

						$fonts[ $id ] = $item;
					}
				}
			}

			return $fonts;
		}

		/**
		 * Add new fonts for choices
		 *
		 * @param array $fonts List fonts.
		 */
		public function customizer_fonts_choices( $fonts ) {

			if ( is_customize_preview() ) {

				$fonts_list = $this->get_fonts_output();

				if ( $fonts_list ) {
					$fonts['fonts']['families']['adobe'] = array(
						'text'     => esc_html__( 'Adobe Fonts', 'authentic' ),
						'children' => array(),
					);

					foreach ( $fonts_list as $item ) {
						$id = isset( $item['css_names'][0] ) ? $item['css_names'][0] : $item['slug'];

						$fonts['fonts']['families']['adobe']['children'][] = array(
							'id'   => $id,
							'text' => $item['name'],
						);

						$fonts['fonts']['variants'][ $id ] = CSCO_Adobe_Fonts_Helper::font_variations_format( $item['variations'] );
					}
				}
			}

			return $fonts;
		}

		/**
		 * Filters the language attributes for display in the html tag.
		 *
		 * @param string $output A space-separated list of language attributes.
		 * @param string $doctype The type of html document (xhtml|html).
		 */
		public function html_attributes( $output, $doctype ) {
			$token = get_option( 'csco_adobe_fonts_token' );
			$kit   = get_option( 'csco_adobe_fonts_kit' );

			if ( $token && $kit && ! is_admin() ) {
				$output .= ' class="wf-loading"';
			}

			return $output;
		}

		/**
		 * Change font-family stack.
		 *
		 * @param string $style The output styles.
		 */
		public function change_font_family_stack( $style ) {
			$token = get_option( 'csco_adobe_fonts_token' );
			$kit   = get_option( 'csco_adobe_fonts_kit' );

			if ( $token && $kit ) {
				$adobe_fonts_data = CSCO_Adobe_Fonts_Helper::get( $kit, $token );
				if ( isset( $adobe_fonts_data['kit']['families'] ) && $adobe_fonts_data['kit']['families'] ) {
					foreach ( $adobe_fonts_data['kit']['families'] as $family ) {
						$slug  = sprintf( 'font-family:%s', $family['slug'] );
						$stack = sprintf( 'font-family:%s', $family['css_stack'] );
						// Replace font slug to css stack.
						$style = str_replace( $slug, $stack, $style );
					}
				}
			}

			return $style;
		}

		/**
		 * Enqueue Adobe fonts.
		 *
		 * @param string $page Current page.
		 */
		public function enqueue_adobe_fonts( $page ) {
			if ( 'admin_enqueue_scripts' === current_filter() ) {
				if ( 'post.php' !== $page && 'post-new.php' !== $page ) {
					return;
				}
				if ( is_customize_preview() ) {
					return;
				}
			}

			$token = get_option( 'csco_adobe_fonts_token' );
			$kit   = get_option( 'csco_adobe_fonts_kit' );

			if ( $token && $kit ) {
				wp_enqueue_script( 'csco-adobe-fonts', get_theme_file_uri( '/core/adobe-fonts/assets/adobe-fonts.js' ), array(), filemtime( get_theme_file_path( '/core/adobe-fonts/assets/adobe-fonts.js' ) ), true );

				wp_localize_script( 'csco-adobe-fonts', 'cscoAdobeFontsConfig', array(
					'kit' => $kit,
				) );
			}
		}
	}

	new CSCO_Adobe_Fonts();
}

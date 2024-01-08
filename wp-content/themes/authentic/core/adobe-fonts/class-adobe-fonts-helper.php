<?php
/**
 * Adobe Fonts Helper
 *
 * @package Authentic
 */

if ( ! class_exists( 'CSCO_Adobe_Fonts_Helper' ) ) {
	/**
	 * Adobe Fonts Helper Class
	 */
	class CSCO_Adobe_Fonts_Helper {

		/**
		 * Api link.
		 *
		 * @var string $api link.
		 */
		private static $api = 'https://typekit.com/api/v1/json/kits/';

		/**
		 * Convert variant slug to font data.
		 *
		 * @param string $variant The variant slug.
		 * @param bool   $compact The style data return.
		 */
		public static function font_convert_format( $variant, $compact = false ) {

			$format = array(
				'n1' => array(
					'weight' => '100',
					'style'  => 'normal',
				),
				'i1' => array(
					'weight' => '100',
					'style'  => 'italic',
				),
				'n2' => array(
					'weight' => '200',
					'style'  => 'normal',
				),
				'i2' => array(
					'weight' => '200',
					'style'  => 'italic',
				),
				'n3' => array(
					'weight' => '300',
					'style'  => 'normal',
				),
				'i3' => array(
					'weight' => '300',
					'style'  => 'italic',
				),
				'n4' => array(
					'weight' => 'normal',
					'style'  => 'normal',
				),
				'i4' => array(
					'weight' => 'normal',
					'style'  => 'italic',
				),
				'n5' => array(
					'weight' => '500',
					'style'  => 'normal',
				),
				'i5' => array(
					'weight' => '500',
					'style'  => 'italic',
				),
				'n6' => array(
					'weight' => '600',
					'style'  => 'normal',
				),
				'i6' => array(
					'weight' => '600',
					'style'  => 'italic',
				),
				'n7' => array(
					'weight' => '700',
					'style'  => 'normal',
				),
				'i7' => array(
					'weight' => '700',
					'style'  => 'italic',
				),
				'n8' => array(
					'weight' => '800',
					'style'  => 'normal',
				),
				'i8' => array(
					'weight' => '800',
					'style'  => 'italic',
				),
				'n9' => array(
					'weight' => '900',
					'style'  => 'normal',
				),
				'i9' => array(
					'weight' => '900',
					'style'  => 'italic',
				),
			);

			if ( isset( $format[ $variant ] ) ) {

				if ( $compact ) {
					return $format[ $variant ]['weight'] . $format[ $variant ]['style'];
				} else {
					return $format[ $variant ];
				}
			}

			return $variant;
		}

		/**
		 * Registers font variations format.
		 *
		 * @param array $variations If you want to return a specific option.
		 * @return array
		 */
		public static function font_variations_format( $variations = array() ) {

			if ( $variations && isset( $variations ) ) {
				foreach ( $variations as $key => $item ) {
					$format_compact = self::font_convert_format( $item, true );

					$format_compact = preg_replace( '/normalnormal/', 'regular', $format_compact );
					$format_compact = preg_replace( '/normalitalic/', 'italic', $format_compact );
					$format_compact = preg_replace( '/(\d*)normal/', '$1', $format_compact );

					$variations[ $key ] = $format_compact;
				}
				return $variations;
			}

			return $format;
		}


		/**
		 * Make a request and read the response. If succesful,
		 * a tuple of HTTP status code and response data is
		 * returned. If an error occurs NULL is returned.
		 *
		 * @param number $path Path.
		 * @param string $token Token.
		 * @return (number, string)|null
		 */
		private static function make_request( $path, $token ) {

			$remote_get = wp_remote_get(
				$path, array(
					'headers' => array(
						'Accept'          => 'application/json',
						'Host'            => 'typekit.com',
						'X-Typekit-Token' => $token,
					),
				)
			);

			if ( ! is_wp_error( $remote_get ) || wp_remote_retrieve_response_code( $remote_get ) === 200 ) {
				return array( '200', $remote_get['body'] );
			} else {
				return null;
			}
		}

		/**
		 * Get one or more kits. If kit identifier is not given
		 * all kits are returned.
		 *
		 * @param string $id     The kit identifier (optional).
		 * @param string $token  Your Adobe Fonts API token (optional).
		 * @param bool   $cached Cache result.
		 * @return string|null NULL if retrieving the kit(s) failed, otherwise it return the data.
		 */
		public static function get( $id = null, $token = null, $cached = true ) {

			$transient = sprintf( 'csco_adobe_fonts_data_%s_s', $id, $token );

			$data = $cached ? get_option( $transient ) : null;

			if ( null === $data || false === $data ) {

				if ( ! is_null( $id ) ) {
					if ( ! is_null( $token ) ) {
						$result = self::make_request( self::$api . $id . '/', $token );
					} else {
						$result = self::make_request( self::$api . $id . '/published', $token );
					}
				} else {
					$result = self::make_request( self::$api, $token );
				}

				if ( ! is_null( $result ) ) {
					list($status, $data) = $result;

					if ( '200' === $status ) {
						$data = json_decode( $data, true );
					}
				}

				update_option( $transient, $data, false );
			}

			return $data;
		}
	}
}

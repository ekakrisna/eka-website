<?php
/**
 * Customizer Sortable
 *
 * @package Authentic
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'CSCO_Customize_Sortable_Control' ) ) {
	/**
	 * Class Customize sortable
	 */
	class CSCO_Customize_Sortable_Control extends WP_Customize_Control {

		/**
		 * The field type.
		 *
		 * @var string
		 */
		public $type = 'sortable';

		/**
		 * Render the control's content.
		 */
		protected function render_content() {}

		/**
		 * An Underscore (JS) template for this control's content (but not its container).
		 *
		 * Class variables for this control class are available in the `data` JS object;
		 * export custom variables by overriding {@see WP_Customize_Control::to_json()}.
		 *
		 * @see WP_Customize_Control::print_template()
		 *
		 * @access protected
		 */
		protected function content_template() {
			?>
			<label class='csco-sortable'>
				<span class="customize-control-title">
					{{{ data.label }}}
				</span>
				<# if ( data.description ) { #>
					<span class="description customize-control-description">{{{ data.description }}}</span>
				<# } #>

				<ul class="sortable">
					<# _.each( data.value, function( choiceID ) { #>
						<li {{{ data.inputAttrs }}} class='csco-sortable-item' data-value='{{ choiceID }}'>
							<i class='dashicons dashicons-menu'></i>
							<i class="dashicons dashicons-visibility visibility"></i>
							{{{ data.choices[ choiceID ] }}}
						</li>
					<# }); #>
					<# _.each( data.choices, function( choiceLabel, choiceID ) { #>
						<# if ( -1 === data.value.indexOf( choiceID ) ) { #>
							<li {{{ data.inputAttrs }}} class='csco-sortable-item invisible' data-value='{{ choiceID }}'>
								<i class='dashicons dashicons-menu'></i>
								<i class="dashicons dashicons-visibility visibility"></i>
								{{{ data.choices[ choiceID ] }}}
							</li>
						<# } #>
					<# }); #>
				</ul>
			</label>
			<?php
		}

		/**
		 * Sets the $sanitize_callback
		 *
		 * @access protected
		 */
		protected function sanitize_callback() {

			// If a custom sanitize_callback has been defined,
			// then we don't need to proceed any further.
			if ( ! empty( $this->sanitize_callback ) ) {
				return;
			}
			$this->sanitize_callback = array( $this, 'sanitize' );
		}

		/**
		 * Sanitizes sortable values.
		 *
		 * @access public
		 * @param array $value The checkbox value.
		 * @return array
		 */
		public function sanitize( $value = array() ) {
			if ( is_string( $value ) || is_numeric( $value ) ) {
				return array(
					sanitize_text_field( $value ),
				);
			}
			$sanitized_value = array();
			foreach ( $value as $sub_value ) {
				if ( isset( $this->choices[ $sub_value ] ) ) {
					$sanitized_value[] = sanitize_text_field( $sub_value );
				}
			}
			return $sanitized_value;
		}


		/**
		 * Refresh the parameters passed to the JavaScript via JSON.
		 *
		 * @see WP_Customize_Control::to_json()
		 */
		public function to_json() {
			parent::to_json();

			// Default value.
			$this->json['default'] = $this->setting->default;

			if ( isset( $this->default ) ) {
				$this->json['default'] = $this->default;
			}

			// Value.
			$this->json['value'] = $this->value();

			// The link.
			$this->json['link'] = $this->get_link();

			// Choices.
			$this->json['choices'] = $this->choices;
		}
	}
}

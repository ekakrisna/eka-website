<?php
/**
 * Customizer Preset
 *
 * @package Authentic
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'CSCO_Customize_Preset_Control' ) ) {
	/**
	 * Class Customize preset
	 */
	class CSCO_Customize_Preset_Control extends WP_Customize_Control {

		/**
		 * The field type.
		 *
		 * @var string
		 */
		public $type = 'preset';

		/**
		 * The field preset.
		 *
		 * @var array
		 */
		public $preset = array();

		/**
		 * Constructor.
		 *
		 * @param WP_Customize_Manager $manager Customizer bootstrap instance.
		 * @param string               $id      Control ID.
		 * @param array                $args    The args.
		 */
		public function __construct( $manager, $id, $args = array() ) {

			parent::__construct( $manager, $id, $args );

			// Set preset from the choices.
			$this->preset = $this->choices;

			// We're using a flat select.
			foreach ( $this->choices as $key => $args ) {
				$this->choices[ $key ] = $args['label'];
			}
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

			// Preset.
			$this->json['preset'] = $this->preset;

			// The ID.
			$this->json['id'] = $this->id;
		}

		/**
		 * Render the control's content.
		 */
		protected function render_content() {
			if ( empty( $this->choices ) ) {
				return;
			}

			$input_id         = '_customize-input-' . $this->id;
			$description_id   = '_customize-description-' . $this->id;
			$describedby_attr = ( ! empty( $this->description ) ) ? ' aria-describedby="' . esc_attr( $description_id ) . '" ' : '';
			?>
			<?php if ( ! empty( $this->label ) ) : ?>
				<label for="<?php echo esc_attr( $input_id ); ?>" class="customize-control-title"><?php echo esc_html( $this->label ); ?></label>
			<?php endif; ?>
			<?php if ( ! empty( $this->description ) ) : ?>
				<span id="<?php echo esc_attr( $description_id ); ?>" class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
			<?php endif; ?>

			<select id="<?php echo esc_attr( $input_id ); ?>" <?php echo wp_kses( $describedby_attr, 'post' ); ?> <?php $this->link(); ?>>
				<?php
				foreach ( $this->choices as $value => $label ) {
					echo '<option value="' . esc_attr( $value ) . '"' . selected( $this->value(), $value, false ) . '>' . esc_html( $label ) . '</option>';
				}
				?>
			</select>
			<?php
		}
	}
}

<?php
  if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

  if (isset($option)) {
    $option_type = isset( $option['type'] ) ? $option['type'] : '';
    $option_id = isset( $option['id'] ) ? $this->settings_name . '[' . $option['id'] . ']' : '';
    $option_css = sanitize_html_class( $this->settings_name . '_' . $option['id'] );

    $option_options = isset( $option['options'] ) ? $option['options'] : '';

    $attributes = array();
    if ( isset( $option['attributes'] ) && is_array( $option['attributes'] ) ) {
      foreach ( $option['attributes'] as $attribute_name => $attribute_value ) {
        $attributes[] = esc_attr( $attribute_name ) . '="' . esc_attr( $attribute_value ) . '"';
      }
    }

    $value = wpsight_get_option( $option['id'] );
    if( !isset( $value ) && isset( $option['default'] ) ) $value = $option['default'];
?>

  <div class="wpsight-settings-field wpsight-settings-field-<?php echo esc_attr( $option_type ); ?>">
    <select id="setting-<?php echo esc_attr( $option_css ); ?>" class="regular-text" name="<?php echo esc_attr( $option_id ); ?>" <?php echo esc_attr( implode( ' ', $attributes ) ); ?>><?php
      foreach( $option_options as $key => $name )
        echo '<option value="' . esc_attr( $key ) . '" ' . selected( $value, $key, false ) . '>' . esc_html( $name ) . '</option>'; ?>
    </select>
  </div>

<?php } ?>

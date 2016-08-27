<?php
namespace BEA\WPMN\Shortcodes;

class Margin_Notes extends Shortcode {

	/**
	 * Shortcode tag
	 */
	protected $tag = 'margin_notes';

	/**
	 * List of supported attributes and their defaults
	 *
	 * @var array
	 */
	protected $defaults = array(
		'tag' => 'span',
		'desc' => ''
	);

	/**
	 * Display shortcode content
	 *
	 * @param array $attributes
	 * @return bool|string
	 */
	public function render( $attributes = array(), $content = '' ) {
		if ( empty( $content ) || ! isset( $attributes['desc'] ) ) {
			return '';
		}
		$attr = $this->attributes( $attributes );

		$output = sprintf( '<%1$s class="margin_notes" desc="%2$s">%3$s</%1$s>',
			esc_attr( $attr['tag'] ),
			esc_html( $attr['desc'] ),
			esc_html( $content )
		);

		return $output;
	}
}
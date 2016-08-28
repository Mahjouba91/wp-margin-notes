<?php
namespace BEA\WPMN\Shortcodes;

class Margin_Notes extends Shortcode {

	/**
	 * Shortcode tag
	 */
	protected $tag = 'margin_notes';

	/**
	 * Flag for shortcake module
	 */
	protected $shortcake_enabled = true;

	/**
	 * List of supported attributes and their defaults
	 *
	 * @var array
	 */
	protected $defaults = array(
		'tag' => 'span',
		'link' => '',
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

		// Create the HTML output
		$output = sprintf( '<%1$s %4$s class="margin_notes" desc="%2$s">%3$s</%1$s>',
			esc_attr( $attr['tag'] ),
			esc_html( $attr['desc'] ),
			esc_html( $content ),
			( $attr['tag'] === 'a' && ! empty( $attr['link'] ) ) ? 'href=' . esc_url( $attr['link'] ) : ''
		);

		return $output;
	}

	protected function add_shortcake_support() {
		$this->register_shortcode_ui( array(

			// Display label. String. Required.
			'label' => 'Margin Notes',

			// Icon/image for shortcode. Optional. src or dashicons-$icon. Defaults to carrot.
			'listItemImage' => 'dashicons-editor-quote',

			// Available shortcode attributes and default values. Required. Array.
			// Attribute model expects 'attr', 'type' and 'label'
			// Supported field types: text, checkbox, textarea, radio, select, email, url, number, and date.
			'attrs' => array(
				array(
					'label'       => 'Margin Note',
					'attr'        => 'desc',
					'type' => 'textarea',
					'description' => 'The text of the margin note',
				),
				array(
					'label'       => 'HTML Tag',
					'attr'        => 'tag',
					'type' => 'select',
					'options' => array(
						'span' => 'Span',
						'em' => 'Em',
						'strong' => 'Strong',
						'a' => 'Link (a)',
					),
					'description' => 'Optional',
				),
				array(
					'label'       => 'Link',
					'attr'        => 'link',
					'type' => 'url',
					'description' => 'The url of the link if you choose "a" tag',
				),
			),
			'inner_content' => array(
				'label' => 'Text',
			),
		) );
	}

}
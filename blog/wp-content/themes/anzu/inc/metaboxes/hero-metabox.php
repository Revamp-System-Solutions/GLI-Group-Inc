<?php 

class anzu_hero {
	private $config = '{"title":"Anzu Hero","prefix":"anzu_hero_","domain":"anzu","class_name":"anzu_hero","post-type":["post","page"],"context":"normal","priority":"default","fields":[{"type":"textarea","label":"Title Subheading","id":"anzu_hero_subheading"},{"type":"select","label":"Hero Type and Style","default":"1","options":"1 : Default\r\n2 : Featured Stretched\r\n3 : Featured Boxed","id":"anzu_hero_hero-type-and-style"},{"type":"select","label":"Hero Content Position","default":"anzu-hero--center-center","options":"anzu-hero--left-top : Left Top\r\nanzu-hero--left-center : Left Center\r\nanzu-hero--left-bottom: Left Bottom\r\nanzu-hero--center-top: Center Top\r\nanzu-hero--center-center : Center Center\r\nanzu-hero--center-bottom : Center Bottom\r\nanzu-hero--right-top : Right Top\r\nanzu-hero--right-center : Right Center\r\nanzu-hero--right-bottom : Right Bottom","id":"anzu_hero_hero-content-position"},{"type":"select","label":"Hero Background Color","default":"anzu-no-background-color","options":"anzu-no-background-color : Disabled\r\nanzu-primary-color--background-color : Primary Color\r\nanzu-secondary-color--background-color : Secondary Color\r\nanzu-tertiary-color--background-color : Tertiary Color\r\nanzu-light-theme--background-color : Light Color\r\nanzu-dark-theme--background-color : Dark Color","id":"anzu_hero_hero-background-color"},{"type":"select","label":"Hero Color Opacity","default":"anzu-no-opacity","options":"anzu-no-opacity : Disabled\r\nanzu-opacity-0 : 0\r\nanzu-opacity-1 : 0.1\r\nanzu-opacity-2 : 0.2\r\nanzu-opacity-3 : 0.3\r\nanzu-opacity-4 : 0.4\r\nanzu-opacity-5 : 0.5\r\nanzu-opacity-6 : 0.6\r\nanzu-opacity-7 : 0.7\r\nanzu-opacity-8 : 0.8\r\nanzu-opacity-9 : 0.9\r\nanzu-opacity-10 : 1","id":"anzu_hero_hero-color-opacity"}]}';

	public function __construct() {
		$this->config = json_decode( $this->config, true );
		add_action( 'add_meta_boxes', [ $this, 'add_meta_boxes' ] );
		add_action( 'save_post', [ $this, 'save_post' ] );
	}

	public function add_meta_boxes() {
		foreach ( $this->config['post-type'] as $screen ) {
			add_meta_box(
				sanitize_title( $this->config['title'] ),
				$this->config['title'],
				[ $this, 'add_meta_box_callback' ],
				$screen,
				$this->config['context'],
				$this->config['priority']
			);
		}
	}

	public function save_post( $post_id ) {
		foreach ( $this->config['fields'] as $field ) {
			switch ( $field['type'] ) {
				default:
					if ( isset( $_POST[ $field['id'] ] ) ) {
						$sanitized = sanitize_text_field( $_POST[ $field['id'] ] );
						update_post_meta( $post_id, $field['id'], $sanitized );
					}
			}
		}
	}

	public function add_meta_box_callback() {
		$this->fields_table();
	}

	private function fields_table() {
		?><table class="form-table" role="presentation">
			<tbody><?php
				foreach ( $this->config['fields'] as $field ) {
					?><tr>
						<th scope="row"><?php $this->label( $field ); ?></th>
						<td><?php $this->field( $field ); ?></td>
					</tr><?php
				}
			?></tbody>
		</table><?php
	}

	private function label( $field ) {
		switch ( $field['type'] ) {
			default:
				printf(
					'<label class="" for="%s">%s</label>',
					$field['id'], $field['label']
				);
		}
	}

	private function field( $field ) {
		switch ( $field['type'] ) {
			case 'select':
				$this->select( $field );
				break;
			case 'textarea':
				$this->textarea( $field );
				break;
			default:
				$this->input( $field );
		}
	}

	private function input( $field ) {
		printf(
			'<input class="regular-text %s" id="%s" name="%s" %s type="%s" value="%s">',
			isset( $field['class'] ) ? $field['class'] : '',
			$field['id'], $field['id'],
			isset( $field['pattern'] ) ? "pattern='{$field['pattern']}'" : '',
			$field['type'],
			$this->value( $field )
		);
	}

	private function select( $field ) {
		printf(
			'<select id="%s" name="%s">%s</select>',
			$field['id'], $field['id'],
			$this->select_options( $field )
		);
	}

	private function select_selected( $field, $current ) {
		$value = $this->value( $field );
		if ( $value === $current ) {
			return 'selected';
		}
		return '';
	}

	private function select_options( $field ) {
		$output = [];
		$options = explode( "\r\n", $field['options'] );
		$i = 0;
		foreach ( $options as $option ) {
			$pair = explode( ':', $option );
			$pair = array_map( 'trim', $pair );
			$output[] = sprintf(
				'<option %s value="%s"> %s</option>',
				$this->select_selected( $field, $pair[0] ),
				$pair[0], $pair[1]
			);
			$i++;
		}
		return implode( '<br>', $output );
	}

	private function textarea( $field ) {
		printf(
			'<textarea class="regular-text" id="%s" name="%s" rows="%d">%s</textarea>',
			$field['id'], $field['id'],
			isset( $field['rows'] ) ? $field['rows'] : 5,
			$this->value( $field )
		);
	}

	private function value( $field ) {
		global $post;
		if ( metadata_exists( 'post', $post->ID, $field['id'] ) ) {
			$value = get_post_meta( $post->ID, $field['id'], true );
		} else if ( isset( $field['default'] ) ) {
			$value = $field['default'];
		} else {
			return '';
		}
		return str_replace( '\u0027', "'", $value );
	}

}
new anzu_hero;
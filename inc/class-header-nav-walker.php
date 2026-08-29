<?php
/**
 * Walker: same markup as the Методика header nav.
 *
 * @package Custom_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Custom_Theme_Header_Nav_Walker extends Walker_Nav_Menu {
	/**
	 * Whether the current top-level item opened a dropdown wrapper.
	 *
	 * @var array<int, bool>
	 */
	private $dropdown_stack = array();

	/**
	 * Mark the last child so the footer link can be styled.
	 *
	 * @param object $element           Data object.
	 * @param array  $children_elements List of elements to continue traversing.
	 * @param int    $max_depth         Max depth to traverse.
	 * @param int    $depth             Depth of current element.
	 * @param array  $args              An array of arguments.
	 * @param string $output            Passed by reference.
	 */
	public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
		if ( ! $element ) {
			return;
		}

		$id_field = $this->db_fields['id'];
		$id       = $element->$id_field;

		if ( ! empty( $children_elements[ $id ] ) ) {
			$last = end( $children_elements[ $id ] );
			if ( is_object( $last ) ) {
				$last->custom_theme_is_last = true;
			}
			reset( $children_elements[ $id ] );
		}

		parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	}

	/**
	 * @param string   $output Passed by reference.
	 * @param int      $depth  Depth of menu item. Used for padding.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 */
	public function start_lvl( &$output, $depth = 0, $args = null ) {
		if ( 0 === (int) $depth ) {
			$output .= '<div class="dropdown" data-dropdown-panel hidden><ul class="dropdown__list">';
		}
	}

	/**
	 * @param string   $output Passed by reference.
	 * @param int      $depth  Depth of menu item. Used for padding.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 */
	public function end_lvl( &$output, $depth = 0, $args = null ) {
		if ( 0 === (int) $depth ) {
			$output .= '</ul></div>';
		}
	}

	/**
	 * @param string   $output Passed by reference.
	 * @param WP_Post  $item   Menu item data object.
	 * @param int      $depth  Depth of menu item. Used for padding.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 * @param int      $id     Current item ID.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$title = apply_filters( 'the_title', $item->title, $item->ID );
		$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );
		$url   = isset( $item->url ) ? $item->url : '';
		$desc  = isset( $item->description ) ? trim( wp_strip_all_tags( $item->description ) ) : '';
		$class = is_array( $item->classes ) ? $item->classes : array();

		$is_modal = in_array( 'open-modal', $class, true ) || false !== strpos( $url, 'consult-modal' );
		$is_all   = ! empty( $item->custom_theme_is_last )
			|| in_array( 'dropdown-all', $class, true )
			|| false !== mb_stripos( $title, 'Все услуги' );

		if ( 0 === (int) $depth ) {
			if ( $this->has_children ) {
				$this->dropdown_stack[] = true;
				$output                .= '<div class="nav__item nav__item--drop" data-dropdown>';
				$output                .= '<button class="nav__link nav__link--btn" type="button" data-dropdown-btn aria-expanded="false">';
				$output                .= esc_html( $title );
				$output                .= '<svg class="nav__chevron" viewBox="0 0 12 8" width="10" height="7" aria-hidden="true"><path d="M1 1.5 6 6.5 11 1.5" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>';
				$output                .= '</button>';
				return;
			}

			$this->dropdown_stack[] = false;
			$output                .= $this->link_html( 'nav__link', $url, $title, $is_modal, '' );
			return;
		}

		if ( $is_all ) {
			$arrow   = '<svg class="dropdown__arrow" viewBox="0 0 12 12" width="12" height="12" aria-hidden="true"><path d="M10.9 9.4V1H2.38M10.9 1 1 10.9" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>';
			$output .= '<li class="dropdown-all-item">';
			$output .= $this->link_html( 'dropdown__all', $url, esc_html( $title ) . $arrow, $is_modal, '', false );
			return;
		}

		$inner  = '<strong>' . esc_html( $title ) . '</strong>';
		$inner .= $desc ? '<span>' . esc_html( $desc ) . '</span>' : '';

		$output .= '<li>';
		$output .= $this->link_html( '', $url, $inner, $is_modal, '', false );
	}

	/**
	 * @param string   $output Passed by reference.
	 * @param WP_Post  $item   Page data object. Not used.
	 * @param int      $depth  Depth of page. Not Used.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 */
	public function end_el( &$output, $item, $depth = 0, $args = null ) {
		if ( 0 === (int) $depth ) {
			$opened_dropdown = array_pop( $this->dropdown_stack );
			if ( $opened_dropdown ) {
				$output .= '</div>';
			}
			return;
		}

		$output .= '</li>';
	}

	/**
	 * @param string $class     Extra class names.
	 * @param string $url       Href.
	 * @param string $html      Inner HTML (already escaped unless $escape is false).
	 * @param bool   $is_modal  Whether to open the consult modal.
	 * @param string $extra     Extra attributes.
	 * @param bool   $escape    Escape inner HTML.
	 * @return string
	 */
	private function link_html( $class, $url, $html, $is_modal, $extra = '', $escape = true ) {
		$attrs  = 'href="' . esc_url( $url ) . '"';
		$attrs .= $class ? ' class="' . esc_attr( $class ) . '"' : '';
		$attrs .= $extra;

		if ( $is_modal ) {
			$attrs .= ' data-open-modal';
		}

		$inner = $escape ? esc_html( $html ) : $html;

		return '<a ' . $attrs . '>' . $inner . '</a>';
	}
}

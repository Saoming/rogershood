<?php
/**
 * Description - Renders the Informational Health Info Block
 *
 * @package rogershood-theme
 */

$id = 'e-books-full-and-text-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

$fields = get_fields();

echo '<pre>';
var_dump( $fields );
echo '</pre>';

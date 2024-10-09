<?php
/**
 * Render callback function for the Tabs block using DOMDocument.
 *
 * @param array  $attributes Block attributes.
 * @param string $content    Block inner HTML content.
 * @return string            Modified HTML output.
 */

	$tab_titles_content = array();
	$tabs_content = array();

	// Suppress errors due to malformed HTML
	libxml_use_internal_errors( true );

	// Load the content into DOMDocument
	$dom = new \DOMDocument();
	$dom->loadHTML( '<div>' . $content . '</div>', LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD );

	// Create a new XPath for querying
	$xpath = new \DOMXPath( $dom );

	// Query for all divs with class 'custom-tab'
	$tab_divs = $xpath->query( "//div[contains(concat(' ', normalize-space(@class), ' '), ' custom-tab ')]" );

	foreach ( $tab_divs as $index => $tab_div ) {
		// Initialize variables
		$tab_title = 'Tab';
		$tab_inner_content = '';

		// Find the h4 with class 'tab-title' within this tab
		$title_nodes = $xpath->query( ".//h4[contains(concat(' ', normalize-space(@class), ' '), ' tab-title ')]", $tab_div );
		if ( $title_nodes->length > 0 ) {
			$tab_title = $title_nodes->item( 0 )->textContent;
		}

		// Remove the h4.tab-title from the tab content
		foreach ( $title_nodes as $title_node ) {
			$title_node->parentNode->removeChild( $title_node );
		}

		// Get the inner HTML of the tab div
		$tab_inner_content = '';
		foreach ( $tab_div->childNodes as $child_node ) {
			$tab_inner_content .= $dom->saveHTML( $child_node );
		}

		// Store the title and content
		$tab_titles_content[] = $tab_title;
		$tabs_content[] = $tab_inner_content;
	}

	// Restore error handling
	libxml_clear_errors();
	libxml_use_internal_errors( false );

	// Now, output the tabs using the extracted titles and contents
	ob_start();
	?>
	<div class="rh-tabs">
		<ul class="rh-tabs__titles">
			<?php foreach ( $tab_titles_content as $index => $title_content ) : ?>
				<li class="rh-tab__title rh-button rh-button--primary <?php echo $index === 0 ? 'active' : ''; ?>" data-tab="rh-tab-<?php echo esc_attr( $index ); ?>">
					<?php echo esc_html( $title_content ); ?>
				</li>
			<?php endforeach; ?>
		</ul>
		<div class="rh-tab__contents">
			<?php foreach ( $tabs_content as $index => $content_inner_html ) : ?>
				<div id="rh-tab-<?php echo esc_attr( $index ); ?>" class="rh-tab__content <?php echo $index === 0 ? 'active' : ''; ?>">
					<?php echo $content_inner_html; ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
	<?php
echo ob_get_clean();

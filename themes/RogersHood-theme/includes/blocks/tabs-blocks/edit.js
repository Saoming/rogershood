/**
 * WordPress dependencies
 */
import { InnerBlocks, useBlockProps, InspectorControls } from '@wordpress/block-editor';
import {PanelBody, TextControl} from '@wordpress/components';

/**
 * Edit component.
 * See https://wordpress.org/gutenberg/handbook/designers-developers/developers/block-api/block-edit-save/#edit
 *
 * @param {object}   props                  The block props.
 * @param {object}   props.attributes       Block attributes.
 * @param {string}   props.attributes.title Custom title to be displayed.
 * @param {string}   props.className        Class name for the block.
 * @param {Function} props.setAttributes    Sets the value for block attributes.
 * @returns {Function} Render the edit screen
 */
const ExampleBlockEdit = (props) => {



	return (
			<div {...useBlockProps()}>
				<InnerBlocks
					allowedBlocks={['rh-block/single-tab-block']}
					template={[['rh-block/single-tab-block']]}
					renderAppender={InnerBlocks.ButtonBlockAppender}
				/>
			</div>
	);


};
export default ExampleBlockEdit;

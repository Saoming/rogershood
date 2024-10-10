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
	const { attributes, setAttributes } = props;
	const { tabTitle } = attributes;

	const onChangeTitle = (value) => {
		setAttributes({ tabTitle: value });
	};
	return (
		<div {...useBlockProps()}>
			<InspectorControls>
				<PanelBody title="Tab Settings">
					<TextControl
						label="Tab Title"
						value={tabTitle}
						onChange={onChangeTitle}
					/>
				</PanelBody>
			</InspectorControls>
			<div className="custom-tab">
				<h4 className="tab-title">{tabTitle}</h4>
				<div className="tab-content">
					<InnerBlocks />
				</div>
			</div>
		</div>
	);
};
export default ExampleBlockEdit;

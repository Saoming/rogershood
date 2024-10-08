/**
 * See https://wordpress.org/gutenberg/handbook/designers-developers/developers/block-api/block-edit-save/#save
 *
 * @returns {null} Dynamic blocks do not save the HTML.
 */

import { InnerBlocks } from '@wordpress/block-editor';
const TabsBlocSave = () => <InnerBlocks.Content/>;

export default TabsBlocSave;

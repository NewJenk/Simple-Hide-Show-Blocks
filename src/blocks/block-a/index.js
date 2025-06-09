/**
 * Registers a new block provided a unique name and an object defining its behavior.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */
import { registerBlockType } from '@wordpress/blocks';

/**
 * Internal dependencies
 */
import Edit from './edit';
import save from './save';
import metadata from './block.json';
import transforms from './transforms';

const icon = () => (
	<svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 16 16" aria-hidden="true" role="img"><path d="M7,8.9h2l-1-3L7,8.9z"/><path d="M8,0C3.6,0,0,3.6,0,8s3.6,8,8,8s8-3.6,8-8C16,3.6,12.4,0,8,0 M9.9,11.9l-0.5-1.6H6.6L6,11.9H4.3l2.8-7.7h1.8l2.7,7.7H9.9"/></svg>
);

/**
 * Every block starts by registering a new block type definition.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */
registerBlockType( metadata.name, {
	icon: icon,

	/**
	 * @see ./edit.js
	 */
	edit: Edit,

	/**
	 * @see ./save.js
	 */
	save,

	transforms,

	merge( attributes, attributesToMerge ) {
		return {
			content:
				( attributes.content || '' ) +
				( attributesToMerge.content || '' ),
		};
	},
} );

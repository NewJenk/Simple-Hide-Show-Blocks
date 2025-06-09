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
	<svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 16 16" aria-hidden="true" role="img"><path d="M9.3,8.6C9.1,8.5,8.9,8.5,8.5,8.5H6.6v2.1h1.9c0.3,0,0.6,0,0.8-0.1c0.3-0.2,0.5-0.5,0.5-1C9.8,9,9.6,8.7,9.3,8.6"/><path d="M9.3,7c0.2-0.1,0.3-0.4,0.3-0.7c0-0.4-0.1-0.6-0.4-0.7C9,5.5,8.7,5.5,8.3,5.5H6.6v1.7h1.9C8.9,7.2,9.1,7.1,9.3,7"/><path d="M8,0C3.6,0,0,3.6,0,8s3.6,8,8,8s8-3.6,8-8S12.4,0,8,0 M11.1,10.8c-0.1,0.2-0.3,0.4-0.5,0.6c-0.2,0.2-0.5,0.3-0.9,0.4
		c-0.3,0.1-0.7,0.1-1.1,0.1H5.1V4.1h3.7c0.9,0,1.6,0.3,2,0.8c0.2,0.3,0.4,0.7,0.4,1.2c0,0.5-0.1,0.9-0.4,1.1
		c-0.1,0.2-0.3,0.3-0.6,0.4c0.4,0.1,0.7,0.4,0.9,0.7c0.2,0.3,0.3,0.7,0.3,1.1C11.4,10,11.3,10.4,11.1,10.8"/></svg>
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

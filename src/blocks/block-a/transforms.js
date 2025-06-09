/**
 * WordPress dependencies
 */
import { createBlock } from '@wordpress/blocks';

const transforms = {
    from: [
        {
            type: 'block',
            blocks: [ 'shsb/block-b' ],
            transform: ( attributes, innerBlocks ) => {
                return createBlock(
                    'shsb/block-b',
                    attributes,
                    innerBlocks
                );
            },
        },
    ],
    to: [
        {
            type: 'block',
            blocks: [ 'shsb/block-b' ],
            transform: ( attributes, innerBlocks ) => {
                return createBlock(
                    'shsb/block-b',
                    attributes,
                    innerBlocks
                );
            },
        },
    ],
}

export default transforms;
/**
 * WordPress dependencies
 */
import { createBlock } from '@wordpress/blocks';

const transforms = {
    from: [
        {
            type: 'block',
            blocks: [ 'shsb/block-a' ],
            transform: ( attributes, innerBlocks ) => {
                return createBlock(
                    'shsb/block-a',
                    attributes,
                    innerBlocks
                );
            },
        },
    ],
    to: [
        {
            type: 'block',
            blocks: [ 'shsb/block-a' ],
            transform: ( attributes, innerBlocks ) => {
                return createBlock(
                    'shsb/block-a',
                    attributes,
                    innerBlocks
                );
            },
        },
    ],
}

export default transforms;
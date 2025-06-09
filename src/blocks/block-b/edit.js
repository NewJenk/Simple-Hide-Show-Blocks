import { __ } from '@wordpress/i18n';

import {
	useBlockProps,
	InspectorControls,
	InnerBlocks
} from '@wordpress/block-editor';

import { createInterpolateElement } from '@wordpress/element';

export default function Edit( {attributes, setAttributes, clientId} ) {

	// Options screen value, will return 1 or 0 (true or false).
	const blockB = shsbGlobal.activeValue;

	/**
	 * Figured out how to format this const using an article here: https://pascalbirchler.com/ (Safely
	 * Using Strings Containing Markup in React with DOMParser).
	 */
	const optionsLink = createInterpolateElement( // @link https://make.wordpress.org/core/2020/07/17/introducing-createinterpolateelement/
		__( '<a>Go To Options Screen</a>', '' ),
		// eslint-disable-next-line jsx-a11y/anchor-has-content
		{ a: <a href={ shsbGlobal.optionsURL } class={'components-button is-secondary'} /> }
	);

	return (

		<div { ...useBlockProps() }>
			<InspectorControls>
				<div
					style={{
						padding: '0 16px 16px 52px',
					}}
				>
					{/* {__('Set the value on the <a href="#" target="_blank">options '+shsbGlobal.optionsURL+' screen</a>.', 'simple-hide-show-blocks')}
					{el( 'b', { href: 'https://example.com' }, 'This should work..' )} */}

					{ optionsLink }
				</div>
				<div
					style={{
						padding: '0 16px 16px 52px',
						'font-style': 'italic',
					}}
				>
					{
						// See: https://reactjs.org/docs/conditional-rendering.html#inline-if-else-with-conditional-operator for info on inline if statements.
						blockB == 'b' ? __('\'Block B\' is selected on the options screen, so this content will display.', 'simple-hide-show-blocks') : __('\'Block B\' is not selected on the options screen, so this content won\'t display.', 'simple-hide-show-blocks')
					}
				</div>
			</InspectorControls>
			<header
				style={{
					'border-bottom': '1px dashed #ccc',
					'padding-bottom': '10px',
					'margin-bottom': '10px',
				}}
			>
				<em
					style={{
						opacity: '.8',
						'font-size': '12px',
					}}
				>
					{ __('The content below will be visible if \'Block B\' is selected on the options screen.', 'simple-hide-show-blocks') }
					<span
						style={{
							display: 'block',
							'font-size': '10px',
							opacity: '.7',
							'font-style': 'italic',
						}}
					>
						{
							// See: https://reactjs.org/docs/conditional-rendering.html#inline-if-else-with-conditional-operator for info on inline if statements.
							blockB == 'b' ? __('\'Block B\' is selected on the options screen, so this content will display.', 'simple-hide-show-blocks') : __('\'Block B\' is not selected on the options screen, so this content won\'t display.', 'simple-hide-show-blocks')
						}
					</span>
				</em>
			</header>
			<InnerBlocks />
			<footer
				style={{
					'border-top': '1px dashed #ccc',
					'padding-top': '10px',
					'margin-top': '10px',
				}}
			>
				<em
					style={{
						opacity: '.8',
						'font-size': '10px',
					}}
				>
					{ __('End of content that\'s visible if \'Block B\' is selected on the options screen.', 'simple-hide-show-blocks') }
				</em>
			</footer>
		</div>

	);

}

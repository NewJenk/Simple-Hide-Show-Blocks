<?php

namespace SJen\SHSB;

class Blocks {

    public function __construct() {

        // Register Gutenberg blocks.
        add_action( 'init', array($this, 'blocks_init'), 20 );

    }




    /**
     * Registers the block using the metadata loaded from the `block.json` file.
     * Behind the scenes, it registers also all assets so they can be enqueued
     * through the block editor in the corresponding context.
     *
     * @see https://developer.wordpress.org/reference/functions/register_block_type/
     */
    function blocks_init() {

        register_block_type( SHSB_PLUGIN_PATH . '/build/blocks/block-a', 
            array(
                'render_callback' => array($this, 'block_a_render_content_callback')
            )
        );

        register_block_type( SHSB_PLUGIN_PATH . '/build/blocks/block-b', 
            array(
                'render_callback' => array($this, 'block_b_render_content_callback')
            )
        );

        // WP Localized globals. Use dynamic PHP stuff in JavaScript via 'shsbGlobal' object.
        wp_localize_script(
            'shsb-block-a-editor-script',
            'shsbGlobal', // Array containing dynamic data for a JS Global.
            array(
                'optionsURL' => admin_url('options-general.php?page=simple-hide-show-blocks'),
                'activeValue'  => $this->get_selected_block(),
            )
        );

    }




    /**
     * Renders the content for the block-a block.
     *
     * @param array $attributes The attributes of the block.
     * @param string $content The content of the block.
     * @param WP_Block $block The block object.
     * 
     * @return string The rendered content.
     * 
     * @since 1.0.0
     */
    function block_a_render_content_callback( $attributes, $content, $block ) {

        $the_content = '';

        if ( $this->get_selected_block() == 'a' ) {

            $the_content .= $content;

        }

        return $the_content;

    }




    /**
     * Renders the content for the block-a block.
     *
     * @param array $attributes The attributes of the block.
     * @param string $content The content of the block.
     * @param WP_Block $block The block object.
     * 
     * @return string The rendered content.
     * 
     * @since 1.0.0
     */
    function block_b_render_content_callback( $attributes, $content, $block ) {

        $the_content = '';

        if ( $this->get_selected_block() == 'b' ) {

            $the_content .= $content;

        }

        return $the_content;

    }




    // Get the selected block.
    function get_selected_block() {

        // Init var
        $option_value = '';

        // Get options value
        $options = get_option( 'shsb_opts' );

        // Block A is selected
        if ( is_array($options) && reset($options) == 1) {

            $option_value = 'a';

        // Block B is selected
        } elseif ( is_array($options) && reset($options) == 2) {

            $option_value = 'b';

        }

        return $option_value;

    }




}
<?php

namespace SJen\SHSB;

class Options {




    protected $shsb_settings_slug = 'simple-hide-show-blocks';
    protected $shsb_options_slug  = 'shsb_opts';




    public function __construct() {

        /**
         * Register our register_settings to the admin_init action hook
         */
        add_action( 'admin_init', array($this, 'register_settings') );

        /**
         * register our options_page to the admin_menu action hook
         */
        add_action( 'admin_menu', array($this, 'options_page') );

    }




    /**
     * custom option and settings
     */
    function register_settings() {

        // register a new setting for "simple-hide-show-blocks" page
        register_setting( $this->shsb_settings_slug, $this->shsb_options_slug );

        // register a new section in the "simple-hide-show-blocks" page
        $section_slug = 'shsb_section';

        add_settings_section(
            $section_slug,
            '<span class="screen-reader-text">' . __( 'Set To Active', $this->shsb_settings_slug ) . '</span>',
            [$this, 'shsb_section_cb'],
            $this->shsb_settings_slug
        );

        // register a new field in the "shsb_section_developers" section, inside the "simple-hide-show-blocks" page
        $enabled_field_key = 'shsb_field_active';

        add_settings_field(
            $enabled_field_key, // as of WP 4.6 this value is used only internally
            __( 'Content To Display', $this->shsb_settings_slug ),
            [$this, $enabled_field_key . '_cb'],
            $this->shsb_settings_slug,
            $section_slug,
            [
                'label_for' => $enabled_field_key,
                'class' => 'shsb-row',
            ]
        );

    }

    // section callbacks can accept an $args parameter, which is an array.
    // $args have the following keys defined: title, id, callback.
    // the values are defined at the add_settings_section() function.
    function shsb_section_cb( $args ) {

        $options = get_option( $this->shsb_options_slug );
        ?>
            <!-- <p>Current option: <pre><?php var_dump($options) ?></pre></p> -->
        <?php

    }

    // field callbacks can accept an $args parameter, which is an array.
    // $args is defined at the add_settings_field() function.
    // wordpress has magic interaction with the following keys: label_for, class.
    // the "label_for" key value is used for the "for" attribute of the <label>.
    // the "class" key value is used for the "class" attribute of the <tr> containing the field.
    // you can add custom key value pairs to be used inside your callbacks.
    function shsb_field_active_cb( $args ) {

        // get the value of the setting we've registered with register_setting()
        $options = get_option( $this->shsb_options_slug );
        $option_key = $args['label_for'];

        // Used for testing.
        // var_dump(get_option( $this->shsb_options_slug ));

        echo '<fieldset>';

            echo '<legend class="screen-reader-text"><span>' . __( 'Content To Display', $this->shsb_settings_slug ) . '</span></legend>';

            echo "\t<label><input type='radio' name='" . $this->shsb_options_slug . "[" . esc_attr( $option_key ) . "]' value='0'";
            if ( ! $options || reset($options) == 0 ) {
                echo " checked='checked'";
            }
            echo " /> <span class=\"date-time-text format-i18n\">" . __('Don\'t display either block', $this->shsb_settings_slug) . "</span></label><br />\n";

            echo "\t<label><input type='radio' name='" . $this->shsb_options_slug . "[" . esc_attr( $option_key ) . "]' value='1'";
            if ( is_array($options) && reset($options) == 1 ) {
                echo " checked='checked'";
            }
            echo " /> <span class=\"date-time-text format-i18n\">" . __('Content in <strong>Block A</strong> will display', $this->shsb_settings_slug) . "</span> <span class=\"description\" style=\"margin: 4px 0 2px; color: #646970; font-size: .8em; font-style: italic; display: block;\">" . __('Block name: <strong>SHSB Block A</strong>', $this->shsb_settings_slug) . "</span></label><br />\n";

            echo "\t<label><input type='radio' name='" . $this->shsb_options_slug . "[" . esc_attr( $option_key ) . "]' value='2'";
            if ( is_array($options) && reset($options) == 2 ) {
                echo " checked='checked'";
            }
            echo " /> <span class=\"date-time-text format-i18n\">" . __('Content in <strong>Block B</strong> will display', $this->shsb_settings_slug) . "</span> <span class=\"description\" style=\"margin: 4px 0 2px; color: #646970; font-size: .8em; font-style: italic; display: block;\">" . __('Block name: <strong>SHSB Block B</strong>', $this->shsb_settings_slug) . "</span></label><br />\n";

        echo '</fieldset>';

    }

    /**
     * top level menu
     */
    function options_page() {

        // add top level menu page
        $page_title  = __( 'Simple Hide/Show Blocks', $this->shsb_settings_slug );
        $menu_title  = __( 'Hide/Show Blocks', $this->shsb_settings_slug );
        $parent_slug = 'options-general.php'; // This is the slug for the 'Settings' menu

        add_submenu_page(
            $parent_slug,
            $page_title,
            $menu_title,
            'manage_options',
            $this->shsb_settings_slug,
            [$this, 'options_page_html']
        );

    }

    /**
     * top level menu:
     * callback functions
     */
    function options_page_html() {

        // check user capabilities
        if ( ! current_user_can( 'manage_options' ) ) {

            return;

        }

        // show error/update messages
        settings_errors( 'shsb_messages' );
        ?>
            <div class="wrap">
                <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
                <form action="options.php" method="post">
                <?php
                    // output security fields for the registered setting "simple-hide-show-blocks"
                    settings_fields( $this->shsb_settings_slug );
                    // output setting sections and their fields
                    // (sections are registered for "simple-hide-show-blocks", each field is registered to a specific section)
                    do_settings_sections( $this->shsb_settings_slug );
                    // output save settings button
                    submit_button( __( 'Save Settings', $this->shsb_settings_slug ) );
                ?>
            <hr> <?php // A horizontal rule to visually separate the message ?>

                <p style="text-align: right; color: #666; font-style: italic;">
                    <?php
                    // Translators: %s is the URL to the plugins screen.
                    printf(
                        wp_kses_post( __( 'These settings are powered by the Simple Hide/Show Blocks plugin. Manage your plugins <a href="%s">here</a>.', $this->shsb_settings_slug ) ),
                        esc_url( admin_url( 'plugins.php' ) )
                    );
                    ?>
                </p>
                </form>
            </div>
        <?php

    }




}
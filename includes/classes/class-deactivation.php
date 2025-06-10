<?php

namespace SJen\SHSB;




/**
 * Do things on deactivation.
 */
register_deactivation_hook(SHSB_PLUGIN_PATH . '/simple-hide-show-blocks.php', [new Deactivation(), 'delete_options']);




class Deactivation {




    /**
     * custom option and settings
     */
    function delete_options() {

        delete_option('shsb_opts');

    }




}
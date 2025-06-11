<?php

namespace SJen\SHSB;




/**
 * Do things on deactivation.
 */
register_deactivation_hook(SHSB_PLUGIN_PATH . '/simple-hide-show-blocks.php', [new Deactivation(), 'delete_options']);




class Deactivation {




    /**
     * Delete option.
     */
    function delete_options() {

        delete_option('shsb_opts');

    }




}
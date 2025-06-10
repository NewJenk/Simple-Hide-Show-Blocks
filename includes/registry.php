<?php

namespace SJen\SHSB;

/**
 * Load all the classes in 'includes/classes/'. Filenames must be prepended with 'class-' and must following the same format as
 * this example: if the classname is ThisIsATestClass, the filename for that class must be 'class-this-is-a-test-class.php'
 * (capital letters are substituted for lowercase letters and preceded by a dash, except the first letter, which is
 * converted to lowercase, but is not preceded by a dash).
 */
spl_autoload_register(function($class) {

    if ( false !== strpos( $class, 'SJen\SHSB' ) ) {

        $dir = SHSB_PLUGIN_PATH . 'includes/classes/';

        $remove_classname = str_replace( 'SJen\SHSB\\', '', $class );
        $lower_case_and_convert = strtolower(preg_replace('/([a-zA-Z])(?=[A-Z])/', '$1-', $remove_classname)); /** @link https://stackoverflow.com/questions/10507789/camelcase-to-dash-two-capitals-next-to-each-other */

        $file = 'class-' . $lower_case_and_convert . '.php';

        $path = $dir . $file;

        // var_dump($path);

        if ( file_exists( $path ) ) {

            require_once $path;

        }

    }

});

class Registry
{
    private $storage = [];

    /**
     * Initializes the plugin by creating an instance of an empty array.
     */
    public function __construct()
    {
        $this->storage = [];
    }

    private function add($id, $callable)
    {
        $this->storage[$id] = $callable;
    }

    public function get($id)
    {
        return array_key_exists($id, $this->storage) ? $this->storage[$id] : null;
    }

    // Create instances of classes and add them to the registry
    public function build_registry()
    {

        $this->add('Blocks', new Blocks());
        $this->add('Options', new Options());
        $this->add('Deactivation', new Deactivation());

    }

}
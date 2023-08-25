<?php
/*
 * @package BoilerplatePlugin
 * 
 */

namespace Engine;

use Engine\Base\Actions;
use Engine\Base\Shortcodes;

class boilerPlate {

    /**
     * Constructor
     */
    public function __construct()
    {

        // Loading the actions
        $actions = new Actions();
        $actions->register();

        // Loading the shortcodes
        $shortcodes = new Shortcodes();
        $shortcodes->register();

    }

}
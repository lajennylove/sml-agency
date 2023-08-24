<?php

namespace Engine\Base;

class Activate
{
    /**
     * Activate the plugin
     *
     * @return void
     */
    public static function activate(): void
    {
        flush_rewrite_rules();
    }

}
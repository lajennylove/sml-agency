<?php

namespace Engine\Base;

class Deactivate
{
    /**
     * Deactivate the plugin
     *
     * @return void
     */
    public static function deactivate(): void
    {
        flush_rewrite_rules();
    }

}
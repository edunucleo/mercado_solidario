<?php

namespace MetForm\Traits;

trait Singleton
{

    private static $instance;

    public static function instance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}

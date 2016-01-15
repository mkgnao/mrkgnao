<?php

namespace App;

class Util
{
    public static function idPad($id)
    {
        return str_pad($id, 5, "0", STR_PAD_LEFT);
    }

    public static function idStrip($id)
    {
        return $id += 0;
    }

    public static function joinPaths() {
        $args = func_get_args();
        $paths = array();
        foreach ($args as $arg) {
            $paths = array_merge($paths, (array)$arg);
        }

        $paths = array_map(create_function('$p', 'return trim($p, "/");'), $paths);
        $paths = array_filter($paths);
        return join('/', $paths);
    }
}
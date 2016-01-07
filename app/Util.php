<?php

namespace App;

class Util
{
    public static function idPad($id)
    {
        return str_pad($id, 5, '0', STR_PAD_LEFT);
    }

    public static function idStrip($id)
    {
        return trim(strval($id), '0');
    }
}
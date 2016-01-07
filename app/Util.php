<?php

namespace App;

class Util
{
    public static function idPad($id)
    {
        return str_pad($id, 4, '0', STR_PAD_LEFT);
    }
}
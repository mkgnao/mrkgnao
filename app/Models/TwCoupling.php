<?php

namespace App\Models;

class TwCoupling extends \Eloquent
{
    protected $table = 'tw_couplings';

    public function getName($value)
    {
        MdContent::findOrFail($value)->name;
    }

    public function formName($value)
    {
        MdContent::findOrFail($value)->name;
    }
}

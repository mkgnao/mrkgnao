<?php

namespace App\Models;

use Illuminate\Database;


class MdContent extends \Eloquent
{
    protected $table = 'md_contents';

    public function getName($value)
    {
        MdContent::findOrFail($value)->name;
    }

    public function formName($value)
    {
        MdContent::findOrFail($value)->name;
    }

    public function getContent($value)
    {
        return MdContent::findOrFail($value)->content;
    }

    public function formContent($value)
    {
        return MdContent::findOrFail($value)->content;
    }
}

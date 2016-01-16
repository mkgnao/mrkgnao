<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MdContent extends Model
{
    protected $table = 'md_contents';
    protected $primaryKey = 'name';

    public function getName($value)
    {
        return $value;
    }

    public function formName($value)
    {
        return $value;
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

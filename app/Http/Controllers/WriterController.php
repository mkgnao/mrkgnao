<?php

namespace Foo;

use League\CommonMark\CommonMarkConverter;

class Bar
{
    protected $markdown;

    public function __constructor(CommonMarkConverter $markdown)
    {
        $this->markdown = $markdown;
    }

    public function baz()
    {
        return $this->markdown->convertToHtml('markdown goes here');
    }
}
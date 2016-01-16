<?php

namespace App\Services;

use App\User;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Util;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Support\Facades\App;
use League\CommonMark\Converter;
use App\Models\MdContent as MdContent;


class MarkdownService implements SelfHandling
{
    protected $converter;
    protected $mdContent;

    public function __construct(Converter $converter)
    {
        $this->converter = $converter;
    }

    public function get($mdContentName)
    {

        $mdContent = MdContent::where('md_name', $mdContentName)->first();

        if (!$mdContent)
            return 'could not find: ' . $mdContentName;


        return $this->converter->convertToHtml($mdContent->md_content);
    }

    public function handle()
    {
    }
}
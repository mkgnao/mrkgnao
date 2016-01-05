<?php namespace App\Http\TeamWorkPm;

class Me extends Rest\Model
{

    public function get()
    {
        return $this->rest->get("me");
    }
}
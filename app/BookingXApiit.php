<?php

namespace App;

class BookingXApiit
{

    private $version = '1.1.0';

    private $url;

    public function __construct()
    {
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl(string $url)
    {
        $this->url = $url;
    }
}

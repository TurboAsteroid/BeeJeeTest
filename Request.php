<?php

class Request
{
    public $url;

    public function __construct()
    {
        $url = explode('?', $_SERVER["REQUEST_URI"]);
        $this->url = $url[0];
    }
}

?>
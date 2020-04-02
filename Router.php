<?php

class Router
{

    static public function parse($url, $request)
    {
        $url = trim($url);

        if ($url == "/") {
            $request->controller = "tasks";
            $request->action = "index";
        } else {
            $explode_url = explode('/', $url);
            $explode_url = array_slice($explode_url, 1);
            $request->controller = $explode_url[0];
            $request->action = $explode_url[1];
            $request->params = $explode_url[2];
        }
    }
}

?>
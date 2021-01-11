<?php


namespace App\Core;


class Request
{
    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');
        if ($position === false) {
            return $path;
        }
        return substr($path, 0, $position);
    }

    public function method()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function getBody()
    {
        $body = [];
        if($this->method() === 'get') {
            foreach ($_GET as $key => $value){
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        if($this->method() === 'post') {
            foreach ($_POST as $key => $value){
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        return $body;
    }

    public function getQueryString()
    {
        $query = [];
        $queryString = $_SERVER['QUERY_STRING'];
        if ($queryString !== "") {
            $arr = explode('&', $queryString);
            foreach ($arr as $key){
                $arr2 = explode('=', $key);
                if(is_array($arr2)) {
                    $query[$arr2[0]] = $arr2[1];
                }
            }
        }

        return $query;
    }
}
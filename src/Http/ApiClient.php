<?php

namespace SfvApi\Http;

use SfvApi\Config\Config;

class ApiClient
{
    public function get($url, $data, $headers = [])
    {
        $headers[] = 'X-User-Token: '.Config::get('sfvApiCredentials', 'token');
        $url = "{$url}?".http_build_query($data);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);

        return $result;
    }
}
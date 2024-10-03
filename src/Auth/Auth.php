<?php

namespace SfvApi\Auth;

use SfvApi\Config\Config;

class Auth
{
    private $apiUrl;
    private $apiUser;
    private $apiPass;

    public function __construct()
    {
        $this->apiUrl = Config::get('sfvApiCredentials', 'url').'/api/token';
        $this->apiUser = Config::get('sfvApiCredentials', 'username');
        $this->apiPass = Config::get('sfvApiCredentials', 'password');
    }

    public function init()
    {
        if (!Config::get('sfvApiCredentials', 'token'))
            Config::set('sfvApiCredentials', 'token', $this->getToken());
    }

    private function getToken()
    {
        $data = array(
            'applicationKey' => $this->apiUser,
            'applicationPass' => $this->apiPass,
        );
        $data_string = json_encode($data);

        $ch = curl_init($this->apiUrl);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data_string))
        );
        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }
}
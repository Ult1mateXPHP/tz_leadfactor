<?php

namespace Infrastructure\GoogleClient;

use Illuminate\Support\Facades\Config;

abstract class GoogleClient
{
    /**
     * @return object
     */
    private function getClient() : object {
        return new \Google_Client();
    }

    /**
     * @return object
     * @throws \Google\Exception
     */
    protected function getSheetsClient() : object
    {
        $client = $this->getClient();
        $client->setApplicationName('Google Sheets API');
        $client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
        $client->setAccessType('offline');
        $path = Config::get('app.google_auth_creds');
        $client->setAuthConfig($path);
        return $client;
    }
}

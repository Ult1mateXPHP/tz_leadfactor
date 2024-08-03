<?php

namespace Infrastructure\GoogleClient;

use Illuminate\Support\Facades\Config;

class GoogleClient
{
    /**
     * @return object
     * @throws \Google\Exception
     */
    private function getSheetsClient() : object
    {
        $client = new \Google_Client();
        $client->setApplicationName('Google Sheets API');
        $client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
        $client->setAccessType('offline');
        $path = Config::get('app.google_auth_creds');
        $client->setAuthConfig($path);
        return $client;
    }

    /**
     * @return object
     * @throws \Google\Exception
     */
    public function sheets() : object {
        return $this->getSheetsClient();
    }
}

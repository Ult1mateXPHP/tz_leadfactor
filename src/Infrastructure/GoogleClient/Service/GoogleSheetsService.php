<?php
namespace Infrastructure\GoogleClient\Service;

use Infrastructure\GoogleClient\GoogleClient;

class GoogleSheetsService extends GoogleClient
{
    /**
     * @return object
     * @throws \Google\Exception
     */
    protected function getService() : object {
        return new \Google_Service_Sheets($this->getSheetsClient());
    }

    /**
     * @return object
     */
    protected function getServiceValueRange() : object {
        return new \Google_Service_Sheets_ValueRange();
    }
}

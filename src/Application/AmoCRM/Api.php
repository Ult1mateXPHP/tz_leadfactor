<?php

namespace Application\AmoCRM;

use Infrastructure\AmoCRM\AmoCRMClient;
use Infrastructure\GoogleClient\GoogleSheetsService;

class Api
{
    /**
     * @param array $webhookData
     * @return void
     */
    public function sendLeadToGoogleSheet(array $webhookData) : void
    {
        $amocrmApi = new AmoCRMClient();
        $googleSheetsApi = new GoogleSheetsService();

        $status = $amocrmApi->getStatus($webhookData["pipeline_id"], $webhookData["status_id"]);
        if ($status == "Успешно реализовано") {
            $leadData = [
                $webhookData["name"],
                $webhookData["id"],
                $amocrmApi->getResponsible($webhookData["responsible_user_id"]),
                $webhookData["price"]
            ];
            $sheetId = \Illuminate\Support\Facades\Config::get('app.google_sheet_id');
            $googleSheetsApi->addNewRecord($leadData, $sheetId);
        }
    }
}

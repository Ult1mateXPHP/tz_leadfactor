<?php

namespace Application\AmoCRM;

use Infrastructure\AmoCRM\AmoCRMClient;
use Infrastructure\GoogleClient\API\GoogleSheetsMethods;

class Api
{
    /**
     * @param array $webhookData
     * @return void
     */
    public function sendLeadToGoogleSheet(array $webhookData) : void
    {
        $amocrmApi = new AmoCRMClient();
        $googleSheetsApi = new GoogleSheetsMethods();

        $status = $amocrmApi->getStatus($webhookData["pipeline_id"], $webhookData["status_id"]);
        if ($status == "Успешно реализовано") {
            $leadData = [
                $webhookData["name"],
                $webhookData["id"],
                $webhookData["responsible_user_id"], //$amocrmApi->getResponsible($webhookData["responsible_user_id"]), для вывода имени ответчика в таблицу
                $webhookData["price"]
            ];
            $sheetId = \Illuminate\Support\Facades\Config::get('app.google_sheet_id');
            $googleSheetsApi->addNewRecord($leadData, $sheetId);
        }
    }
}

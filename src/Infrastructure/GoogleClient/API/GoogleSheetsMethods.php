<?php
namespace Infrastructure\GoogleClient\API;

use Infrastructure\GoogleClient\Service\GoogleSheetsService;

class GoogleSheetsMethods extends GoogleSheetsService
{
    /**
     * @param array $data
     * @param string $spreadsheetId
     * @return void
     * @throws \Google\Exception
     */
    public function addNewRecord(array $data, string $spreadsheetId) : void {
        $rows = [$data];
        $service = $this->getService();
        $valueRange = $this->getServiceValueRange();
        $valueRange->setValues($rows);
        $range = 'Лист1';
        $options = ['valueInputOption' => 'USER_ENTERED'];
        $service->spreadsheets_values->append($spreadsheetId, $range, $valueRange, $options);
    }
}

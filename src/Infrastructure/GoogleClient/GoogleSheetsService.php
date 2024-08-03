<?php
namespace Infrastructure\GoogleClient;

class GoogleSheetsService extends GoogleClient
{
    /**
     * @return object
     * @throws \Google\Exception
     */
    private function getService() : object {
        return new \Google_Service_Sheets($this->sheets());
    }

    /**
     * @param array $data
     * @param string $spreadsheetId
     * @return void
     * @throws \Google\Exception
     */
    public function addNewRecord(array $data, string $spreadsheetId) : void {
        $rows = [$data];
        $service = $this->getService();
        $valueRange = new \Google_Service_Sheets_ValueRange();
        $valueRange->setValues($rows);
        $range = 'Лист1';
        $options = ['valueInputOption' => 'USER_ENTERED'];
        $service->spreadsheets_values->append($spreadsheetId, $range, $valueRange, $options);
    }
}

<?php

namespace Infrastructure\AmoCRM;

use Illuminate\Support\Facades\Config;

class AmoCRMClient
{
    private $client;

    /**
     * @return object
     */
    private function auth() : object {
        $apiClient = new \AmoCRM\Client\AmoCRMApiClient();
        $token = new \League\OAuth2\Client\Token\AccessToken(['access_token' => Config::get('app.amocrm_key'), 'expires' => (time()+10000)]);
        $apiClient->setAccessToken($token);
        $apiClient->setAccountBaseDomain('alexultimatex.amocrm.ru');
        return $apiClient;
    }

    public function __construct()
    {
        $this->client = $this->auth();
    }

    /**
     * @param int $id
     * @return string
     */
    public function getResponsible(int $id) : string {
        return $this->client->users()->getOne($id)->getName();
    }

    /**
     * @param int $pipeline_id
     * @param int $status_id
     * @return string
     */
    public function getStatus(int $pipeline_id, int $status_id) : string {
        return $this->client->statuses($pipeline_id)->getOne($status_id)->getName();
    }
}

<?php

namespace App\Http\Controllers\AmoCRM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Application\AmoCRM\Api;

class WebhookController extends Controller
{
    public function recieve(Request $request, Api $api) : void {
        $data = [
            "id" => $request->input('leads.status.0.id'),
            "name" => $request->input('leads.status.0.name'),
            "price" => $request->input('leads.status.0.price'),
            "responsible_user_id" => $request->input('leads.status.0.responsible_user_id'),
            "pipeline_id" => $request->input('leads.status.0.pipeline_id'),
            "status_id" => $request->input('leads.status.0.status_id'),
        ];

        $api->sendLeadToGoogleSheet($data);
    }
}

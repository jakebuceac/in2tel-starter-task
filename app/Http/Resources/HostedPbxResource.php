<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HostedPbxResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'instance_name' => $this->instance_name,
            'instance_host' => $this->instance_host,
            'ymp_name' => $this->ymp_name,
            'caco_customer_id' => $this->caco_customer_id,
            'caco_customer_name' => $this->caco_customer_name,
            'caco_group_id' => $this->caco_group_id,
            'caco_group_name' => $this->caco_group_name,
            'full_url' => $this->full_url,
            'pbx_status' => $this->pbx_status,
            'sync_status' => $this->sync_status,
            'sync_status_message' => $this->sync_status_message,
            'api_client_id' => $this->api_client_id,
            'api_client_secret' => $this->api_client_secret,
            'extensions_licenced' => $this->extensions_licenced,
            'extensions_provisioned' => $this->extensions_provisioned,
            'extensions_in_use' => $this->extensions_in_use,
            'sync_extensions_matched' => $this->sync_extensions_matched,
            'last_modified' => $this->last_modified,
        ];
    }
}

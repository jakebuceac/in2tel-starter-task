<?php

namespace Tests\Feature\HostedPbxController;

use App\Models\HostedPbx;
use Tests\TestCase;

class ShowTest extends TestCase
{
    public function test_show_endpoint_returns_specific_host_pbx(): void
    {
        $hostPbxs = HostedPbx::factory()->create();

        $this->getJson('/api/hostedpbx/'.$hostPbxs->id)
            ->assertSuccessful()
            ->assertJsonCount(1)
            ->assertJsonFragment([
                'id' => $hostPbxs->id,
                'instance_name' => $hostPbxs->instance_name,
                'instance_host' => $hostPbxs->instance_host,
                'ymp_name' => $hostPbxs->ymp_name,
                'caco_customer_id' => $hostPbxs->caco_customer_id,
                'caco_customer_name' => $hostPbxs->caco_customer_name,
                'caco_group_id' => $hostPbxs->caco_group_id,
                'caco_group_name' => $hostPbxs->caco_group_name,
                'full_url' => $hostPbxs->full_url,
                'pbx_status' => $hostPbxs->pbx_status,
                'sync_status' => $hostPbxs->sync_status,
                'sync_status_message' => $hostPbxs->sync_status_message,
                'api_client_id' => $hostPbxs->api_client_id,
                'api_client_secret' => $hostPbxs->api_client_secret,
                'extensions_licenced' => $hostPbxs->extensions_licenced,
                'extensions_provisioned' => $hostPbxs->extensions_provisioned,
                'extensions_in_use' => $hostPbxs->extensions_in_use,
                'sync_extensions_matched' => $hostPbxs->sync_extensions_matched,
                'last_modified' => $hostPbxs->last_modified,
            ]);
    }

    public function test_show_endpoint_returns_404_when_cannot_find_hosted_pbx(): void
    {
        $this->getJson('/api/hostedpbx/0')
            ->assertNotFound();
    }
}

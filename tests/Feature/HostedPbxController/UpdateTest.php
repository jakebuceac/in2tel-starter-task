<?php

namespace Tests\Feature\HostedPbxController;

use App\Models\HostedPbx;
use Tests\TestCase;

class UpdateTest extends TestCase
{
    public function test_update_endpoint_updates_host_pbx(): void
    {
        $hostPbxs = HostedPbx::factory()->create([
            'caco_customer_id' => 12,
            'caco_customer_name' => 'customer_name',
            'caco_group_id' => 76,
            'caco_group_name' => 'group_name',
            'pbx_status' => 'ACTIVE',
            'sync_status' => 'READONLY',
            'extensions_licenced' => 8,
            'extensions_provisioned' => 156756765,
            'extensions_in_use' => 567,
            'sync_extensions_matched' => 776,
        ]);

        $this->assertDatabaseHas('hosted_pbx', [
            'id' => $hostPbxs->id,
            'caco_customer_id' => 12,
            'caco_customer_name' => 'customer_name',
            'caco_group_id' => 76,
            'caco_group_name' => 'group_name',
            'pbx_status' => 'ACTIVE',
            'sync_status' => 'READONLY',
            'extensions_licenced' => 8,
            'extensions_provisioned' => 156756765,
            'extensions_in_use' => 567,
            'sync_extensions_matched' => 776,
        ]);

        $this->patchJson('/api/hostedpbx/'.$hostPbxs->id, [
            'caco_customer_id' => 123321,
            'caco_customer_name' => 'customer_name_test',
            'caco_group_id' => 766868,
            'caco_group_name' => 'group_name_test',
            'pbx_status' => 'RETIRED',
            'sync_status' => 'ACTIVE',
            'extensions_licenced' => 890,
            'extensions_provisioned' => 1,
            'extensions_in_use' => 5,
            'sync_extensions_matched' => 7,
        ])->assertSuccessful()
            ->assertJsonFragment([
                'id' => $hostPbxs->id,
                'caco_customer_id' => 123321,
                'caco_customer_name' => 'customer_name_test',
                'caco_group_id' => 766868,
                'caco_group_name' => 'group_name_test',
                'pbx_status' => 'RETIRED',
                'sync_status' => 'ACTIVE',
                'extensions_licenced' => 890,
                'extensions_provisioned' => 1,
                'extensions_in_use' => 5,
                'sync_extensions_matched' => 7,
            ]);

        $this->assertDatabaseHas('hosted_pbx', [
            'id' => $hostPbxs->id,
            'caco_customer_id' => 123321,
            'caco_customer_name' => 'customer_name_test',
            'caco_group_id' => 766868,
            'caco_group_name' => 'group_name_test',
            'pbx_status' => 'RETIRED',
            'sync_status' => 'ACTIVE',
            'extensions_licenced' => 890,
            'extensions_provisioned' => 1,
            'extensions_in_use' => 5,
            'sync_extensions_matched' => 7,
        ]);
    }

    public function test_update_endpoint_throws_validation_error_when_data_given_is_wrong(): void
    {
        $hostPbxs = HostedPbx::factory()->create([

            'pbx_status' => 'ACTIVE',
            'sync_status' => 'READONLY',
        ]);

        $this->assertDatabaseHas('hosted_pbx', [
            'id' => $hostPbxs->id,
            'pbx_status' => 'ACTIVE',
            'sync_status' => 'READONLY',
        ]);

        $this->patchJson('/api/hostedpbx/'.$hostPbxs->id, [
            'caco_group_name' => 'group_name_test',
            'pbx_status' => 'RE',
            'sync_status' => 'ACT',
        ])->assertUnprocessable();

        $this->assertDatabaseHas('hosted_pbx', [
            'id' => $hostPbxs->id,
            'pbx_status' => 'ACTIVE',
            'sync_status' => 'READONLY',
        ]);
    }

    public function test_update_endpoint_returns_404_when_cannot_find_hosted_pbx(): void
    {
        $this->patchJson('/api/hostedpbx/0')
            ->assertNotFound();
    }
}

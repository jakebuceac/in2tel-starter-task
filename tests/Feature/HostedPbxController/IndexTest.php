<?php

namespace Tests\Feature\HostedPbxController;

use App\Enums\PbxStatusEnum;
use App\Enums\SyncStatusEnum;
use App\Models\HostedPbx;
use Tests\TestCase;

class IndexTest extends TestCase
{
    public function test_index_endpoint_returns_all_host_pbx(): void
    {
        $hostPbxs = HostedPbx::factory()->count(10)->create();

        $this->getJson('/api/hostedpbx')
            ->assertSuccessful()
            ->assertJsonCount(10, 'data')
            ->assertJsonFragment([
                'id' => $hostPbxs[0]->id,
                'ymp_name' => $hostPbxs[0]->ymp_name,
                'sync_status' => $hostPbxs[0]->sync_status,
                'pbx_status' => $hostPbxs[0]->pbx_status,
                'last_modified' => $hostPbxs[0]->last_modified,
                'status' => 'OK',
            ])
            ->assertJsonStructure([
                'data',
                'status',
                'links',
                'meta',
            ]);
    }

    public function test_index_endpoint_returns_host_pbx_when_filtered(): void
    {
        $timestamp = now()->toDateTimeString();
        $hostPbxs = HostedPbx::factory()
            ->count(2)
            ->sequence(
                [
                    'ymp_name' => 'ymp_name1',
                    'sync_status' => SyncStatusEnum::ACTIVE->value,
                    'pbx_status' => PbxStatusEnum::TEST_DEMO->value,
                    'last_modified' => $timestamp,
                ],
                [
                    'ymp_name' => 'ymp_name2',
                    'sync_status' => SyncStatusEnum::NONE->value,
                    'pbx_status' => PbxStatusEnum::ACTIVE->value,
                    'last_modified' => $timestamp,
                ],
            )
            ->create();

        $this->getJson('/api/hostedpbx?ymp_name=ymp_name1&sync_status=ACTIVE')
            ->assertSuccessful()
            ->assertJsonCount(1, 'data')
            ->assertJsonFragment([
                'id' => $hostPbxs[0]->id,
                'ymp_name' => 'ymp_name1',
                'sync_status' => 'ACTIVE',
                'pbx_status' => $hostPbxs[0]->pbx_status,
                'last_modified' => $hostPbxs[0]->last_modified,
                'status' => 'OK',
            ]);

        $this->getJson('/api/hostedpbx?pbx_status=ACTIVE&last_modified='.$timestamp)
            ->assertSuccessful()
            ->assertJsonCount(1, 'data')
            ->assertJsonFragment([
                'id' => $hostPbxs[1]->id,
                'ymp_name' => $hostPbxs[1]->ymp_name,
                'sync_status' => $hostPbxs[1]->sync_status,
                'pbx_status' => 'ACTIVE',
                'last_modified' => $hostPbxs[1]->last_modified,
                'status' => 'OK',
            ]);
    }

    public function test_index_endpoint_uses_pagination(): void
    {
        HostedPbx::factory()->count(16)->create();

        $this->getJson('/api/hostedpbx')
            ->assertSuccessful()
            ->assertJsonCount(15, 'data');

        $this->getJson('/api/hostedpbx?page=2')
            ->assertSuccessful()
            ->assertJsonCount(1, 'data');
    }
}

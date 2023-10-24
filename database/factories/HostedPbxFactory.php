<?php

namespace Database\Factories;

use App\Enums\PbxStatusEnum;
use App\Enums\SyncStatusEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class HostedPbxFactory extends Factory
{
    public function definition(): array
    {
        return [
            'instance_name' => $this->faker->name(),
            'instance_host' => 'in2tel',
            'ymp_name' => $this->faker->randomElement(['PBX99', 'PBX3', 'PBX']),
            'caco_customer_id' => $this->faker->unique()->randomNumber(),
            'caco_customer_name' => $this->faker->name(),
            'caco_group_id' => $this->faker->unique()->randomNumber(),
            'caco_group_name' => $this->faker->name(),
            'full_url' => $this->faker->url(),
            'pbx_status' => $this->faker->randomElement(PbxStatusEnum::cases()),
            'sync_status' => $this->faker->randomElement(SyncStatusEnum::cases()),
            'sync_status_message' => $this->faker->text(),
            'api_client_id' => $this->faker->randomAscii(),
            'api_client_secret' => $this->faker->randomAscii(),
            'extensions_licenced' => $this->faker->randomNumber(),
            'extensions_provisioned' => $this->faker->randomNumber(),
            'extensions_in_use' => $this->faker->randomNumber(),
            'sync_extensions_matched' => 0,
            'created_at' => $this->faker->dateTime(),
            'last_modified' => $this->faker->dateTime(),
        ];
    }
}

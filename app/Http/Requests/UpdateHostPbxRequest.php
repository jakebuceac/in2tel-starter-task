<?php

namespace App\Http\Requests;

use App\Enums\PbxStatusEnum;
use App\Enums\SyncStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class UpdateHostPbxRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'caco_customer_id' => 'sometimes|integer|nullable',
            'caco_customer_name' => 'sometimes|string|nullable',
            'caco_group_id' => 'sometimes|integer|nullable',
            'caco_group_name' => 'sometimes|string|nullable',
            'pbx_status' => [new Enum(PbxStatusEnum::class)],
            'sync_status' => [new Enum(SyncStatusEnum::class)],
            'extensions_licenced' => 'sometimes|integer|nullable',
            'extensions_provisioned' => 'sometimes|integer|nullable',
            'extensions_in_use' => 'sometimes|integer|nullable',
            'sync_extensions_matched' => 'sometimes|integer|nullable',
        ];
    }
}

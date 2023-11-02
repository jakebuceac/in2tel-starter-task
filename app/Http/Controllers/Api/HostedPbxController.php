<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateHostPbxRequest;
use App\Http\Resources\HostedPbxCollection;
use App\Http\Resources\HostedPbxResource;
use App\Models\HostedPbx;
use Illuminate\Http\Request;

class HostedPbxController extends Controller
{
    public function index(Request $request): HostedPbxCollection
    {
        $query = HostedPbx::query();

        $filterableFields = [
            'ymp_name',
            'sync_status',
            'pbx_status',
            'last_modified',
        ];

        foreach ($filterableFields as $filterableField) {
            if ($request->has($filterableField)) {
                $query->where($filterableField, '=', $request->input($filterableField));
            }
        }

        return new HostedPbxCollection($query->get());
    }

    public function show(HostedPbx $hostedPbx): HostedPbxResource
    {
        return new HostedPbxResource($hostedPbx);
    }

    public function update(UpdateHostPbxRequest $request, HostedPbx $hostedPbx): HostedPbxResource
    {
        $hostedPbx->update($request->validated());
        $hostedPbx->last_modified = now();
        $hostedPbx->save();

        return new HostedPbxResource($hostedPbx);
    }
}

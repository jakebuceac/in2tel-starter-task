<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\HostedPbxCollection;
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

        return new HostedPbxCollection($query->paginate(15));
    }
}

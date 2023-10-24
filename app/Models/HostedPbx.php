<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HostedPbx extends Model
{
    use HasFactory;

    protected $table = 'hosted_pbx';

    public $timestamps = false;

    protected $fillable = [
        'instance_name',
        'instance_host',
        'ymp_name',
        'caco_customer_id',
        'caco_customer_name',
        'caco_group_id',
        'caco_group_name',
        'full_url',
        'pbx_status',
        'sync_status',
        'sync_status_message',
        'api_client_id',
        'api_client_secret',
        'extensions_licenced',
        'extensions_provisioned',
        'extensions_in_use',
        'sync_extensions_matched',
        'created_at',
        'last_modified',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'last_modified' => 'datetime',
    ];
}

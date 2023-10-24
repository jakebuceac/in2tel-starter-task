<?php

namespace App\Enums;

enum SyncStatusEnum: string
{
    case ACTIVE = 'ACTIVE';
    case READONLY = 'READONLY';
    case ERROR = 'ERROR';
    case NONE = 'NONE';
}

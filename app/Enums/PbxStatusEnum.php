<?php

namespace App\Enums;

enum PbxStatusEnum: string
{
    case ACTIVE = 'ACTIVE';
    case TEST_DEMO = 'TEST/DEMO';
    case RETIRED = 'RETIRED';
}

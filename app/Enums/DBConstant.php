<?php

declare(strict_types=1);

namespace App\Enums;

/**
 * DBConstant enum.
 */
class DBConstant
{
    // user role
    const MOD = 1;
    const ADMIN = 2;

    // user male
    const MALE = 1;
    const FEMALE = 2;

    // image
    const SYSTEM = [
        '1' => 'slider',
        '2' => 'banner',
        // '3' => 'banner-bot'
    ];

    // image
    const SLIDER_TYPE = 1;
    const BANNER_TYPE = 2;
    // const BANNER_BOT_TYPE = 3;

    // categories
    const INTRODUCTION = 1;
    const ADMISSIONS = 2;
    const EDUCATION = 3;
    const NEWS = 4;
    const COOPERATION = 5;
    const SCIENTIFIC_RESEARCH = 6;
    const SIS_ALUMNI = 7;
    const SIS_STUDENT = 8;
    const EVENT = 68;
 
    // contact status
    const NEW_STATUS = 0;
    const PROCESS_STATUS = 1;
    const COMPLETE_STATUS = 2;
}
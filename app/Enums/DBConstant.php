<?php

declare(strict_types=1);

namespace App\Enums;

/**
 * DBConstant enum.
 */
class DBConstant
{
    // user role
    const TEACHER = 1;
    const SUPPER_ADMIN = 2;

    // categories
    const INTRODUCTION = 1;
    const ADMISSIONS = 2;
    const EDUCATION = 3;
    const NEWS = 4;
    const COOPERATION = 5;
    const SCIENTIFIC_RESEARCH = 6;
    const SIS_ALUMNI = 7;
    const SIS_STUDENT = 8;
}
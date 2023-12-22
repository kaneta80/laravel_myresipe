<?php

namespace App\Constants;

class Common
{
    const RECIPE_REVIEW = '0';
    const RECIPE_LATER = '1';
    const RECIPE_OLDER = '2';

    const RECIPE_ORDER = [
        'review' =>self::RECIPE_REVIEW,
        'later' => self::RECIPE_LATER,
        'older' => self::RECIPE_OLDER
    ];
}
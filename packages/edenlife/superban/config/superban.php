<?php

return [
    'cache_driver' => env('SUPERBAN_CACHE_DRIVER', 'redis'),
    'ban_threshold' => env('SUPERBAN_BAN_THRESHOLD', 200),
    'ban_period' => env('SUPERBAN_BAN_PERIOD', 2),
    'ban_time' => env('SUPERBAN_BAN_TIME', 1440),
];

<?php

namespace App\Services;

return [
    'start_session' => fn() => session_status() === PHP_SESSION_NONE ? session_start() : null,
    'destroy_session' => fn() => session_destroy(),
    'set' => fn(string $key, $value) => $_SESSION[$key] = $value,
    'get' => fn(string $key) => $_SESSION[$key] ?? null,
    'unset' => function (string $key) {
        unset($_SESSION[$key]);
    },
];

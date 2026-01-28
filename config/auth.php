<?php

return [
// config/auth.php

'guards' => [
    'web' => [
        'driver' => 'session',
        'provider' => 'users',
    ],

    // Idagdag itong tatlo:
    'admin' => [
        'driver' => 'session',
        'provider' => 'admins',
    ],
    'student' => [
        'driver' => 'session',
        'provider' => 'students',
    ],
    'teacher' => [
        'driver' => 'session',
        'provider' => 'teachers',
    ],
],

'providers' => [
    'users' => [
        'driver' => 'eloquent',
        'model' => App\Models\User::class,
    ],

    // Idagdag itong tatlo at siguraduhin na tama ang path ng Models:
    'admins' => [
        'driver' => 'eloquent',
        'model' => App\Models\Admin::class,
    ],
    'students' => [
        'driver' => 'eloquent',
        'model' => App\Models\Student::class,
    ],
    'teachers' => [
        'driver' => 'eloquent',
        'model' => App\Models\Teacher::class,
    ],
],
];

<?php

return [
    'mailtrap' => [
        'host' => env('MAILTRAP_HOST', 'send.api.mailtrap.io'),
        'apiKey' => env('MAILTRAP_API_KEY','5e260d63e70586c30a6bb2ff8d4250e7'),
        'inboxId' => env('MAILTRAP_INBOX_ID'),
    ],
];
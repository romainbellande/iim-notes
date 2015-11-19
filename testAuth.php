<?php
require __DIR__.'/vendor/autoload.php';
$client = new GuzzleHttp\Client();
$res = $client->get('http://localhost:8000/api/students', [
    'allow_redirects' => false,
    'http_errors' => false,
    'headers' => [
        // token for anna_admin in LoadUserData fixtures
        'X-TOKEN' => 'monapitoken'
    ]
]);
echo sprintf("Status Code: %s\n\n", $res->getStatusCode());
echo $res->getBody();
echo "\n\n";

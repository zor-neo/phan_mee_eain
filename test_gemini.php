<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();
try {
    $client = app('Local\AiCompanion\Services\GeminiClient');
    echo $client->generate('Hello');
    echo "\nSuccess\n";
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
}

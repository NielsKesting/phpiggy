<?php

declare(strict_types=1);

require __DIR__ . "/../../vendor/autoload.php";

use Framework\app;
use App\Controllers\HomeController;

$app = new app();

$app->get('/', [HomeController::class, 'home']);

return $app;

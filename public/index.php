<?php

declare(strict_types=1);

use App\Controller\DefaultController;
use App\Controller\ProjectController;
use App\Routing;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$routing = new Routing();

// TU BĘDZIEMY DEFINIOWAĆ WSZYSTKIE TRASY WYSTĘPUJĄCE W NASZYM PROJEKCIE
$routing->get('/projects', ProjectController::class, 'index');
$routing->get('/projects/{id}', ProjectController::class, 'show');
$routing->get('/', DefaultController::class, 'index');

$routeFound = $routing->dispatch(
    $_SERVER['REQUEST_METHOD'],
    $_SERVER['REQUEST_URI'],
);

if (!$routeFound) {
    // Serve static views for dashboard and login
    $path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
    $path = rtrim($path, '/') ?: '/';

    switch ($path) {
        case '/login':
            require __DIR__ . '/views/login.php';
            break;
        case '/main':
            require __DIR__ . '/views/main.php';
            break;
        default:
            http_response_code(404);
            (new DefaultController())->notFound();
            break;
    }
}

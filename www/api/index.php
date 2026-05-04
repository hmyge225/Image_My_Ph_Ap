<?php
header("Content-Type: application/json");

// CORS (utile en local)
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Gérer la requête preflight OPTIONS
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

$method = $_SERVER['REQUEST_METHOD'];
$basePath = dirname($_SERVER['SCRIPT_NAME']);
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$path = substr($requestUri, strlen($basePath));
if ($path === "" || $path === false) $path = "/";

$routes = [
    "GET" => [
        "/users" => "routes/users.php",
    ],
];

if (isset($routes[$method][$path])) {
    require $routes[$method][$path];
} else {
    http_response_code(404);
    echo json_encode(["error" => "Route not found"]);
}
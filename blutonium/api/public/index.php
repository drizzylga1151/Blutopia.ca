<?php
require "../bootstrap.php";
use Src\Controller\DiscordController;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);

$guildid = null;
if (isset($uri[1])) {
    $guildid = (int) $uri[1];
}

$requestMethod = $_SERVER["REQUEST_METHOD"];

$controller = new DiscordController($dbconnection, $requestMethod, $guildid);
$controller->processRequest();


<?php
require 'vendor/autoload.php';

use Dotenv\Dotenv;
use Src\System\DatabaseConnector;

$dotenv = new Dotenv(__DIR__);
$dotenv->load();

$dbconnection = (new DatabaseConnector())->getConnection();

echo getenv('DISCORDclientid');
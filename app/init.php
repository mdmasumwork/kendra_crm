<?php
require_once __DIR__ . '/../vendor/autoload.php'; // Adjust the path as needed

// Load environment variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

const BASE_URL = 'http://localhost/kendraITCRM/';

// Start session
session_start();

// Get database instance
$db = App\config\Database::getInstance();

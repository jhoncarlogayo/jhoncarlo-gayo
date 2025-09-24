<?php
require_once 'scheme/database/Database.php';

$db = new Database();

$db->raw("CREATE TABLE authors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255),
    last_name VARCHAR(255),
    email VARCHAR(255),
    added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);");

echo "Table 'authors' created successfully.";
?>

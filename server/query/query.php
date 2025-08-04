<?php
// this file us called only when setting up initially

require_once '../db/db_connect.php';

// create users table
$users_table = "
    CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        paswword VARCHAR(225),
        profile_image TEXT,
        bio TEXT,
        verified TINYINT(1) DEFAULT 0,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )
";

if (!$conn->query($users_table)) {
    die("error creating users table: " . $conn->error);
}

echo "Tables created successfully!";
?>
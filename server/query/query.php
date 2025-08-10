<?php
// this file us called only when setting up initially

require_once '../db/db_connect.php';

// create users table
$users_table = "
    CREATE TABLE password_reset_tokens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    token VARCHAR(64) NOT NULL,
    expires_at DATETIME NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    UNIQUE (token)
)
";

if (!$conn->query($users_table)) {
    die("error creating users table: " . $conn->error);
}

echo "Tables created successfully!";
?>
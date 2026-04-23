<?php
define('DB_SERVER',   'sql305.infinityfree.com');
define('DB_USERNAME', 'if0_38224917');
define('DB_PASSWORD', 'IvqeMXNlKiiaEY');
define('DB_NAME',     'if0_38224917_sscwebsite');

//define('DB_SERVER',   'localhost');
//define('DB_USERNAME', 'root');
//define('DB_PASSWORD', 'root');
//define('DB_NAME',     'sscwebsite');

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if ($conn === false) {
    http_response_code(503);
    echo '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Service Unavailable</title></head>'
        . '<body style="font-family:sans-serif;text-align:center;padding:60px">'
        . '<h2>&#9888; Database connection failed.</h2>'
        . '<p>Please try again later.</p>'
        . '</body></html>';
    exit;
}

// Ensure the site_settings table exists (used for site-wide config such as the event banner)
mysqli_query($conn, "CREATE TABLE IF NOT EXISTS site_settings (
    setting_key  VARCHAR(100) NOT NULL PRIMARY KEY,
    setting_value TEXT,
    updated_at   TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
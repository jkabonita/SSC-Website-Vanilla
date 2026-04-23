<?php
// PDF Viewer Handler - Serves PDFs with correct MIME type
if (isset($_GET['file'])) {
    $file = $_GET['file'];
    
    // Security: Only allow files from uploads directory
    if (strpos($file, 'uploads/') !== 0 && strpos($file, '../') !== false) {
        http_response_code(403);
        die('Access denied');
    }
    
    // Remove any path traversal attempts
    $file = str_replace(['../', '..\\'], '', $file);
    
    // Ensure file exists
    if (!file_exists($file)) {
        http_response_code(404);
        die('File not found');
    }
    
    // Check if it's a PDF file
    $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    if ($extension !== 'pdf') {
        http_response_code(400);
        die('Invalid file type');
    }
    
    // Set proper headers for PDF viewing
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="' . basename($file) . '"');
    header('Content-Length: ' . filesize($file));
    header('Cache-Control: public, max-age=0');
    header('Pragma: public');
    
    // Output the file
    readfile($file);
    exit;
} else {
    http_response_code(400);
    die('No file specified');
}
?> 
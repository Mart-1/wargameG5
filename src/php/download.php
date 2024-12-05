<?php
if (isset($_GET['file'])) {
    $file = $_GET['file'];

    // Define the path to the file
    $filePath = '/var/www/html/files/' . $file;

    // Check if the file exists
    if (file_exists($filePath)) {
        // Define the headers for the download
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($filePath).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filePath));
        readfile($filePath);
        exit;
    } else {
        die('Fichier non trouvé.');
    }
} else {
    die('Paramètre de fichier manquant.');
}
?>

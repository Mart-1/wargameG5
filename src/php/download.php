<?php
// Vérifiez si le paramètre 'file' est défini
if (isset($_GET['file'])) {
    $file = $_GET['file'];

    // Définissez le chemin du fichier en utilisant le paramètre sans validation
    $filePath = '/var/www/html/files/' . $file;

    // Vérifiez si le fichier existe
    if (file_exists($filePath)) {
        // Définissez les en-têtes HTTP pour le téléchargement
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

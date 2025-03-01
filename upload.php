<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/libs/media-joymind/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $file = $_FILES['file'];
    
    if (!in_array($file['type'], $config['allowed_types'])) {
        echo json_encode(['error' => 'Invalid file type']);
        exit;
    }
    
    if ($file['size'] > $config['max_file_size']) {
        echo json_encode(['error' => 'File too large']);
        exit;
    }

    // Creare structură directoare (jm-uploads/2025/03/)
    $year = date("Y");
    $month = date("m");
    $targetDir = $config['upload_base_dir'] . "$year/$month/";
    $targetUrl = $config['upload_base_url'] . "$year/$month/";

    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0755, true);
    }

    // Generare nume unic dacă fișierul există deja
    $originalName = pathinfo($file['name'], PATHINFO_FILENAME);
    $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $fileName = $originalName . "." . $extension;
    $filePath = $targetDir . $fileName;

    $counter = 1;
    while (file_exists($filePath)) {
        $fileName = $originalName . "-" . $counter . "." . $extension;
        $filePath = $targetDir . $fileName;
        $counter++;
    }

    if (move_uploaded_file($file['tmp_name'], $filePath)) {
        $fileSize = filesize($filePath);
        list($width, $height) = getimagesize($filePath);

        // Salvare în DB
        $stmt = $pdo->prepare("
            INSERT INTO jm_media (file_name, file_path, file_type, file_size, file_width, file_height, uploaded_by, uploaded_at)
            VALUES (?, ?, ?, ?, ?, ?, ?, NOW())
        ");
        $stmt->execute([$fileName, $targetUrl . $fileName, $file['type'], $fileSize, $width, $height, 1]);

        echo json_encode([
            'success' => true,
            'url' => $targetUrl . $fileName,
            'db_id' => $pdo->lastInsertId()
        ]);
    } else {
        echo json_encode(['error' => 'Upload failed']);
    }
}

<?php
// Resim klasörünü tanımla
$imageFolder = './img/';

// Desteklenen resim uzantıları
$supportedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

// Klasördeki dosyaları al
$files = array_diff(scandir($imageFolder), ['.', '..']);

// Sadece desteklenen uzantılara sahip dosyaları seç
$images = array_filter($files, function($file) use ($imageFolder, $supportedExtensions) {
    $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    return in_array($extension, $supportedExtensions);
});

// JSON formatında çıktı ver
header('Content-Type: application/json');
echo json_encode(array_values($images));

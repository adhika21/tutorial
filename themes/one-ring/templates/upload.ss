<?php
$targetDir = "Uploads/";
$targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

// Periksa apakah file sudah ada
if (file_exists($targetFile)) {
    echo "Maaf, file sudah ada.";
    $uploadOk = 0;
}

// Batasi jenis file tertentu
if ($imageFileType != "pdf") {
    echo "Maaf, hanya file PDF yang diperbolehkan.";
    $uploadOk = 0;
}

// Periksa apakah $uploadOk disetel ke 0 oleh suatu kesalahan
if ($uploadOk == 0) {
    echo "Maaf, file Anda tidak diunggah.";
    // Jika semuanya berjalan dengan lancar, coba unggah file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
        echo "File ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " berhasil diunggah.";
    } else {
        echo "Maaf, ada kesalahan saat mengunggah file.";
    }
}
?>

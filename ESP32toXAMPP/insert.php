<?php
include 'koneksi.php';

$link_foto = $_POST['image'];
$query = mysqli_query($koneksi, "SELECT image FROM capture_data WHERE image = '$link_foto'");
$data = mysqli_fetch_array($query);


if ($link_foto != '' && $data['image'] != $link_foto) {
    $simpan = mysqli_query($koneksi, "INSERT INTO capture_data(image, timestamp) VALUES ('$link_foto', NOW())");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-dark">
    <div class="h-75 d-flex justify-content-center gap-4 align-items-center flex-column">
        <h3 class="text-white text-center">Data Sent Successfully</h3>
        <a href="result.php" class="btn btn-danger w-50">See Result</a>
    </div>
</body>
</html>

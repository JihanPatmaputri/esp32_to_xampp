<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .card > div > p:hover {
            color : red;
        }
    </style>
</head>
<body class="bg-dark">

<div class="p-4">

    <header class="w-100 bg-danger p-4 rounded d-flex justify-content-center">
        <img src="assets/logo_umy.gif" alt="">
    </header>
    <div class="my-4">
        <a href="index.php" class="btn btn-danger w-100">Take Picture</a>
    </div>

<h1 class="text-danger text-center">
    Image Result
</h1>
<div class="d-flex gap-4 flex-wrap justify-content-center mt-4">
        <?php
include 'koneksi.php';
$query = mysqli_query($koneksi, "SELECT image, timestamp FROM capture_data WHERE image <> ''");
while ($data = mysqli_fetch_array($query)) {
    if ($data !== null) { // Add this check
        ?>
        <div class="card bg-black text-white" style="width: 18rem;">
             <img src="<?php echo $data['image'] ?>" class="card-img-top" alt="...">
             <div class="card-body">
                 <p class="card-text">Timestamp : <?php echo $data['timestamp'] ?></p>
             </div>
             <div class="card-footer">
                <span class="btn btn-danger lihat" data-bs-toggle="modal" data-bs-target="#exampleModal" data-image-src="<?php echo $data['image'] ?>">See Image</span>
             </div>
         </div>

        <?php
    }
}
?>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header">
    <h1 class="modal-title fs-5" id="exampleModalLabel">Image</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  </div>
  <div class="modal-body d-flex justify-content-center">
  <img src="" id="modalImage" class="img-fluid" alt="...">
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
  </div>
</div>
</div>
</div>
</div>

<footer class="text-white mt-4 bg-black p-4 text-center">
    &copy;Copyright Jihan Patmaputri 2024
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        let data = document.querySelectorAll('.lihat')
        data.forEach(element => {
        element.addEventListener('click', function(e) {
            let imageSrc = event.target.dataset.imageSrc
            document.getElementById('modalImage').src = imageSrc;
    });
});

    </script>
</body>
</html>
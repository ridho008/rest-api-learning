<?php 
$data = file_get_contents('pizza.json');
$menu = json_decode($data, true);
$menu = $menu["menu"];
//var_dump($menu[0]["nama"]);
?>
<!-- Api Key OMDB = de7e80b -->
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <title>Pizza Hut</title>
</head>
<body>

   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="#">
           <img src="img/logo.png" alt="logo-pizza-hut" width="150px">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link active" href="#">Home</a>
            <a class="nav-link" href="#">Features</a>
            <a class="nav-link" href="#">Pricing</a>
          </div>
        </div>
     </div>
   </nav>

<div class="container">
   <div class="row mt-3">
      <div class="col">
         <h1>All Menus</h1>
      </div>
   </div>
   <div class="row">
      <?php foreach($menu as $key => $value) : ?>
      <div class="col-md-4 mb-3">
         <div class="card">
           <img src="img/pizza/<?= $value['gambar'] ?>" class="card-img-top" alt="...">
           <div class="card-body">
             <h5 class="card-title"><?= $value['nama'] ?></h5>
             <p class="card-text"><?= $value['deskripsi'] ?></p>
             <h5 class="card-title">Rp<?= number_format($value['harga'],0,',','.') ?></h5>
             <a href="" class="btn btn-dark">Buy</a>
           </div>
         </div>
      </div>
   <?php endforeach; ?>
   </div>
</div>

<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
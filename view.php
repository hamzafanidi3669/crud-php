<?php 
    $id = $_GET['id'];
    $con = mysqli_connect('localhost','root','','revision') or die(mysqli_error($con));
    $query = 'SELECT * from client';
    $query = 'SELECT c.*, v.ville FROM ville v, client c
        where c.ville = v.idville
    ';
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $row = mysqli_fetch_assoc($result);
    


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <style>
     
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center alert alert-dark">Les Clients</h1>
        <div class="container">
            <form method="post" enctype="multipart/from-data" class="form w-25 mt-4 container">
                <img src="<?= $row['photo'] ?>" width="100px"> <br> <br>
                <input type="text" disabled placeholder="<?= $row['nom']?>" name="nom" class="form-control">
                <input type="text" disabled placeholder="<?= $row['sexe'] ?>" name="sexe"class="form-control">
                <input type="text" disabled placeholder="<?= $row['ville'] ?>" name="ville"class="form-control">
                <input type="text" disabled placeholder="<?= $row['loisirs'] ?>" name="loisirs"class="form-control">
                <br> <a href="index.php" class="btn back btn-primary">BACK</a>
            </form>
    
        </div>
    </div>
</body>
</html>
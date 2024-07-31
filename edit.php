<?php 
    $con = mysqli_connect('localhost','root','','revision') or die(mysqli_error($con));
    $query = 'SELECT * FROM ville';
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center alert alert-dark">Ajouter un Client</h1>
        <div class="container">
            <form method="post" class="form w-50 mt-4 container">
                <input type="file" name="photo" class="form-control"><br>
                <input type="text" placeholder="Nom" name="nom" class="form-control"><br>
                <input type="radio" value="homme" name="sexe"> Homme
                <input type="radio" value="femme" name="sexe"> femme<br><br>
                <select name="ville" class="form-control">
                    <option value="-1">Select Ville</option>
                    <?php foreach($rows as $row): ?>
                        <option value="<?= $row['idville'] ?>"><?= $row['ville'] ?></option>
                    <?php endforeach ?>
                </select><br>
                <label>Loisirs</label><br>
                <input type="checkbox" name="ch1"> Sport
                <input type="checkbox" name="ch2"> Music
                <input type="checkbox" name="ch3"> Programation <br><br><br>
                <button name="submit" class="btn btn-success">Ajouter</button>
                <a href="index.php" class="btn btn-danger">Retour</a>
            </form>

                    
            <?php 
                if (isset($_POST['submit'])) {
                    extract($_POST);

                    $loisirs = " ";
                    if (isset($_POST['ch1'])) $loisirs .= " Sport "; 
                    if (isset($_POST['ch2'])) $loisirs .= " Music "; 
                    if (isset($_POST['ch3'])) $loisirs .= " Programation "; 

                    $source = $_FILES['photo']['tmp_name'];
                    $destination = "img/".$_FILES['photo']['name'];
                    move_uploaded_file($source,$destination);
                    $query = "INSERT INTO client values (null,'$destination', '$nom', '$sexe', '$loisirs', '$ville')";
                    mysqli_query($con,$query) or die(mysqli_error($con));
                    header("location:index.php");
                }
            
            
            ?>
        </div>
    </div>
</body>
</html>
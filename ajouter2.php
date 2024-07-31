<?php
$con=mysqli_connect('127.0.0.1','root','','revision2') or die(mysqli_error($con));
$query="SELECT * from ville";
$result=mysqli_query($con,$query) or die(mysqli_error($con));
$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);



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
        a,button{
            position: relative;
            left:500px;
        }
    </style>
</head>
<body>

    <h1 class="alert alert-dark text-center">Ajouter Un Client</h1>
    <div class="container">
        <form action="" method="post" enctype=multipart/form-data>
            <input type="file" name="photo" class="form-control"> <br>

            <input type="text" name="nom" placeholder="Entrez Votre Nom" class="form-control"> <br>

            <input type="radio" name="sexe" value="homme" id="">Homme
            <input type="radio" name="sexe" value="femme" id="">Femme <br> <br>

            <select name="ville" class="form-control" id="">
                <option value="-1">Select Ville</option>
                <?php foreach($rows as $row) :?>
                    <option value="<?= $row['idville']?>"><?=$row['nomville']?></option>
                <?php endforeach?>
            </select> <br>
            
                <label for="">Loisirs:</label> &nbsp;&nbsp;
            <input type="checkbox" name="ch1" id=""> Sport &nbsp;
            <input type="checkbox" name="ch2" id=""> Music &nbsp;
            <input type="checkbox" name="ch3" id=""> Programation <br> <br>

            <button class="btn btn-success" name="submit">Ajouter</button>
            <a href="afficher.php" class="btn btn-primary">Back</a>

        </form>
    </div>


    <?php
    if(isset($_POST['submit'])){
        extract($_POST);
        
        $loisirs=" ";
        if(isset($_POST['ch1'])) $loisirs.=" Sport ";
        if(isset($_POST['ch2'])) $loisirs.=" Music ";
        if(isset($_POST['ch3'])) $loisirs.=" Programmation ";

        $source=$_FILES['photo']['tmp_name'];
        $destination="img2/".$_FILES['photo']['name'];
        move_uploaded_file($source,$destination);
        $query="INSERT into clients values(null,'$destination','$nom','$sexe','$ville','$loisirs')";
        mysqli_query($con,$query) or die(mysqli_error($con));
        header("location:afficher2.php");
        

    }
    
    
    
    ?>
    
</body>
</html>
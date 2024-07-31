<?php
$con=mysqli_connect('127.0.0.1','root','','revision2') or die(mysqli_error($con));
$query="SELECT c.*,v.nomville from clients c, ville v 
where c.ville=v.idville";
$result=mysqli_query($con,$query) or die(mysqli_error($con));
$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);


if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query="DELETE from clients where id='$id'";
    mysqli_query($con,$query) or die(mysqli_error($con));
    header("location:afficher2.php");
}



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
    <h1 class="alert alert-success text-center">Les Clients</h1>
    <a href="ajouter2.php" class="btn btn-primary">S'INSCRIRE!</a>
    <table class="table table-hover container">
        <tr>
            <th>Pic</th>
            <th>Nom</th>
            <th>Ville</th>
            <th>Actions</th>
        </tr>

        <?php foreach($rows as $row):?>
            <tr>
                <td>
                    <img src="<?= $row['photo'] ?>" width=" 70px" alt="">
                </td>
                <td><?= $row['nom']?></td>
                <td><?= $row['nomville']?></td>
                <td>
                    <a href="view2.php?id=<?=$row['id']?>" class="btn btn-outline-primary">VIEW</a>
                    <a href="edit2.php?id=<?=$row['id']?>" class="btn btn-outline-success">EDIT</a>
                    <a href="afficher2.php?id=<?=$row['id']?>" onclick="return confirm('Are You Sure?')" class="btn btn-danger">DELETE</a>
                </td>
            </tr>
        
        <?php endforeach?>
    </table>


</body>
</html>

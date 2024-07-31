<?php 
    $con = mysqli_connect('localhost','root','','revision') or die(mysqli_error($con));
    $query = 'SELECT c.*, v.ville FROM ville v, client c
        where c.ville = v.idville
    ';
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
    
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE from client where id='$id'";
        mysqli_query($con, $query) or die(mysqli_error($con));
        header("location:index.php");
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
</head>
<body>
    <div class="container">
        <h1 class="text-center alert alert-dark">Les Clients</h1>
        <div class="container">
            <a href="ajouter.php">Ajouter un Client</a>
            <table class="table table-striped table-hover">
                <tr>
                    <th>Photo</th>
                    <th>Nom</th>
                    <th>Actions</th>
                </tr>
                <?php foreach($rows as $row): ?>
                    <tr>
                        <td><img src="<?= $row['photo'] ?>" width="50"></td>
                        <td><?= $row['nom'] ?></td>
                        <td>
                            <a href="view.php?id=<?php echo $row['id'] ?>" class="btn btn-primary btn-sm">View</a>
                            <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-success btn-sm">Edit</a>
                            <a href="index.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm" onclick='return confirm("Are you sure?")'>Delete</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </table>
    
        </div>
    </div>
</body>
</html>
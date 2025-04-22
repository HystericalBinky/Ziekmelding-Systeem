<?php
// Include config file
require_once "../model/readsql.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Ziekmelding Tonen</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <style>
        .wrapper {
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <nav class="navtop">
        <div>
            <img src="../images/logo.svg" alt="Girl in a jacket" style="position:relative; top:5px; height:50px;">
            <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
        </div>
    </nav>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-5 mb-3">Ziekmelding Tonen</h1>
                    <div class="form-group">
                        <label>Naam</label>
                        <p><b><?php echo $row["naam"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Reden</label>
                        <p><b><?php echo $row["reden"]; ?></b></p>
                    </div>
                    <p><a href="../home.php" class="btn btn-primary">Terug</a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
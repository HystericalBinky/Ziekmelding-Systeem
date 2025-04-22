<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Nieuwe Ziekmelding</title>
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
                    <h2 class="mt-5">Nieuwe Ziekmelding</h2>
                    <p>Vul de formulier in om een ziekmelding aan te maken.</p>
                    <form action="../model/createsql.php" method="POST">
                        <div class="form-group">
                            <label>Naam</label>
                            <textarea name="naam" class="form-control <?php echo (!empty($naam_err)) ? 'is-invalid' : ''; ?>"></textarea>
                            <span class="invalid-feedback"><?php echo $naam_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Reden</label>
                            <input type="text" name="reden" class="form-control <?php echo (!empty($reden_err)) ? 'is-invalid' : ''; ?>" value="">
                            <span class="invalid-feedback"><?php echo $reden_err; ?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Toevoegen">
                        <a href="../home.php" class="btn btn-secondary ml-2">Annuleer</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Home Page</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>

<body class="loggedin">
	<nav class="navtop">
		<div>
			<img src="images\logo.svg" alt="Girl in a jacket" style="position:relative; top:5px; height:50px;">
			<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
		</div>
	</nav>
	</div>
	<div class="wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="mt-5 mb-3 clearfix">
						<h2 class="pull-left">Ziekmeldingen</h2>
						<?php
						$DATABASE_HOST = 'localhost';
						$DATABASE_USER = 'root';
						$DATABASE_PASS = '';
						$DATABASE_NAME = 'phplogin';
						$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
						if (mysqli_connect_errno()) {
							exit('Failed to connect to MySQL: ' . mysqli_connect_error());
						}

						$stmt = $con->prepare('SELECT role FROM accounts WHERE id = ?');
						$stmt->bind_param('i', $_SESSION['id']);
						$stmt->execute();
						$stmt->bind_result($role);
						$stmt->fetch();
						$stmt->close();

						if ($role == 'admin') {
							echo '<a href="./view/createview.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Nieuwe Ziekmelding</a>';
							echo '</div>';
						}

						// Include config file
						require_once "include/config.php";

						// Attempt select query execution
						$sql = "SELECT * FROM ziekmelding";
						if ($result = mysqli_query($link, $sql)) {
							if (mysqli_num_rows($result) > 0) {
								echo '<table class="table table-bordered table-striped">';
								echo "<thead>";
								echo "<tr>";
								echo "<th>#</th>";
								echo "<th>Naam</th>";
								echo "<th>Reden</th>";
								echo "<th>Acties</th>";
								echo "</tr>";
								echo "</thead>";
								echo "<tbody>";
								while ($row = mysqli_fetch_array($result)) {
									echo "<tr>";
									echo "<td>" . $row['id'] . "</td>";
									echo "<td>" . $row['naam'] . "</td>";
									echo "<td>" . $row['reden'] . "</td>";
									echo "<td>";
									echo '<a href="./view/readview.php?id=' . $row['id'] . '" class="mr-3" title="Ziekmelding Tonen" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
									if ($role == 'admin') {
										echo '<a href="./view/updateview.php?id=' . $row['id'] . '" class="mr-3" title="Ziekmelding Bewerken" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
										echo '<a href="./view/deleteview.php?id=' . $row['id'] . '" title="Ziekmelding Verwijderen" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
									}
									echo "</td>";
									echo "</tr>";
								}
								echo "</tbody>";
								echo "</table>";
								// Free result set
								mysqli_free_result($result);
							} else {
								echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
							}
						} else {
							echo "Oops! Something went wrong. Please try again later.";
						}

						// Close connection
						mysqli_close($link);
						?>
					</div>
				</div>
			</div>
		</div>
</body>

</html>
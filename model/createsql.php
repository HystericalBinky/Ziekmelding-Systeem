<?php
// Include config file
require_once "../include/config.php";

// Define variables and initialize with empty values
$naam = $reden = "";
$naam_err = $reden_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate address
    $input_naam = trim($_POST["naam"]);
    if (empty($input_naam)) {
        $naam_err = "Please enter an address.";
    } else {
        $naam = $input_naam;
    }

    // Validate salary
    $input_reden = trim($_POST["reden"]);
    if (empty($input_reden)) {
        $reden_err = "Please enter the salary amount.";
    } else {
        $reden = $input_reden;
    }

    // Check input errors before inserting in database
    if (empty($naam_err) && empty($reden_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO ziekmelding (naam, reden) VALUES (?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_naam, $param_reden);

            // Set parameters
            $param_naam = $naam;
            $param_reden = $reden;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records created successfully. Redirect to landing page
                header("location: ../home.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
}

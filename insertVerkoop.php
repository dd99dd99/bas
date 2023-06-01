<?php

include "conn.php";
include "classes/VerkooporderForm.php";
include 'classes/verkoop.php';
$conn = dbConnect();

$db = new Database();
$form = new VerkooporderForm($db);
$form->generateForm();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $klantId = $_POST["klant"];
    $aantal = $_POST["aantal"];

    if (isset($_POST["artikel"])) {
        $artId = $_POST["artikel"];

        $verkoop = new Verkoop();
        $verkoop->insertVerkoop($conn, $klantId, $artId, $aantal);

        if ($verkoop) {
            echo '<script>alert("VerkoopOrder toegevoegd")</script>';
            echo "<script> location.replace('index.php'); </script>";
        }
    }
}

?>

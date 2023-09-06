<?php

session_start();
include("db.php");

$name = $_POST["name"];
$phone = $_POST["phone"];
$id = $_GET["id"];

// POST
if (isset($_POST["add"])) {

    $query = ("INSERT INTO student (name, phone) VALUES ('$name', '$phone')");

    $query_run = mysqli_query($db, $query);

    if ($query_run) {
        header("Location: index.php");
    }
}

// GET
$query = "SELECT * FROM student";
$query_run = mysqli_query($db, $query);
$result = $query_run;


// PUT
if (isset($_POST['edit'])) {

    $query = "UPDATE `student` SET `name`='$name',`phone`='$phone' WHERE id=$id";
    $query_run = mysqli_query($db, $query);

    if ($query_run) {
        header("Location: index.php");
    }
}

// DELETE
if (isset($_POST["delete"])) {
    $query = "DELETE FROM student WHERE id='$id' ";
    $query_run = mysqli_query($db, $query);

    if ($query_run) {
        header("Location: index.php");
    }
}
?>
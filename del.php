<?php
include_once "config/db.php";
$id = $_GET['id'];
$query = "DELETE FROM `active` WHERE id='$id'";
$data = mysqli_query($con, $query);

if ($data) {
    echo "Record deleted";
} else {
    echo "Failed deletion";
}
?>

<?php include('partials/meniu.php'); ?>

<?php
$id = $_GET['id'];

if ($id) {
   $query = "DELETE FROM Atleti WHERE AtletID=$id"; 
   $result = mysqli_query($connection, $query);
   header("Location: atleti.php");
}

//echo true;
?>
<?php include('partials/meniu.php'); ?>

<?php
$id = $_GET['id'];

if ($id) {
   $query = "DELETE FROM Sponsori_principali WHERE SponsorID=$id"; 
   $result = mysqli_query($connection, $query);
   header("Location: sponsori_principali.php");
}

//echo true;
?>
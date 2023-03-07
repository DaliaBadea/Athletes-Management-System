<?php include('partials/meniu.php'); ?>

<div class="main-content"> 
    <div class="wrapper">
       <h1>Date Probe</h1>

       <br />

<!--Button to Add Atlet -->
<a href="insert_comp_frecv.php" class="btn-primary">Adauga Proba</a>


<br /> <br /> <br />

<?php

$query = "SELECT A.AtletID, P.ProbaID, A.Nume, A.Prenume, P.Denumire_p
          FROM Atleti A INNER JOIN Probe P ON (A.ProbaID = P.ProbaID)
          GROUP BY A.Nume, A.Prenume, P.Denumire_p
          ORDER BY A.Nume ASC" ;
$result = mysqli_query($connection, $query); //res
$count = mysqli_num_rows($result);
$atleti= [];
while($row = $result->fetch_assoc()) {
    $atleti[] = $row;
}

?>

<table class="tbl-full", border = "1">
<!-- <table border="1"> -->
<tr>

<th>Nume</th>
<th>Prenume</th>
<th>Proba</th>
<th>Actiuni</th>

</tr>

<?php foreach ($atleti as $atlet):?>
<tr data-id="<?php echo $atlet['AtletID']; ?>">
    <td><?php echo $atlet['Nume']; ?></td>
    <td><?php echo $atlet['Prenume']; ?></td>
    <td><?php echo $atlet['Denumire_p']; ?></td>

    <td>
    <a href="<?php echo 'http://localhost/sport/'; ?>admin/update_probe.php?id=<?php echo $atlet['AtletID']; ?>" class="btn-secondary">Update Proba</a>
   
    <a href="<?php echo 'http://localhost/sport/'; ?>admin/delete_probe.php?id=<?php echo $atlet['AtletID']; ?>" class="btn-danger">Delete Proba</a>
</td>
</tr>
<?php endforeach; ?>

</table>

<br /> <br /> <br />
<br /> <br /> <br />
<br /> <br /> <br />
<br /> <br /> <br />

</div>

</div>

<?php include('partials/footer.php'); ?> 


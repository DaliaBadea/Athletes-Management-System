<?php include('partials/meniu.php'); ?>

<div class="main-content"> 
    <div class="wrapper">
       <h1>Date Competitii frecventate</h1>

       <br />

<!--Button to Add Atlet -->
<a href="insert_comp_frecv.php" class="btn-primary">Adauga Competitii Frecventate</a>


<br /> <br /> <br />

<?php

$query = "SELECT A.AtletID, C.CompetitieID, A.Nume, A.Prenume, C.Denumire, CF.Nr_competitii_frecventate
          FROM Competitii_frecventate CF INNER JOIN Atleti A ON (A.AtletID = CF.AtletID)
                                         INNER JOIN Competitii C ON (C.CompetitieID = CF.CompetitieID)
          GROUP BY A.Nume, A.Prenume, C.Denumire, CF.Nr_competitii_frecventate";
$result = mysqli_query($connection, $query); //res
$count = mysqli_num_rows($result);
$competitii_frecventate = [];
while($row = $result->fetch_assoc()) {
    $competitii_frecventate[] = $row;
}

?>

<table class="tbl-full", border = "1">
<!-- <table border="1"> -->
<tr>

<th>Nume</th>
<th>Prenume</th>
<th>Competitie viitoare</th>
<th>Numar competitii frecventate</th>
<th>Actiuni</th>

</tr>

<?php foreach ($competitii_frecventate as $comp_frecv):?>
<tr data-id="<?php echo $comp_frecv['AtletID']; ?>">
    <td><?php echo $comp_frecv['Nume']; ?></td>
    <td><?php echo $comp_frecv['Prenume']; ?></td>
    <td><?php echo $comp_frecv['Denumire']; ?></td>
    <td><?php echo $comp_frecv['Nr_competitii_frecventate']; ?></td>

    <td>
    <a href="<?php echo 'http://localhost/sport/'; ?>admin/update_comp_frecv.php?id=<?php echo $comp_frecv['AtletID']; ?>" class="btn-secondary">Update Competitii frecventate</a>
   
    <a href="<?php echo 'http://localhost/sport/'; ?>admin/delete_comp_frecv.php?id=<?php echo $comp_frecv['AtletID']; ?>" class="btn-danger">Delete competitii frecventate</a>
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


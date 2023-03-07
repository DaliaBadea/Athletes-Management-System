<?php include('partials/meniu.php'); ?>


<div class="main-content"> 
    <div class="wrapper">
       <h1>Date Competitii</h1>
       <br />

<!--Button to Add Atlet -->
<a href="insert_competitii.php" class="btn-primary">Adauga Competitie</a>

<br /> <br /> <br />
<?php
$query = "SELECT * FROM competitii";
$result = mysqli_query($connection, $query);
$competitii = [];
while($row = $result->fetch_assoc()) {
    $competitii[] = $row;
}

?>
<table class="tbl-full", border = "1">
<!-- <table border="1"> -->
<tr>
<th>Denumire</th>
<th>Data competitie</th>
<th>Taxa participare</th>
<th>Oras</th>
<th>Actiuni</th>
</tr>

<?php foreach ($competitii as $competitie):?>
<tr data-id="<?php echo $competitie['CompetitieID']; ?>">
    <td><?php echo $competitie['Denumire']; ?></td>
    <td><?php echo $competitie['Data_competitie']; ?></td>
    <td><?php echo $competitie['Taxa_participare']; ?></td>
    <td><?php echo $competitie['Oras']; ?></td>
    <td>
    <a href="<?php echo 'http://localhost/sport/'; ?>admin/update_competitii.php?id=<?php echo $competitie['CompetitieID']; ?>" class="btn-secondary">Update Competitie</a>
   
    <a href="<?php echo 'http://localhost/sport/'; ?>admin/delete_competitii.php?id=<?php echo $competitie['CompetitieID']; ?>" class="btn-danger">Delete Competitie</a>
    </td>
</tr>
<?php endforeach; ?>

</table>

<br /> <br /> <br />
<br /> <br /> <br />
<br /> <br /> <br />
<br /> <br /> <br />
<br /> <br /> <br />


</div>

</div>

<?php include('partials/footer.php'); ?> 

